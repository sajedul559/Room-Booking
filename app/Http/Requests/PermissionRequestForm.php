<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequestForm extends FormRequest
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
            'name'=>'nullable',
            'section'=>'nullable',
            'route'=>'nullable',
            'parent_route'=>'nullable',
            'child_route'=>'nullable',
            'is_active'=>'nullable',
            'method_type'=>'nullable',
        ];
    }
}
