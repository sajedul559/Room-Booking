<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloRequest extends FormRequest
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
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blogs,slug,' . $this->blog,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'required|boolean',
        ];
    }
}
