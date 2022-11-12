<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeContactRequest;
use App\Models\EmployeeContact;

class EmployeeContactController extends Controller
{
    public function show()
    {

        $employee_contacts = EmployeeContact::with('employee')->get();
        return view('admin.employee_contact.show', compact('employee_contacts'));
    }

    public function createEmployeeContact()
    {
        $employees = Employee::all();
        return view('admin.employee_contact.create', compact('employees'));
    }

    public function storeEmployeeContact(EmployeeContactRequest $request)
    {
        
        $validated =$request->validated();
        $validated['employee_id'] = $request->employee_id;
        $validated['secondary_contact_number'] = $request->secondary_contact_number;
        $validated['secondary_email_address'] = $request->secondary_email_address;
       
        EmployeeContact::create($validated);

        return redirect()->route('show.employee.contact');
    }

    public function editEmployeeContact($id)
    {
        // return
        $employees = Employee::all();
        $employee_contact = EmployeeContact::findOrFail($id);

        return view('admin.employee_contact.edit', compact('employees', 'employee_contact'));
    }

    public function updateEmployeeContact(EmployeeContactRequest $request, $id)
    {
         
        $validated =$request->validated();
        $validated['employee_id'] = $request->employee_id;
        $validated['secondary_contact_number'] = $request->secondary_contact_number;
        $validated['secondary_email_address'] = $request->secondary_email_address;
       
        EmployeeContact::findOrFail($id)->update($validated);

        return redirect()->route('show.employee.contact');
    }

    public function deleteEmployeeContact($id)
    {
        EmployeeContact::findOrfail($id)->delete();

        return back();
    }
}
