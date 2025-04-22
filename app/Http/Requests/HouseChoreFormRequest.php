<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use League\CommonMark\Normalizer\SlugNormalizer;

class HouseChoreFormRequest extends FormRequest
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
            // 'vendor_id' => 'required|exists:vendors,id',
            //  'vendor_id' => 'required',
            // 'property_id' => 'required|exists:properties,id',
            'property_id' => 'required',
            // 'date' => 'required|date',
            'expected_date_to_complete' => 'nullable|date|after_or_equal:date',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'task_type' => 'nullable|string',
            'comments' => 'nullable|string',
            'cleaner_booked' => 'nullable',
            'status' => 'required|string',
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        // $data['slug']= (new SlugNormalizer())->normalize($this->property_name);
        return $data;
    }
}
