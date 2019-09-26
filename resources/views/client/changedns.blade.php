@extends('layouts.client')
@section('pageTitle'){{ __('messages.chanenameserver') }} {{$domain_name}} @parent @endsection
@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">

                    <h6 class="m-0 font-weight-bold text-primary">{{ __('messages.chanenameserver') }} {{$domain_name}}</h6>
                    <form  action="{{route('update.dns')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <input type="hidden" class="form-control bg-light border-0 small" name="domain" value="{{$domain_name}}"  required>
                        </div>
                        <div class="input-group">
                            <label class="col-form-label small"> NS1 : </label>
                            <input type="text" class="form-control bg-light border-0 small" placeholder="ns1 " name="ns_1" value="{{ $ns1 }}"  required>
                        </div>
                        <div class="input-group">
                            <label class="col-form-label small"> NS2 : </label>
                            <input type="text" class="form-control bg-light border-0 small" placeholder="ns2 " name="ns_2" value="{{ $ns2 }}" required>
                        </div>
                        <div class="input-group">
                            <label class="col-form-label small"> NS3 : </label>
                            <input type="text" class="form-control bg-light border-0 small" placeholder="ns3 " name="ns_3" value="{{ $ns3 }}">
                        </div>
                        <div class="input-group">
                            <label class="col-form-label small"> NS4 : </label>
                            <input type="text" class="form-control bg-light border-0 small" placeholder="ns4 " name="ns_4" value="{{ $ns4 }}"  >
                        </div>
                        <div class="input-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block my-3" value="{{ __('messages.save') }}">

                        </div>
                    </form>

            </div>
        </div>

@endsection
