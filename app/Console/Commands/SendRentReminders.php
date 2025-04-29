<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Assuming you have User model
use App\Models\Rent; // Assuming you have Rent model
use App\Mail\RentReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendRentReminders extends Command
{
    protected $signature = 'rent:send-reminders';
    protected $description = 'Send rent reminder emails to Admin and Renters on rent due date.';

    public function handle()
    {
        $today = Carbon::today()->toDateString();

        // Fetch all rents due today
        $rents = Rent::whereDate('due_date', $today)->get();

        foreach ($rents as $rent) {
            $renter = $rent->renter; // Assuming a relation Rent -> Renter (User)
            $admin = User::where('role', 'admin')->first(); // or however your admin user is defined

            $rentDetails = [
                'amount' => $rent->amount,
                'due_date' => $rent->due_date,
            ];

            // Send email to Renter
            if ($renter) {
                Mail::to($renter->email)->send(new RentReminderMail($renter, $rentDetails));
            }

            // Send email to Admin
            if ($admin) {
                Mail::to($admin->email)->send(new RentReminderMail($admin, $rentDetails));
            }
        }

        $this->info('Rent reminder emails sent successfully.');
    }
}
