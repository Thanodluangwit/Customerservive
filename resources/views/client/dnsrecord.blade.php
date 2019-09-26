@extends('layouts.client')
@section('pageTitle'){{ __('messages.dnsrecord') }}{{ $domain }} @parent @endsection
@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
                    <h6 class=" font-weight-bold text-primary">{{ __('messages.dnsrecord') }} {{ $domain }}</h6>
                    <form  action="#" method="post">
                        {!! csrf_field() !!}

                            @foreach($getdns as $data)
                            <div class="form-row">
                                <div class="col-auto">
                                    <div class="input-group ">
                                        <input type="hidden" name="dnsrecid[]" value="{{ $data['recid'] }}" />
                                        <input type="text" class="form-control" name="dnsrecordhost[]"  placeholder="{{ __('messages.hostname') }}" value="{{ $data['hostname'] }}">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{ $domain }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select name="dnsrecordtype[]" class="form-control">
                                        <option value="A">A (Address)</option>
                                        <option value="AAAA">AAAA (Address)</option>
                                        <option value="MX">MX (Mail)</option>
                                        <option value="CNAME">CNAME (Alias)</option>
                                        <option value="TXT">SPF (txt)</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="dnsrecordaddress[]" placeholder="{{ __('messages.ipaddress') }}" value="{{ $data['address'] }}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="dnsrecordpriority[]" placeholder="{{ __('messages.priority') }}">
                                    <label class="col-form-label-sm text-danger">สำหรับ MX</label>
                                </div>
                            </div>
                            @endforeach
                        <!--  -->
                        <div class="form-row">
                            <div class="col-auto">
                                <div class="input-group ">
                                    <input type="hidden" name="dnsrecid[]" value="" />
                                    <input type="text" class="form-control" name="dnsrecordhost[]"  placeholder="{{ __('messages.hostname') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{ $domain }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select name="dnsrecordtype[]" class="form-control">
                                    <option value="A">A (Address)</option>
                                    <option value="AAAA">AAAA (Address)</option>
                                    <option value="MX">MX (Mail)</option>
                                    <option value="CNAME">CNAME (Alias)</option>
                                    <option value="TXT">SPF (txt)</option>

                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="dnsrecordaddress[]" placeholder="{{ __('messages.ipaddress') }}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="dnsrecordpriority[]" placeholder="{{ __('messages.priority') }}">
                                <label class="col-form-label-sm text-danger">สำหรับ MX</label>
                            </div>
                        </div>
                        <!--  -->
                        <div class="input-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block my-3" value="{{ __('messages.save') }}">
                        </div>
                    </form>
            </div>
    </div>
@endsection
