<?php

namespace App\Http\Requests\TeamMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $data = [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email||unique:users,email,'.$this->id.',id,deleted_at,NULL',
            'employee_id' => 'required|string|unique:users,employee_id,'.$this->id.',id,deleted_at,NULL',
            'position' => 'required|string|max:255',
            'password' => 'nullable|string|min:5|confirmed',
        ];

        if (isset($this->password)) {
            $data['password'] = 'string|min:5|confirmed';
        }

        return $data;

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(self::rules()),
        ], 422));
    }
}
