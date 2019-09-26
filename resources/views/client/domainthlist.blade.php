@extends('layouts.client')
@section('pageTitle'){{ __('messages.domainlist') }} @parent @endsection
@section('domain') active @parent @endsection
@section('domainall') active @parent @endsection
@section('domainshow') show @parent @endsection
@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow mb-8">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('messages.domainlist') }}</h6>
                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>{{ __('messages.domain') }}</th>
                                <th>{{ __('messages.registrar') }}</th>
                                <th>{{ __('messages.regisdate') }}</th>
                                <th>{{ __('messages.expdate') }}</th>
                                <th>{{ __('messages.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($domain as $data)
                            <tr>
                                <td>{{ $data->domain }}</td>
                                <td>{{ $data->provider }}</td>
                                <td>{{ $data->regis_date }}</td>
                                <td>{{ $data->expire_date }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('messages.action') }}
                                        </button>
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                            @if($data->provider == "T.H.NIC")
                                            <a class="dropdown-item" href="{{ url('/client/update_DNS_') }}{{ $data->domain }}">{{ __('messages.chanenameserver') }}</a>
                                          <!--  <a class="dropdown-item" href="{{ url('client/Add_DNS_Record_') }}{{ $data->domain }}">{{ __('messages.dnsrecord') }}</a> -->
                                            <a class="dropdown-item" href="{{ url('/client/DomainContact_') }}{{ $data->domain }}">{{ __('messages.domaincontact') }}</a>
                                            @else
                                                <a class="dropdown-item" href="{{ url('/client/update_DNS_') }}{{ $data->domain }}">{{ __('messages.chanenameserver') }}</a>
                                              <a class="dropdown-item" href="{{ url('client/Add_DNS_Record_') }}{{ $data->domain }}">{{ __('messages.dnsrecord') }}</a>
                                                <a class="dropdown-item" href="{{ url('/client/DomainContact_') }}{{ $data->domain }}">{{ __('messages.domaincontact') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
