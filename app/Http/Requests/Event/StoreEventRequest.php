<?php

namespace App\Http\Requests\Event;

use App\Helpers\ResponseFormatter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEventRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'speaker' => ['required', 'string', 'max:100'],
            'images' => ['required', 'array'],
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
            'email.required' => 'Email is required',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'speaker.required' => 'Speaker is required',
            'image.required' => 'Image is required',
        ];
    }

    // failedException
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ResponseFormatter::error($validator->errors(), 422));
    }
}
