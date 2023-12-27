@extends('layouts.admin')
@section('title', __('Create Roles'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create Roles') }}
        </li>
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
                                <h5> {{ __('Create Roles') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'),['class' => 'form-label']) }}
                                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
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

