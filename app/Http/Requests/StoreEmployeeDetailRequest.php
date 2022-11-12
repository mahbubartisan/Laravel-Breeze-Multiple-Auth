<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeDetailRequest extends FormRequest
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

            'employee_id' => ['required'],
            'image' => ['required', 'mimes:png,jpg'],
            'birthday' => ['required'],
            'gender' => ['required'],
            'blood_group' => ['required'],
            'present_address' => ['required'],
            'permanent_address' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'The employee name field is required.'
        ];
    }
}
