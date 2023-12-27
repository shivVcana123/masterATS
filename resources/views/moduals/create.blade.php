@extends('layouts.admin')
@section('title', __('Create Modules'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('modules.index') }}">{{ __('Modules') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create Modules') }}
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
                                <h5> {{ __('Create Module') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'modules.store', 'method' => 'POST']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'required' => true, 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group row">
                                    {{ Form::label('permissions', __('Permissions'), ['class' => 'col-md-3 col-form-label']) }}

                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline me-1">
                                            {{ Form::checkbox('permissions[]', 'M', false, ['class' => 'form-check-input', 'id' => 'inline-checkbox1']) }}
                                            {{ Form::label('manage', __('Manage'), ['class' => 'form-check-label']) }}

                                        </div>
                                        <div class="form-check form-check-inline me-1">
                                            {{ Form::checkbox('permissions[]', 'C', false, ['class' => 'form-check-input', 'id' => 'inline-checkbox2']) }}
                                            {{ Form::label('create', __('Create'), ['class' => 'form-check-label']) }}

                                        </div>
                                        <div class="form-check form-check-inline me-1">
                                            {{ Form::checkbox('permissions[]', 'D', false, ['class' => 'form-check-input', 'id' => 'inline-checkbox3']) }}
                                            {{ Form::label('delete', __('Delete'), ['class' => 'form-check-label']) }}

                                        </div>
                                        <div class="form-check form-check-inline me-1">
                                            {{ Form::checkbox('permissions[]', 'S', false, ['class' => 'form-check-input', 'id' => 'inline-checkbox4']) }}
                                            {{ Form::label('show', __('Show'), ['class' => 'form-check-label']) }}

                                        </div>
                                        <div class="form-check form-check-inline">
                                            {{ Form::checkbox('permissions[]', 'E', false, ['class' => 'form-check-input', 'id' => 'inline-checkbox5']) }}
                                            {{ Form::label('edit', __('Edit'), ['class' => 'form-check-label']) }}

                                        </div>
                                    </div>
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
