<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentManagementFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [ 
            'vendor_id' => 'required|exists:vendors,id',
            'property_id' => 'required|exists:properties,id',
            'room_id' => 'required|integer',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'last_updated_by' => 'nullable|integer',
            'payment_type' => 'nullable|in:Cash,Card',
            'payment_collection_type' => 'nullable|in:Online,Offline',
            'notes' => 'nullable|string',
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        return $data;
    }
}
