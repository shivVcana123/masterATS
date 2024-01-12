@extends('layouts.admin')

@section('content')

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
                    <h5>{{ __('Update JobOrder Details') }}</h5>
                </div>
                <div class="card-body col-md-12">
                    <form action="javascript:;" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" id="jobOrder_id" name="jobOrder_id" value="{{$jobDetails[0]->id}}">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{$jobDetails[0]->title}}">
                                    <span class="title_error errors"></span>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="contact_id">Contact Id</label>
                                    <input type="text" name="contact_id" id="contact_id" class="form-control"
                                        value="{{$jobDetails[0]->contact_id}}">
                                    <span class="contact_id_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="company_id">Company Id</label>
                                    <input type="text" name="company_id" id="company_id" class="form-control"
                                        value="{{$jobDetails[0]->company_id}}">
                                    <span class="company_id_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="client_job_id">Client Job ID</label>
                                    <input type="text" name="client_job_id" id="client_job_id" class="form-control"
                                        value="{{$jobDetails[0]->client_job_id}}">
                                    <span class="client_job_id_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="recruiter">Recruiter</label>
                                    <input type="text" name="recruiter" id="recruiter" class="form-control"
                                        value="{{$jobDetails[0]->recruiter}}">
                                    <span class="recruiter_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control"
                                        value="{{$jobDetails[0]->type}}">
                                    <span class="type_error errors"></span>
                                </div> -->

                                <div class="form-group">
                                    <label for="client_job_id">Client Job ID</label>
                                    <input type="text" name="client_job_id" id="client_job_id" class="form-control"
                                        value="{{$jobDetails[0]->client_job_id}}">
                                    <span class="client_job_id_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <div class="row company-area" style="display: flex; align-items: center;">
                                        <div class="col-6">
                                            <select name="company_id" id="company_id" class="form-control">
                                                <option selected disabled>Select Company</option>
                                                @foreach($company as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $jobDetails[0]->company_id == $data->id ? 'selected' : '' }}>
                                                    {{ $data->company_name }}
                                                </option>
                                                @endforeach
                                            </select>


                                            <!-- <label for="company_id">Company Name</label>
                            <input type="text" name="company_id" id="company_id" class="form-control"> -->
                                            <span class="company_id_error errors"></span>
                                        </div>
                                        @if($jobDetails[0]->company_id == null)
                                        <div class="col-6">
                                            <input type="checkbox" name="checkbox_company_value"
                                                id="checkbox_company_value" value="0">
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
                                    <label for="type">Type</label>
                                    <!-- <input type="text" name="type" id="type" class="form-control"> -->
                                    <select name="type" id="type" class="form-control">
                                        <option value="C" {{$jobDetails[0]->type == 'C' ? 'selected' : ''}}>C (Contract)
                                        </option>
                                        <option value="C2H" {{$jobDetails[0]->type == 'C2H' ? 'selected' : ''}}>C2H
                                            (Contract To Hire)</option>
                                        <option value="FL" {{$jobDetails[0]->type == 'FL' ? 'selected' : ''}}>FL
                                            (Freelance)</option>
                                        <option value="H" {{$jobDetails[0]->type == 'H' ? 'selected' : ''}}>H (Hire)
                                        </option>
                                    </select>
                                    <span class="type_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="{{$jobDetails[0]->start_date}}">
                                    <span class="start_date_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                        value="{{$jobDetails[0]->end_date}}">
                                    <span class="end_date_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration" id="duration" class="form-control"
                                        value="{{$jobDetails[0]->duration}}">
                                    <span class="duration_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="rate_max">Rate Max</label>
                                    <input type="text" name="rate_max" id="rate_max" class="form-control"
                                        value="{{$jobDetails[0]->rate_max}}">
                                    <span class="rate_max_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="salary">salary</label>
                                    <input type="text" name="salary" id="salary" class="form-control"
                                        value="{{$jobDetails[0]->salary}}">
                                    <span class="salary_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="expected_rate">Expected Rate</label>
                                    <input type="text" name="expected_rate" id="expected_rate" class="form-control"
                                        value="{{$jobDetails[0]->expected_rate}}">
                                    <span class="expected_rate_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="actual_rate">Actual Rate</label>
                                    <input type="text" name="actual_rate" id="actual_rate" class="form-control"
                                        value="{{$jobDetails[0]->actual_rate}}">
                                    <span class="actual_rate_error errors"></span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expected_rate">Expected Rate</label>
                                    <input type="text" name="expected_rate" id="expected_rate" class="form-control"
                                        value="{{$jobDetails[0]->expected_rate}}">
                                    <span class="expected_rate_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="interview_type">Interview Type</label>
                                    <input type="text" name="interview_type" id="interview_type" class="form-control"
                                        value="{{$jobDetails[0]->interview_type}}">
                                    <span class="interview_type_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="submission_deadline">Submission Deadline</label>
                                    <input type="date" name="submission_deadline" id="submission_deadline"
                                        class="form-control" value="{{$jobDetails[0]->submission_deadline}}">
                                    <span class="submission_deadline_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" name="status" id="status" class="form-control"
                                        value="{{$jobDetails[0]->status}}">
                                    <span class="status_error errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="openings">Openings</label>
                                    <input type="text" name="openings" id="openings" class="form-control"
                                        value="{{$jobDetails[0]->openings}}">
                                    <span class="openings_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{$jobDetails[0]->city}}">
                                    <span class="city_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" class="form-control"
                                        value="{{$jobDetails[0]->state}}">
                                    <span class="state_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="openings_available">Openings Available</label>
                                    <input type="text" name="openings_available" id="openings_available"
                                        class="form-control" value="{{$jobDetails[0]->openings_available}}">
                                    <span class="openings_available_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="questionnaire_id">Questionnaire_id</label>
                                    <input type="text" name="questionnaire_id" id="questionnaire_id"
                                        class="form-control" value="{{$jobDetails[0]->questionnaire_id}}">
                                    <span class="questionnaire_id_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="interview_type">Interview Type</label>
                                    <input type="text" name="interview_type" id="interview_type" class="form-control"
                                        value="{{$jobDetails[0]->interview_type}}">
                                    <span class="interview_type_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="work_arrangement">Work Arrangement</label>
                                    <input type="text" name="work_arrangement" id="work_arrangement"
                                        class="form-control" value="{{$jobDetails[0]->work_arrangement}}">
                                    <span class="work_arrangement_error errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="gross_margin">Gross Margin</label>
                                    <input type="text" name="gross_margin" id="gross_margin" class="form-control"
                                        value="{{$jobDetails[0]->gross_margin}}">
                                    <span class="gross_margin_error errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="is_hot">Is Hot</label>
                                    <input type="checkbox" name="is_hot" id="is_hot">
                                    <span class="is_hot_error errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="public">Public</label>
                                    <input type="checkbox" name="public" id="public">
                                    <span class="public_error errors"></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    value="{{$jobDetails[0]->description}}">
                                <span class="description_error errors"></span>
                            </div>

                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <input type="text" name="notes" id="notes" class="form-control"
                                    value="{{$jobDetails[0]->notes}}">
                                <span class="notes_error errors"></span>
                            </div>
                            <button type="button" class="btn btn-primary" id="update_jobOrder_btn">Update Job Order
                                Details</button>
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
<script>
$(document).on('click', '#update_jobOrder_btn', function(e) {
    e.preventDefault(); // Prevent the default form submission
    var companyId = '';
    var companyId = <?php echo json_encode($jobDetails[0]->company_id); ?>;

    const formData = new FormData();
    const fields = [
        'jobOrder_id', 'recruiter', 'company_id', 'entered_by', 'owner', 'site_id',
        'client_job_id', 'title', 'description', 'notes', 'type', 'duration', 'rate_max', 'salary',
        'status', 'openings', 'city', 'state', 'start_date', 'end_date', 'date_created',
        'date_modified', 'company_department_id', 'is_admin_hidden', 'openings_available',
        'questionnaire_id', 'import_id', 'actualrate', 'actual_rate', 'gross_margin', 'expected_rate',
        'max_submission', 'interview_type', 'submission_deadline', 'work_arrangement', 'p', '_token',
    ];

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
        url: '/joborder/update/save', // Adjust the URL as needed
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
                    if(companyId){
                        window.location.href = "{{route('companies.details')}}"+'/'+companyId;
                    }else{
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
</script>
@endpush