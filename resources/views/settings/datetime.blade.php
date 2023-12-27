@php
$lang = \App\Facades\UtilityFacades::getValByName('default_language');
@endphp
@extends('layouts.admin')
@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ __('Home') }}</a><a class="breadcrumb-item"
        href="{{ route('settings.index') }}">{{ __('Settings') }}</a><span
        class="breadcrumb-item active">{{ __('General Setting') }}</span>
@endsection

@section('title')
    {{ __('General Settings') }}
@endsection
@section('content')

    {{ Form::open(['route' => 'settings.datetime', 'method' => 'post']) }}
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header"><strong>{{ __('General Setting') }}</strong> </div>
            <div class="card-body">
                <div class="form-group ">
                    {{ Form::label('two_factor_authentication', __('Two Factor Authentication'), ['class' => 'form-control-label text-dark']) }}
                    <select type="text" name="authentication" class="form-control select2" id="authentication">
                        <option value="activate" @if (@$settings['authentication'] == 'activate') selected="selected" @endif>{{ __('Activate') }}</option>
                        <option value="deactivate" @if (@$settings['authentication'] == 'deactivate') selected="selected" @endif>{{ __('Deactivate') }}</option>
                    </select>
                    @if (!extension_loaded('imagick'))
                        <small>
                            {{ __('Note: for 2FA your server must have Imagick.') }} <a
                                href="https://www.php.net/manual/en/book.imagick.php"
                                target="_new">{{ __('Imagick Document') }}</a>
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('timezone', __('Timezone'), ['class' => 'form-control-label text-dark']) }}
                    <select type="text" name="timezone" class="form-control select2" id="timezone">
                        <option value="">{{ __('Select Timezone') }}</option>
                        @foreach ($timezones as $k => $timezone)
                            <option value="{{ $k }}" {{ env('TIMEZONE') == $k ? 'selected' : '' }}>
                                {{ $timezone }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    {{ Form::label('default_language', __('Date Format'), ['class' => 'form-control-label text-dark']) }}
                    <select type="text" name="site_date_format" class="form-control select2" id="site_date_format">
                        <option value="M j, Y" @if (@$settings['site_date_format'] == 'M j, Y') selected="selected" @endif>Jan 1,2015</option>
                        <option value="d-m-Y" @if (@$settings['site_date_format'] == 'd-m-Y') selected="selected" @endif>d-m-y</option>
                        <option value="m-d-Y" @if (@$settings['site_date_format'] == 'm-d-Y') selected="selected" @endif>m-d-y</option>
                        <option value="Y-m-d" @if (@$settings['site_date_format'] == 'Y-m-d') selected="selected" @endif>y-m-d</option>
                    </select>
                </div>
                <div class="form-group">
                    {{ Form::label('default_language', __('Default Language'), ['class' => 'form-control-label']) }}
                    <div class="changeLanguage">
                        <select name="default_language" id="default_language" class="form-control select2">
                            @foreach (\App\Facades\UtilityFacades::languages() as $language)
                                <option @if ($lang == $language) selected @endif value="{{ $language }}">{{ Str::upper($language) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('SITE_RTL', __('RTL'), ['class' => 'form-control-label']) }}
                    <div class="">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="SITE_RTL" id="SITE_RTL"
                                {{ env('SITE_RTL') == 'on' ? 'checked="checked"' : '' }}>
                            <label class="custom-control-label form-control-label" for="SITE_RTL"></label>
                        </div>
                    </div>
                </div>
                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary ']) }}

                <a class="btn btn-secondary" href="{{ route('settings.index') }}"> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
