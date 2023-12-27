@extends('layouts.auth')

@section('title')
    {{ __('Login') }}
@endsection

@section('content')

                    <div class="card mt-5">
                        <div class="card-body mx-auto">
                            <div class="">
                                <h4 class="text-primary mb-3">Login</h4>
                            </div>

                            <div class="text-start">
                                <form method="POST" class="needs-validation" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label">{{ __('E-mail address') }}</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                            id="email" placeholder="{{ __('E-mail address') }}" onfocus />
                                    </div>


                                    <div class="form-group mb-3">
                                        <label class="form-label float-start">{{ __('Password') }}</label>
                                        <div class="float-end">
                                            <a href="{{ route('password.request') }}" class="text-small">
                                                {{ __('Forgot Password ?') }}
                                            </a>
                                        </div>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="{{ __('Password') }}" />
                                    </div>


                                    <div class="form-group mb-4">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="remember" class="form-check-input"
                                                value="{{ old('remember') }}" id="customswitch1" />
                                            <label class="form-check-label"
                                                for="customswitch1">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-gradient-primary btn-block mt-2">
                                            {{ __('Sign In') }} </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- [ auth-signup ] end -->
                </div>
            </div>

@endsection
