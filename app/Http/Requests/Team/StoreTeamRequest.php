<?php

namespace App\Http\Requests\Team;

use App\Helpers\ResponseFormatter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTeamRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'role' => ['nullable', 'string'],
            'image' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name cannot be more than 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'role.string' => 'Role must be a string',
            'image.required' => 'Image is required',
            'image.mimes' => 'Only JPEG, PNG, and JPG images are allowed',
            'image.max' => 'Image size cannot be more than 2048 KB',
        ];
    }

    // failedException
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ResponseFormatter::error($validator->errors(), 422));
    }
}
