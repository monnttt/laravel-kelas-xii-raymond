<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreFilmRequest extends FormRequest
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
            'title' => 'required',
            'sinopsis' => 'required',
            'year' => 'required',
            'poster' => ['required', 'file', 'image'],
            'genre_id'=> 'required|exists:genres,id'

        ];
    }
    public function failedValidation(Validator $validator)
{
throw new HttpReasonException(response()->json([
    'success' => false,
    'messeage' => 'validation errors',
    'data' => $validator->errors()
]));
}
}
