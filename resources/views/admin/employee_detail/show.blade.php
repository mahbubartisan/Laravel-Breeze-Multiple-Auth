@extends('admin.layouts.app')

@section('title')
	All Employee Details
@endsection

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>All Employee Details</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<a href="{{ route('create.employee.detail') }}" class="btn btn-md btn-outline-success ripple m-3"
							style="float:right"><i class="fa fa-plus"> Add Employee Detail</i></a>
						<div class="table-responsive">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Photo</th>
										<th>First Name</th>
										<th>Gender</th>
										<th>Blood Group</th>
										<th>Birthday</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@forelse ($employee_details as $employee_detail)
									<tr>
										<td>{{ $loop->iteration }}</td>

										<td style="width: 2rem;"><img src="{{ $employee_detail->photo }}" alt=""> </td>
										<td>{{ $employee_detail->employee->firstname }} </td>
										<td>{{ ucwords($employee_detail->gender) }} </td>
										<td>{{ ucwords($employee_detail->blood_group) }} </td>
										<td> {{ Carbon\Carbon::parse($employee_detail->birthday)->format('D, d F Y') }}</td>
										{{-- <td>{{ $employee_detail->present_address }} </td> --}}
										<td>
											<a href="{{ url('employee-details/' . $employee_detail->id . '/edit/') }}" class="btn btn-primary mb-2 ml-2"
												title="Edit"><i class="nav-icon i-Pen-4"></i></a>
											<a href="{{ url('employee-details/' . $employee_detail->id . '/delete/') }}" class="btn btn-danger mb-2 ml-2"
												title="Delete"><i class="nav-icon i-Close-Window"></i></a>
										</td>

									@empty
										<td>
											No records found...
										</td>
									</tr>
									@endforelse
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- end of col-->

		</div>
		<!-- end of row-->
		<!-- end of main-content -->
	</div>
@endsection
