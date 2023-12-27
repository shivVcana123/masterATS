@extends('layouts.admin')

@section('content')

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
            <div class="row">
                <div class="section-body">
                    <div class="col-md-10 m-auto">
                        <div class="card ">
                            <div class="card-header">
                                <h5>{{ __('Add Candidate') }}</h5>
                            </div>
                            <div class="card-body form-group col-md-6 m-auto">
                                <h4>{{ __('Basic information') }}</h4>
                            </div>
                            {!! Form::open(['route' => 'candidates.store', 'method' => 'POST']) !!}
                            <div class="card-body col-md-12">
                               
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('first_name', __('First Name'),['class' => 'col-form-label']) }}
                                    {!! Form::text('first_name', null, ['placeholder' => __('First Name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('middle_name', __('Middle Name'),['class' => 'col-form-label']) }}
                                    {!! Form::text('middle_name', null, ['placeholder' => __('Middle Name'), 'class' => 'form-control']) !!}
                                </div>
                            
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('last_name', __('Last Name'),['class' => 'col-form-label']) }}
                                    {!! Form::text('last_name', null, ['placeholder' => __('Last Name'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('email1', __('Email'),['class' => 'col-form-label']) }}
                                    {!! Form::text('email1', null, ['placeholder' => __('Email'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('email2', __('2Email'),['class' => 'col-form-label']) }}
                                    {!! Form::text('email2', null, ['placeholder' => __('2Email'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('web_site', __('Website'),['class' => 'col-form-label']) }}
                                    {!! Form::text('web_site', null, ['placeholder' => __('Website'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('phone_home', __('Home Phone'),['class' => 'col-form-label']) }}
                                    {!! Form::text('phone_home', null, ['placeholder' => __('Home Phone'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('phone_cell', __('Cell Phone'),['class' => 'col-form-label']) }}
                                    {!! Form::text('phone_cell', null, ['placeholder' => __('Cell Phone'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('phone_work', __('Work Phone'),['class' => 'col-form-label']) }}
                                    {!! Form::text('phone_work', null, ['placeholder' => __('Work Phone'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('address', __('Address'),['class' => 'col-form-label']) }}
                                    {!! Form::text('address', null, ['placeholder' => __('Address'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('city', __('City'),['class' => 'col-form-label']) }}
                                    {!! Form::text('city', null, ['placeholder' => __('City'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('state', __('State'),['class' => 'col-form-label']) }}
                                    {!! Form::text('state', null, ['placeholder' => __('State'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:left";>
                                    {{ Form::label('zip', __('Postel Code'),['class' => 'col-form-label']) }}
                                    {!! Form::text('zip', null, ['placeholder' => __('Postel Code'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6" style="float:right";>
                                    {{ Form::label('best_time_to_call', __('Best Time to call'),['class' => 'col-form-label']) }}
                                    {!! Form::text('best_time_to_call', null, ['placeholder' => __('Best Time to call'), 'class' => 'form-control']) !!}
                                </div>
                                <!--////////////            Other Information   //////////////-->
                                 <div class="card-body form-group col-md-6 m-auto">
                                <h4>{{ __('Other') }}</h4>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('can_relocate', __('Can Relocate'),['class' => 'col-form-label']) }}
                                    {!! Form::text('can_relocate', null, ['placeholder' => __('Can Relocate'), 'class' => 'form-control']) !!}
                                </div>
                                 <div class="form-group">
                                    {{ Form::label('date_available', __('Date Available'),['class' => 'col-form-label']) }}
                                    {!! Form::date('date_available', null, ['placeholder' => __('Date Available'), 'class' => 'form-control']) !!}
                                </div>
                                 <div class="form-group">
                                    {{ Form::label('current_employer', __('Current Employer'),['class' => 'col-form-label']) }}
                                    {!! Form::text('current_employer', null, ['placeholder' => __('Current Employer'), 'class' => 'form-control']) !!}
                                </div>
                                 <div class="form-group">
                                    {{ Form::label('current_pay', __('Current Pay'),['class' => 'col-form-label']) }}
                                   {!! Form::text('current_pay', null, ['placeholder' => __('Current Pay'), 'class' => 'form-control']) !!}
                                </div>
                                 <div class="form-group">
                                    {{ Form::label('desired_pay', __('Desire Pay'),['class' => 'col-form-label']) }}
                                   {!! Form::text('desired_pay', null, ['placeholder' => __('Desire Pay'), 'class' => 'form-control']) !!}
                                </div>
                                 <div class="form-group">
                                    {{ Form::label('source', __('Source'),['class' => 'col-form-label']) }}
                                    {!! Form::text('source', null, ['placeholder' => __('source'), 'class' => 'form-control']) !!}
                                </div>
                                 <div class="form-group">
                                    {{ Form::label('key_skills', __('Key Skills'),['class' => 'col-form-label']) }}
                                 {!! Form::text('key_skills', null, ['placeholder' => __('Key Skills'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('notes', __('Misc Notes'),['class' => 'col-form-label']) }}
                                    {!! Form::text('notes', null, ['placeholder' => __('Misc Notes'), 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group ">
                                    {{ Form::label('role', __('Role'),['class' => 'col-form-label']) }}
                                    {!! Form::text('desired_pay', null, ['placeholder' => __('Desire Pay'), 'class' => 'form-control']) !!}
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

