<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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
            'firstname' => ['required',' min:6', 'max:20'],
            'fullname' => ['required',' min:6', 'max:25'],
            'email' => ['required', 'email', Rule::unique('employees')->ignore($this->id)],
            'password' => ['required'],
            'status' => ['required'],
        ];
    }
}
