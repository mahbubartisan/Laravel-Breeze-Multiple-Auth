@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp


<div class="side-content-wrap">
	<div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
		<ul class="navigation-left">
			<li class="nav-item {{ $route == 'employee.dashboard' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ url('/employee/dashboard') }}">
					<i class="nav-icon i-Bar-Chart"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			{{-- <li class="nav-item" data-item="forms"><a class="nav-item-hold" href="#"><i
						class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Forms</span></a>
				<div class="triangle"></div>
			</li> --}}
		</ul>
	</div>
	
	<div class="sidebar-overlay"></div>
</div>
