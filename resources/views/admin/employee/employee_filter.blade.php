@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Employee Filters</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<div class="table-responsive">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Employee Name</th>
										<th>Conatct Name</th>
										<th>Conatct Number</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>

									@forelse ($employees as $employee)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $employee->employee->firstname }} </td>
											<td>{{ $employee->contact_name }} </td>
											<td>{{ $employee->primary_contact_number }} </td>
											<td>{{ $employee->employee->status }} </td>

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
