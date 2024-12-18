<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use League\CommonMark\Normalizer\SlugNormalizer;

class VendorFormRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postcode' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'status' => 'nullable|string|max:50',
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        $data['slug']= (new SlugNormalizer())->normalize($this->property_name);
        return $data;
    }
}
