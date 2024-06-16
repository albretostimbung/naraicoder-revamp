<?php

namespace App\Http\Requests\Auth;

use App\Helpers\ResponseFormatter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'major' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'occupation' => ['nullable', 'string'],
            'avatar' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'major.required' => 'Major is required',
            'address.required' => 'Address is required',
            'occupation.required' => 'Occupation is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
        ];
    }

    // failedException
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ResponseFormatter::error($validator->errors(), 422));
    }
}
