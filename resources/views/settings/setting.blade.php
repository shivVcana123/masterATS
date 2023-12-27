@extends('layouts.admin')
@section('title', __('Settings'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Settings') }}
        </li>
    </ul>
@endsection
{{--  {{ dd('here') }}  --}}
@php
    use App\Facades\UtilityFacades;
    $settings = UtilityFacades::settings();
    $languages = UtilityFacades::languages();
    $lang = \App\Facades\UtilityFacades::getValByName('default_language');
    $timezones = config('timezones');
    $logo = asset(Storage::url('uploads/logo/'));
    $primary_color = isset($settings['color']);
    if(isset($settings['color']))
    {
        $primary_color = $settings['color'];
        if ($primary_color!="") {
            $color = $primary_color;
        } else {
            $color = 'theme-1';
        }
    }
    else{
        $color = 'theme-1';
    }

    if(isset($settings['dark_mode']))
    {
        $dark_mode = $settings['dark_mode'];
        if ($dark_mode!="") {
            $dark_mode = $dark_mode;
        } else {
            $dark_mode = "";
        }
    }
    else{
        $dark_mode = "";
    }
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
                            <a href="settings#useradd-1" class="list-group-item list-group-item-action useradd-1 active">{{ __('App Setting') }}
                                <div class="float-end"></div>
                            </a>
                            <a href="settings#useradd-2" class="list-group-item list-group-item-action useradd-2">{{ __('General') }}
                                <div class="float-end"></div>
                            </a>
                            <a href="settings#useradd-3" class="list-group-item list-group-item-action useradd-3">{{ __('Email') }}
                                <div class="float-end"></div>
                            </a>
                            {{-- <a href="#useradd-8" class="list-group-item list-group-item-action">{{ __('Payment') }}
                                <div class="float-end"></div>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    {{--  --}}
                    <div id="useradd-1" class="card">
                        {{ Form::open(['route' => ['settings.logo'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="card-header">
                            <h5> {{ __('App Settings') }}</h5>
                        </div>

                        <div class="card-body">
                            <p class="text-muted"> {{ __('App Name') }} {{ __('& App Logo') }}</p>
                            <div class="">
                                <div class=" row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('name', __('Application Name'), ['class' => 'form-label']) }}
                                            <input type="text" name="app_name" class="form-control"
                                                value="{{ config('app.name') }}">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('name', __('Dark Logo'), ['class' => 'form-label']) }}
                                            <div class="bg-light text-center">
                                                {!! form::image($logo . '/dark_logo.png', null, ['class' => 'img-responsive my-2 text-center logo_img']) !!}
                                            </div>
                                            {!! form::file('dark_logo', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('name', __('Light Logo'), ['class' => 'form-label']) }}
                                            <div class="bg-dark text-center">
                                                {!! form::image($logo . '/light_logo.png', null, ['class' => 'logo_img img-responsive my-2 text-center']) !!}
                                            </div>
                                            {!! form::file('light_logo', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('name', __('Favicon'), ['class' => 'form-label']) }}
                                            <div class="bg-light text-center">
                                                {!! form::image($logo . '/favicon.png', null, ['class' => 'logo_img img-responsive my-2 text-center']) !!}
                                            </div>
                                            {!! form::file('favicon', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                                            {{--  <input type="file" class="form-control" name="favicon">  --}}

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke mb-5">
                            <span class="float-end">
                                <button class="btn btn-primary" type="submit"
                                    id="save-btn">{{ __('Save Changes') }}</button>
                                <a href="{{ route('settings.index') }}"
                                    class="btn btn-secondary me-1">{{ __('Cancel') }}</a>
                            </span>
                        </div>
                        </form>
                    </div>
                    {{--  --}}
                    <div id="useradd-2" class="card">
                        {{ Form::open(['route' => 'settings.datetime', 'method' => 'post']) }}

                        <div class="card-header">
                            <h5> {{ __('General Setting') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <strong
                                        class="d-block">{{ __('Two Factor Authentication') }}</strong>
                                    {{ @$settings['authentication'] != 'deactivate' ? __('Activate') : __('Deactivate') }}
                                    {{ __('Two factor authentication for application.') }}
                                </div>
                                <div class="col-md-4">
                                    <label class="form-switch mt-2 float-end custom-switch-v1">
                                        <input type="checkbox" name="authentication"
                                            class="form-check-input input-primary"
                                            {{ @$settings['authentication'] != 'deactivate' ? 'checked' : 'unchecked' }}>
                                    </label>
                                </div>
                                @if (!extension_loaded('imagick'))
                                    <small>
                                        {{ __('Note: for 2FA your server must have Imagick.') }}
                                        <a href="https://www.php.net/manual/en/book.imagick.php"
                                            target="_new">{{ __('Imagick Document') }}</a>
                                    </small>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <strong class="d-block">{{ __('RTL Setting') }}</strong>
                                        {{ env('SITE_RTL') == 'on' ? __('Deactivate') : __('Activate') }}
                                        {{ __('RTL setting for application.') }}
                                    </div>
                                    <div class="col-md-4">

                                        <label class="form-switch mt-2 float-end custom-switch-v1">
                                            <input type="checkbox" data-onstyle="primary"
                                                class="form-check-input input-primary" name="SITE_RTL"
                                                id="site_rtl"
                                                {{ env('SITE_RTL') == 'on' ? 'checked="checked"' : '' }}>

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <strong class="d-block">{{ __('Dark Layout') }}</strong>
                                        {{ @$settings['dark_mode'] == 'on' ? __('Deactivate') : __('Activate') }}
                                        {{ __('Dark Layout for application.') }}
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-switch mt-2 float-end custom-switch-v1">
                                            <input type="checkbox" data-onstyle="primary"
                                                class="form-check-input input-primary" name="dark_mode"
                                                id="cust-darklayout"
                                                @if ( @$settings['dark_mode']  == 'on') checked @endif />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">

                                    <div class="col-md-8">

                                        <strong class="d-block">{{ __('Primary color settings') }}</strong>
                                        {{--  {{ Utility::getsettings('rtl') == '0' ? __('Activate') : __('Deactivate') }}  --}}
                                    </div>
                                    <div class="col-md-4">

                                        <div class="theme-color themes-color float-end">
                                            <a href="settings#!"
                                                class="{{ $color == 'theme-1' ? 'active_color' : '' }}"
                                                data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                            <input type="radio" class="theme_color " name="color"
                                                value="theme-1" style="display: none;">
                                            <a href="settings#!"
                                                class="{{ $color == 'theme-2' ? 'active_color' : '' }}"
                                                data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                            <input type="radio" class="theme_color" name="color"
                                                value="theme-2" style="display: none;">
                                            <a href="settings#!"
                                                class="{{ $color == 'theme-3' ? 'active_color' : '' }}"
                                                data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                            <input type="radio" class="theme_color" name="color"
                                                value="theme-3" style="display: none;">
                                            <a href="settings#!"
                                                class="{{ $color == 'theme-4' ? 'active_color' : '' }}"
                                                data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                            <input type="radio" class="theme_color" name="color"
                                                value="theme-4" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('timezone', __('Timezone'), ['class' => 'form-label text-dark']) }}
                                <select type="text" name="timezone" class="form-control" data-trigger id="choices-single-default">
                                    <option value="">{{ __('Select Timezone') }}</option>
                                    @foreach ($timezones as $k => $timezone)
                                        <option value="{{ $k }}"
                                            {{ env('TIMEZONE') == $k ? 'selected' : '' }}>
                                            {{ $timezone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                {{ Form::label('default_language', __('Date Format'), ['class' => 'form-label text-dark']) }}
                                <select type="text" name="site_date_format" data-trigger class="form-control"
                                    id="choices-single-default">
                                    <option value="M j, Y" @if (@$settings['site_date_format'] == 'M j, Y') selected="selected" @endif>Jan
                                        1,2015</option>
                                    <option value="d-m-Y" @if (@$settings['site_date_format'] == 'd-m-Y') selected="selected" @endif>d-m-y
                                    </option>
                                    <option value="m-d-Y" @if (@$settings['site_date_format'] == 'm-d-Y') selected="selected" @endif>m-d-y
                                    </option>
                                    <option value="Y-m-d" @if (@$settings['site_date_format'] == 'Y-m-d') selected="selected" @endif>y-m-d
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                {{ Form::label('default_language', __('Default Language'), ['class' => 'form-label']) }}
                                <div class="changeLanguage">
                                    <select name="default_language" id="choices-single-default" data-trigger class="form-control">
                                        @foreach ($languages as $language)
                                            <option @if ($lang == $language) selected @endif value="{{ $language }}">{{ Str::upper($language) }}</option>
                                            {{--  <option value="{{ $language }}">{{ Str::upper($language) }}</option>  --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer bg-whitesmoke mb-5">
                            <span class="float-end">
                                <button class="btn btn-primary" type="submit"
                                    id="save-btn">{{ __('Save Changes') }}</button>
                                <a href="{{ route('settings.index') }}"
                                    class="btn btn-secondary me-1">{{ __('Cancel') }}</a>
                            </span>
                        </div>
                        </form>
                    </div>
                    {{--  --}}

                    <div id="useradd-3" class="card">
                        <div class="card-header">
                            <h5> {{ __('Email Settings') }}</h5>
                        </div>
                        {{ Form::open(['route' => 'settings.emails', 'method' => 'post']) }}
                        <div class="card-body">
                            <div class=" row mt-3 container-fluid">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_driver', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_host', __('Mail Host'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_host', null, ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_port', __('Mail Port'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_port', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_username', __('Mail Username'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_username', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_password', __('Mail Password'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_password', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_encryption', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_from_address', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')]) }}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label']) }}
                                        {{ Form::text('mail_from_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')]) }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="float-end">
                                <button class="btn btn-primary float-end mb-3" type="submit"
                                    id="save-btn">{{ __('Save Changes') }}</button>

                                <a class="btn btn-info d-inline send_mail float-end m-auto me-1 fs-6" href="javascript:void(0);"
                                    id="test-mail" data-action="test-mail">
                                    {{ __('Send Test Mail') }}</a>
                                <a href="{{ route('settings.index') }}"
                                    class="btn btn-secondary float-end me-1">{{ __('Cancel') }}</a>
                            </span>
                        </div>
                        </form>
                    </div>
                    {{--  --}}


                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>

        <!-- [ Main Content ] end -->
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>
@endsection


@push('scripts')
    <script>

        function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }

        $(document).on('click', "input[name$='settingtype']", function() {
            var test = $(this).val();

            if (test == 's3') {
                $("#s3").fadeIn(500);
                $("#s3").removeClass('d-none');
            } else {
                $("#s3").fadeOut(500);
            }
        });




        $('body').on('click', '.send_mail', function() {
            var action = $(this).data('action');
            var modal = $('#common_modal');
            $.get(action, function(response) {
                modal.find('.modal-title').html('{{ __('Test Mail') }}');
                modal.find('.body').html(response);
                modal.modal('show');
            })
        });


        document.addEventListener('DOMContentLoaded', function() {
            var genericExamples = document.querySelectorAll('[data-trigger]');
            for (i = 0; i < genericExamples.length; ++i) {
                var element = genericExamples[i];
                new Choices(element, {
                    placeholderValue: 'This is a placeholder set in the config',
                    searchPlaceholderValue: 'Select Option',
                });
            }
        });


        $(document).on("click",".useradd-1", function(){
            $(".useradd-1").addClass("active");
            $(".useradd-2").removeClass("active");
            $(".useradd-3").removeClass("active");
        });

        $(document).on("click",".useradd-2", function(){
            $(".useradd-1").removeClass("active");
            $(".useradd-2").addClass("active");
            $(".useradd-3").removeClass("active");
        });

        $(document).on("click",".useradd-3", function(){
            $(".useradd-1").removeClass("active");
            $(".useradd-2").removeClass("active");
            $(".useradd-3").addClass("active");
        });

    </script>
@endpush
