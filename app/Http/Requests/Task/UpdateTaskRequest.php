<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:191|unique:tasks,name,'.$this->task_id.',id,deleted_at,NULL',
            'description' => 'required',
        ];
    }
}
