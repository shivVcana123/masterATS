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
                            <td class="data" id="" data-id="{{$jobDetails[0]['id']}}">
                                <a href="{{route('companies.index')}}">
                                    {{$jobDetails[0]['title']}} </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Department:</td>
                            <td class="data">
                                {{$jobDetails[0]['company_department_id']}} </td>
                        </tr>
                        <tr>
                            <td class="vertical">CATS Job ID:</td>
                            <td class="data" width="300">{{$jobDetails[0]['client_job_id']}}</td>
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
                @foreach($jobDetails as $details)
                <tr>
                    <td>{{$details->id}}</td>
                    <td>3232</td>
                    <td data-id="" id="joborderDetails_id"><a href=""></a>
                    </td>
                    <td><a href=""></a>
                    </td>
                    <td>
                    </td>
                    <td>

                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <i class="fa fa-pencil" id="Activity" value="Activity"></i>
                        <i class="fa fa-trash" id="candidate_joborders_delete" data-value="{{$details->id}}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <i class="fa fa-plus"></i><a href="{{ url('/candidates/create', ['job_id' => $jobDetails[0]['id']]) }}">Add Candidate to This Job Order</a>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@push('scripts')
<script>
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
</script>
@endpush