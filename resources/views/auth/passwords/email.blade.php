@extends('layouts.login')
@section('pageTitle'){{ __('messages.forgotpwd') }} @parent @endsection
@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">{{ __('messages.forgotpwd') }}</h1>
                                </div>
                                <form class="user"  method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                    @csrf
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </div>>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="email" placeholder="{{ __('messages.email') }}" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required">
                                    </div>
                                    <input type="submit"  class="btn btn-primary btn-user btn-block" value="{{ __('messages.resetpass') }}">

                                </form>
                                <hr>
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
