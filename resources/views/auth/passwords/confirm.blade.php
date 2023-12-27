@extends('layouts.auth')

@section('title')
{{ __('Confirm Password') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">

                        {{ Form::open(['route' => 'password.confirm', 'method' => 'post']) }}

                        {{ __('Please confirm your password before continuing.') }}

                        <div class="form-group row">
                            <div class="form-group">
                                {{ Form::label('password', __('Password'), ['class' => 'form-control-label']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                                @error('password')
                                    <span class="invalid-password text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
