	@extends('admin.layouts.app')

	@section('title')
		Employee Detail
	@endsection

	@section('content')

		<div class="row d-flex justify-content-center">
               
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Update Employee Detail</div>
                            <form method="POST" action="{{ route('update.employee.detail', $employee_detail->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $employee_detail->photo }}">
                                <div class="form-row">
                                    <div class="col-md-12 mb-4 text-center">
                                        <img id="showImage" class="card-img-top rounded-circle overflow-hidden" alt="image" style="width: 7rem"
                                        src="{{ !empty($employee_detail->photo)
                                            ? url($employee_detail->photo)
                                            : url('backend/assets/image.jpg') }}"
                                        >
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="employee_id">Employee Name</label>
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            <option selected disabled>Select employee name</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" @if($employee_detail->employee_id == $employee->id) ? 
                                                selected @endif>
                                                {{ $employee->firstname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" onchange="preview()">
                                       
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="picker2">Birth date</label>
                                        <input type="date" id="birthday" name="birthday" class="form-control" value="{{ $employee_detail->birthday }}" placeholder="yyyy-mm-dd">
                                        
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="blood_group">Blood Group</label>
                                        <input type="text" class="form-control" id="blood_group" name="blood_group" value="{{ $employee_detail->blood_group }}" placeholder="Enter blood group" >
                                       
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="present_address">Present Address</label>
                                        <input type="text" class="form-control" id="present_address" name="present_address" value="{{ $employee_detail->present_address }}" placeholder="Enter present address">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="permanent_address">Permanent Address</label>
                                        <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="{{ $employee_detail->permanent_address }}" placeholder="Enter parmanent address">
                                    </div>

                                    <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-form-label col-md-10 pt-0 ml-1">Select your Gender</div>
                                        <div class="col-sm-10 ml-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male" {{ ($employee_detail->gender == 'male') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female" {{ ($employee_detail->gender == 'female') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary" style="float: right">Update Detail</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
