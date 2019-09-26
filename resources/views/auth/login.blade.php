@extends('layouts.login')
@section('pageTitle'){{ __('messages.login') }} @parent @endsection
@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('messages.login') }}</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <div class="form-group">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                                </div>>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('messages.email') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('messages.password') }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">{{ __('messages.rememberme') }}</label>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="{{ __('messages.login') }}">

                                    <hr>
                                    <a href="/auth/redirect/google" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> {{ __('messages.googlelogin') }}
                                    </a>
                                    <a href="/auth/redirect/facebook" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> {{ __('messages.facebooklogin') }}
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">{{ __('messages.forgotpwd') }}</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ url('locale/en') }}" ><img src="{{ asset('img/flag/us.png') }} "> English</a>
                                    <a class="small" href="{{ url('locale/th') }}" ><img src="{{ asset('img/flag/th.png') }} "> ไทย</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
