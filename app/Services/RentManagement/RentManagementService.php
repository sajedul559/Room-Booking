<?php

namespace App\Services\RentManagement;

use App\Models\RentManagement;
use App\Models\Room;
use App\Models\TenantPayment;
use App\Models\TenantRent;
use App\Models\RentPaymentHistory;
use App\Models\TenantRentPayment;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use function PHPUnit\Framework\returnArgument;

class RentManagementService
{
    public function getAllRentManagements()
    {
        return RentManagement::all();
    }
    public function create()
    {
       
        return [
            'vendors' => getApprovedVendors(),
            'properties' => getPublishedProperties(),
            'rooms' => getRooms(),
            'tenants' => getUsers(),
        ];
    }
    
    public function createRentManagement(array $data)
    {
        DB::beginTransaction();
        //dd($data);
        try
        {
            $loggedInUserId = auth()->id();
            $data['created_by'] = $loggedInUserId;
            $data['last_updated_by'] = $loggedInUserId;
            $data['payment_collect_by'] = $loggedInUserId;
            $newRentManagement = RentManagement::create($data);

            // creating new TenantPayment
            $payment = TenantPayment::create([
                'vendor_id' => $data['vendor_id'],
                'user_id' => $data['user_id'],
                'rent_management_id' => $newRentManagement->id,
                'amount' => $data['amount'],
                'payment_date' => Carbon::now(),
                'created_by' => $data['created_by'],
                'last_updated_by'=> $data['last_updated_by'],
            ]);

            $propertyAddress = Property::findOrFail($data['property_id'])->location;
            $roomName = Room::findOrFail($data['room_id'])->name;

            $this->processRentPayment($data, $payment, 
                    $data['amount'],
                    $propertyAddress, $roomName,
                    $loggedInUserId);

            // All succeeded — commit the transaction
            DB::commit();

            return $newRentManagement;
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }
    }

    public function getRentManagementById($id)
    {
        return RentManagement::with('room')->findOrFail($id);
    }

    public function updateRentManagement($id, array $data)
    {
        DB::beginTransaction();

        try
        {
            $loggedInUserId = auth()->id();
            $propertyAddress = Property::findOrFail($data['property_id'])->location;
            $roomName = Room::findOrFail($data['room_id'])->name;

            // update rentManagement
            $rentManagement = RentManagement::findOrFail($id);
            $prevPaymentAmount = $rentManagement->amount;

            if($rentManagement->amount == $data['amount'])
            {
                throw new \Exception('Updated rent amount and previous rent amount is same, nothing to update!');
            }

            $data['is_credit'] = isset($data['is_credit']) ? 1 : 0;
            $data['updated_by'] = $loggedInUserId;
            $data['last_updated_by'] = $loggedInUserId;

            // update rentPayment
            $tenantPayment = TenantPayment::where('rent_management_id', $id)
                ->firstOrFail();
            $tenantPayment->amount = $data['amount'];
            $tenantPayment->last_updated_by = $loggedInUserId;
            $tenantPayment->save();

            if($data['amount'] > $prevPaymentAmount)
            {
                $paymentLeftAfterDeduct = $data['amount'] - $prevPaymentAmount;
                $this->processRentPayment($data, $tenantPayment,
                        $paymentLeftAfterDeduct,
                        $propertyAddress, $roomName,
                        $loggedInUserId);
            }
            else
            {
                $deductRentAmount = $prevPaymentAmount - $data['amount'];
                $this->processRentDeductPayment($data, $tenantPayment,
                    $rentManagement, $propertyAddress,
                    $roomName, $loggedInUserId,
                    $deductRentAmount);
            }

            $rentManagement->update($data);
            // commit the changes
            DB::commit();
            return $rentManagement;
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            dd($e);
            throw $e;
        }
        
    }

    public function deleteRentManagement($id)
    {
        DB::beginTransaction();

        try
        {
            $rentManagement = RentManagement::findOrFail($id);

            $tenantPayment = TenantPayment::where('rent_management_id', $id)
                    ->firstOrFail();

            $propertyAddress = Property::findOrFail($rentManagement->property_id)->location;
            $roomName = Room::findOrFail($rentManagement->room_id)->name;
            $loggedInUserId = auth()->id();
            
            $deductRentAmount = $tenantPayment->amount;
            $this->processRentDeductPayment($rentManagement, $tenantPayment,
                $rentManagement, $propertyAddress,
                $roomName, $loggedInUserId,
                $deductRentAmount);

            $rentManagement->delete();
            $tenantPayment->delete();

            // commit the tranction
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            dd($e);
        }
    }

    private function processRentPayment($data, $payment, $remainingRentAmount, $propertyAddress, $roomName, $loggedInUserId)
    {
         $unpaidRents = TenantRent::where('status', '!=', 'paid')
                            ->where('user_id', $data['user_id'])
                            ->orderBy('id')
                            ->get();

            if($unpaidRents->isEmpty())
            {
                throw new \Exception('No rent entry found, failed to process tenat rent tranction.');
            }

            foreach ($unpaidRents as $unpaidRent) {
                $dueRentAmount = $unpaidRent->amount - $unpaidRent->paid_amount;
                
                if($remainingRentAmount > $dueRentAmount)
                {
                    // tenantRent update
                    $amontPaidInThisRent = $unpaidRent->amount - $unpaidRent->paid_amount;
                    $unpaidRent->paid_amount = $unpaidRent->amount;;
                    $unpaidRent->status = 'paid';
                    $unpaidRent->save();

                    // tenantRentPayment
                    TenantRentPayment::create(
                        [
                            'rent_id' => $unpaidRent->id,
                            'payment_id' => $payment->id,
                            'paid_amount' => $dueRentAmount,
                        ]
                    );

                    // create new history
                    $newRentPaymentHistory = $this->prepareRentPaymentHistory(
                        $data['vendor_id'], $data['user_id'],
                        $unpaidRent->id, $payment->id,
                        $data['amount'], $amontPaidInThisRent,
                        $data['date'], $loggedInUserId,
                        $loggedInUserId, $data['payment_type'],
                        'success', 'New rent payment amount added',
                        '', 'AUD',
                        $amontPaidInThisRent != $unpaidRent->amount,
                        $unpaidRent->due_date,
                        $propertyAddress, $roomName
                    );
                    $newRentPaymentHistory->save();
                    $remainingRentAmount = $remainingRentAmount - $dueRentAmount;
                }
                else
                {
                    // tenantRent update
                    $unpaidRent->paid_amount = $unpaidRent->paid_amount + $remainingRentAmount;
                    $totalRentDueAfterPaid = $unpaidRent->amount - $unpaidRent->paid_amount;
                    $unpaidRent->status = $totalRentDueAfterPaid < 1 ? 'paid' : 'partial';
                    $unpaidRent->save();

                    // tenantRentPayment
                    TenantRentPayment::create(
                        [
                            'rent_id' => $unpaidRent->id,
                            'payment_id' => $payment->id,
                            'paid_amount' => $remainingRentAmount,
                        ]
                    );

                    // create new history
                    $newRentPaymentHistory = $this->prepareRentPaymentHistory(
                        $data['vendor_id'], $data['user_id'],
                        $unpaidRent->id, $payment->id,
                        $data['amount'], $remainingRentAmount,
                        $data['date'], $loggedInUserId,
                        $loggedInUserId, $data['payment_type'],
                        'success', 'New rent payment amount added',
                        '', 'AUD', 
                        $remainingRentAmount != $unpaidRent->amount,
                        $unpaidRent->due_date,
                        $propertyAddress, $roomName
                    );
                    $newRentPaymentHistory->save();
                    $remainingRentAmount = 0;
                }

                if($remainingRentAmount <= 0)   
                {
                    break; 
                }
            }
    }

    private function processRentDeductPayment($data, $tenantPayment, $rentManagement, $propertyAddress, $roomName, $loggedInUserId, $deductRentAmount) 
    {
        // handling the deduction case
        $deductRentAmount = $rentManagement->amount - $data['amount'];

        $tenatRentPayments = TenantRentPayment::where('payment_id', $tenantPayment->id)
                        ->get();

        $rentPaymentIds = $tenatRentPayments->pluck('rent_id')->toArray();
        $tenantRents = TenantRent::whereIn('id', $rentPaymentIds)
                        ->orderByDesc('id')
                        ->get();
        
        foreach($tenantRents as $tenantRent)
        {
            if($deductRentAmount > $tenantRent->paid_amount)
            {
                $deductRentAmount = $deductRentAmount - $tenantRent->paid_amount;
                $tenantRent->paid_amount = 0;
                $tenantRent->status = 'pending';
                $tenantRent->last_updated_by = $loggedInUserId;
                $tenantRent->save();

                // update tenantRentPayment
                $tenantRentPaymentToUpdate = $tenatRentPayments->where('rent_id', $tenantRent->id)
                    ->firstOrFail();
                $tenantRentPaymentToUpdate->delete();

                // create new history
                $newRentPaymentHistory = $this->prepareRentPaymentHistory(
                    $data['vendor_id'], $data['user_id'],
                    $tenantRent->id, $tenantPayment->id,
                    $updatedRentAmountToPay, 0,
                    $data['date'], $loggedInUserId,
                    $loggedInUserId, $data['payment_type'],
                    'success', 'Payment amount adjusted',
                    '', 'AUD', true,
                    $tenantRent->due_date,
                    $propertyAddress, $roomName
                );
                $newRentPaymentHistory->save();
            }
            else
            {
                $updatedRentAmountToPay = $tenantRent->paid_amount - $deductRentAmount;
                $previousPaidRentAmount = $tenantRent->paid_amount;

                // update tenant rent
                $tenantRent->paid_amount = $updatedRentAmountToPay;
                $tenantRent->status = 
                    $tenantRent->paid_amount == 0 ? 'pending' :
                    ($tenantRent->amount == $tenantRent->paid_amount ? 'paid' : 'partial');
                $tenantRent->save();

                // update or delete tenantRentPayment
                $tenantRentPaymentToUpdate = $tenatRentPayments->where('rent_id', $tenantRent->id)
                    ->firstOrFail();

                if ($deductRentAmount == $previousPaidRentAmount)
                {
                    $tenantRentPaymentToUpdate->delete();
                }
                else
                {
                    $tenantRentPaymentToUpdate->paid_amount = $deductRentAmount;
                    $tenantRentPaymentToUpdate->save();
                }

                // create new history
                $newRentPaymentHistory = $this->prepareRentPaymentHistory(
                    $data['vendor_id'], $data['user_id'],
                    $tenantRent->id, $tenantPayment->id,
                    $updatedRentAmountToPay, 0,
                    $data['date'], $loggedInUserId,
                    $loggedInUserId, $data['payment_type'],
                    'success', 'Payment amount adjusted',
                    '', 'AUD', true,
                    $tenantRent->due_date,
                    $propertyAddress, $roomName
                );
                $newRentPaymentHistory->save();
                $deductRentAmount = 0;
            }

            if($deductRentAmount <= 0)
            {
                break;
            }
        }
    }

    private function prepareRentPaymentHistory($vendor_id, $user_id, $rent_id,
            $payment_id, $total_payment_amount, $total_rent_paid, $payment_date, $created_by,
            $last_updated_by, $payment_method, $payment_status,
            $note, $receipt_number, $currency, $is_partial,
            $due_date, $property_address, $room_name): RentPaymentHistory
    {
        $rentPaymentHistory = new RentPaymentHistory();
        $rentPaymentHistory->vendor_id = $vendor_id;
        $rentPaymentHistory->user_id = $user_id;
        $rentPaymentHistory->rent_id = $rent_id;
        $rentPaymentHistory->payment_id = $payment_id;
        $rentPaymentHistory->total_payment_amount = $total_payment_amount;
        $rentPaymentHistory->total_rent_paid = $total_rent_paid;
        $rentPaymentHistory->payment_date = $payment_date;
        $rentPaymentHistory->created_by = $created_by;
        $rentPaymentHistory->last_updated_by = $last_updated_by;
        $rentPaymentHistory->payment_method = $payment_method;
        $rentPaymentHistory->payment_status = $payment_status;
        $rentPaymentHistory->note = $note;
        $rentPaymentHistory->receipt_number = $receipt_number;
        $rentPaymentHistory->currency = $currency;
        $rentPaymentHistory->is_partial = $is_partial;
        $rentPaymentHistory->due_date = $due_date;
        $rentPaymentHistory->property_address = $property_address;
        $rentPaymentHistory->room_name = $room_name;

        return $rentPaymentHistory;
    }
}