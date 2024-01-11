@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}
</style>
<div class="container">
    <h2>Update Company Details</h2>
    <form action="javascript:;" method="post">
        <!-- @csrf -->
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" id="id" value="{{$companyDetails[0]->id}}" class="form-control">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control"
                        value="{{$companyDetails[0]->company_name}}" disabled>
                    <span class="company_name_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ $companyDetails[0]->address }}">
                    <span class="address_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="primary_phone">Primary Phone</label>
                    <input type="text" name="primary_phone" id="primary_phone" class="form-control"
                        value="{{$companyDetails[0]->primary_phone}}">
                    <span class="primary_phone_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="secondary_phone">Secondary Phone</label>
                    <input type="text" name="secondary_phone" id="secondary_phone" class="form-control"
                        value="{{ $companyDetails[0]->secondary_phone }}">
                    <span class="secondary_phone_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="fax_number">Fax Number</label>
                    <input type="text" name="fax_number" id="fax_number" class="form-control"
                        value="{{ $companyDetails[0]->fax_number }}">
                    <span class="fax_number_error errors"></span>
                </div>

                <!-- <input type="text" name="department_name" id="department_name" class="form-control"
                    value="{{ $companyDetails[0]->department_name }}"> -->
                <!-- <div class="form-group">
                    <label for="department_name">Departments</label>
                    <select name="department_name" id="department_name" class="form-control">
                        @foreach($companyDetails[0]['companyDepartment'] as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach -->
                    </select>
                    <!-- <select name="department_name" id="department_name"
                        class="form-control">
                        @foreach($companyDetails[0]['companyDepartment'] as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select> -->
                    <!-- <span class="department_name_error errors"></span>
                </div> -->

                <div class="form-group">
                    <label for="fax_number">Owner</label>
                    <select name="user_name" id="user_name" class="form-control">
                        @foreach($users as $user)
                        <option value="{{$user->id}}" {{$companyDetails[0]->owner == $user->id ? 'selected' : ''}}>
                            {{$user->user_name}}</option>
                        @endforeach
                    </select>
                    <span class="fax_number_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="is_hot">Hot Company</label>
                    <input type="checkbox" name="is_hot" id="is_hot" value="1" value="{{ $companyDetails[0]->is_hot }}">
                    <span class="is_hot_error errors"></span>
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="email">Email Id</label>
                    <input type="text" name="email" id="email" class="form-control"
                        value="{{ $companyDetails[0]->email }}" disabled>
                    <span class="email_error errors"></span>
                    <span class="email_notvalid_address_error errors"></span>
                </div>


                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control"
                        value="{{ $companyDetails[0]->city }}">
                    <span class="city_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" class="form-control"
                        value="{{ $companyDetails[0]->state }}">
                    <span class="state_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="zip">Postal Code</label>
                    <input type="text" name="zip" id="zip" class="form-control" value="{{ $companyDetails[0]->zip }}">
                    <span class="zip_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="web_url">Web Site</label>
                    <input type="text" name="web_url" id="web_url" class="form-control"
                        value="{{ $companyDetails[0]->web_url }}">
                    <span class="web_url_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="key_technologies">Key Technologies</label>
                    <input type="text" name="key_technologies" id="key_technologies" class="form-control"
                        value="{{ $companyDetails[0]->key_technologies }}">
                    <span class="key_technologies_error errors"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="notes">Misc. Notes</label>
                <input type="text" name="notes" id="notes" class="form-control" value="{{ $companyDetails[0]->notes }}">
                <span class="notes_error errors"></span>
            </div>


            <button type="button" id="updateCompany" class="btn btn-primary">Update Company</button>
        </div>
    </form>
</div>
@endsection
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#department_name').select2({
        placeholder: 'Please select a department',
        allowClear: true
        // Add any other options you need here
    });

    $('#department_name').on('select2:unselecting', function(e) {
        var departmentId = e.params.args.data.id;
        // alert(departmentId);
        if (confirm('Are you sure you want to delete this department?')) {

            $.ajax({
                url: "/department/delete/" + departmentId,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });

        }
    });
});



$("#updateCompany").click(function() {
    //var company_name = document.getElementById("company_name").value;
    var id = document.getElementById("id").value;
    // var email = document.getElementById("email").value;
    var primary_phone = document.getElementById("primary_phone").value;
    var secondary_phone = document.getElementById("secondary_phone").value;
    var fax_number = document.getElementById("fax_number").value;
    var address = document.getElementById("address").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var zip = document.getElementById("zip").value;
    var web_url = document.getElementById("web_url").value;
    var key_technologies = document.getElementById("key_technologies").value;
    var notes = document.getElementById("notes").value;

    let errors = [];
    $(".errors").html("");

    // if (company_name === "") {
    //     errors.push("company_name");
    //     $(".company_name_error").html("Company name field can't be empty.");
    // }

    // if (email === "") {
    //     errors.push("email");
    //     $(".email_error").html("Email field can't be empty.");
    // }
    // if (email != "") {
    //     if (
    //         /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)
    //     ) {} else {
    //         errors.push("email_notvalid_address_error");
    //         $(".email_notvalid_address_error").html(
    //             "Please provide your valid email address."
    //         );
    //     }
    // }
    if (primary_phone === "") {
        errors.push("primary_phone");
        $(".primary_phone_error").html("Primary phone field can't be empty.");
    }

    if (secondary_phone === "") {
        errors.push("secondary_phone");
        $(".secondary_phone_error").html(
            "Secondary phone field can't be empty."
        );
    }

    if (fax_number === "") {
        errors.push("name");
        $(".fax_number_error").html("Fax number field can't be empty.");
    }

    if (address === "") {
        errors.push("address");
        $(".address_error").html("Address field can't be empty.");
    }

    if (city === "") {
        errors.push("city");
        $(".city_error").html("City field can't be empty.");
    }

    if (state === "") {
        errors.push("state");
        $(".state_error").html(
            "State  field can't be empty."
        );
    }

    if (zip === "") {
        errors.push("zip");
        $(".zip_error").html("Postal code field can't be empty.");
    }

    if (web_url === "") {
        errors.push("web_url");
        $(".web_url_error").html("web url field can't be empty.");
    }

    if (key_technologies === "") {
        errors.push("key_technologies");
        $(".key_technologies_error").html(
            "Key technologies field can't be empty."
        );
    }
    if (notes === "") {
        errors.push("notes");
        $(".notes_error").html(
            "Notes field can't be empty."
        );
    }


    if (errors.length > 0) {
        return false;
    } else {
        const formData_submit = new FormData();
        formData_submit.append("id", id.trim());
        // formData_submit.append("company_name", company_name.trim());
        // formData_submit.append("email", email.trim());
        formData_submit.append("primary_phone", primary_phone.trim());
        formData_submit.append("secondary_phone", secondary_phone.trim());
        formData_submit.append("fax_number", fax_number.trim());
        formData_submit.append("address", address.trim());
        formData_submit.append("city", city.trim());
        formData_submit.append("state", state.trim());
        formData_submit.append("zip", zip.trim());
        formData_submit.append("web_url", web_url.trim());
        formData_submit.append("key_technologies", key_technologies.trim());
        formData_submit.append("notes", notes.trim());

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        $.ajax({
            type: "POST",
            url: "{{ route('companies.update.save') }}",
            dataType: "json",
            data: formData_submit,
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
                            window.location.href = "{{route('companies.index')}}";
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
                // Handle the error scenario
                console.error('Error:', error);
            }
        });
    }
});
</script>
@endpush