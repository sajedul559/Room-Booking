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
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'property_type' => 'required|in:Flat,Student Accommodation,Homestay',
            'total_bedroom' => 'required|integer',
            'total_bathroom' => 'required|integer',
            'total_people_live' => 'required|integer',
            'parking' => 'required|string|max:255',
            'internet' => 'required|string|max:255',
            'accessibility' => ['required', 'array'],
            'accessibility.*' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'is_publish' => 'sometimes|boolean',
            'is_new' => 'sometimes|boolean',
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        $data['slug']= (new SlugNormalizer())->normalize($this->property_name);

        $validated = $this->validate([
            'nearby_places' => 'nullable|array',
            'nearby_places.*.name' => 'nullable|string|max:255',
            'nearby_places.*.distance' => 'nullable|string|max:50',
        ]);

        // Filter out entries with missing name or distance
        $filteredNearby = collect($validated['nearby_places'] ?? [])
        ->filter(fn($item) => !empty($item['name']) && !empty($item['distance']))
        ->values() // Re-index
        ->all();

        $data['nearby_places'] = $filteredNearby;

        return $data;
    }
}
