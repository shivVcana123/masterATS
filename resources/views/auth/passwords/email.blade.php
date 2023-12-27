@extends('layouts.auth')

@section('title')
    {{ __('Forgot Password') }}
@endsection
@php
$logo = asset(Storage::url('uploads/logo/'));
@endphp
@section('content')
    <div class="card mt-5">
        <div class="card-body mx-auto">
            <div class="">
                <h4 class="text-primary mb-3">{{ __('Reset Password') }}</h4>
            </div>

            <div class="text-start">
                <form method="POST" class="needs-validation" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">{{ __('E-mail address') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email"
                            placeholder="{{ __('E-mail address') }}" onfocus />
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback d-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('Forgot Password') }}</button>
                        <a href="{{ url('login') }}" class="btn btn-secondary text-white">{{ __('Back') }}</a>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <!-- [ auth-signup ] end -->

    </div>
    </div>

@endsection
