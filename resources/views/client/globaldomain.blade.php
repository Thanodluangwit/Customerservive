@extends('layouts.client')
@section('pageTitle'){{ __('messages.domainglobal') }} @parent @endsection
@section('content')

    <div class="row">
        <div class="col-lg-6 offset-3">
            <div class="card shadow mb-6">
                <div class="card-header py-6">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('messages.domainglobal') }}</h6>
                </div>
                <div class="card-body">
                    @if (!empty($domain))
                        <form class="col-lg-12 navbar-search" action="{{route('check.globalf')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="{{ __('messages.domainglobal') }} ( demo )" name="domain" value="{{ $domain }}" required>
                                <select name="tlds" class="form-control bg-light border-0 small">
                                    <option value="com">.COM</option>
                                    <option value="info">.INFO</option>
                                    <option value="net">.NET</option>
                                    <option value="me">.ME</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if ($apidata_json[$fulldomain]["status"] == "regthroughothers" )
                            <div class="text-center text-danger">
                                <h3> {{ $fulldomain }} ไม่สามารถใช้งานได้</h3>
                            </div>
                        @elseif ($apidata_json[$fulldomain]["status"] == "available")
                            <div class="text-center text-success">
                                <h3> {{ $fulldomain }} สามารถใช้งานได้</h3>
                            </div>
                            <div class="input-group offset-md-5">
                                <div class="input-group ">
                                    <a class="btn btn-primary " href="#"> {{ __('messages.ordernow') }}</a>
                                </div>
                            </div>

                        @endif

                    @else
                    <!-- Topbar Search -->
                        <form class="col-lg-12 navbar-search" action="{{route('check.globalf')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="{{ __('messages.domainglobal') }} ( demo )" name="domain" required>
                                <select name="tlds" class="form-control bg-light border-0 small">
                                    <option value="com">.COM</option>
                                    <option value="info">.INFO</option>
                                    <option value="net">.NET</option>
                                    <option value="me">.ME</option>
                                </select>
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
