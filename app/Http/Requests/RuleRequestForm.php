<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use League\CommonMark\Normalizer\SlugNormalizer;

class RuleRequestForm extends FormRequest
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
            'name'      => ['required', 'unique:roles,name,'.$this->id],
            'is_active' => ['required']
        ];
    }
    public function payloadsData()
    {
        $data = $this->validated();
        // $data['slug']= (new SlugNormalizer())->normalize($this->name);
        return $data;
    }
}
