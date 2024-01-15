@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}
</style>
<div class="container">
    <h2>Create New Company</h2>
    <form action="javascript:;" method="post">
        <!-- @csrf -->
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control">
                    <span class="company_name_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Id</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <span class="email_error errors"></span>
                    <span class="email_notvalid_address_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="primary_phone">Primary Phone</label>
                    <input type="text" name="primary_phone" id="primary_phone" class="form-control"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                    <span class="primary_phone_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="secondary_phone">Secondary Phone</label>
                    <input type="text" name="secondary_phone" id="secondary_phone" class="form-control"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                    <span class="secondary_phone_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="fax_number">Fax Number</label>
                    <input type="text" name="fax_number" id="fax_number" class="form-control"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                    <span class="fax_number_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="notes">Misc. Notes</label>
                    <textarea name="notes" id="notes"></textarea>
                    <span class="notes_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="is_hot">Hot Company</label>
                    <input type="checkbox" name="is_hot" id="is_hot" value="1">
                    <span class="is_hot_error errors"></span>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                    <span class="address_error errors"></span>
                </div>


                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control">
                    <span class="city_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" class="form-control">
                    <span class="state_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="zip">Postal Code</label>
                    <input type="text" name="zip" id="zip" class="form-control">
                    <span class="zip_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="web_url">Web Site</label>
                    <input type="text" name="web_url" id="web_url" class="form-control">
                    <span class="web_url_error web_url_invalid_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="key_technologies">Key Technologies</label>
                    <textarea id="key_technologies" name="key_technologies"></textarea>
                    <span class="key_technologies_error errors"></span>
                </div>
            </div>


            <button type="button" id="addNewCompany" class="btn btn-primary">Create Company</button>
    </form>
</div>
@endsection
@push('scripts')


<script>
CKEDITOR.replace('key_technologies');
var editor = CKEDITOR.instances.key_technologies;

CKEDITOR.replace('notes');
var editors = CKEDITOR.instances.notes;
$("#addNewCompany").click(function() {

    var company_name = document.getElementById("company_name").value;
    var email = document.getElementById("email").value;
    var primary_phone = document.getElementById("primary_phone").value;
    var secondary_phone = document.getElementById("secondary_phone").value;
    var fax_number = document.getElementById("fax_number").value;
    var address = document.getElementById("address").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var zip = document.getElementById("zip").value;
    var web_url = document.getElementById("web_url").value;
    var key_technologies = editor.getData();
    var notes = editors.getData();

    let errors = [];
    $(".errors").html("");

    if (company_name === "") {
        errors.push("company_name");
        $(".company_name_error").html("Company name field can't be empty.");
    }

    if (email === "") {
        errors.push("email");
        $(".email_error").html("Email field can't be empty.");
    }
    if (email != "") {
        if (
            /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)
        ) {} else {
            errors.push("email_notvalid_address_error");
            $(".email_notvalid_address_error").html(
                "Please provide your valid email address."
            );
        }
    }
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
    // if (/^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/
    //     .test(web_url)) {
    //    return true;
    // } else {
    //     errors.push("web_url");
    //     $(".web_url_invalid_error").html("web url is invalid.");
    // }
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
        formData_submit.append("company_name", company_name.trim());
        formData_submit.append("email", email.trim());
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
            url: "{{ route('companies.store') }}",
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