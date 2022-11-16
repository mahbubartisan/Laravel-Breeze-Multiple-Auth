@extends('admin.layouts.app')

@section('content')
<div class="main-content">
	<div class="breadcrumb">
		<h1>Employee Emergency Contacts</h1>
	</div>
	<div class="separator-breadcrumb border-top"></div>

	<!-- end of row-->
	<div class="row mb-4">
		<div class="col-md-12 mb-4">
			<div class="card text-left">
				<div class="card-body">
					<a href="{{ route('create.employee.contact') }}" class="btn btn-md btn-outline-success ripple m-3"
						style="float:right"><i class="fa fa-plus"> Add Emergency Contact</i></a>
					<div class="table-responsive">
						<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
							id="zero_configuration_table" style="width:100%">
							<thead>
								<tr>
									<th>Serial NO.</th>
									<th>Employee Name</th>
									<th>Conatct Name</th>
									<th>Relationship</th>
									<th>Conatct Number</th>
									<th>Conatct Email</th>
									<th>Conatct Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@forelse ($employee_contacts as $employee_contact)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $employee_contact->employee->firstname }} </td>
									<td>{{ $employee_contact->contact_name }} </td>
									<td>{{ $employee_contact->relationship }} </td>
									<td>{{ $employee_contact->primary_contact_number }} </td>
									<td>{{ $employee_contact->primary_email_address }}</td>
									<td>{{ $employee_contact->address }} </td>

									<td>
										<a href="{{ url('employee-contacts/'.$employee_contact->id.'/edit/') }}"
											class="btn btn-primary mb-2 ml-3" title="Edit"><i
												class="nav-icon i-Pen-4"></i></a>
										<a href="{{ url('employee-contacts/'.$employee_contact->id.'/delete/') }}"
											class="btn btn-danger mb-2 ml-3" title="Delete"><i
												class="nav-icon i-Close-Window"></i></a>
									</td>
									@empty
									<td>
										No records found...
									</td>
									@endforelse
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- end of col-->
	</div>
</div>
@endsection