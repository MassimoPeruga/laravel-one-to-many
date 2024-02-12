<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            // 'name' => 'required|unique:projects|max:50',
            'type_id' => 'nullable|exists:types,id',
            'name' => ['required', Rule::unique('projects')->ignore($this->project), 'max:50'],
            'repository' => 'nullable|max:45',
            'repo_url' => 'nullable|url',
            'is_public' => 'nullable|boolean',
            'assignment' => 'nullable',
            'img' => 'nullable|image|max:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'type_id' => 'Il campo Tipo non è valido.',
            'name.required' => 'Il campo Nome è obbligatorio.',
            'name.unique' => 'Il campo Nome deve essere unico.',
            'name.max' => 'Il campo Nome non può superare i :max caratteri.',
            'repository.max' => 'Il campo Repository non può superare i :max caratteri.',
            'repo_url.url' => 'Il campo Link alla Repository deve essere un URL valido.',
            'is_public' => 'Il valore del campo Visibilità è errato.',
            'img.max' => "L'immagine caricata non può superare i :max KB.",
        ];
    }
}
