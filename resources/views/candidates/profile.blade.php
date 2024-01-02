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
                    <h5>{{ __('Update Candidate Details') }}</h5>

                </div>
                <!-- {!! Form::open(['route' => 'candidates.update.save', 'method' => 'POST']) !!} -->
                {!! Form::open(['id' => 'updateForm', 'method' => 'POST']) !!}
                <div class="card-body col-md-12">

                    <!-- <input type="text" class="form-control" id="id" value="{{$candidatesDetails[0]->id}}"> -->
                    {!! Form::hidden('id', $candidatesDetails[0]->id, ['placeholder' => __(''),'class'
                    => 'form-control',
                    'id' => 'id'
                    ]) !!}

                    <div class="form-group col-md-6" style="float:left;">
                        {{ Form::label('first_name', __('First Name'), ['class' => 'col-form-label']) }}
                        {!! Form::text('first_name', $candidatesDetails[0]->first_name, ['placeholder' => __('First
                        Name'),'class' => 'form-control',
                        'id' => 'first_name'
                        ]) !!}
                        <span class="first_name_error errors"></span>
                    </div>

                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('middle_name', __('Middle Name'),['class' => 'col-form-label']) }}
                        {!! Form::text('middle_name',$candidatesDetails[0]->middle_name, ['placeholder' => __('Middle
                        Name'), 'class' =>
                        'form-control','id' => 'middle_name']) !!}
                        <span class="middle_name_error errors"></span>
                    </div>

                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('last_name', __('Last Name'),['class' => 'col-form-label']) }}
                        {!! Form::text('last_name', $candidatesDetails[0]->last_name, ['placeholder' => __('Last Name'),
                        'class' =>
                        'form-control','id' => 'last_name']) !!}
                        <span class="last_name_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('email1', __('Email'),['class' => 'col-form-label']) }}
                        {!! Form::text('email1', $candidatesDetails[0]->email1, ['placeholder' => __('Email'), 'class'
                        => 'form-control','id' =>
                        'email1']) !!}
                        <span class="email1_error errors"></span>
                        <span class="email_notvalid_address_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('email2', __('2Email'),['class' => 'col-form-label']) }}
                        {!! Form::text('email2', $candidatesDetails[0]->email2, ['placeholder' => __('2Email'), 'class'
                        => 'form-control','id' =>
                        'email2']) !!}
                        <span class="email2_error errors"></span>
                        <span class="email2_notvalid_address_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('web_site', __('Website'),['class' => 'col-form-label']) }}
                        {!! Form::text('web_site', $candidatesDetails[0]->web_site, ['placeholder' => __('Website'),
                        'class' => 'form-control','id'
                        => 'web_site']) !!}
                        <span class="web_site_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('phone_home', __('Home Phone'),['class' => 'col-form-label']) }}
                        {!! Form::text('phone_home', $candidatesDetails[0]->phone_home, ['placeholder' => __('Home
                        Phone'), 'class' =>
                        'form-control','id' => 'phone_home']) !!}
                        <span class="phone_home_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('phone_cell', __('Cell Phone'),['class' => 'col-form-label']) }}
                        {!! Form::text('phone_cell', $candidatesDetails[0]->phone_cell, ['placeholder' => __('Cell
                        Phone'), 'class' =>
                        'form-control','id' => 'phone_cell']) !!}
                        <span class="phone_cell_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('phone_work', __('Work Phone'),['class' => 'col-form-label']) }}
                        {!! Form::text('phone_work', $candidatesDetails[0]->phone_work, ['placeholder' => __('Work
                        Phone'), 'class' =>
                        'form-control','id' => 'phone_work']) !!}
                        <span class="phone_work_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('address', __('Address'),['class' => 'col-form-label']) }}
                        {!! Form::text('address', $candidatesDetails[0]->address, ['placeholder' => __('Address'),
                        'class' => 'form-control','id'
                        => 'address']) !!}
                        <span class="address_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('city', __('City'),['class' => 'col-form-label']) }}
                        {!! Form::text('city', $candidatesDetails[0]->city, ['placeholder' => __('City'), 'class' =>
                        'form-control','id' =>
                        'city']) !!}
                        <span class="city_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('state', __('State'),['class' => 'col-form-label']) }}
                        {!! Form::text('state', $candidatesDetails[0]->state, ['placeholder' => __('State'), 'class' =>
                        'form-control','state'
                        =>'state']) !!}
                        <span class="state_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('zip', __('Postel Code'),['class' => 'col-form-label']) }}
                        {!! Form::text('zip', $candidatesDetails[0]->zip, ['placeholder' => __('Postel Code'), 'class'
                        => 'form-control','id'
                        => 'zip']) !!}
                        <span class="zip_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('best_time_to_call', __('Best Time to call'),['class' => 'col-form-label']) }}
                        {!! Form::text('best_time_to_call', $candidatesDetails[0]->best_time_to_call, ['placeholder' =>
                        __('Best Time to call'), 'class' =>
                        'form-control','id' => 'best_time_to_call']) !!}
                        <span class="best_time_to_call_error errors"></span>
                    </div>
                    <!--////////////            Other Information   //////////////-->
                    <div class="card-body form-group col-md-6 m-auto">
                        <h4>{{ __('Other') }}</h4>
                    </div>
                    <div class="form-group">
                        {{ Form::label('can_relocate', __('Can Relocate'),['class' => 'col-form-label']) }}
                        {!! Form::text('can_relocate', $candidatesDetails[0]->can_relocate, ['placeholder' => __('Can
                        Relocate'), 'class' =>
                        'form-control','id' => 'can_relocate']) !!}
                        <span class="can_relocate_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('date_available', __('Date Available'),['class' => 'col-form-label']) }}
                        <!-- {!! Form::date('date_available',date('Y/m/d',strtotime($candidatesDetails[0]->date_available)), ['placeholder' =>
                        __('Date Available'), 'class' =>
                        'form-control','id' => 'date_available']) !!} -->
                        {!! Form::date('date_available', substr($candidatesDetails[0]->date_available, 0, 10), [
                        'placeholder' => __('Date Available'),
                        'class' => 'form-control',
                        'id' => 'date_available'
                        ]) !!}

                        <span class="date_available_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('current_employer', __('Current Employer'),['class' => 'col-form-label']) }}
                        {!! Form::text('current_employer', $candidatesDetails[0]->current_employer, ['placeholder' =>
                        __('Current Employer'), 'class' =>
                        'form-control','id' => 'current_employer']) !!}
                        <span class="current_employer_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('current_pay', __('Current Pay'),['class' => 'col-form-label']) }}
                        {!! Form::text('current_pay', $candidatesDetails[0]->current_pay, ['placeholder' => __('Current
                        Pay'), 'class' =>
                        'form-control','id' => 'current_pay']) !!}
                        <span class="current_pay_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('desired_pay', __('Desire Pay'),['class' => 'col-form-label']) }}
                        {!! Form::text('desired_pay', $candidatesDetails[0]->desired_pay, ['placeholder' => __('Desire
                        Pay'), 'class' =>
                        'form-control','id' => 'desired_pay']) !!}
                        <span class="desired_pay_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('source', __('Source'),['class' => 'col-form-label']) }}
                        {!! Form::text('source', $candidatesDetails[0]->source, ['placeholder' => __('source'), 'class'
                        => 'form-control','id' =>
                        'source']) !!}
                        <span class="source_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('key_skills', __('Key Skills'),['class' => 'col-form-label']) }}
                        {!! Form::text('key_skills', $candidatesDetails[0]->key_skills, ['placeholder' => __('Key
                        Skills'), 'class' =>
                        'form-control','id' => 'key_skills']) !!}
                        <span class="key_skills_error errors"></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('notes', __('Misc Notes'),['class' => 'col-form-label']) }}
                        {!! Form::text('notes', $candidatesDetails[0]->notes, ['placeholder' => __('Misc Notes'),
                        'class' => 'form-control','id'
                        => 'notes']) !!}
                        <span class="notes_error errors"></span>
                    </div>
                    <div class="form-group ">
                        {{ Form::label('role', __('Role'),['class' => 'col-form-label']) }}
                        {!! Form::text('desired_pay', $candidatesDetails[0]->role, ['placeholder' => __('Desire Pay'),
                        'class' =>
                        'form-control','id' => 'role']) !!}
                        <span class="role_error errors"></span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('candidates.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                        <button type="submit" id="addCandidate" class="btn btn-primary mb-3">{{ __('Save') }}</button>
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
// Assuming you are using jQuery for simplicity
$('#updateForm').submit(function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = new FormData();
    const fields = [
        'first_name', 'middle_name', 'last_name',
        'web_site', 'phone_home', 'phone_cell', 'phone_work', 'address',
        'city', 'state', 'zip', 'best_time_to_call', 'can_relocate',
        'date_available', 'current_employer', 'current_pay', 'desired_pay',
        'source', 'notes', 'key_skills', 'role', 'id'
    ];
    // 'email1', 'email2', not update

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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: '/candidates/update/save', // Adjust the URL as needed
        type: 'POST',
        data: $(this).serialize(), // Serialize the form data
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    window.location.href = "{{route('candidates.index')}}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});

// $('#addCandidate').click(function() {
//     // const formData = new FormData();
//     // const fields = [
//     //     'first_name', 'middle_name', 'last_name',
//     //     'web_site', 'phone_home', 'phone_cell', 'phone_work', 'address',
//     //     'city', 'state', 'zip', 'best_time_to_call', 'can_relocate',
//     //     'date_available', 'current_employer', 'current_pay', 'desired_pay',
//     //     'source', 'notes', 'key_skills', 'role','id'
//     // ];
//     // // 'email1', 'email2', not update

//     // let errors = [];

//     // $(".errors").html("");

//     // fields.forEach(field => {
//     //     const value = document.getElementById(field).value.trim();

//     //     if (value === "") {
//     //         errors.push(field);
//     //         $(`.${field}_error`).html(`${field.replace('_', ' ')} field can't be empty.`);
//     //     }

//     //     if (field.startsWith('email') && value !== "") {
//     //         if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
//     //             errors.push(`${field}_notvalid_address_error`);
//     //             $(`.${field}_notvalid_address_error`).html("Please provide a valid email address.");
//     //         }
//     //     }

//     //     formData.append(field, value);
//     // });

//     // if (errors.length > 0) {
//     //     return false;
//     // }

//     // $.ajaxSetup({
//     //     headers: {
//     //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     //     },
//     // });

//     $.ajax({
//         type: "POST",
//         url: "{{ route('candidates.update.save') }}",
//         dataType: "json",
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             const title = response.status ? "success" : "warning";
//             Swal.fire({
//                 title: response.message,
//                 type: title,
//                 icon: title,
//             }).then(function(result) {
//                 if (result.isConfirmed && response.status) {
//                     window.location.href = "{{route('candidates.index')}}";
//                 }
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//         }
//     });
// });
</script>
@endpush