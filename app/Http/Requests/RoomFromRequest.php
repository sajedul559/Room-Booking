<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFromRequest extends FormRequest
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
    public function rules()
    {
        return [
            'property_id' => 'required|integer|exists:properties,id',
            'name' => 'required|string|max:255',
            'room_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Accepts only images, max size 2MB
            'video_image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Accepts only images, max size 2MB
            'video_url' => 'nullable|url', // Ensures valid URL format

            'description' => 'nullable|string',
            'room_furnishings' => 'nullable|string',
            'internet' => 'nullable|boolean',
            'price' => 'required|numeric',
            'weekly_rent' => 'required|numeric',
            'is_bill_included_rent' => 'nullable|boolean',
            'bond' => 'nullable|numeric',
            'available_date' => 'nullable|date',
            
            'min_length_of_stay' => 'nullable|integer',
            'max_length_of_stay' => 'nullable|integer',
            'room_type' => 'nullable|string',
            'bathroom_type' => 'nullable|string',
            'bed_size' => 'nullable|string',
            'furnishFeatures' => ['required', 'array'],
            'furnishFeatures.*' => ['required', 'string', 'max:255'],
            'tenant_preference' => 'nullable|string',
            'is_women_only' => 'nullable|boolean',
            'accepting_options' => ['required', 'array'],
            'accepting_options.*' => ['required', 'string', 'max:255'],
            'is_publish' => 'nullable|boolean',

            'is_smoking_allowed' => 'nullable|boolean',
            'is_pet_allowed' => 'nullable|boolean',
            'on_welfare_allowed' => 'nullable|boolean',
            'old'           => ['nullable'],
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    // public function payloadsData()
    // {
    //     $data = $this->validated();
    //     return $data;
    // }
}
