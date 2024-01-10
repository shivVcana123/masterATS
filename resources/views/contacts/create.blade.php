@extends('layouts.admin')
@section('content')

<style>
.errors {
    color: red;
}
</style>
<div class="container">
    <h2>Add Contact</h2>
    <form action="javascript:;" method="post">
        <!-- @csrf -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                    <span class="first_name_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                    <span class="last_name_error errors"></span>
                </div>

                <div class="form-group">
                    <div class="row company-area" style="display: flex; align-items: center;">
                        <div class="col-6">
                            <select name="company_id" id="company_id" class="form-control">
                                <option selected disabled>Select Company</option>
                                @foreach($company as $data)
                                <option value="{{ $data->id }}" {{ $company_id == $data->id ? 'selected' : '' }}>
                                    {{ $data->company_name }}
                                </option>
                                @endforeach
                            </select>


                            <!-- <label for="company_id">Company Name</label>
                            <input type="text" name="company_id" id="company_id" class="form-control"> -->
                            <span class="company_id_error errors"></span>
                        </div>
                        @if($company_id == null)
                        <div class="col-6">
                            <input type="checkbox" name="checkbox_company_value" id="checkbox_company_value" value="0">
                            <label for=""> Internal Contact</label>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_department_id">Departments</label>
                    <input type="text" name="company_department_id" id="company_department_id" class="form-control">
                    <span class="company_department_id_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="phone_work">Work Phone:</label>
                    <input type="text" name="phone_work" id="phone_work" class="form-control">
                    <span class="phone_work_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="phone_cell">Cell Phone:</label>
                    <input type="text" name="phone_cell" id="phone_cell" class="form-control">
                    <span class="phone_cell_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="phone_other">Other Phone:</label>
                    <input type="text" name="phone_other" id="phone_other" class="form-control">
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
                    <input type="text" name="email1" id="email1" class="form-control">
                    <span class="email1_error errors"></span>
                    <span class="email1_notvalid_address_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="email2">2nd E-Mail:</label>
                    <input type="text" name="email2" id="email2" class="form-control">
                    <span class="email2_error errors"></span>
                    <span class="email2_notvalid_address_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="reports_to">Reports to</label>
                    <!-- <input type="text" name="reports_to" id="reports_to" class="form-control"> -->
                    <select name="reports_to" id="reports_to" class="form-control">
                        <!-- <option value="" class="report_none">(None)</option> -->
                    </select>
                    <!-- <span class="reports_to_error errors"></span> -->
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <span class="title_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="address">address</label>
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
            </div>

            <div class="form-group">
                <label for="notes">Misc. Notes</label>
                <input type="text" name="notes" id="notes" class="form-control">
                <span class="notes_error errors"></span>
            </div>


            <button type="button" id="addNewContact" class="btn btn-primary">Create Contact</button>
    </form>
</div>
@endsection
@push('scripts')

<script>
$(document).ready(function() {
    $("#company_id").select2();

});

$(document).on('click', '#checkbox_company_value', function() {
    // Get the Select2 instance for the company_id dropdown
    var companySelect = $('#company_id').select2();

    // Check if the checkbox is checked
    if ($(this).prop('checked')) {
        companySelect.empty();
        companySelect.append('<option value="0">Internal Postings</option>').trigger('change');
        companySelect.prop('disabled', true);
    } else {
        $('#company_id option[value="0"]').remove();
        $(this).prop('disabled', false);
        companySelect.prop('disabled', false);
        companySelect.select2();
    }
});



$(document).ready(function() {
    function fetchContacts(companyId) {
        // Clear existing options in reports_to select
        $('#reports_to').empty();

        // Append the "(None)" option
        $('#reports_to').append('<option value="">(None)</option>');

        if (companyId) {
            // Ajax request to fetch data based on the selected company_id
            $.ajax({
                url: "/contacts/details/" + companyId,
                method: 'GET',
                success: function(response) {
                    if (response.status) {
                        // Add new options based on the fetched data
                        $.each(response.data, function(index, contact) {
                            $('#reports_to').append('<option value="' + contact.id + '">' +
                                contact.first_name + ' ' + contact.last_name +
                                '</option>');
                        });

                        console.log(response.message);
                    } else {
                        console.error('Error fetching contacts:', response.message);
                    }
                },
                error: function(error) {
                    console.error('Error fetching contacts:', error);
                }
            });
        }
    }

    // Initial fetch when the page loads
    fetchContacts($('#company_id').val());

    // Event listener for change in company_id select
    $('#company_id').change(function() {
        var companyId = $(this).val();
        fetchContacts(companyId);
    });
});



$("#addNewContact").click(function() {

    const formData = new FormData();
    const fields = [
        'company_id', 'last_name', 'first_name', 'title', 'email1', 'email2', 'phone_work',
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

    $.ajax({
        type: "POST",
        url: "{{ route('contacts.store') }}",
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