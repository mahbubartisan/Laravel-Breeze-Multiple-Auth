@extends('admin.seller.seller_master')

@section('content')


<div class="auth-layout-wrap" style="background-image: url({{ asset('frontend/assets/images/photo-wide-4.jpg') }})">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url(assets/images/photo-long-3.jpg)">
                    <div class="pl-3 auth-right">
                        <div class="auth-logo text-center mt-4">
                            <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
                        </div>
                        <div class="flex-grow-1"></div>
                        <div class="w-100 mb-4">
                            <a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="{{route('login_form') }}">
                                <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                            </a>
                            <a class="btn btn-outline-primary btn-outline-google btn-block btn-icon-text btn-rounded">
                                <i class="i-Google-Plus"></i> Sign in with Google
                            </a>
                            <a class="btn btn-outline-primary btn-outline-facebook btn-block btn-icon-text btn-rounded">
                                <i class="i-Facebook-2"></i> Sign in with Facebook
                            </a>
                        </div>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4">

                        <h1 class="mb-3 text-18">Sign Up</h1>
                        <form action="{{ route('seller.register')}}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" name="name" class="form-control form-control-rounded" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control form-control-rounded" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control form-control-rounded" >
                            </div>
                            <div class="form-group">
                                <label for="repassword">Retype password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-rounded" >
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection