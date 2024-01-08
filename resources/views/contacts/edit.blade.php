@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}
</style>
<div class="container">
    <h2>Update Details</h2>
    <form action="javascript:;" method="POST">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" id="contact_id" name="contact_id" value="{{$contactEditDetails->id}}">

                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                        value="{{$contactEditDetails->first_name}}">
                    <span class="first_name_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                        value="{{$contactEditDetails->last_name}}">
                    <span class="last_name_error errors"></span>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="company_id">Company Name</label>
                            <input type="text" name="company_id" id="company_id" class="form-control"
                                value="{{$contactEditDetails->company_id}}">
                            <span class="company_id_error errors"></span>
                        </div>
                        <div class="col-6" style="margin-top: 30px;">
                            <input type="checkbox" name="" id="">
                            <label for="company_name"> Internal Contact</label>
                            <span class="company_name_error errors"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_department_id">Departments</label>
                    <input type="text" name="company_department_id" id="company_department_id" class="form-control"
                        value="{{$contactEditDetails->company_department_id}}">
                    <span class="company_department_id_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="phone_work">Work Phone:</label>
                    <input type="text" name="phone_work" id="phone_work" class="form-control"
                        value="{{$contactEditDetails->phone_work}}">
                    <span class="phone_work_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="phone_cell">Cell Phone:</label>
                    <input type="text" name="phone_cell" id="phone_cell" class="form-control"
                        value="{{$contactEditDetails->phone_cell}}">
                    <span class="phone_cell_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="phone_other">Other Phone:</label>
                    <input type="text" name="phone_other" id="phone_other" class="form-control"
                        value="{{$contactEditDetails->phone_other}}">
                    <span class="phone_other_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="is_hot">Hot Contact</label>
                    <input type="checkbox" name="is_hot" id="is_hot" value="1">
                    <span class="is_hot_error errors"></span>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email1">email1 Id</label>
                    <input type="text" name="email1" id="email1" class="form-control"
                        value="{{$contactEditDetails->email1}}">
                    <span class="email1_error errors"></span>
                    <span class="email1_notvalid_address_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="email2">2nd E-Mail:</label>
                    <input type="text" name="email2" id="email2" class="form-control"
                        value="{{$contactEditDetails->email2}}">
                    <span class="email2_error errors"></span>
                    <span class="email2_notvalid_address_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{$contactEditDetails->title}}">
                    <span class="title_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="reports_to">Reports to</label>
                    <input type="text" name="reports_to" id="reports_to" class="form-control"
                        value="{{$contactEditDetails->reports_to}}">
                    <span class="reports_to_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{$contactEditDetails->address}}">
                    <span class="address_error errors"></span>
                </div>


                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{$contactEditDetails->city}}">
                    <span class="city_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" class="form-control"
                        value="{{$contactEditDetails->state}}">
                    <span class="state_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="zip">Postal Code</label>
                    <input type="text" name="zip" id="zip" class="form-control" value="{{$contactEditDetails->zip}}">
                    <span class="zip_error errors"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="notes">Misc. Notes</label>
                <input type="text" name="notes" id="notes" class="form-control" value="{{$contactEditDetails->notes}}">
                <span class="notes_error errors"></span>
            </div>
            <button type="button" id="update_btn" class="btn btn-primary">Create Contact</button>
    </form>
</div>
@endsection
@push('scripts')

<script>
$("#update_btn").click(function() {

 

    const formData = new FormData();
    const fields = [
        'contact_id', 'company_id', 'last_name', 'first_name', 'title', 'email1', 'email2', 'phone_work',
        'phone_cell', 'phone_other', 'address', 'city', 'state', 'zip', 'is_hot', 'notes',
        'company_department_id', 'reports_to'
    ];

    let errors = [];

    $(".errors").html("");

    fields.forEach(field => {
        const value = document.getElementById(field).value.trim();

        if (value === "") {
            errors.push(field);
            $(`.${field}_error`).html(`${field.replace('_', ' ')} field can't be empty.`);
        }

        if (field.startsWith('email1') && value !== "") {
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
    var contactId = $('#contact_id').val();
    $.ajax({
        type: "POST",
        url: '/contacts/update',
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
                    window.location.href = "{{route('contacts.index')}}";
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