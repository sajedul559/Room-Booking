<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseFormRequest extends FormRequest
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
            'date' => 'required|date',
            'property_id' => 'nullable|exists:properties,id',
            'expense_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'is_credit' => 'sometimes|boolean',
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        return $data;
    }
}
