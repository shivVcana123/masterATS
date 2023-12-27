@extends('layouts.admin')
@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ __('Home') }}</a><a class="breadcrumb-item"
        href="{{ route('settings.index') }}">{{ __('Settings') }}</a><span
        class="breadcrumb-item active">{{ __('Logo Change') }}</span>
@endsection
@section('title')
    {{ __('Logo Change') }}
@endsection
@php
$logo = asset(Storage::url('uploads/logo/'));
@endphp
@section('content')
    {{ Form::model(['route' => 'settings.logo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header">{{ __('App Settings') }}</div>
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('name', __('Application Name')) }}
                    <input type="text" name="app_name" class="form-control" value="{{ config('app.name') }}">
                </div>
                <div class="form-group">
                    {{ Form::label('name', __('Dark Logo')) }}
                    <div class="bg-light text-center">
                        {!! form::image($logo . '/dark_logo.png', null, ['class' => 'img img-responsive my-2 text-center']) !!}
                    </div>
                    {!! form::file('dark_logo', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                </div>
                <div class="form-group">
                    {{ Form::label('name', __('Light Logo')) }}
                    <div class="bg-dark text-center">
                        {!! form::image($logo . '/light_logo.png', null, ['class' => 'img img-responsive my-2 text-center']) !!}
                    </div>
                    {!! form::file('light_logo', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                </div>
                <div class="form-group">
                    {{ Form::label('name', __('Small Logo')) }}
                    <div class="bg-dark text-center">
                        {!! form::image($logo . '/small_logo.png', null, ['class' => 'img img-responsive my-2 text-center']) !!}
                    </div>
                    {!! form::file('small_logo', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                </div>
                <div class="form-group">
                    {{ Form::label('name', __('Favicon')) }}
                    <div class="bg-light text-center">
                        {!! form::image($logo . '/favicon.png', null, ['class' => 'img img-responsive my-2 text-center']) !!}
                    </div>
                    {!! form::file('favicon', ['class' => 'form-control', 'accept' => 'image/png']) !!}
                </div>
                <div>
                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary ']) }}

                    <a class="btn btn-secondary" href="{{ route('settings.index') }}"> {{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
