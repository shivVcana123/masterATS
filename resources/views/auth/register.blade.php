@extends('layouts.auth')

@section('title')
{{ __('Register') }}
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mx-4">
                    <div class="card-body ">
                        <h1 class="text-center">{{ __('Register') }}</h1>
                        {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}

                        @csrf
                        <div class="form-group">

                            {!! Form::label('name', __('Name')) !!}
                            {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control', 'required', 'autofocus']) !!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('email', __('Email Id')) !!}
                            {!! Form::text('email', null, ['placeholder' => __('Email'), 'class' => 'form-control', 'required', 'autofocus']) !!}

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('Password', __('Password')) !!}
                            {!! Form::password('password', ['placeholder' => __('Password'), 'type' => '', 'class' => 'form-control', 'required']) !!}

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('Confirm Password', __('Confirm Password')) !!}
                            {!! Form::password('password_confirmation', ['placeholder' => __('Confirm Password'), 'type' => '', 'class' => 'form-control', 'required']) !!}

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row m-auto">
                            <div class=" m-auto">
                                {{ Form::submit(__('Register'), ['class' => 'btn btn-primary px-4']) }}
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                    <div class="card-footer p-4">
                        <div class="row">
                            <div class="col ">
                                <a href="{{ route('login') }}" class="btn btn-link px-0" type="button">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
