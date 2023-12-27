@extends('layouts.admin')
@section('title', __('Edit Modules'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('modules.index') }}">{{ __('Modules') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Modules') }}
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
                                <h5> {{ __('Edit Module') }}</h5>
                            </div>
                            {!! Form::model($modual, ['method' => 'PATCH', 'route' => ['modules.update', $modual->id]]) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                                    {!! Form::hidden('old_name', $modual->name, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('modules.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
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

@section('content')

    {!! Form::model($modual, ['method' => 'PATCH', 'route' => ['modules.update', $modual->id]]) !!}
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header">{{ __('Edit Module') }} </div>
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('name', __('Name')) }}
                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                    {!! Form::hidden('old_name', $modual->name, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                </div>
                {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}

                <a class="btn btn-secondary" href="{{ route('modules.index') }}"> {{ __('Back') }}</a>
            </div>
            <div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
