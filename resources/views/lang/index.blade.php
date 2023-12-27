@extends('layouts.admin')
@section('title', __('Manage Language'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Languages') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Language') }}
        </li>
    </ul>
@endsection
@section('action')
    <div class="row ">
        <a class="btn btn-secondary btn-back" href="{{ route('index') }}"> {{ __('Back') }}</a>
    </div>
@endsection

@section('content')

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="section-body">
                    <div class="col-md-12 m-auto">
                        <div class="card ">
                            <div class="card-header">
                                <h5> {{ __('Edit Language') }}</h5>
                            </div>
                            {!! Form::open(['route' => 'store.language', 'method' => 'POST']) !!}
                            <div class="card-body">

                                <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true">{{ __('Labels') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                            aria-controls="profile" aria-selected="false">{{ __('Messages') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        {!! Form::open(['route' => ['store.language.data', $currantLang], 'method' => 'POST']) !!}

                                        <div class="row">
                                            @foreach ($arrLabel as $label => $value)
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                            for="example3cols1Input">{{ $label }}
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="label[{{ $label }}]" value="{{ $value }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                            <hr/>
                                            <div class="col-lg-12 float-end">
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary float-end']) }}
                                                <a href="{{ route('index') }}" class="btn btn-secondary float-end me-2">{{ __('Cancel') }}</a>
                                            </div>
                                        </div>
                                        {{ Form::close() }}

                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        {!! Form::open(['route' => ['store.language.data', $currantLang], 'method' => 'POST']) !!}
                                        <div class="row">
                                            @foreach ($arrMessage as $fileName => $fileValue)
                                                <div class="col-lg-12">
                                                    <h3>{{ ucfirst($fileName) }}</h3>
                                                </div>
                                                @foreach ($fileValue as $label => $value)
                                                    @if (is_array($value))
                                                        @foreach ($value as $label2 => $value2)
                                                            @if (is_array($value2))
                                                                @foreach ($value2 as $label3 => $value3)
                                                                    @if (is_array($value3))
                                                                        @foreach ($value3 as $label4 => $value4)
                                                                            @if (is_array($value4))
                                                                                @foreach ($value4 as $label5 => $value5)
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="form-control-label">{{ $fileName }}.{{ $label }}.{{ $label2 }}.{{ $label3 }}.{{ $label4 }}.{{ $label5 }}</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}][{{ $label3 }}][{{ $label4 }}][{{ $label5 }}]"
                                                                                                value="{{ $value5 }}">
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="form-control-label">{{ $fileName }}.{{ $label }}.{{ $label2 }}.{{ $label3 }}.{{ $label4 }}</label>
                                                                                        <input type="text" class="form-control"
                                                                                            name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}][{{ $label3 }}][{{ $label4 }}]"
                                                                                            value="{{ $value4 }}">
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="form-control-label">{{ $fileName }}.{{ $label }}.{{ $label2 }}.{{ $label3 }}</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}][{{ $label3 }}]"
                                                                                    value="{{ $value3 }}">
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="form-control-label">{{ $fileName }}.{{ $label }}.{{ $label2 }}</label>
                                                                        <input type="text" class="form-control"
                                                                            name="message[{{ $fileName }}][{{ $label }}][{{ $label2 }}]"
                                                                            value="{{ $value2 }}">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-control-label">{{ $fileName }}.{{ $label }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="message[{{ $fileName }}][{{ $label }}]"
                                                                    value="{{ $value }}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <hr/>
                                        <div class="col-lg-12 float-end">
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary float-end mb-3']) }}
                                            <a href="{{ route('index') }}" class="btn btn-secondary float-end me-2 mb-3">{{ __('Cancel') }}</a>

                                        </div>
                                        {{ Form::close() }}

                                    </div>
                                </div>
                            </div>
                            {{--  <div class="card-footer">
                                <div class="float-end">
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                                    <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                                </div>
                            </div>
                            {!! Form::close() !!}  --}}
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

