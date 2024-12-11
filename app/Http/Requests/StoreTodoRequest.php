<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTodoRequest extends FormRequest
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
            'taskname' => 'string|required|min:1|max:255',
            'description' => 'string|required|max:1000',
            'completed' => 'boolean|required',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048|nullable'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'taskname.required' => 'The task name is required',
            'taskname.min' => 'The task name must be at least 5 characters',
            'description.required' => 'The description is required',
            'description.min' => 'The description must be at least 10 characters',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        dd($validator->errors()); // This will show validation errors
    }
}
