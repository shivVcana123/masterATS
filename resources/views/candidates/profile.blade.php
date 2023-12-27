@extends('layouts.admin')
@section('title', __('Profile'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Profile') }}
        </li>
    </ul>
@endsection

@php
use App\Facades\UtilityFacades;
$profile = asset(Storage::url('uploads/avatar/'));
$setting = UtilityFacades::settings();
@endphp


@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="profile#useradd-1"
                                class="list-group-item list-group-item-action useradd-1 active">{{ __('Profile') }}
                                <div class="float-end"></div>
                            </a>
                            <a href="profile#useradd-2"
                                class="list-group-item list-group-item-action useradd-2">{{ __('Basic Info') }}
                                <div class="float-end"></div>
                            </a>
                            @if ($setting['authentication'] == 'activate')
                                <a href="profile#useradd-3"
                                    class="list-group-item list-group-item-action useradd-3">{{ __('2FA') }}
                                    <div class="float-end"></div>
                                </a>
                            @endif
                            {{-- <a href="#useradd-3" class="list-group-item list-group-item-action">{{ __('Login Details') }}
                                <div class="float-end"></div>
                            </a> --}}
                            {{-- <a href="#useradd-7" class="list-group-item list-group-item-action">{{ __('Delete Account') }}
                                <div class="float-end"></div>
                            </a> --}}
                        </div>
                    </div>
                </div>


                <div class="col-xl-9">
                    <div id="useradd-1" class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3">
                                    {{-- <img src="{{ $userDetail->avatar ? Storage::url($userDetail->avatar) : asset('uploads/avatar/avatar.png') }}" --}}
                                    <img src="{{ !empty($userDetail->avatar) ? $profile . '/' . $userDetail->avatar : $profile . '/avatar.jpg' }}"
                                        alt="kal" class="img-user wid-80 rounded-circle">
                                </div>
                                <div class="d-block d-sm-flex align-items-center justify-content-between w-100">
                                    <div class="mb-3 mb-sm-0">
                                        <h4 class="mb-1 text-white">{{ $userDetail->name }}</h4>
                                        <p class="mb-0 text-sm">{{ $userDetail->type }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="useradd-2" class="card">
                        <div class="card-header">
                            <h5>Basic info</h5>
                            <small class="text-muted">{{ __('Mandatory informations') }}</small>
                        </div>
                        {{ Form::model($userDetail, ['route' => ['update.profile'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="card-body">
                            <div class=" row mt-3 container-fluid">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Role') }}</label>
                                        <input type="text" name="role" value="{{ $userDetail->type }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="choose-file">
                                            <div for="avatar">
                                                <label class="form-label">{{ __('Choose file here') }}</label>
                                                <input type="file" class="form-control" name="profile"
                                                    data-filename="profiles">
                                            </div>
                                            <p class="profiles"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Full Name') }}</label>
                                        <input type="text" name="name" value="{{ $userDetail->name }}"
                                            class="form-control" placeholder={{ __('Name') }}>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="text" name="email" value="{{ $userDetail->email }}"
                                            class="form-control" placeholder={{ __('Email') }}>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Password') }}</label>
                                        <input type="password" name="password" value=""
                                            placeholder="{{ __('Leave blank if you dont want to change') }}"
                                            class="form-control" autocomplete="off">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Confirm Password') }}</label>
                                        <input type="password" name="password_confirmation" value=""
                                            placeholder="{{ __('Leave blank if you dont want to change') }}"
                                            class="form-control" autocomplete="off">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary mb-3">{{ __('Update Account') }}</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    {{--  --}}
                    @if (isset($setting['authentication']) && $setting['authentication'] == 'activate')

                    <div id="useradd-3" class="card">
                        <div class="card-header">
                            <h5>{{ __('Two Factor Authentication') }}</h5>
                            <small class="text-muted">Activate Two Factor Authentication.</small>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between mt-3">
                                <div class="col-sm-auto d-flex">
                                    @if (isset($setting['authentication']) && $setting['authentication'] == 'activate')
                                        @include('auth.2fa_settings')
                                    @endif
                                    {{-- @if ($user->active_status == 1)
                                        <a href="profile-status" class="btn btn-outline-secondary  d-flex me-3 ">
                                            Deactivate
                                        </a>
                                    @endif
                                    <a href="#" class="btn btn-danger delete-action d-flex"
                                        data-form-id="delete-form-{{ $user->id }}">
                                        {{ __('Delete Account') }}<i class="ti ti-chevron-right ms-1 ms-sm-2"></i></a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'id' => 'delete-form-' . $user->id]) !!}
                                    {!! Form::close() !!} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{--  --}}
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
        {{--  --}}

        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>
@endsection
@push('scripts')
    {{-- <script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/croppie/js/croppie.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>

    <script src="{{ asset('vendor/js/custom.js') }}"></script> --}}


    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

    <script>
        $(document).on("click", ".useradd-1", function() {
            $(".useradd-1").addClass("active");
            $(".useradd-2").removeClass("active");
            $(".useradd-3").removeClass("active");
        });

        $(document).on("click", ".useradd-2", function() {
            $(".useradd-1").removeClass("active");
            $(".useradd-2").addClass("active");
            $(".useradd-3").removeClass("active");
        });

        $(document).on("click", ".useradd-3", function() {
            $(".useradd-1").removeClass("active");
            $(".useradd-2").removeClass("active");
            $(".useradd-3").addClass("active");
        });
    </script>
@endpush
