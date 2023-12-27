{{ Form::open(array('route' => array('test.send.mail'))) }}

<div class="modal-body">
    <div class="form-group">
        <label class="form-control-label form-label" for="email">{{ __('Email') }}</label>
        <input type="text" name="email" class="form-control" placeholder="{{ __('Enter Email') }} " required>
        @error('email')
            <span class="invalid-email" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
   <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Send Mail') }}</button>
    </div>
{{ Form::close() }}


{{--  @extends('layouts.admin')
@section('breadcrumb')
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ __('Home') }}</a><a class="breadcrumb-item"
    href="{{ route('settings.index') }}">{{ __('Settings') }}</a><a class="breadcrumb-item"
    href="{{ route('settings.getmail') }}">{{ __('Email Setting') }}</a><span
        class="breadcrumb-item active">{{ __('Test Send Mail') }}</span>
@endsection
@section('content')
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header">{{ __('Test Send Mail') }} </div>
            <div class="card-body">
                {{ Form::open(array('route' => array('test.send.mail'))) }}
                <div class="row">
                    <div class="form-group col-md-12">
                        {{ Form::label('email', __('Email'),['class'=>'form-control-label']) }}
                        {{ Form::text('email', '', array('class' => 'form-control','required'=>'required')) }}
                        @error('email')
                        <span class="invalid-email" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div>
                    {{ Form::submit(__('Submit'), ['class' => 'btn btn-primary']) }}
                    <a class="btn btn-secondary" href="{{ route('settings.getmail') }}"> {{ __('Back') }}</a>
                </div>
                {{ Form::close() }}
            </div>
        @endsection  --}}

