@php
	$employee = App\Models\Employee::first();
@endphp


<div class="main-header">
	<div class="logo">
		<h1 class="text-center text-success">EAS</h1>
	</div>
	<div class="menu-toggle">
		<div></div>
		<div></div>
		<div></div>
	</div>

	<div style="margin: auto"></div>
	<div class="header-part-right">
		<!-- Full screen toggle -->
		<i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

		<!-- User avatar dropdown -->
		<div class="dropdown">
			<div class="user col align-self-end">
				<img src="{{ asset('backend/assets/image.png') }}" id="userDropdown" alt="" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<div class="dropdown-header">
						<i class="i-Lock-User mr-1"></i> {{ auth()->guard('employee')->user()->firstname }}
					</div>
					<a class="dropdown-item">Profile</a>
					<a class="dropdown-item">Change Password</a>
					<a class="dropdown-item" href="{{ route('employee.logout') }}">Sign out</a>
				</div>
			</div>
		</div>
	</div>
</div>
