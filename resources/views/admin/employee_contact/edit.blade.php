	@extends('admin.layouts.app')

	@section('title')
		Employee Detail
	@endsection

	@section('content')
		<div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Edit Emergency Contact</div>
                            <form method="POST" action="{{ route('update.employee.conatct', $employee_contact->id) }}" >
                                   @csrf  
                            <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="employee_id">Employee Name</label>
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            <option selected disabled>Select employee name</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" @if($employee_contact->employee_id == $employee->id) ? 
                                                selected @endif>
                                                {{ $employee->firstname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="primary_contact_name">Conatct Name</label>
                                        <input type="text" class="form-control @error('contact_name') border-danger @enderror" id="contact_name" name="contact_name" value="{{ $employee_contact->contact_name }}" placeholder="Enter conatct name" >
                                        
                                        @error('contact_name')
                                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>                               
                                    <div class="col-md-6 mb-3">
                                        <label for="relationship">Relationship</label>
                                        <input type="text" class="form-control @error('relationship') border-danger @enderror" id="relationship" name="relationship" value="{{ $employee_contact->relationship }}" placeholder="Enter relationship" >
                                        @error('relationship')
                                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control @error('address') border-danger @enderror" id="address" name="address" value="{{ $employee_contact->address }}" placeholder="Enter address">
                                        @error('address')
                                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="primary_contact_number">Primary Contact Number</label>
                                        <input type="text" class="form-control @error('primary_contact_number') border-danger @enderror" id="primary_contact_number" name="primary_contact_number" value="{{ $employee_contact->primary_contact_number }}" placeholder="Enter primary contact number" >
                                        @error('primary_contact_number')
                                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationTooltip03">Secondary Contact Number</label>
                                        <input type="text" class="form-control" id="secondary_contact_number" name="secondary_contact_number" value="{{ $employee_contact->secondary_contact_number }}" placeholder="Enter secondary contact number" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="primary_email">Primary Email Address</label>
                                        <input type="text" class="form-control @error('primary_email_address') border-danger @enderror" id="primary_email_address" name="primary_email_address" value="{{ $employee_contact->primary_email_address }}" placeholder="Enter primary email address" >
                                        @error('primary_email_address')
                                             <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="secondary_email_address">Secondary Email Address</label>
                                        <input type="text" class="form-control" id="secondary_email_address" name="secondary_email_address" value="{{ $employee_contact->secondary_email_address }}" placeholder="Enter secondary email address">
                                    </div>
                                </div> <!-- form-row -->
                                
                                 <button type="submit" name="submit" class="btn btn-primary" style="float: right" >Update Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
@endsection
