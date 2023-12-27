@extends('layouts.admin')
@section('breadcrumb')
@section('title', __('Create Language'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Languages') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create Language') }}
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
                                <h5> {{ __('Create Language Code') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'store.language', 'method' => 'POST']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('code', __('Language Code'), ['class' => 'form-label']) }}
                                    {{ Form::text('code', '', ['class' => 'form-control', 'required' => 'required','placeholder' => 'Language Code']) }}
                                    @error('code')
                                        <span class="invalid-code" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
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


