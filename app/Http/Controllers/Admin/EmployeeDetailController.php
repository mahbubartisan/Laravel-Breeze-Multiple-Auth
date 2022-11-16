<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeeDetail;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreEmployeeDetailRequest;
use App\Http\Requests\UpdateEmpoyeeDetailRequest;

class EmployeeDetailController extends Controller
{
    public function show()
    {
        $employee_details = EmployeeDetail::with('employee')->get();

        return view('admin.employee_detail.show', compact('employee_details'));
    }


    public function createEmployeeDetail()
    {
        $employees = Employee::all();
        return view('admin.employee_detail.create', compact('employees'));
    }

    public function storeEmployeeDetail(StoreEmployeeDetailRequest $request)
    {
        $image = $request->file('image');

        $image_ext = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('backend/assets/upload/employee/' . $image_ext);

        $image_path = 'backend/assets/upload/employee/' . $image_ext;

        EmployeeDetail::create([
            'photo' => $image_path,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'employee_id' => $request->employee_id,
            'created_at' => now()
        ]);

        return redirect()->route('show.employee.detail');

    }

    public function editEmployeeDetail($id)
    {

        $employees = Employee::all();
        $employee_detail = EmployeeDetail::findOrFail($id);

        return view('admin.employee_detail.edit', compact('employee_detail', 'employees'));
    }

    public function updateEmployeeDetail(StoreEmployeeDetailRequest $request, $id)
    {

        // dd($request->all()); die;

        $old_image = $request->file('old_image');

        $image = $request->file('image');

        if ($image) {

            $image_ext = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('backend/assets/upload/employee/' . $image_ext);

            $image_path = 'backend/assets/upload/employee/' . $image_ext;

            unlink($old_image);

            $employee_detail = EmployeeDetail::findOrFail($id);

            $employee_detail->update([
                'photo' => $image_path,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'blood_group' => $request->blood_group,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'employee_id' => $request->employee_id,
                'created_at' => now()
            ]);

        }

        $employee_detail = EmployeeDetail::findOrFail($id);

        $employee_detail->update([
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'employee_id' => $request->employee_id,
            'updated_at' => now()
        ]);

        return redirect()->route('show.employee.detail');
    }

    public function deleteEmployeeDetail($id)
    {
        $employee_detail = EmployeeDetail::findOrFail($id);

        $employee_image = $employee_detail->photo;

        unlink($employee_image);

        EmployeeDetail::findOrFail($id)->delete();

        return back();

    }
}