@extends('admin.layouts.app')

@section('title')
Employee Detail
@endsection

@section('content')

<div class="row d-flex justify-content-center">

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Add Employee Detail</div>
                <form method="POST" action="{{ route('store.employee.detail') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-4 text-center">
                            <img src="{{ asset('backend/assets/image.png') }}" id="showImage"
                                class="card-img-top rounded-circle overflow-hidden" alt="image"
                                style="width: 6rem; height:6rem">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="picker1">Employee Name</label>
                            <select class="form-control" name="employee_id">
                                <option selected disabled>Select employee name</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->firstname }}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" onchange="preview()">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="picker2">Birth date</label>
                            <input type="date" id="birthday" name="birthday" class="form-control"
                                placeholder="yyyy-mm-dd">
                            @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" id="blood_group" name="blood_group"
                                placeholder="Enter blood group">
                            @error('blood_group')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="present_address">Present Address</label>
                            <input type="text" class="form-control" id="present_address" name="present_address"
                                placeholder="Enter present address">
                            @error('present_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="permanent_address">Permanent Address</label>
                            <input type="text" class="form-control" id="permanent_address" name="permanent_address"
                                placeholder="Enter parmanent address">
                            @error('permanent_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-form-label col-sm-10 pt-0">Select your Gender</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="male">
                                        <label class="form-check-label" for="gender">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="female">
                                        <label class="form-check-label" for="gender">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" style="float: right">Add Detail</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection