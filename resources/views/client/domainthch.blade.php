@extends('layouts.client')
@section('pageTitle'){{ __('messages.checkdomainth') }} @parent @endsection
@section('content')

    <div class="row">
        <div class="col-lg-6 offset-3">
            <div class="card shadow mb-6">
                <div class="card-header py-6">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('messages.checkdomainth') }}</h6>
                </div>
                <div class="card-body">
                @if (!empty($domain))
                        <form class="col-lg-12 navbar-search" action="{{route('check.thf')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="{{ __('messages.checkdomainth') }} ( demo.in.th )" name="domain" value="{{ $domain }}" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if ($returndata == 0 )
                            <div class="text-center text-danger">
                                <h3> {{ $domain }} ไม่สามารถใช้งานได้</h3>
                            </div>
                        @elseif ($returndata == 1)
                            <div class="text-center text-success">
                                <h3> {{ $domain }} สามารถใช้งานได้</h3>
                            </div>

                        @endif

                    @else
                    <!-- Topbar Search -->
                        <form class="col-lg-12 navbar-search" action="{{route('check.thf')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="{{ __('messages.checkdomainth') }} ( demo.in.th )" name="domain" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
