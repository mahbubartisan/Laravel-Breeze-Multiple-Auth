@extends('employee.layouts.app')

@section('title')
Employee Dashboard
@endsection

@section('content')
<div class="main-content">
	<div class="breadcrumb">
		<h1 class="mr-2">Employee Dashboard</h1>
	</div>
	<div class="separator-breadcrumb border-top"></div>

	<div class="row">
		<div class="col-md-12">
			<button data-toggle="modal" data-target="#employeeModal" class="btn btn-md btn-outline-success mb-3"
				style="float: right"><i class="fa fa-plus"> Add Attendence</i></button>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-md-12 mb-4">
			<div class="card text-left">
				<div class="card-body">
					<h4 class="card-title">Attendence List</h4>
					<h4 class="card-title mb-1">
						<div class="row">
							<div class="col-md-6"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<span class="float-left mb-1">
												From
											</span>
											<input type="date" name="fromDate" value=""
												class="form-control date-filter mr-3" id="fromDate">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<span class="float-left mb-1">
												To
											</span>
											<input type="date" name="toDate" class="form-control date-filter mr-3"
												id="toDate">
										</div>
									</div>
									<div class="col-md-2 mt-4">
										<a href="JavaScript:void(0)"
											class="btn btn-outline-primary form-control filterBtn" data-route={{
											route('dataFilter') }}>Filter</a>

									</div>
								</div>
							</div>
						</div>
					</h4>
					<!-- end of row-->

					<!-- end of main-content -->
					<div class="table-responsive" id="globalTable">
						<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
							id="zero_configuration_table datatable" style="width:100%">
							<thead>
								<tr>
									<th>Serial NO.</th>
									<th>Employee Name</th>
									<th>Attendence Date</th>
									<th>Attendence Time</th>
									<th>In Time</th>
									<th>Out Time</th>
									<th>Status</th>
									<th>Total Hours</th>
									{{-- <th>Start & End Hours</th> --}}
									<th>Action</th>

								</tr>
							</thead>
							<tbody>

								@forelse ($employee_attendences as $attendence)
								<tr>

									<td>{{ $loop->iteration }}</td>
									<td>{{ $attendence->employee->firstname }}</td>
									<td>{{ Carbon\Carbon::parse($attendence->attendence_date)->format('D, d F Y') }}
									</td>
									<td>{{ $attendence->attendence_time }}</td>
									<td>{{ $attendence->in_time }}</td>
									<td>{{ $attendence->out_time }}</td>
									<td>
										Entry {!! ($attendence->attendence_time === $attendence->in_time) ? '<span
											class="badge badge-pill badge-success text-11">On Time </span>' : '<span
											class="badge badge-pill badge-danger text-11">Late</span>' !!}</span>
									</td>
									<td>
										{{ $attendence->total_hours }}
									</td>
									<td>
										<button data-id="{{ $attendence->id }}"
											class="btn btn-primary mb-2 ml-2 edit-attendence" data-toggle="modal"
											data-target="#employeeEditAttendenceModal" title="Edit"><i
												class="nav-icon i-Pen-4"></i></button>

									</td>

									@empty

									<td>No records found...</td>

								</tr>
								@endforelse

							</tbody>

						</table>
					</div>
				</div> <!-- end card -->
			</div>
		</div>
	</div>

	<!-- Employee Create Modal -->
	<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModal"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="employeeModal">Add Attendence</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-6 form-group mb-3">
								<label for="attendence_date">Attendence Date</label>
								<input type="text" class="form-control" id="attendence_date" name="attendence_date"
									value="{{ Carbon\Carbon::now()->format('D, d F Y') }}" readonly>
							</div>

							<div class="col-md-6 form-group mb-3">
								<label for="attendence_time">Attendence Time</label>
								<input type="text" class="form-control" id="attendence_time" name="attendence_time"
									value="09:00 AM" readonly>
							</div>
							<div class="col-md-6 form-group mb-3">
								<label for="in_time">In Time</label>
								<input type="time" class="form-control" id="in_time" name="in_time">
								{{-- <span class="text-danger" id="fullnameError"></span> --}}
							</div>
							<div class="col-md-6 form-group mb-3">
								<label for="out_time">Out Time</label>
								<input type="time" class="form-control" id="out_time" name="out_time"
									placeholder="Enter attendence time">
								{{-- <span class="text-danger" id="fullnameError"></span> --}}
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
	<div class="modal fade" id="employeeEditAttendenceModal" tabindex="-1" role="dialog"
		aria-labelledby="employeeEditAttendenceModal" aria-hidden="true">
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

						<input type="hidden" id="edit_employee_attendence_id">

						<div class="row">
							<div class="col-md-6 form-group mb-3">
								<label for="attendence_date">Attendence Date</label>
								<input type="text" class="form-control" id="edit_attendence_date" name="attendence_date"
									value="{{ Carbon\Carbon::now()->format('D, d F Y') }}" readonly>
							</div>

							<div class="col-md-6 form-group mb-3">
								<label for="attendence_time">Attendence Time</label>
								<input type="text" class="form-control" id="edit_attendence_time" name="attendence_time"
									value="09:00 AM" readonly>
							</div>
							<div class="col-md-6 form-group mb-3">
								<label for="in_time">In Time</label>
								<input type="text" class="form-control" id="edit_in_time" name="in_time" readonly>
							</div>
							<div class="col-md-6 form-group mb-3">
								<label for="out_time">Out Time</label>
								<input type="time" class="form-control" id="edit_out_time" name="out_time">
								{{-- <span class="text-danger" id="outTimeError"></span> --}}
							</div>

						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-update">Update</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Employee Edit Modal End-->

	<!-- flatpicker -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
		flatpickr(".date-filter", {
				altInput: true,
				altFormat: "F j, Y",
				dateFormat: "Y-m-d",
				defaultDate: "today",
				maxDate: "today",
			})
	</script>
	<!-- end flatpicker -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		// Show Filtered Record
			$('.filterBtn').on('click', function() {
				let route = $(this).data('route');
				let fromDate = $('#fromDate').val();
				let toDate = $('#toDate').val();

				if (fromDate > toDate) {
					alert('FromDate cannot be after ToDate')
				} else {
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: route,
						data: {
							fromDate: fromDate,
							toDate: toDate,
						},
						dataType: "html",
						type: 'POST',
						success: function(data) {

							$('#globalTable').replaceWith($('#globalTable', data));

							$('#datatable').DataTable({
								"paging": true,
								"ordering": false,
								"info": true
							});
						},
						error: function(data) {
							//console.log('Error:', data);
						}
					});
				}
			});
	</script>

	<script>
		$(".btn-submit").click(function(e) {
				e.preventDefault();

				let attendence_date = $("#attendence_date").val();
				let attendence_time = $("#attendence_time").val();
				let in_time = $("#in_time").val();
				let out_time = $("#out_time").val();

				// alert(status);

				$.ajaxSetup({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
					},
				});

				$.ajax({
					type: "POST",
					url: "{{ route('store.employee.attendence') }}",
					data: {
						attendence_date: attendence_date,
						attendence_time: attendence_time,
						in_time: in_time,
						out_time: out_time,
					},
					success: function(data) {
						location.reload();
						// $('#employeeModal').modal('hide');
					},
					error: function(data) {
						$('#in_time').text(data.responseJSON.errors.in_time);

					}
				});
			});
	</script>

	<script>
		$(document).on('click', '.edit-attendence', function() {
				let employee_attendence_id = $(this).data("id");

				$.ajax({
					type: "GET",
					url: "/employee-attendences/edit/" + employee_attendence_id,
					success: function(response) {
						if (response.status == 404) {
							$('#success_message').html();
							$('#success_message').addClass('alert alert-danger');
							$('#success_message').text(response.message);

						} else {
							$('#edit_in_time').val(response.employee_attendence.in_time);
							$('#edit_out_time').val(response.employee_attendence.out_time);
							$('#edit_employee_attendence_id').val(employee_attendence_id);

						}
					}
				});
			});
	</script>

	<script>
		$(".btn-update").click(function(e) {
				e.preventDefault();

				$(this).text('Updating');

				let employee_attendence_id = $('#edit_employee_attendence_id').val();


				let data = {
					'attenedence_date': $('#edit_attendence_date').val(),
					'attendence_time': $('#edit_attendence_time').val(),
					'in_time': $('#edit_in_time').val(),
					'out_time': $('#edit_out_time').val(),
				}

				$.ajaxSetup({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
					},
				});

				$.ajax({
					type: "POST",
					url: "/employee-attendences/update/" + employee_attendence_id,
					data: data,
					success: function(response) {
						$('#employeeEditModal').modal('hide');
						$(".btn-update").text('Update');
						location.reload();

					},
					error: function(response) {

						console.log(response);

					}
				});
			});
	</script>
</div>
@endsection