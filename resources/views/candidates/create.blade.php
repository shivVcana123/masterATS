@extends('layouts.admin')

@section('content')

<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<style>
.errors {
    color: red;
}
</style>
<div class="row">
    <div class="section-body">
        <div class="col-md-10 m-auto">
            <div class="card ">
                <div class="card-header">
                    <h5>{{ __('Add Candidate') }}</h5>
                </div>

                <form method="POST">
                    <div class="card-body col-md-12">

                        {!! Form::hidden('job_id', $job_id, ['placeholder' => __('First Name'), 'class' =>
                        'form-control','id' => 'job_id']) !!}

                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('first_name', __('First Name'),['class' => 'col-form-label']) }}
                            {!! Form::text('first_name', null, ['placeholder' => __('First Name'), 'class' =>
                            'form-control','id' => 'first_name']) !!}
                            <span class="first_name_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('middle_name', __('Middle Name'),['class' => 'col-form-label']) }}
                            {!! Form::text('middle_name', null, ['placeholder' => __('Middle Name'), 'class' =>
                            'form-control','id' => 'middle_name']) !!}
                            <span class="middle_name_error errors"></span>
                        </div>

                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('last_name', __('Last Name'),['class' => 'col-form-label']) }}
                            {!! Form::text('last_name', null, ['placeholder' => __('Last Name'), 'class' =>
                            'form-control','id' => 'last_name']) !!}
                            <span class="last_name_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('email1', __('Email'),['class' => 'col-form-label']) }}
                            {!! Form::text('email1', null, ['placeholder' => __('Email'), 'class' => 'form-control','id'
                            =>
                            'email1']) !!}
                            <span class="email1_error errors"></span>
                            <span class="email_notvalid_address_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('email2', __('2Email'),['class' => 'col-form-label']) }}
                            {!! Form::text('email2', null, ['placeholder' => __('2Email'), 'class' =>
                            'form-control','id' =>
                            'email2']) !!}
                            <span class="email2_error errors"></span>
                            <span class="email2_notvalid_address_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('web_site', __('Website'),['class' => 'col-form-label']) }}
                            {!! Form::text('web_site', null, ['placeholder' => __('Website'), 'class' =>
                            'form-control','id'
                            => 'web_site']) !!}
                            <span class="web_site_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('phone_home', __('Home Phone'),['class' => 'col-form-label']) }}
                            {!! Form::text('phone_home', null, ['placeholder' => __('Home Phone'), 'class' =>
                            'form-control','id' => 'phone_home']) !!}
                            <span class="phone_home_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('phone_cell', __('Cell Phone'),['class' => 'col-form-label']) }}
                            {!! Form::text('phone_cell', null, ['placeholder' => __('Cell Phone'), 'class' =>
                            'form-control','id' => 'phone_cell']) !!}
                            <span class="phone_cell_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('phone_work', __('Work Phone'),['class' => 'col-form-label']) }}
                            {!! Form::text('phone_work', null, ['placeholder' => __('Work Phone'), 'class' =>
                            'form-control','id' => 'phone_work']) !!}
                            <span class="phone_work_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('address', __('Address'),['class' => 'col-form-label']) }}
                            {!! Form::text('address', null, ['placeholder' => __('Address'), 'class' =>
                            'form-control','id'
                            => 'address']) !!}
                            <span class="address_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('city', __('City'),['class' => 'col-form-label']) }}
                            {!! Form::text('city', null, ['placeholder' => __('City'), 'class' => 'form-control','id' =>
                            'city']) !!}
                            <span class="city_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('state', __('State'),['class' => 'col-form-label']) }}
                            {!! Form::text('state', null, ['placeholder' => __('State'), 'class' =>
                            'form-control','state'
                            =>'state']) !!}
                            <span class="state_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:left" ;>
                            {{ Form::label('zip', __('Postel Code'),['class' => 'col-form-label']) }}
                            {!! Form::text('zip', null, ['placeholder' => __('Postel Code'), 'class' =>
                            'form-control','id'
                            => 'zip']) !!}
                            <span class="zip_error errors"></span>
                        </div>
                        <div class="form-group col-md-6" style="float:right" ;>
                            {{ Form::label('best_time_to_call', __('Best Time to call'),['class' => 'col-form-label']) }}
                            {!! Form::text('best_time_to_call', null, ['placeholder' => __('Best Time to call'), 'class'
                            =>
                            'form-control','id' => 'best_time_to_call']) !!}
                            <span class="best_time_to_call_error errors"></span>
                        </div>
                        <!--////////////            Other Information   //////////////-->
                        <div class="card-body form-group col-md-6 m-auto">
                            <h4>{{ __('Other') }}</h4>
                        </div>
                        <div class="form-group">
                            {{ Form::label('can_relocate', __('Can Relocate'),['class' => 'col-form-label']) }}
                            {!! Form::checkbox('can_relocate', null,false, ['placeholder' => __('Can Relocate'), 'id' =>
                            'can_relocate', 'value' => '1']) !!}
                            <span class="can_relocate_error errors"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('date_available', __('Date Available'),['class' => 'col-form-label']) }}
                            {!! Form::date('date_available', null, ['placeholder' => __('Date Available'), 'class' =>
                            'form-control','id' => 'date_available']) !!}
                            <span class="date_available_error errors"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('current_employer', __('Current Employer'),['class' => 'col-form-label']) }}
                            {!! Form::text('current_employer', null, ['placeholder' => __('Current Employer'), 'class'
                            =>
                            'form-control','id' => 'current_employer']) !!}
                            <span class="current_employer_error errors"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('current_pay', __('Current Pay'),['class' => 'col-form-label']) }}
                            {!! Form::text('current_pay', null, ['placeholder' => __('Current Pay'), 'class' =>
                            'form-control','id' => 'current_pay']) !!}
                            <span class="current_pay_error errors"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('desired_pay', __('Desire Pay'),['class' => 'col-form-label']) }}
                            {!! Form::text('desired_pay', null, ['placeholder' => __('Desire Pay'), 'class' =>
                            'form-control','id' => 'desired_pay']) !!}
                            <span class="desired_pay_error errors"></span>
                        </div>
                        <!-- <div class="form-group">
                            {{ Form::label('source', __('Source'),['class' => 'col-form-label']) }}
                            {!! Form::text('source', null, ['placeholder' => __('source'), 'class' =>
                            'form-control','id' =>
                            'source']) !!}
                            <span class="source_error errors"></span>
                        </div> -->
                        <div class="form-group">
                            <label for="source">Source</label>
                            <!-- <input type="text" name="source" id="source" class="form-control"> -->
                            <select name="source" id="source" class="form-control">
                                <option disabled selected>(None)</option>
                                @foreach($candidateSource as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="source_error errors"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('key_skills', __('Key Skills'),['class' => 'col-form-label']) }}
                            {!! Form::text('key_skills', null, ['placeholder' => __('Key Skills'), 'class' =>
                            'form-control','id' => 'key_skills']) !!}
                            <span class="key_skills_error errors"></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('notes', __('Misc Notes'),['class' => 'col-form-label']) }}
                            {!! Form::text('notes', null, ['placeholder' => __('Misc Notes'), 'class' =>
                            'form-control','id'
                            => 'notes']) !!}
                            <span class="notes_error errors"></span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('candidates.index') }}"
                                class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="button" id="addCandidate" class="btn btn-primary mb-3">Save</button>
                        </div>
                    </div>

                </form>
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
$(document).on('click', '#addCandidate', function() {
    var jobOrder_id = $('#job_id').val();
    var source = $('#source').val();
    var can_relocate = $('#can_relocate').is(':checked') ? 1:0;
    // alert(can_relocate);
    // alert(jobOrder_id);
    const formData = new FormData();
    const fields = [
        'first_name', 'middle_name', 'last_name', 'email1', 'email2',
        'web_site', 'phone_home', 'phone_cell', 'phone_work', 'address',
        'city', 'state', 'zip', 'best_time_to_call', 'can_relocate',
        'date_available', 'current_employer', 'current_pay', 'desired_pay',
        'notes', 'key_skills',
    ];

    let errors = [];

    $(".errors").html("");

    fields.forEach(field => {
        const value = document.getElementById(field).value.trim();

        if (value === "") {
            errors.push(field);
            $(`.${field}_error`).html(`${field.replace('_', ' ')} field can't be empty.`);
        }

        if (field.startsWith('email') && value !== "") {
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
                errors.push(`${field}_notvalid_address_error`);
                $(`.${field}_notvalid_address_error`).html("Please provide a valid email address.");
            }
        }
        
        formData.append(field, value);
    });

    if (errors.length > 0) {
        return false;
    }


    formData.append('jobOrder_id', jobOrder_id);
    formData.append('can_relocate', can_relocate);
    formData.append('source', source);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "{{route('candidates.store')}}",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.status == true) {
                Swal.fire({
                    title: response.message,
                    type: "success",
                    icon: "success",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        if (jobOrder_id) {
                            window.location.href = "{{route('joborders.details')}}" + '/' +
                                jobOrder_id;
                        } else {
                            window.location.href = "{{route('candidates.index')}}";
                        }

                    }
                });
            } else {
                Swal.fire({
                    title: response.message,
                    icon: "warning",
                }).then(function(result) {
                    if (result.isConfirmed) {

                    }
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});
</script>
@endpush