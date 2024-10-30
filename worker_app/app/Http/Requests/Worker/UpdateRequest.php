<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'age' => 'nullable|integer',
            'description' => 'nullable|string',
            'is_married' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле должно быть заполнено',
            'name.string' => 'Это поле должно быть строкой',
            'surname.required' => 'Это поле должно быть заполнено',
            'surname.string' => 'Это поле должно быть строкой',
            'email.required' => 'Это поле должно быть заполнено',
            'email.email' => 'Это поле должно быть почтой',
            'age.integer' => 'Это поле должно быть числом',
            'description.string' => 'Это поле должно быть строкой',
            'is_married.string' => 'Это поле должно быть строкой',
        ];
    }
}
