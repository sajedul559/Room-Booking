<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use League\CommonMark\Normalizer\SlugNormalizer;

class PropertyFormRequest extends FormRequest
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
            'property_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'property_type' => 'required|in:Flat,Student Accommodation,Homestay',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'is_publish' => 'sometimes|boolean',
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        $data['slug']= (new SlugNormalizer())->normalize($this->property_name);
        return $data;
    }
}
