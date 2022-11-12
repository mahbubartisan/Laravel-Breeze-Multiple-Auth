@extends('employee.auth.layouts.app')

@section('title')
	Employee Login
@endsection

@section('content')
	<div class="auth-layout-wrap" style="background-color: #D8D8D8">
		<div class="auth-content">
			<div class="card o-hidden">
				<div class="row d-flex justify-content-center">
					<div class="col-md-6">
						<div class="p-4">
							<div class="auth-logo text-center mt-2">
								<img src="{{ asset('backend/assets/logo.png') }}" alt="logo.png" class="rounded-circle"  style="width: 7rem; height:7rem;">
								<h1></h1>
							</div>
							<h1 class="mb-4 text-25 text-center">Employee Sign In</h1>
							@if (session('error'))
								<div class="alert alert-primary" role="alert">
									<strong>{{ session('error') }}</strong>
								</div>
							@endif
							<form method="POST" action="{{ route('employee.login') }}">
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
								<button class="btn btn-rounded btn-primary btn-block mt-3">Sign In</button>
								<a href="{{ url('auth/google') }}"
									class="btn btn-rounded btn-primary btn-google btn-block btn-icon-text mt-3 mb-3">
									<i class="i-Google"></i> Sign up with Google
								</a>
							</form>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
