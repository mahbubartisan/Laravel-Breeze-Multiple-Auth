@php
	$prefix = Request::route()->getPrefix();
	$route = Route::current()->getName();
@endphp

<div class="side-content-wrap">
	<div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
		<ul class="navigation-left">
			<li class="nav-item {{ $route == 'dashboard' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ url('/admin/dashboard') }}">
					<i class="nav-icon i-Bar-Chart"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/employee-contacts' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.employee.contact') }}">
					<i class="nav-icon i-Address-Book"></i>
					<span class="nav-text">Employee Contacts</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/employee-details' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.employee.detail') }}">
					<i class="nav-icon i-Professor"></i>
					<span class="nav-text">Employee Details</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/employees' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('employee.filter') }}">
					<i class="nav-icon i-Find-User"></i>
					<span class="nav-text">Employee Filters</span>
				</a>
			</li>

		</ul>
	</div>

	<div class="sidebar-overlay"></div>
</div>
