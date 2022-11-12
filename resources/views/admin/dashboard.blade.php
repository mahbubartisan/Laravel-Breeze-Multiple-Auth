@extends('admin.layouts.app')

@section('title')
	Admin Dashboard
@endsection

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Admin Dashboard</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		@php
			
			$total_admin = App\Models\Admin::select('id')->count();
			$total_employee = App\Models\Employee::select('id')->count();
		@endphp
		<div class="row">
			<!-- ICON BG-->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
					<div class="card-body text-center"><i class="i-Administrator"></i>
						<div class="content">
							<p class="text-muted mt-2 mb-0">Admin</p>
							<p class="text-primary text-24 line-height-1 mb-2">{{ $total_admin }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
					<div class="card-body text-center"><i class="i-Mens"></i>
						<div class="content">
							<p class="text-muted mt-2 mb-0">Employees</p>
							<p class="text-primary text-24 line-height-1 mb-2">{{ $total_employee }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<button data-toggle="modal" data-target="#employeeModal" class="btn btn-md btn-outline-primary ripple m-3"
							style="float:right"><i class="fa fa-plus"> Add
								Employee</i></button>
						<h4 class="card-title mb-3">Employee List</h4>
						<div class="table-responsive">
							<table id="zero_configuration_table" class=" table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>First Name</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@forelse ($employees as $employee)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $employee->firstname }}</td>
											<td>{{ $employee->fullname }}</td>
											<td>{{ $employee->email }}</td>
											<td>{{ $employee->status }}</td>
											<td>
												<button data-id="{{ $employee->id }}" class="btn btn-primary mb-2 ml-2 edit-employee" data-toggle="modal"
													data-target="#employeeEditModal" title="Edit"><i class="nav-icon i-Pen-4"></i></button>
												<button data-id="{{ $employee->id }}" class="btn btn-danger mb-2 ml-2 btn-delete" title="Delete"><i
														class="nav-icon i-Close-Window"></i></button>
											</td>

										@empty
											<td>No match found...</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<h4 class="card-title mb-4">Attendence List</h4>
						<div class="table-responsive">
							<table id="multicolumn_ordering_table" class="display table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Employee Name</th>
										<th>Attendence Time</th>
										<th>Attendence Date</th>
										<th>In Time</th>
										<th>Out Time</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($employee_attendences as $attendence)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $attendence->employee->firstname }}</td>
											<td>{{ $attendence->attendence_time }} </td>
											<td>{{ Carbon\Carbon::parse($attendence->attendence_date)->format('D, d F Y') }}</td>
											<td>{{ $attendence->in_time }}</td>
											<td>{{ $attendence->out_time }}</td>
										@empty
											<td class="text-center">
												No records found...
											</td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
								</tfoot>
							</table>
						</div>

					</div>
				</div>
			</div>
			<!-- end of col -->

		</div>

		<!-- Employee Create Modal -->
		<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModal"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="employeeModal">Create Employee</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="{{ route('store.employee') }}">
							@csrf
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label for="firstname">First name</label>
									<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name">

									<span class="text-danger" id="firstnameError"></span>
								</div>

								<div class="col-md-6 form-group mb-3">
									<label for="fullname">Full name</label>
									<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name">
									<span class="text-danger" id="fullnameError"></span>
								</div>

								<div class="col-md-6 form-group mb-3">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
									<span class="text-danger" id="emailError"></span>
								</div>

								<div class="col-md-6 form-group mb-3">
									<label for="password">Password</label>
									<input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
									<span class="text-danger" id="passwordError"></span>
								</div>
								<div class="col-md-6 form-group mb-3">
									<label for="status">Status</label>
									<input type="text" class="form-control" id="status" name="status" placeholder="Enter status">
									<span class="text-danger" id="statusError"></span>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-submit">Add</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Employee Create Modal End -->

		<!-- Employee Edit Modal Start -->
		<div class="modal fade" id="employeeEditModal" tabindex="-1" role="dialog" aria-labelledby="employeeEditModal"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="title">Edit Employee Info</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<input type="hidden" id="edit_employee_id">
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label for="firstname">First name</label>
									<input type="text" class="form-control firstname" id="edit_firstname" name="firstname"
										placeholder="Enter your first name">
									<span class="text-danger" id="editFirstnameError"></span>
								</div>

								<div class="col-md-6 form-group mb-3">
									<label for="fullname">Full name</label>
									<input type="text" class="form-control fullname" id="edit_fullname" name="fullname"
										placeholder="Enter your full name">
									<span class="text-danger" id="editFullnameError"></span>
								</div>

								<div class="col-md-6 form-group mb-3">
									<label for="email">Email address</label>
									<input type="email" class="form-control email" id="edit_email" name="email" placeholder="Enter email">
									<span class="text-danger" id="editEmailError"></span>
								</div>

								<div class="col-md-6 form-group mb-3">
									<label for="password">Password</label>
									<input type="text" class="form-control password" id="edit_password" name="password"
										placeholder="Enter password">
									<span class="text-danger" id="editPasswordError"></span>
								</div>
								<div class="col-md-6 form-group mb-3">
									<label for="status">Status</label>
									<input type="text" class="form-control status" id="edit_status" name="status"
										placeholder="Enter status">
									<span class="text-danger" id="editStatusError"></span>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-update">Update</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Employee Edit Modal End-->

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

		<script>
			$(".btn-submit").click(function(e) {
				e.preventDefault();

				let firstname = $("#firstname").val();
				let fullname = $("#fullname").val();
				let email = $("#email").val();
				let password = $("#password").val();
				let status = $("#status").val();;

				// alert(status);

				$.ajaxSetup({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
					},
				});

				$.ajax({
					type: "POST",
					url: "{{ route('store.employee') }}",
					data: {
						firstname: firstname,
						fullname: fullname,
						email: email,
						password: password,
						status: status,
					},
					success: function(data) {
						location.reload();
						$('#employeeModal').modal('hide');
					},
					error: function(data) {
						$('#firstnameError').text(data.responseJSON.errors.firstname);
						$('#fullnameError').text(data.responseJSON.errors.fullname);
						$('#emailError').text(data.responseJSON.errors.email);
						$('#passwordError').text(data.responseJSON.errors.password);
						$('#statusError').text(data.responseJSON.errors.status);
					}
				});
			});
		</script>

		<script>
			$(document).on('click', '.edit-employee', function() {
				let employee_id = $(this).data("id");

				// $('#employeeEditModal').modal('show');

				$.ajax({
					type: "GET",
					url: "/employee/edit/" + employee_id,
					// data: "data",
					success: function(response) {
						if (response.status == 404) {
							$('#success_message').html();
							$('#success_message').addClass('alert alert-danger');
							$('#success_message').text(response.message);

						} else {
							$('#edit_firstname').val(response.employee.firstname);
							$('#edit_fullname').val(response.employee.fullname);
							$('#edit_email').val(response.employee.email);
							$('#edit_password').val(response.employee.password);
							$('#edit_status').val(response.employee.status);
							$('#edit_employee_id').val(employee_id);
						}
					}
				});
			});
		</script>

		<script>
			$(".btn-update").click(function(e) {
				e.preventDefault();

				// $(this).text('Updating');

				let employee_id = $('#edit_employee_id').val();

				let data = {
					'firstname': $('#edit_firstname').val(),
					'fullname': $('#edit_fullname').val(),
					'email': $('#edit_email').val(),
					'password': $('#edit_password').val(),
					'status': $('#edit_status').val(),
				}

				$.ajaxSetup({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
					},
				});

				$.ajax({
					type: "POST",
					url: "/employee/update/" + employee_id,
					data: data,
					success: function(response) {
						location.reload();
						$('#employeeEditModal').modal('hide');

					},
					error: function(response) {
						$('#editFirstnameError').text(response.responseJSON.errors.firstname);
						$('#editFullnameError').text(response.responseJSON.errors.fullname);
						$('#editEmailError').text(response.responseJSON.errors.email);
						$('#editPasswordError').text(response.responseJSON.errors.password);
						$('#editStatusError').text(response.responseJSON.errors.status);
					}
				});
			});
		</script>

		<script>
			$(document).on('click', '.btn-delete', function(e) {
				e.preventDefault();

				let employee_id = $(this).data("id");

				$.ajax({
					type: "GET",
					url: "/employee/delete/" + employee_id,
					success: function(response) {
						location.reload();
					}
				});
			});
		</script>

	</div>
@endsection
