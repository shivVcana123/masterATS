@extends('layouts.auth')
@section('title')
{{ __('Two Factor Authentication') }}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-header">{{ __('Two Factor Authentication') }}</div>
                    <div class="card-body">
                        <p>{{ __('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.') }}
                        </p>
                        {{ __('Enter the pin from Google Authenticator app:') }}<br /><br />
                        {{ Form::open(['route' => '2faVerify', 'method' => 'post']) }}

                            {{ csrf_field() }}
                            <div class="form-group">

                                {{ Form::label('one_time_password', __('One Time Password'), ['class' => 'control-label']) }}
                                {{ Form::text('one_time_password', null,['class' => 'form-control','required']) }}
                            </div>
                            {{ Form::submit(__('Authenticate'), ['class' => 'btn btn-primary ']) }}

                            {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
