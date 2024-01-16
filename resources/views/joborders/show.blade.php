@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}
</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Job Order Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('joborders.index') }}"> Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-right: 5px;"
                href="{{ url('/companies/update',$jobDetails[0]['companies']->id ) }}"> Edit</a>
        </div>
    </div>
</div>
<table class="detailsOutside" width="100%" height="319">
    <tbody>
        <tr style="vertical-align:top;">
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">Company Name:</td>
                            <td class="data" id="" data-id="{{$jobDetails[0]['companies']->id}}">
                                <a href="{{route('companies.details',$jobDetails[0]['companies']->id)}}">
                                    {{$jobDetails[0]['companies']->company_name}} </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Department:</td>
                            <td class="data">
                                {{$jobDetails[0]['company_department_id']}} </td>
                        </tr>
                        <tr>
                            <td class="vertical">CATS Job ID:</td>
                            <td class="data" width="300">{{$jobDetails[0]->id}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Company Job ID:</td>
                            <td class="data">{{$jobDetails[0]['company_id']}}</td>
                        </tr>
                        <!-- CONTACT INFO -->
                        <tr>
                            <td class="vertical">Contact Name:</td>
                            <td class="data">
                                <a href="index.php?m=contacts&amp;a=show&amp;contactID=-1">{{$jobDetails[0]['contact_id']}}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Contact Phone:</td>
                            <td class="data">{{$jobDetails[0]['contact_id']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Contact Email:</td>
                            <td class="data">
                                <a href="mailto:">email</a>
                            </td>
                        </tr>
                        <!-- /CONTACT INFO -->
                        <tr>
                            <td class="vertical">Location:</td>
                            <td class="data">Address</td>
                        </tr>
                        <tr>
                            <td class="vertical">Pay Rate:</td>
                            <td class="data">120000</td>
                        </tr>
                        <tr>
                            <td class="vertical">Salary:</td>
                            <td class="data">{{$jobDetails[0]['salary']}} </td>
                        </tr>
                        <tr>
                            <td class="vertical">Start Date:</td>
                            <td class="data">{{$jobDetails[0]['start_date']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Expected Candidate Pay Rate:</td>
                            <td class="data">{{$jobDetails[0]['actual_rate']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Start Date:</td>
                            <td class="data">{{$jobDetails[0]['start_date']}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%" height="100%" style="vertical-align:top;">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">Duration:</td>
                            <td class="data">{{$jobDetails[0]['duration']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Openings:</td>
                            <td class="data">{{$jobDetails[0]['openings_available']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Type:</td>
                            <td class="data">{{$jobDetails[0]['type']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Status:</td>
                            <td class="data">{{$jobDetails[0]['status']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Candidates:</td>
                            <td class="data">1</td>
                        </tr>
                        <tr>
                            <td class="vertical">Submitted:</td>
                            <td class="data">{{$jobDetails[0]['submission_deadline']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Days Old:</td>
                            <td class="data">1</td>
                        </tr>
                        <tr>
                            <td class="vertical">Created:</td>
                            <td class="data">{{$jobDetails[0]['created_at']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Recruiter:</td>
                            <td class="data">{{$jobDetails[0]['recruiter']}} </td>
                        </tr>
                        <tr>
                            <td class="vertical">Owner:</td>
                            <td class="data">{{$jobDetails[0]['owner']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">End Date:</td>
                            <td class="data">{{$jobDetails[0]['end_date']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Submission Deadline:</td>
                            <td class="data">{{$jobDetails[0]['submission_deadline']}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Max Submissions:</td>
                            <td class="data">{{$jobDetails[0]['max_submission']}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table><br>
<table class="detailsInside">
    <tbody>
        <tr>
            <td valign="top" class="vertical">Attachments:</td>
            <td valign="top" class="data">
                <table class="attachmentsTable">
                    <tbody>
                        @foreach($jobDetails[0]['attachments'] as $value)
                        <tr>
                            <td><a href="javascript:;" id="documentDownload"
                                    data-id="{{$value->id}}">{{$value->title}}</a></td>
                            <td>&nbsp; &nbsp;{{date("d/m/Y (h:i A)", strtotime($value->date_created))}}</td>
                            <td>&nbsp; &nbsp;<i class="fa fa-trash" id="document_delete_id"
                                    data-value="{{$value->id}}"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><br>
                <form id="document_form" enctype="multipart/form-data" method="POST" style="margin-left: -101px;">

                    <input type="hidden" name="joborder_id" id="joborder_id" value="{{$jobDetails[0]->id}}">
                    <input type="hidden" name="company_id" id="company_id" value="{{$jobDetails[0]->company_id}}">

                    <label for="document_file"> Add Attachment:</label>&nbsp;
                    <input type="file" name="document_file" id="document_file" accept=".pdf, .doc, .docx, .txt">
                    <button type="button" class="btn btn-sm btn-primary" id="submit_file">Submit</button>
                    <br><span class="document_file_error errors"></span>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<div class="form-group col-md-12" style="margin-top: 7px">
    <div class="form-control" style="border-color: transparent;padding-left: 0px">
        <label style="font-size: 18px">Candidate in Job Order</label>
    </div>
    <div class="table-responsive col-md-12">

        <table class="table table-striped table-bordered" id="job_orders_for_candidates">
            <thead class="no-border">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Loc</th>
                    <th>Added</th>
                    <th>Entered By</th>
                    <th>Status</th>
                    <th style="width: 67px">Last Activity </th>
                    <th style="width: 65px">Action</th>
                </tr>
            </thead>
            <tbody id="container" class="no-border-x no-border-y ui-sortable">
                @if(count($candidateDetails) > 0)
                @foreach($candidateDetails as $details)
                <tr>
                    <td>{{$details['candidates']->id}}</td>
                    <td><a
                            href="{{url('/candidates/details',$details['candidates']->id)}}">{{$details['candidates']->first_name}}</a>
                    </td>
                    <td><a
                            href="{{url('/candidates/details',$details['candidates']->id)}}">{{$details['candidates']->last_name}}</a>
                    </td>
                    <td>{{$details['candidates']->state}}</td>
                    <td>
                        {{$details->date_created}}
                    </td>
                    <td>
                        {{$details['ownerUser']->user_name}}
                    </td>
                    <td>{{isset($details['candidateJoborderStatus']->short_description) ? $details['candidateJoborderStatus']->short_description : ''}}
                    </td>
                    <td>{{$details['candidates']->id}}</td>
                    <td>
                        <a href="{{url('/candidates/update',$details['candidates']->id)}}"><i
                                class="fa fa-pencil"></i></a>
                        <a href="javascript:;"> <i class="fa fa-trash" id="candidate_joborders_delete"
                                data-value="{{$details->id}}"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <td colspan="12">No data available</td>
                @endif
            </tbody>
        </table>
        <i class="fa fa-plus"></i><a data-toggle="modal" data-target="#addJobOrderModal" href="javascript:;">Add
            Candidate to This Job Order</a>
    </div>
    <div class="modal fade" id="addJobOrderModal" tabindex="-1" role="dialog" aria-labelledby="addJobOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobOrderModalLabel">Add Candidate to This Job Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="add_new_candidates"
                            onclick="addNewCandidate(this)" checked>
                        <label class="form-check-label" for="flexRadioDefault1" onclick="addNewCandidate(this)">
                            Add New Candidate
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input " type="radio" name="flexRadioDefault">
                        <label class="form-check-label" for="flexRadioDefault2" data-toggle="modal"
                            data-target=".bd-example-modal-lg">
                            Add Existing Candidate
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 150%; margin-left: -22%;">
            <div class="form-group col-md-12" style="margin-top: -15px; margin-left: -5px; padding: 2%;">
                <div class="form-control" style="border-color: transparent;padding-left: 0px">
                    <label style="font-size: 18px">Add Candidate to This Job Order</label>
                </div>
                <div class="buttn-area">
                    <form class="example" action="{{ route('joborders.index') }}">
                        <label for="">Search by Job Title:</label>
                        <input type="text" placeholder="Search.." name="search" value="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>

                    <form class="example" action="{{ route('joborders.index') }}" style="margin-left: 48px;">
                        <label for="">Search by Company Name:</label>
                        <input type="text" placeholder="Search.." name="search" value="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <input type="hidden" id="job_id" value="{{$jobDetails[0]->id}}">

                </div><br>
                <div class="table-responsive col-md-12">
                    <table class="table table-striped table-bordered" id="add_candidates_to_job_order_list">
                        <thead class="no-border">
                            <tr>
                                <th style="width: 67px">ID</th>
                                <th style="width: 67px">First Name </th>
                                <th style="width: 67px">Last Name</th>
                                <th style="width: 67px">Key Skills</th>
                                <th style="width: 67px">Created</th>
                                <th style="width: 67px">Owner </th>
                                <th style="width: 65px">Action</th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <tbody id="container" class="no-border-x no-border-y ui-sortable">
                            @foreach($candidateList as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>
                                    @if(isset($details->candidate_id) && isset($value->id) && $details->candidate_id !=
                                    $value->id)
                                    <a href="javascript:;" onclick="addCandidateOnJobOrder(this)"
                                        data-value="{{ $value->id }}">
                                        {{ $value->first_name }}
                                    </a>
                                    @elseif(isset($value->first_name))
                                    {{ $value->first_name }}
                                    @else
                                    <span>N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if(isset($details->candidate_id) && isset($value->id) && $details->candidate_id !=
                                    $value->id)
                                    <a href="javascript:;" onclick="addCandidateOnJobOrder(this)"
                                        data-value="{{ $value->id }}">
                                        {{ $value->last_name }}
                                    </a>
                                    @elseif(isset($value->last_name))
                                    {{ $value->last_name }}
                                    @else
                                    <span>N/A</span>
                                    @endif
                                </td>
                                <td>{{$value->key_skills}}</td>
                                <td>
                                    {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $value->date_created), 'd m Y') }}
                                </td>
                                <td>@if($value['ownerUser'])
                                    {{ $value['ownerUser']->user_name }}
                                    @else
                                    No associated company
                                    @endif
                                </td>
                                <td>
                                    <i class="fa fa-pencil" data-toggle="modal" data-target="#activityModal"></i>
                                    <i class="fa fa-trash" id="candidate_delete" data-value="{{$value->id}}"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@push('scripts')
<script>
function addCandidateOnJobOrder(that) {
    $('#addJobOrderModal').modal('hide');
    var job_id = $('#job_id').val();
    var candidate_id = $(that).data('value');
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: '/candidates/add/candidate/joborder',
        type: 'POST',
        data: {
            jobID: job_id,
            candidate_id: candidate_id,
        },
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    window.location.href =
                        "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
}

function addNewCandidate(that) {
    window.location.href = "{{ url('/candidates/create', ['job_id' => $jobDetails[0]['id']]) }}";

    $('#addJobOrderModal').modal('hide');
}
$(document).on('click', '#submit_file', function(e) {
    e.preventDefault();
    var joborder_id = $('#joborder_id').val();

    const formData = new FormData();
    const fileInput = $('#document_file')[0];

    let errors = [];
    $(".errors").html("");

    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        formData.append('joborder_id', joborder_id);
        formData.append('document_file', file);
    } else {
        errors.push('document_file');
        $(".document_file_error").html('Please select a document file');
    }

    if (errors.length > 0) {
        return false;
    }


    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: '/document/upload', // Adjust the URL as needed
        type: 'POST',
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
                    window.location.href =
                        "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});

$(document).on('click', '#document_delete_id', function() {

    var documentId = $(this).data('value');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t to delete this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/document/delete/' + documentId,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href =
                                "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                },
            });
        }
    });
});

$(document).on('click', '#documentDownload', function() {
    var documentDownload = $(this).data('id');

    $.ajax({
        url: '/document/download/' + documentDownload,
        type: 'GET',
        success: function(response) {
            console.log(response);
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    window.location.href =
                        "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});

$(document).on('click', '#candidate_joborders_delete', function() {

    var candidate_joborder_id = $(this).data('value');
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t to delete this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/candidate/joborder/delete/' + candidate_joborder_id,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href =
                                "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                },
            });
        }
    });
});
</script>
@endpush