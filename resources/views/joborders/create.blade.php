@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}
</style>
<div class="container">
    <h2>Create Job Order</h2>
    <form action="javascript:;" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <span class="title_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="client_job_id">Client Job ID</label>
                    <input type="text" name="client_job_id" id="client_job_id" class="form-control">
                    <span class="client_job_id_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
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
                    <label for="contact_id">Contact</label>
                    <!-- <input type="text" name="contact_id" id="contact_id" class="form-control"> -->
                    <select name="contact_id" id="contact_id" class="form-control">
                        <!-- <option value="" class="contact_phone">(None)</option> -->
                    </select>
                    <span class="contact_id_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <!-- <input type="text" name="type" id="type" class="form-control"> -->
                    <select name="type" id="type" class="form-control">
                        <option value="C">C (Contract)</option>
                        <option value="C2H">C2H (Contract To Hire)</option>
                        <option value="FL">FL (Freelance)</option>
                        <option value="H">H (Hire)</option>
                    </select>
                    <span class="type_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control">
                    <span class="start_date_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                    <span class="end_date_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="duration" class="form-control" readonly>
                    <span class="duration_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="recruiter">Recruiter</label>
                    <!-- <input type="text" name="recruiter" id="recruiter" class="form-control"> -->
                    <select name="recruiter" id="recruiter" class="form-control">
                        @foreach($users as $data)
                        <option value="{{ $data->id }}">
                            {{ $data->user_name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="recruiter_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="owner">Owner</label>
                    <!-- <input type="text" name="owner" id="owner" class="form-control"> -->
                    <select name="owner" id="owner" class="form-control">
                        @foreach($users as $data)
                        <option value="{{ $data->id }}">
                            {{ $data->user_name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="owner_error errors"></span>
                </div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control">
                    <span class="description_error errors"></span>
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="actual_rate">Actual Rate</label>
                    <input type="text" name="actual_rate" id="actual_rate" class="form-control">
                    <span class="actual_rate_error errors"></span>
                </div>


                <div class="form-group">
                    <label for="expected_candidate">Expected Candidate</label>
                    <input type="text" name="expected_candidate" id="expected_candidate" class="form-control">
                    <span class="expected_candidate_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="enter_bill_rate">Enter Bill Rate</label>
                    <input type="text" name="enter_bill_rate" id="enter_bill_rate" class="form-control"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                    <span class="enter_bill_rate_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="pay_rate">Pay Rate</label>
                    <input type="text" name="pay_rate" id="pay_rate" class="form-control" readonly>
                    <span class="pay_rate_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="salary">salary</label>
                    <input type="text" name="salary" id="salary" class="form-control">
                    <span class="salary_error errors"></span>
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
                    <label for="openings">Openings</label>
                    <input type="text" name="openings" id="openings" class="form-control">
                    <span class="openings_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="max_submission">Max Submissions</label>
                    <!-- <input type="text" name="max_submission" id="max_submission" class="form-control"> -->
                    <select name="max_submission" id="max_submission" class="form-control">
                        <option selected disabled> Select From List</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="5 or more">5 or more</option>
                    </select>
                    <span class="max_submission_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="submission_deadline">Submission Deadline</label>
                    <input type="date" name="submission_deadline" id="submission_deadline" class="form-control">
                    <span class="submission_deadline_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="is_hot">Is Hot</label>
                    <input type="checkbox" name="is_hot" id="is_hot" value="1">
                    <span class="is_hot_error errors"></span>
                </div>
                <div class="form-group">
                    <label for="public">Public</label>
                    <input type="checkbox" name="public" id="public" value="1">
                    <span class="public_error errors"></span>
                </div>

                <div class="form-group">
                    <label for="notes">Notes</label>
                    <input type="text" name="notes" id="notes" class="form-control">
                    <span class="notes_error errors"></span>
                </div>
            </div>


            <button type="button" class="btn btn-primary" id="add_jobOrder_btn">Create Job Order
            </button>
    </form>
</div>
@endsection
@push('scripts')
<script>
CKEDITOR.replace('description');
var editor_description = CKEDITOR.instances.description;

CKEDITOR.replace('notes');
var editor_notes = CKEDITOR.instances.notes;

var enter_bill_rate = $('#enter_bill_rate').val();
var pay_rate = $('#pay_rate').val();
var payRate = '';
// Get the bill rate input element and the max rate input element
var billRateInput = document.getElementById("enter_bill_rate");
    var maxRateInput = document.getElementById("pay_rate");

    // Add an input event listener to the bill rate input
    billRateInput.addEventListener("input", function () {
        // Get the bill rate entered by the user
        var billRate = parseFloat(billRateInput.value);

        if (!isNaN(billRate)) {
            // Calculate the pay rates based on the bill rate
            var payRateC2C = (billRate * 0.8); // C2C rate calculation
            var cost = billRate * 0.22;
            var profitMargin = billRate * 0.1;
            var payRateW2 = billRate - cost - profitMargin; // W2 rate calculation

            // Update the max rate input with the calculated pay rates
            payRate = maxRateInput.value = "C2C $" + payRateC2C.toFixed(2) + " / W2 $" + payRateW2.toFixed(2);
        } else {
            // Clear the max rate input if the bill rate is not a valid number
            payRate = maxRateInput.value = "";
        }
    });


$(document).on('click', '#add_jobOrder_btn', function(e) {
    e.preventDefault(); // Prevent the default form submission
    var companyId = '';
    var companyId = <?php echo json_encode($company_id); ?>;
    // alert(payRate);

    var is_hot = $('#is_hot').is(':checked') ? 1 : 0
    var is_public = $('#public').is(':checked') ? 1 : 0
    var contact_id = $('#contact_id').val();
    var duration = $('#duration').val();

    var description = editor_description.getData();
    var notes = editor_notes.getData();


    const formData = new FormData();
    const fields = [
        'recruiter', 'company_id', 'owner', 'client_job_id',
        'title', 'expected_candidate', 'enter_bill_rate', 'type',
        'salary', 'is_hot', 'openings', 'city', 'state', 'start_date',
        'end_date', 'public', 'actual_rate', 'max_submission',
        'submission_deadline',
    ];


    formData.append('is_hot', is_hot);
    formData.append('is_public', is_public);
    formData.append('description', description);
    formData.append('notes', notes);
    formData.append('contact_id', contact_id);
    formData.append('pay_rate', payRate);
    formData.append('duration', duration);
    let errors = [];

    $(".errors").html("");

    fields.forEach(field => {
        const element = document.getElementById(field);

        if (element) {
            const value = element.value.trim();

            if (value === "") {
                errors.push(field);
                $(`.${field}_error`).html(`${field.replace('_', ' ')} field can't be empty.`);
            }

            formData.append(field, value);
        } else {
            console.error(`Element with ID '${field}' not found.`);
        }
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
        url: '/add/joborder', // Adjust the URL as needed
        type: 'POST',
        data: formData, // Use the FormData object instead of serialize()
        processData: false,
        contentType: false,
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    if (companyId) {
                        window.location.href = "{{ route('companies.details')}}" + '/' +
                            companyId
                    } else {
                        window.location.href = "{{route('joborders.index')}}";
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});

$(document).ready(function() {
    function fetchContacts(companyId) {
        // Clear existing options in contact_id select
        $('#contact_id').empty();

        // Append the "(None)" option
        $('#contact_id').append('<option value="">(None)</option>');

        if (companyId) {
            // Ajax request to fetch data based on the selected company_id
            $.ajax({
                url: "/contacts/details/" + companyId,
                method: 'GET',
                success: function(response) {
                    if (response.status) {
                        // Add new options based on the fetched data
                        $.each(response.data, function(index, contact) {
                            $('#contact_id').append('<option value="' + contact.id + '">' +
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


function calculateDuration() {
    var startDate = new Date(document.getElementById("start_date").value);
    var endDate = new Date(document.getElementById("end_date").value);

    // Calculate the difference in milliseconds
    var timeDifference = endDate - startDate;

    // Calculate the number of days
    var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

    // Calculate the number of months
    var monthsDifference = (endDate.getFullYear() - startDate.getFullYear()) * 12 + (endDate.getMonth() - startDate
        .getMonth());

    document.getElementById("duration").value = daysDifference + " days, " + monthsDifference + " months";
}

// Attach the function to the change event of the date inputs
document.getElementById("start_date").addEventListener("change", calculateDuration);
document.getElementById("end_date").addEventListener("change", calculateDuration);


$(document).on('change', '#checkbox_company_value', function() {
    var companySelect = $('#company_id');

    if ($(this).prop('checked')) {
        // Checkbox is checked, show "Internal Contact" option in the dropdown
        companySelect.append('<option value="0">Internal Contact</option>');
        companySelect.val('0').trigger('change');
    } else {
        // Checkbox is unchecked, remove the "Internal Contact" option
        companySelect.find('option[value="0"]').remove();
        companySelect.trigger('change');
    }

    // Enable/disable the dropdown based on checkbox state
    companySelect.prop('disabled', $(this).prop('checked'));
});

// Function to fetch company data (replace this with your actual fetching logic)
function fetchCompanyData() {
    // Example: assuming an AJAX call to fetch company data
    $.ajax({
        url: '/fetch/company/data', // Replace with your actual route
        method: 'GET',
        success: function(response) {
            if (response.status) {
                // Update the company_id dropdown options based on the fetched data
                companySelect.empty();
                companySelect.append('<option selected disabled>Select Company</option>');
                $.each(response.data, function(index, company) {
                    companySelect.append('<option value="' + company.id + '">' +
                        company.company_name + '</option>');
                });
                companySelect.trigger('change');
            } else {
                console.error('Error fetching company data:', response.message);
            }
        },
        error: function(error) {
            console.error('Error fetching company data:', error);
        }
    });
}
</script>
@endpush