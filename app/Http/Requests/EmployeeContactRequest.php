<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeContactRequest extends FormRequest
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
        // if (request()->routeIs('store.employee')) {

        //     $employee_id = 'required';

        // } elseif(request()->routeIs('update.employee')) {

        //     $employee_id = 'sometimes';
        // }
        

        return [
            'contact_name' => ['required'],
            'relationship' => ['required'],
            'address' => ['required'],
            'primary_contact_number' => ['required'],
            'primary_email_address' => ['required', 'email'],
            'employee_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'The employee name field is required.'
        ];
    }
}
