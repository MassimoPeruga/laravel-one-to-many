<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
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
            'title' => ['required', Rule::unique('types')->ignore($this->type), 'max:18'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo Nome è obbligatorio.',
            'title.unique' => 'Il valore inserito nel campo Nome è già in uso.',
            'title.max' => 'Il campo Nome non può superare i :max caratteri.',
        ];
    }
}
