@extends('layouts.admin')
@section('title', __('Create User'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create User') }}</li>
    </ul>
@endsection

@section('content')

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
            <div class="row">
                <div class="section-body">
                    <div class="col-md-4 m-auto">
                        <div class="card ">
                            <div class="card-header">
                                <h5> {{ __('Create User') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'),['class' => 'col-form-label']) }}
                                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', __('Email'),['class' => 'col-form-label']) }}
                                    {!! Form::text('email', null, ['placeholder' => __('Email'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', __('Password'),['class' => 'col-form-label']) }}
                                    {!! Form::password('password', ['placeholder' => __('Password'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('confirm password', __('Confirm Password'),['class' => 'col-form-label']) }}
                                    {!! Form::password('confirm-password', ['placeholder' => __('Confirm Password'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group ">
                                    {{ Form::label('role', __('Role'),['class' => 'col-form-label']) }}
                                    {!! Form::select('roles', $roles, null, ['class' => 'form-control', 'data-trigger']) !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                                    <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

    <script>
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
    </script>
@endpush

