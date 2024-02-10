<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:191|unique:projects,name,NULL,id,deleted_at,NULL',
            'code' => 'required|string|min:3|max:191|unique:projects,code,NULL,id,deleted_at,NULL',
        ];
    }
}
