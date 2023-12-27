@extends('layouts.auth')

@section('title')
{{ __('Reset Password') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    {{Form::open(array('route'=>'password.update','method'=>'post','id'=>'loginForm'))}}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        {{Form::label('email',__('E-Mail Address'),['class'=>' col-form-label'])}}
                        {{Form::text('email',null,array('class'=>'form-control'))}}
                        @error('email')
                        <span class="invalid-email text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('password',__('Password'),['class'=>'form-control-label'])}}
                        {{Form::password('password',array('class'=>'form-control'))}}
                        @error('password')
                        <span class="invalid-password text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('password_confirmation',__('Password Confirmation'),['class'=>'form-control-label'])}}
                        {{Form::password('password_confirmation',array('class'=>'form-control'))}}
                        @error('password_confirmation')
                        <span class="invalid-password_confirmation text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{Form::submit(__('Reset Password'),array('class'=>'btn btn-primary','id'=>'resetBtn'))}}
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
