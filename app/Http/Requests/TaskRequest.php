<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'task' => ['required'],
            'user' => ['required']
        ];
    }

    public function messages(){
        return [
            'task.required' => "Task cannot be blank!",
            'user.required' => "User cannot be blank!"
        ];
    }
}
