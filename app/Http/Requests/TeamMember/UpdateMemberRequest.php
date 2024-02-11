<?php

namespace App\Http\Requests\TeamMember;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => 'required|email||unique:users,email,'.$this->user_id.',id,deleted_at,NULL',
            'employee_id' => 'required|string|unique:users,employee_id,'.$this->user_id.',id,deleted_at,NULL',
            'position' => 'required|string|max:255',
            'password' => 'nullable|string|min:5|confirmed',
        ];

        if (isset($this->password)) {
            $data['password'] = 'string|min:5|confirmed';
        }

        return $data;

    }
}
