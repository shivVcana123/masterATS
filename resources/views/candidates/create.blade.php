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
                {!! Form::open(['route' => 'candidates.store', 'method' => 'POST']) !!}
                <div class="card-body col-md-12">

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
                        {!! Form::text('email1', null, ['placeholder' => __('Email'), 'class' => 'form-control','id' =>
                        'email1']) !!}
                        <span class="email1_error errors"></span>
                        <span class="email_notvalid_address_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('email2', __('2Email'),['class' => 'col-form-label']) }}
                        {!! Form::text('email2', null, ['placeholder' => __('2Email'), 'class' => 'form-control','id' =>
                        'email2']) !!}
                        <span class="email2_error errors"></span>
                        <span class="email2_notvalid_address_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('web_site', __('Website'),['class' => 'col-form-label']) }}
                        {!! Form::text('web_site', null, ['placeholder' => __('Website'), 'class' => 'form-control','id'
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
                        {!! Form::text('address', null, ['placeholder' => __('Address'), 'class' => 'form-control','id'
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
                        {!! Form::text('state', null, ['placeholder' => __('State'), 'class' => 'form-control','state'
                        =>'state']) !!}
                        <span class="state_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:left" ;>
                        {{ Form::label('zip', __('Postel Code'),['class' => 'col-form-label']) }}
                        {!! Form::text('zip', null, ['placeholder' => __('Postel Code'), 'class' => 'form-control','id'
                        => 'zip']) !!}
                        <span class="zip_error errors"></span>
                    </div>
                    <div class="form-group col-md-6" style="float:right" ;>
                        {{ Form::label('best_time_to_call', __('Best Time to call'),['class' => 'col-form-label']) }}
                        {!! Form::text('best_time_to_call', null, ['placeholder' => __('Best Time to call'), 'class' =>
                        'form-control','id' => 'best_time_to_call']) !!}
                        <span class="best_time_to_call_error errors"></span>
                    </div>
                    <!--////////////            Other Information   //////////////-->
                    <div class="card-body form-group col-md-6 m-auto">
                        <h4>{{ __('Other') }}</h4>
                    </div>
                    <div class="form-group">
                        {{ Form::label('can_relocate', __('Can Relocate'),['class' => 'col-form-label']) }}
                        {!! Form::text('can_relocate', null, ['placeholder' => __('Can Relocate'), 'class' =>
                        'form-control','id' => 'can_relocate']) !!}
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
                        {!! Form::text('current_employer', null, ['placeholder' => __('Current Employer'), 'class' =>
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
                    <div class="form-group">
                        {{ Form::label('source', __('Source'),['class' => 'col-form-label']) }}
                        {!! Form::text('source', null, ['placeholder' => __('source'), 'class' => 'form-control','id' =>
                        'source']) !!}
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
                        {!! Form::text('notes', null, ['placeholder' => __('Misc Notes'), 'class' => 'form-control','id'
                        => 'notes']) !!}
                        <span class="notes_error errors"></span>
                    </div>
                    <div class="form-group ">
                        {{ Form::label('role', __('Role'),['class' => 'col-form-label']) }}
                        {!! Form::text('desired_pay', null, ['placeholder' => __('Desire Pay'), 'class' =>
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

// $('#addCandidate').click(function() {
//     var first_name = document.getElementById('first_name').value;
//     var middle_name = document.getElementById('middle_name').value;
//     var last_name = document.getElementById('last_name').value;
//     var email1 = document.getElementById('email1').value;
//     var email2 = document.getElementById('email2').value;
//     var web_site = document.getElementById('web_site').value;
//     var phone_home = document.getElementById('phone_home').value;
//     var phone_cell = document.getElementById('phone_cell').value;
//     var phone_work = document.getElementById('phone_work').value;
//     var address = document.getElementById('address').value;
//     var city = document.getElementById('city').value;
//     var state = document.getElementById('state').value;
//     var zip = document.getElementById('zip').value;
//     var best_time_to_call = document.getElementById('best_time_to_call').value;
//     var can_relocate = document.getElementById('can_relocate').value;
//     var date_available = document.getElementById('date_available').value;
//     var current_employer = document.getElementById('current_employer').value;
//     var current_pay = document.getElementById('current_pay').value;
//     var desired_pay = document.getElementById('desired_pay').value;
//     var source = document.getElementById('source').value;
//     var notes = document.getElementById('notes').value;
//     var key_skills = document.getElementById('key_skills').value;
//     var role = document.getElementById('role').value;

//     let errors = [];
//     $(".errors").html("");

//     if (first_name === "") {
//         errors.push("first_name");
//         $(".first_name_error").html("First name field can't be empty.");
//     }
//     if (middle_name === "") {
//         errors.push("middle_name");
//         $(".middle_name_error").html("Middle name field can't be empty.");
//     }
//     if (last_name === "") {
//         errors.push("last_name");
//         $(".last_name_error").html("Last name field can't be empty.");
//     }

//     if (email1 === "") {
//         errors.push("email1");
//         $(".email1_error").html("Email1 field can't be empty.");
//     }
//     if (email1 != "") {
//         if (
//             /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email1)
//         ) {} else {
//             errors.push("email_notvalid_address_error");
//             $(".email_notvalid_address_error").html(
//                 "Please provide your valid email address."
//             );
//         }
//     }
//     if (email2 === "") {
//         errors.push("email2");
//         $(".email2_error").html("Email2 field can't be empty.");
//     }
//     if (email2 != "") {
//         if (
//             /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email2)
//         ) {} else {
//             errors.push("email2_notvalid_address_error");
//             $(".email2_notvalid_address_error").html(
//                 "Please provide your valid email address."
//             );
//         }
//     }
//     if (web_site === "") {
//         errors.push("web_site");
//         $(".web_site_error").html("web site field can't be empty.");
//     }
//     if (phone_home === "") {
//         errors.push("phone_home");
//         $(".phone_home_error").html("Phone home field can't be empty.");
//     }
//     if (phone_cell === "") {
//         errors.push("phone_cell");
//         $(".phone_cell_error").html("Phone cell field can't be empty.");
//     }

//     if (phone_work === "") {
//         errors.push("phone_work");
//         $(".phone_work_error").html("Phone work field can't be empty.");
//     }
//     if (address === "") {
//         errors.push("address");
//         $(".address_error").html("Address field can't be empty.");
//     }
//     if (city === "") {
//         errors.push("city");
//         $(".city_error").html("City field can't be empty.");
//     }
//     if (state === "") {
//         errors.push("state");
//         $(".state_error").html("State field can't be empty.");
//     }

//     if (zip === "") {
//         errors.push("zip");
//         $(".zip_error").html("postal code field can't be empty.");
//     }
//     if (best_time_to_call === "") {
//         errors.push("best_time_to_call");
//         $(".best_time_to_call_error").html("Best time to call field can't be empty.");
//     }
//     if (can_relocate === "") {
//         errors.push("can_relocate");
//         $(".can_relocate_error").html("Can relocate field can't be empty.");
//     }
//     if (date_available === "") {
//         errors.push("date_available");
//         $(".date_available_error").html("Date available field can't be empty.");
//     }

//     if (current_employer === "") {
//         errors.push("current_employer");
//         $(".current_employer_error").html("Current employer field can't be empty.");
//     }

//     if (current_pay === "") {
//         errors.push("current_pay");
//         $(".current_pay_error").html("Current pay field can't be empty.");
//     }
//     if (desired_pay === "") {
//         errors.push("desired_pay");
//         $(".desired_pay_error").html("Desired pay field can't be empty.");
//     }
//     if (source === "") {
//         errors.push("source");
//         $(".source_error").html("Source field can't be empty.");
//     }
//     if (notes === "") {
//         errors.push("notes");
//         $(".notes_error").html("Notes field can't be empty.");
//     }

//     if (key_skills === "") {
//         errors.push("key_skills");
//         $(".key_skills_error").html("Key skills field can't be empty.");
//     }
//     if (role === "") {
//         errors.push("role");
//         $(".role_error").html("Role field can't be empty.");
//     }

//     if (errors.length > 0) {
//         return false;
//     } else {
//         const formData_submit = new FormData();
//         formData_submit.append("first_name", first_name.trim());
//         formData_submit.append("middle_name", middle_name.trim());
//         formData_submit.append("last_name", last_name.trim());
//         formData_submit.append("email1", email1.trim());
//         formData_submit.append("email2", email2.trim());
//         formData_submit.append("web_site", web_site.trim());
//         formData_submit.append("phone_home", phone_home.trim());
//         formData_submit.append("phone_cell", phone_cell.trim());
//         formData_submit.append("phone_work", phone_work.trim());
//         formData_submit.append("address", address.trim());
//         formData_submit.append("address", address.trim());
//         formData_submit.append("city", city.trim());
//         formData_submit.append("state", state.trim());
//         formData_submit.append("zip", zip.trim());
//         formData_submit.append("best_time_to_call", best_time_to_call.trim());
//         formData_submit.append("can_relocate", can_relocate.trim());
//         formData_submit.append("date_available", date_available.trim());
//         formData_submit.append("current_employer", current_employer.trim());
//         formData_submit.append("current_pay", current_pay.trim());
//         formData_submit.append("desired_pay", desired_pay.trim());
//         formData_submit.append("source", source.trim());
//         formData_submit.append("notes", notes.trim());
//         formData_submit.append("key_skills", key_skills.trim());
//         formData_submit.append("role", role.trim());

//         $.ajaxSetup({
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
//                     "content"
//                 ),
//             },
//         });

//         $.ajax({
//             type: "POST",
//             url: "{{ route('companies.store') }}",
//             dataType: "json",
//             data: formData_submit,
//             contentType: false,
//             processData: false,
//             success: function(response) {
//                 if (response.status == true) {
//                     Swal.fire({
//                         title: response.message,
//                         type: "success",
//                         icon: "success",
//                     }).then(function(result) {
//                         if (result.isConfirmed) {
//                             window.location.href = "{{route('companies.index')}}";
//                         }
//                     });
//                 } else {
//                     Swal.fire({
//                         title: response.message,
//                         icon: "warning",
//                     }).then(function(result) {
//                         if (result.isConfirmed) {

//                         }
//                     });
//                 }
//             },
//             error: function(xhr, status, error) {
//                 // Handle the error scenario
//                 console.error('Error:', error);
//             }
//         });
//     }

// });

$('#addCandidate').click(function() {
    const formData = new FormData();
    const fields = [
        'first_name', 'middle_name', 'last_name', 'email1', 'email2',
        'web_site', 'phone_home', 'phone_cell', 'phone_work', 'address',
        'city', 'state', 'zip', 'best_time_to_call', 'can_relocate',
        'date_available', 'current_employer', 'current_pay', 'desired_pay',
        'source', 'notes', 'key_skills', 'role'
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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "{{ route('companies.store') }}",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    window.location.href = "{{route('companies.index')}}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});
</script>
@endpush