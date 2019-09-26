@extends('layouts.login')
@section('pageTitle'){{ __('messages.register') }} @parent @endsection
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('messages.register') }}</h1>
                        </div>
                        <form class="user" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>>
                                @endif
                                @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                         <strong>{{ $errors->first('email') }}</strong>
                                            </div>>
                                @endif
                                @if ($errors->has('password'))
                                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </div>>
                                @endif

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('messages.name') }}" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="email"  placeholder="{{ __('messages.email') }}" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('messages.password') }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('messages.password_conf') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="phone"  placeholder="{{ __('messages.phone') }}" value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="company"  placeholder="{{ __('messages.company') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="address" placeholder="{{ __('messages.address') }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="tambon" placeholder="{{ __('messages.tambon') }}" required>
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="ampher" placeholder="{{ __('messages.ampher') }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="province" placeholder="{{ __('messages.province') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="postcode"  placeholder="{{ __('messages.postcode') }}" >
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="{{ __('messages.register') }}">
                            <hr>
                            <a href="/auth/redirect/google" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> {{ __('messages.googleregis') }}
                            </a>
                            <a href="/auth/redirect/facebook" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> {{ __('messages.facebookregis') }}
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">{{ __('messages.forgotpwd') }}</a>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">ข้อตกลงการใช้งาน</h4>
                </div>
                <div class="modal-body">
                    This is test
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยอมรับข้อตหลง</button>
                </div>
            </div>
        </div>
    </div>

@endsection
