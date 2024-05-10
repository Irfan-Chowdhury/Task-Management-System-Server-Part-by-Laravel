<?php

namespace App\Http\Requests\TeamMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'employee_id' => 'required|string|unique:users,employee_id,NULL,id,deleted_at,NULL',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:5|confirmed',
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     $errors = $validator->errors([
    //         'name' => 'required|string|min:3|max:255',
    //         'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
    //     ]);
    // Here is your array of errors

    //     throw new HttpResponseException($errors);
    // }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(self::rules()),
        ], 422));
    }
}
