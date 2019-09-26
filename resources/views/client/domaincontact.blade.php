@extends('layouts.client')
@section('pageTitle'){{ __('messages.contactdetail') }} {{ $domain }} @parent @endsection
@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
                    <h6 class="font-weight-bold text-primary">{{ __('messages.contactdetail') }} {{ $domain }}</h6>
                    <form  action="{{ route('update.contact') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                                <label class="col-form-label">{{ __('messages.name') }}</label>
                                <input type="hidden" class="form-control" name="domain"  value="{{ $domain }}">
                                <input type="text" class="form-control" name="contact_person"  value="{{ $getcontact['Registrant']['contact_person']  }}">
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">{{ __('messages.address') }}</label>
                                <textarea class="form-control" name="company_street_addr"  >{{$getcontact['Registrant']['company_street_addr']}}</textarea>
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">{{ __('messages.postcode') }}</label>
                                <input type="text" class="form-control" name="company_zip_code"  value="{{ $getcontact['Registrant']['company_zip_code']  }}">
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">{{ __('messages.phone') }}</label>
                                <input type="text" class="form-control" name="company_phone"  value="{{ $getcontact['Registrant']['company_phone']  }}">
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">{{ __('messages.fax') }}</label>
                                <input type="text" class="form-control" name="company_fax"  value="{{ $getcontact['Registrant']['company_fax']  }}">
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">{{ __('messages.country') }}</label>
                                <select class="form-control" name="company_country_code">
                                    @foreach($country as $data)
                                        <option value="{{ $data->iso }}" {{  $data->iso == $getcontact['Registrant']['company_country_code'] ? "selected" : ""  }}> {{ $data->nicename }}</option>
                                    @endforeach
                                </select>
                        </div>
                            <div class="form-group">
                                    <label class="col-form-label">{{ __('messages.email') }}</label>
                                    <input type="text" class="form-control" name="contact_email"  value="{{ $getcontact['Registrant']['contact_email']  }}">
                            </div>
                        <div class="input-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block my-3" value="{{ __('messages.save') }}">
                        </div>
                    </form>
                </div>
    </div>
@endsection
