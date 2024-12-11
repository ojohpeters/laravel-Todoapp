<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
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
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048|nullable',
            'id' => ''
        ];
    }
}
