@extends('admin.auth.layouts.app')

@section('title')
	Admin Login
@endsection
@section('content')
	<div class="auth-layout-wrap" style="background-color: #D8D8D8">
		<div class="auth-content">
			<div class="card o-hidden">
				<div class="row d-flex justify-content-center">
					<div class="col-md-6">
						<div class="p-4">
							<div class="auth-logo text-center ">
								<img src="{{ asset('backend/assets/logo.png') }}" alt="logo.png" class="rounded-circle" style="width: 7rem; height:7rem;">
							</div>
							<h1 class="mb-4 text-25 text-center">Admin Sign In</h1>
							@if (session('error'))
								<div class="alert alert-primary" role="alert">
									<strong>{{ session('error') }}</strong>
								</div>
							@endif
							<form method="POST" action="{{ route('admin.login') }}">
								@csrf
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" id="email" name="email"
										class="form-control form-control-rounded @error('email') border-danger @enderror">
									@error('email')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" id="password" name="password"
										class="form-control form-control-rounded @error('password') border-danger @enderror">

									@error('password')
										<span class="text-danger">{{ $message }}</span>
									@enderror

								</div>
								<button class="btn btn-rounded btn-primary btn-block mt-3 mb-3">Sign In</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
