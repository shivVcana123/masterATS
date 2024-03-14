@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}

.regarding-area {

    display: flex;
}

.mail-area {

    display: flex;
}

.hours-area {
    position: relative;
    display: flex;
    flex-wrap: nowrap;
    width: 100%;
    flex-direction: row;
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
                            <td class="data" id="companyName"
                                data-details="{{$jobDetails[0]['companies']->company_name}}"
                                data-id="{{$jobDetails[0]['companies']->id}}">
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
                            <td class="data">{{date("d-m-Y", strtotime($jobDetails[0]['start_date']))}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Expected Candidate Pay Rate:</td>
                            <td class="data">{{$jobDetails[0]['actual_rate']}}</td>
                        </tr>
                        <!-- <tr>
                            <td class="vertical">Start Date:</td>
                            <td class="data">{{$jobDetails[0]['start_date']}}</td>
                        </tr> -->
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
                            <td class="data">{{date("d-m-Y (h:i A)", strtotime($jobDetails[0]['created_at']))}}
                                ({{$jobDetails[0]['ownerUser']->user_name}})</td>
                        </tr>
                        <tr>
                            <td class="vertical">Recruiter:</td>
                            <td class="data">{{$jobDetails[0]['recruiterUser']->user_name}} </td>
                        </tr>
                        <tr>
                            <td class="vertical">Owner:</td>
                            <td class="data">{{$jobDetails[0]['ownerUser']->user_name}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">End Date:</td>
                            <td class="data">{{date("d-m-Y", strtotime($jobDetails[0]['end_date']))}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Submission Deadline:</td>
                            <td class="data">{{date("d-m-Y", strtotime($jobDetails[0]['submission_deadline']))}}</td>
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
                            <td>&nbsp; &nbsp;{{date("d-m-Y (h:i A)", strtotime($value->date_created))}}</td>
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
                @if(count($candidatesJobOrderDetails) > 0)
                @foreach($candidatesJobOrderDetails as $key => $details)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @if($details['candidates'])
                        <a href="{{route('candidates.details', $details['candidates']->id)}}">
                            {{$details['candidates']->first_name}}
                        </a>
                        @else
                        Candidate not found
                        @endif
                    </td>
                    <td>
                        @if($details['candidates'])
                        <a href="{{route('candidates.details', $details['candidates']->id)}}">
                            {{$details['candidates']->last_name}}
                        </a>
                        @else
                        Candidate not found
                        @endif
                    </td>
                    <td>@if($details['candidates'])
                {{$details['candidates']->state}}
            @else
                N/A
            @endif</td>
                    <td>
                        {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_created), 'd-m-Y') }}
                    </td>
                    <td>
                        {{$details['ownerUser']->user_name}}
                    </td>
                    <td>{{isset($details['candidateJoborderStatus']->short_description) ? $details['candidateJoborderStatus']->short_description : 'No Contact'}}
                    </td>
                    <td>{{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_created), 'd-m-Y') }}
                        ({{$details['ownerUser']->user_name}})</td>
                    <td>
                        <a href="javascript:;"><i class="fa fa-pencil" data-toggle="modal"
                                data-target="#activityModal"></i></a>
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
                    <button style="margin-left: 70%;" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                            @php
                            $matchFound = false;
                            @endphp
                            @foreach($candidatesJobOrderDetails as $details)
                            @if(isset($details->candidate_id) && isset($value->id) && $details->candidate_id ==
                            $value->id)
                            @php
                            $matchFound = true;
                            @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>
                                    @if($matchFound)
                                    {{ $value->first_name }}
                                    @else
                                    <a href="javascript:;" onclick="addCandidateOnJobOrder(this)"
                                        data-value="{{ $value->id }}">
                                        {{ $value->first_name }}
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if($matchFound)
                                    {{ $value->last_name }}
                                    @else
                                    <a href="javascript:;" onclick="addCandidateOnJobOrder(this)"
                                        data-value="{{ $value->id }}">
                                        {{ $value->last_name }}
                                    </a>
                                    @endif
                                </td>
                                <td>{{$value->key_skills}}</td>
                                <td>
                                    {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $value->date_created), 'd-m-Y') }}
                                </td>
                                <td>
                                    @if($value['ownerUser'])
                                    {{ $value['ownerUser']->user_name }}
                                    @else
                                    No associated company
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/candidates/details',$value->id)}}"><i class="fa fa-eye"></i></a>
                                    <!-- <i class="fa fa-pencil" data-toggle="modal" data-target="#activityModal"></i>
                                    <i class="fa fa-trash" id="candidate_delete" data-value="{{$value->id}}"></i> -->
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
<div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 149%; margin-left: -90px;">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Candidates: Log Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post">
                <div class="modal-body">
                    <fieldset class="form-group">
                        <div class="container">
                            <div class="activity-area">
                                <div class="mail-area">
                                    <label for="">Regarding:</label>

                                    <input type="hidden" id="jobOrderTitle"
                                        value="{{(isset($details['joborderDetails']->title) ? $details['joborderDetails']->title : '')}}">
                                    <input type="hidden" id="jobOrderId"
                                        value="{{(isset($details['joborderDetails']->id) ? $details['joborderDetails']->id : '')}}">
                                    <input type="hidden" id="candidateName"
                                        value="{{isset($candidatesJobOrderDetails[0]['candidates']->first_name) ? $candidatesJobOrderDetails[0]['candidates']->first_name : ''}} {{isset($candidatesJobOrderDetails[0]['candidates']->last_name) ? $candidatesJobOrderDetails[0]['candidates']->last_name : ''}}">
                                    <input type="hidden" id="candidateDateTime"
                                        value="{{ isset($candidatesJobOrderDetails[0]->date_created) ? date('d-m-Y (h:i A)', strtotime($candidatesJobOrderDetails[0]->date_created)) : '' }}">

                                    <input type="hidden" id="candidateJoborderStatus" value="">
                                    <input type="hidden" id="ownerName"
                                        value="{{isset($candidatesJobOrderDetails[0]['ownerUser']->user_name) ? $candidatesJobOrderDetails[0]['ownerUser']->user_name : ''}}">


                                    <p style="margin-left: 50px;">
                                        {{(isset($details['joborderDetails']->title) ? $details['joborderDetails']->title : '')}}
                                    </p>
                                    <div class="checkbox-mail-area">
                                        <input class="form-check-input" type="checkbox" id="checkbox_mail_send_item"
                                            name="checkbox_mail_send_item" style="margin-left: 30px;" value="1">
                                        <label class="form-check-label" for="checkbox_mail_send_item">
                                            Send E-Mail Notification to Candidate
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-2">Status:</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkbox_status_change"
                                                onchange="checkboxStatusChange(this)">
                                            <label class="form-check-label" for="checkbox_status_change">
                                                Change Status
                                            </label>
                                            <br>
                                            <select id="change_status_item" name="change_status_item" class="inputbox"
                                                style="width: 150px;" onchange="jobStatusChange(this)">
                                                <option selected disabled>Select a Status</option>
                                                @foreach($changeStatus as $details)
                                                <option value="{{$details->id}}">{{$details->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="change_status_item_error errors"></span>
                                    </div>
                                </div>
                                <div class="regarding-area">
                                    <label for="">E-Mail</label>
                                    <div style="margin-left: 80px;">
                                        <p> Custom Message</p>
                                        <textarea style="height:135px; width:375px; margin-top: -14px;"
                                            name="customMessage" id="customMessage" cols="50"
                                            class="inputbox"></textarea>
                                    </div>
                                </div><br>

                                <div class="form-group row">
                                    <div class="col-sm-2">Activity:</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkbox_activity"
                                                onchange="checkboxActivity(this)">
                                            <label class="form-check-label" for="checkbox_activity">
                                                Log an Activity
                                            </label>
                                            <br>

                                            <label for="select_checkbox_activity">Activity Type:</label>
                                            <br>
                                            <select id="select_checkbox_activity" name="select_checkbox_activity">
                                                <option selected disabled>Select Activity Type</option>
                                                @foreach($activityType as $details)
                                                <option value="{{$details->id}}">{{$details->short_description}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="select_checkbox_activity_error errors"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-10" style="margin-left: 115px;">
                                        <label for="activity_type_description">Activity Type:</label>
                                        <br>
                                        <textarea name="activity_type_description" id="activity_type_description"
                                            cols="30"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Schedule:</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox_schedule"
                                            onchange="checkboxScheduleEvent(this)">
                                        <label class="form-check-label" for="checkbox_schedule">
                                            Schedule Event
                                        </label>
                                        <br>
                                        <!-- <label for="">Regarding:</label> -->
                                        <div class="schedule-event-area">
                                            <select id="schedule_event_type" name="schedule_event_type">
                                                <option selected disabled>Select Event Type</option>
                                                @foreach($calendarEvenType as $details)
                                                <option value="{{$details->id}}">{{$details->short_description}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <br><br>
                                            <div class="month-area"
                                                style="display: flex; flex-direction: row; align-items: center;">
                                                <div class="form-group">
                                                    <label for="monthPicker">Select Month:</label>
                                                    <div class="input-group">
                                                        <select id="monthDropdown" name="month">
                                                            @for ($month = 1; $month <= 12; $month++) <option
                                                                value="{{ $month }}">
                                                                {{ date('M', mktime(0, 0, 0, $month, 1)) }}
                                                                </option>
                                                                @endfor
                                                        </select>

                                                        <select name="date" id="dateDropdown"
                                                            style="width: 50px;"></select>

                                                        <input type="text" name="year" id="year" style="width: 15%;"
                                                            value="{{ substr(date('Y'), -2) }}" id="year">

                                                        <input type="date" name="calendar_date" id="calendar_date"
                                                            style="margin-left: 10px; padding: 0px; width: 5%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <br> -->
                                            <div class="time-area" style="display: flex; flex-direction: row;">
                                                <div class="form-group">
                                                    <fieldset class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="hoursRadios" id="hoursRadios1"
                                                                        value="Hours" onclick="hoursRadios1(this)"
                                                                        checked>
                                                                    <div class="input-group hours-area">
                                                                        <select id="hours" name="hours">
                                                                            @for ($hour = 1; $hour <= 12; $hour ++)
                                                                                <option value="{{ $hour  }}">
                                                                                {{$hour}}
                                                                                </option>
                                                                                @endfor
                                                                        </select>

                                                                        <select id="minutes" name="minutes">
                                                                            <option value="00">00</option>
                                                                            <option value="15">15</option>
                                                                            <option value="30">30</option>
                                                                            <option value="45">45</option>
                                                                        </select>

                                                                        <select id="day_am_pm" name="day_am_pm">
                                                                            <option value="AM">AM</option>
                                                                            <option value="PM">PM</option>
                                                                        </select>

                                                                        <!-- <div class="length-area"> -->
                                                                        <label for=""
                                                                            style="margin-left: 141px;">Length:</label>
                                                                        <select id="length_hours" name="length_hours">
                                                                            <option value="15">15 minuts</option>
                                                                            <option value="30">30 minuts</option>
                                                                            <option value="45">45 minuts</option>
                                                                            <option value="1" checked>1 hours</option>
                                                                            <option value="1.5">1.5 hours</option>
                                                                            <option value="2">2 hours</option>
                                                                            <option value="3">3 hours</option>
                                                                            <option value="4">4 hours</option>
                                                                            <option value="more">More then 4 hours
                                                                            </option>

                                                                        </select>
                                                                        <!-- </div> -->

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                            </div>

                                            <!-- <br> -->
                                            <div class="time-area"
                                                style="display: flex; flex-direction: row; margin-top: -23px;">
                                                <div class="form-group">
                                                    <fieldset class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="all_day_radios" id="all_day_radios"
                                                                        onclick="allDayRadios(this)" value="All Days">
                                                                    <div class="input-group">
                                                                        All Day / No Specific Time
                                                                    </div>
                                                                </div>
                                                                <input type="checkbox" name="public_entry"
                                                                    id="public_entry" value="1">
                                                                Public Entry
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="length-area"
                                                    style="margin-left: 205px; display: grid; align-items: center; align-content: center;">
                                                    <label for="">Description:</label>
                                                    <textarea name="length_description" id="length_description"
                                                        cols="30"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_activity_btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@push('scripts')
<script>
// $('#activityModal').modal('show');
$('.checkbox-mail-area').hide();
$('.schedule-event-area').hide();
$('.regarding-area').hide();
$('#change_status_item').prop('disabled', true);
$('#select_checkbox_activity').prop('disabled', true)

function checkboxStatusChange(element) {
    if ($(element).prop('checked') === true) {
        $('#change_status_item').prop('disabled', false).on('click');
    } else {
        $('#change_status_item').prop('disabled', true).off('click');
    }
}
var dataId = '';

function jobStatusChange(element) {
    $('#activity_type_description').html('');
    dataId = element.value;
    var selectedText = element.options[dataId].text;
    var html = '';

    if (dataId == '1' || dataId == '8') {
        $('.checkbox-mail-area').hide();
    } else {
        $('.checkbox-mail-area').show();
    }
    if (dataId == '5' || dataId == '6' || dataId == '7' || dataId == '10') {
        $('.regarding-area').show();
        emailTemplate(dataId, selectedText);
        $('#checkbox_mail_send_item').prop('checked', true)
    } else {
        $('#checkbox_mail_send_item').prop('checked', false)
        $('.regarding-area').hide();
    }

    html = "Change Status :" + selectedText;
    $('#activity_type_description').append(html);
}


function emailTemplate(dataId, selectedText) {
    var jobTitle = $('#jobOrderTitle').val();
    var comoanyName = $('#companyName').data('details');
    var candidateName = $('#candidateName').val();
    var candidateDateTime = $('#candidateDateTime').val();
    var oldStatus = $('#candidateJoborderStatus').val();
    var newStatus = selectedText;
    var owner = $('#ownerName').val();

    var template = '* Auto-generated message. Please DO NOT reply *\n' +
        '' + candidateDateTime + '\n\n' +
        'Dear ' + candidateName + ',\n\n' +
        'This E-Mail is a notification that your status in our database has been changed for the position ' + jobTitle +
        ' ' + '(' + comoanyName + ').\n\n' +
        'Your previous status was ' + oldStatus + '.\n' +
        'Your new status is ' + newStatus + '.\n\n' +
        'Take care,\n' +
        '' + owner + '\n' +
        'xyber-it.com';

    // Append the template to the textarea value
    $('#customMessage').val(function(index, currentValue) {
        return currentValue + template;
    });
}


function checkboxActivity(element) {
    if ($(element).prop('checked') === true) {
        $('#select_checkbox_activity').prop('disabled', false).on('click');
    } else {
        $('#select_checkbox_activity').prop('disabled', true).off('click');
    }
}

function checkboxScheduleEvent(element) {
    if ($(element).prop('checked') === true) {
        $('.schedule-event-area').show().on('click');
    } else {
        $('.schedule-event-area').hide().off('click');
    }
}


var job_id = $('#job_id').val();

function addCandidateOnJobOrder(that) {
    $('#addJobOrderModal').modal('hide');
    var candidate_id = $(that).data('value');
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "{{route('candidates.add.candidate.joborder')}}",
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
                    // window.location.href =
                    //     "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                    window.location.href = "{{route('joborders.details')}}" + '/' +
                        job_id;
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
}

function addNewCandidate(that) {
    $('#addJobOrderModal').modal('hide');
    // window.location.href = "{{ url('/candidates/create', ['job_id' => $jobDetails[0]['id']]) }}";
    window.location.href = "{{route('candidates.create')}}" + '/' +
        job_id;

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
        url: "{{route('document.upload')}}", // Adjust the URL as needed
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
                    // window.location.href =
                    //     "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                    window.location.href = "{{route('joborders.details')}}" + '/' +
                        job_id;
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
                url: "{{route('document.delete')}}" + '/' + documentId,
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
                            // window.location.href =
                            //     "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                            window.location.href =
                                "{{route('joborders.details')}}" + '/' +
                                job_id;
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

// Document download
$(document).on('click', '#documentDownload', function() {
    var documentDownload = $(this).data('id');

    var url = "{{route('document.download')}}" + '/' + documentDownload;
    window.open(url, '_blank'); // Open the download link in a new tab
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
                url: "{{route('candidate.joborder.delete')}}" + '/' + candidate_joborder_id,
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
                            // window.location.href =
                            //     "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                            window.location.href =
                                "{{route('joborders.details')}}" + '/' +
                                job_id;
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


function hoursRadios1(element) {
    if ($(element).prop('checked') === true) {
        $('#all_day_radios').prop('checked', false);
        $('#hours').prop('disabled', false);
        $('#minutes').prop('disabled', false);
        $('#day_am_pm').prop('disabled', false);
        $('#length_hours').prop('disabled', false);
    }
}

function allDayRadios(element) {
    if ($(element).prop('checked') === true) {
        $('#hoursRadios1').prop('checked', false);
        $('#hours').prop('disabled', true);
        $('#minutes').prop('disabled', true);
        $('#day_am_pm').prop('disabled', true);
        $('#length_hours').prop('disabled', true);
    }
}

function updateDateDropdown() {
    var month = document.getElementById('monthDropdown').value;
    var year = document.getElementById('year').value;
    var daysInMonth = new Date(year, month, 0).getDate();

    var dateDropdown = document.getElementById('dateDropdown');
    dateDropdown.innerHTML = '';

    for (var day = 1; day <= daysInMonth; day++) {
        var option = document.createElement('option');
        option.value = day;
        option.text = day;
        dateDropdown.add(option);
    }
}

var currentDate = new Date();
document.getElementById('monthDropdown').value = currentDate.getMonth() + 1;
document.getElementById('year').value = currentDate.getFullYear();
document.getElementById('calendar_date').valueAsDate = currentDate;

// Set the initial value for the date dropdown to the current day
var currentDay = currentDate.getDate();
document.getElementById('dateDropdown').value = currentDay;

document.getElementById('monthDropdown').addEventListener('change', updateDateDropdown);
document.getElementById('year').addEventListener('input', updateDateDropdown);

// Initialize date dropdown on page load
updateDateDropdown();

// $(document).on('click', '#save_activity_btn', function() {
//     var jobOrderId = $('#jobOrderId').val();
//     // var joborder_item = $('#joborder_item').val();
//     var candidate_joborder_status_type = dataId;
//     var select_checkbox_activity = $('#select_checkbox_activity').val();
//     var activity_type_description = $('#activity_type_description').val();
//     var schedule_event_type = $('#schedule_event_type').val();
//     var monthDropdown = $('#monthDropdown').val();
//     var dateDropdown = $('#dateDropdown').val();
//     var year = $('#year').val();
//     var title = $('#title').val();
//     var hours = $('#hours').val();
//     var minutes = $('#minutes').val();
//     var day_am_pm = $('#day_am_pm').val();
//     var length_hours = $('#length_hours').val();
//     var length_description = $('#length_description').val();
//     var customMessage = $('#customMessage').val();
//     var checkbox_mail_send_item = $('#checkbox_mail_send_item').is(':checked') ? 1 : 0;
//     var public_entry = $('#public_entry').is(':checked') ? 1 : 0;
//     // alert(checkbox_mail_send_item);

//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//     });

//     $.ajax({
//         url: '/candidates/activity/save',
//         type: 'POST',
//         data: {
//             joborder_item: jobOrderId,
//             change_status_item: change_status_item,
//             select_checkbox_activity: select_checkbox_activity,
//             activity_type_description: activity_type_description,
//             schedule_event_type: schedule_event_type,
//             monthDropdown: monthDropdown,
//             dateDropdown: dateDropdown,
//             year: year,
//             title: title,
//             hours: hours,
//             minutes: minutes,
//             day_am_pm: day_am_pm,
//             length_hours: length_hours,
//             length_description: length_description,
//             customMessage: customMessage,
//             checkbox_mail_send_item: checkbox_mail_send_item,
//         },
//         success: function(response) {
//             const title = response.status ? "success" : "warning";
//             Swal.fire({
//                 title: response.message,
//                 type: title,
//                 icon: title,
//             }).then(function(result) {
//                 if (result.isConfirmed && response.status) {
//                     $('#exampleModal').modal('hide');
//                     window.location.href =
//                         "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
//                 }
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//         },
//     });
// });
$(document).on('click', '#save_activity_btn', function() {

    var joborder_item = $('#joborder_item').val();
    var change_status_item = $('#change_status_item').val();
    var select_checkbox_activity = $('#select_checkbox_activity').val();
    var activity_type_description = $('#activity_type_description').val();
    var schedule_event_type = $('#schedule_event_type').val();
    var monthDropdown = $('#monthDropdown').val();
    var dateDropdown = $('#dateDropdown').val();
    var year = $('#year').val();
    var title = $('#title').val();
    var hours = $('#hours').val();
    var minutes = $('#minutes').val();
    var day_am_pm = $('#day_am_pm').val();
    var length_hours = $('#length_hours').val();
    var length_description = $('#length_description').val();
    var data_item_id = '1';
    // alert(select_checkbox_activity);

    let errors = [];
    $(".errors").html("");

    if (change_status_item == null) {
        errors.push(change_status_item);
        $('.change_status_item_error').html(`Please change the status`);
        return; // Stop execution if there's an error
    }
    if (select_checkbox_activity == null) {
        errors.push(select_checkbox_activity);
        $('.select_checkbox_activity_error').html(`Please select activity type`);
        return; // Stop execution if there's an error
    }

    if (errors.length > 0) {
        return false;
    }



    var formData = new FormData();
    formData.append('joborder_item', joborder_item);
    formData.append('change_status_item', change_status_item);
    formData.append('select_checkbox_activity', select_checkbox_activity);
    formData.append('activity_type_description', activity_type_description);
    formData.append('schedule_event_type', schedule_event_type);
    formData.append('monthDropdown', monthDropdown);
    formData.append('dateDropdown', dateDropdown);
    formData.append('title', title);
    formData.append('year', year);
    formData.append('hours', hours);
    formData.append('minutes', minutes);
    formData.append('day_am_pm', day_am_pm);
    formData.append('length_hours', length_hours);
    formData.append('length_description', length_description);
    formData.append('data_item_id', data_item_id);



    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "{{route('candidates.activity.save')}}",
        type: 'POST',
        cache: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    $('#exampleModal').modal('hide');
                    // window.location.href =
                    //     "{{ url('/joborders/details',$jobDetails[0]->id ) }}";
                    window.location.href = "{{route('joborders.details')}}" + '/' +
                        job_id;
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