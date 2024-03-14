@extends('layouts.admin')


@section('content')


<style>
.errors {
    color: red;
}

.buttn-area {
    display: flex;
}

.highlight {
    color: red;
}
</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Candidates Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('candidates.index') }}"> Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-right: 5px;"
                href="{{ url('/candidates/update',$candidatesDetails[0]->id ) }}"> Edit</a>
        </div>
    </div>
</div>

<!-- Candidates Details -->
<div class="row">
    <table class="detailsOutside">
        <tbody>
            <tr style="vertical-align:top;">
                <td width="50%" height="100%">
                    <table class="detailsInside" height="100%">
                        <tbody>
                            <tr>
                                <td class="vertical">Name:</td>
                                <td class="data">
                                    <div class="btn-group">
                                        <input type="hidden" id="candidate_id" value="{{$candidatesDetails[0]->id }}">
                                        <button type="button" class="btn btn-secondary ">
                                            {{$candidatesDetails[0]->first_name }}
                                            {{$candidatesDetails[0]->middle_name }}
                                            {{$candidatesDetails[0]->last_name }}</button>
                                        <button type="button"
                                            class="btn btn-secondary  dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:;" data-toggle="modal"
                                                data-target="#exampleModal">Add to
                                                List</a>
                                            <a class="dropdown-item" href="javascript:;" data-toggle="modal"
                                                data-target=".bd-example-modal-lg">Add
                                                to Job Order </a>
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">E-Mail:</td>
                                <td class="data">
                                    <a href="#">
                                        {{$candidatesDetails[0]->email1 }} </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">2nd E-Mail:</td>
                                <td class="data">
                                    <a href="mailto:">
                                        {{$candidatesDetails[0]->email2 }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">Home Phone:</td>
                                <td class="data">{{$candidatesDetails[0]->phone_home}}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Cell Phone:</td>
                                <td class="data">{{$candidatesDetails[0]->phone_cell  }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Work Phone:</td>
                                <td class="data">{{$candidatesDetails[0]->phone_work  }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Best Time To Call:</td>
                                <td class="data">{{$candidatesDetails[0]->best_time_to_call }}
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">Address:</td>
                                <td class="data">{{$candidatesDetails[0]->address }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Web Site:</td>
                                <td class="data">{{$candidatesDetails[0]->web_site }}
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">Source:</td>
                                <td class="data">{{$candidatesDetails[0]->source }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="50%" height="100%" valign="top">
                    <table class="detailsInside" height="100%">
                        <tbody>
                            <tr>
                                <td class="vertical">Date Available:</td>
                                <td class="data">{{$candidatesDetails[0]->date_available }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Current Employer:</td>
                                <td class="data">{{$candidatesDetails[0]->current_employer }}
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">Key Skills:</td>
                                <td class="data">{{$candidatesDetails[0]->key_skills }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Can Relocate:</td>
                                <td class="data">{{$candidatesDetails[0]->can_relocate }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Current Pay:</td>
                                <td class="data">{{$candidatesDetails[0]->current_pay }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Desired Pay:</td>
                                <td class="data">{{$candidatesDetails[0]->desired_pay }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Pipeline:</td>
                                <td class="data">Pipeline</td>
                            </tr>
                            <tr>
                                <td class="vertical">Submitted:</td>
                                <td class="data">Submitted</td>
                            </tr>
                            <tr>
                                <td class="vertical">Created:</td>
                                <td class="data">
                                    {{date("d-m-Y (h:i A)", strtotime($candidatesDetails[0]->date_created))}}
                                    ({{$candidatesDetails[0]['ownerUser']->user_name}})</td>
                            </tr>
                            <tr>
                                <td class="vertical">Owner:</td>
                                <td class="data">{{$candidatesDetails[0]['ownerUser']->user_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="detailsInside">
        <tbody>
            <tr>
                <td valign="top" class="vertical">Attachments:</td>
                <td valign="top" class="data">
                    <table class="attachmentsTable">
                        <tbody>
                            @foreach($candidatesDetails[0]['attachments'] as $value)
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

                        <input type="hidden" name="candidate_id" id="candidate_id" value="{$candidatesDetails[0]->id}}">

                        <label for="document_file"> Add Attachment:</label>&nbsp;
                        <input type="file" name="document_file" id="document_file" accept=".pdf, .doc, .docx, .txt">
                        <button type="button" class="btn btn-sm btn-primary" id="submit_file">Submit</button>
                        <br><span class="document_file_error errors"></span>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Candidates Details End -->


    <!-- Small modal -->
    <!-- Create Candidate Attachment -->
    <div class="modal fade" id="attachmenModal" tabindex="-1" role="dialog" aria-labelledby="attachmenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attachmenModalLabel">Create Candidate Attachment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="createAttachmentForm" id="createAttachmentForm" action="#" enctype="multipart/form-data"
                        method="post">
                        <input type="hidden" name="postback" id="postback" value="postback">
                        <input type="hidden" id="candidateID" name="candidateID" value="76">
                        <table class="editTable">
                            <tbody>
                                <tr>
                                    <td class="tdVertical">Attachment:</td>
                                    <td class="tdData"><input type="file" id="file" name="file"></td>
                                </tr>
                                <tr>
                                    <td class="tdVertical">Resume:</td>
                                    <td>
                                        <input type="radio" id="resume" name="resume" value="1" checked="checked">Yes
                                        <input type="radio" id="resume" name="resume" value="0">No
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add to Candidate Static Lists</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Select the lists you want to add the item to.</p>
                    <div class="addToListListBox" id="addToListBox">
                        <input type="hidden" style="width:200px;" id="dataItemArray" value="74">
                        <div class="evenDivRow" id="savedListRow2">
                            <tbody>
                                @foreach($savedList as $details)
                                <div class="list-item">
                                    <input type="checkbox" id="checkbox_value" name="checkbox_value" value="1">
                                    <input type="hidden" id="list_id" name="list_id" value="{{$details->id}}">
                                    <label for="vehicle1" class="description-label">{{$details->description}}</label>
                                    <button type="button" class="btn btn-danger btn-sm edit-btn">Edit</button>
                                    <br>
                                </div>
                                @endforeach
                            </tbody>
                        </div>
                        <form action="" method="post">
                            <div class="input_fields_wrap">
                            </div>
                            <input type="hidden" id="data_item_type" name="data_item_type" value="1">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info add_field_button" id="new_list">New List</button>
                    <button type="button" class="btn btn-primary add_to_list">Add To List</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Button End modal -->

    <!-- Job Orders For Candidates -->
    <div class="form-group col-md-12" style="margin-top: 7px" id="job_orders_for_candidates">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">Job Orders For Candidates</label>
        </div>
        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered" id="job_orders_for_candidates">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Ref. Number</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th style="width: 67px">Owner </th>
                        <th>Added</th>
                        <th>Entered By</th>
                        <th>Status</th>
                        <th style="width: 65px">Action</th>
                    </tr>
                </thead>

                <tbody id="container" class="no-border-x no-border-y ui-sortable">
                    @if(count($candidatesDetails[0]['candidateJoborder']) > 0)
                    @foreach($candidatesDetails[0]['candidateJoborder'] as $details)
                    <tr>
                        <td>{{$details->id}}</td>
                        <td>3232</td>
                        <td><a
                                href="{{route('joborders.details',$details['joborderDetails']->id)}}">{{ $details['joborderDetails']->title }}</a>
                        </td>
                        <td><a
                                href="{{route('companies.details',$details['joborderDetails']['companies']->id)}}">{{ $details['joborderDetails']['companies']->company_name}}</a>
                        </td>
                        <td>
                            {{$details['candidates']['ownerUser']->user_name}}
                        </td>
                        <td>
                            {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_submitted), 'd m Y') }}
                        </td>
                        <td> {{$details['candidates']['ownerUser']->user_name}}</td>
                        <td>{{isset($details['candidateJoborderStatus']->short_description) ? $details['candidateJoborderStatus']->short_description : ''}}
                        </td>
                        <td>
                            <i class="fa fa-pencil" id="Activity" value="Activity"></i>
                            <i class="fa fa-trash" id="candidate_joborders_delete" data-value="{{$details->id}}"></i>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="12">No Avaliable Job Order</td>
                    @endif
                </tbody>
            </table>
            <i class="fa fa-plus"></i><a href="javascript:;" data-toggle="modal" data-target=".bd-example-modal-lg">Add
                This Candidate to Job Order</a>
        </div>
    </div>

    <!-- Lising For Candidates -->
    <div class="form-group col-md-6" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">List</label>
        </div>
        <div class="table-responsive col-md-6">
            <table class="table table-striped table-bordered" id="table">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody id="container" class="no-border-x no-border-y ui-sortable">
                    @if(count($savedAddList) > 0)
                    @foreach($savedAddList as $details)
                    <tr>
                        <td>{{$details->id}}</td>
                        <td><a href="{{url('listts',$details->id)}}">{{ $details->description }}</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="12">No Avaliable List</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Add Candidates Job Orders For listing -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="add_candidates_to_job_order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: 150%; margin-left: -22%;">
                <div class="form-group col-md-12" style="margin-top: -15px; margin-left: -5px; padding: 2%;">
                    <div class="form-control" style="border-color: transparent;padding-left: 0px">
                        <label style="font-size: 18px">Add Candidates to Job Order</label>
                        <button style="margin-left: 75%;" type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
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

                    </div><br>
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered" id="add_candidates_to_job_order_list">
                            <thead class="no-border">
                                <tr>
                                    <th style="width: 67px">ID</th>
                                    <th style="width: 67px">Ref. Number</th>
                                    <th style="width: 67px">Title</th>
                                    <th style="width: 67px">Company</th>
                                    <th style="width: 67px">Type</th>
                                    <th style="width: 67px">Status</th>
                                    <th style="width: 67px">Modified</th>
                                    <th style="width: 67px">Start</th>
                                    <th style="width: 67px">Recruiter</th>
                                    <th style="width: 67px">Owner </th>
                                    <th style="width: 65px">Action</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody id="container" class="no-border-x no-border-y ui-sortable">

                                @foreach($joborderList as $details)
                                @php
                                $matchFound = false;
                                @endphp
                                @foreach($candidatesDetails[0]['candidateJoborder'] as $value)
                                @if(isset($details->id) && isset($value->id) && $details->id ==
                                $value->id)
                                @php
                                $matchFound = true;
                                @endphp
                                @endif
                                @endforeach
                                <tr>
                                    <td>{{$details->id}}</td>
                                    <td>3232</td>
                                    <td>
                                        @if($matchFound)
                                        {{ $details->title }}
                                        @else
                                        <a href="javascript:;" onclick="addCandidateOnJobOrder(this)"
                                            data-value="{{ $details->id }}">
                                            {{ $details->title }}
                                        </a>
                                        @endif
                                    </td>
                                    <td>@if($details['companies'])
                                        {{ $details['companies']->company_name }}
                                        @else
                                        No associated company
                                        @endif
                                    </td>
                                    <td>{{$details->type}}</td>
                                    <td>{{$details->status}}</td>
                                    <td>
                                        {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_created), 'd m Y') }}
                                    </td>
                                    <td>{{$details->start_date}}</td>
                                    <td>@if($details['ownerUser'])
                                        {{ $details['ownerUser']->user_name }}
                                        @else
                                        No associated company
                                        @endif
                                    </td>

                                    <td>@if($details['recruiterUser'])
                                        {{ $details['recruiterUser']->user_name }}
                                        @else
                                        No associated company
                                        @endif
                                    </td>

                                    <td>
                                        <i class="fa fa-pencil" data-toggle="modal" data-target="#activityModal"></i>
                                        <i class="fa fa-trash" id="joborders_delete" data-value="{{$details->id}}"></i>
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


    <!-- Candidates: Log Activity -->
    <!-- Modal -->
    <div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 149%; margin-left: -90px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="activityModalLabel">Candidates: Log Activity</h5>
                    <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <fieldset class="form-group">
                            <div class="container">
                                <div class="activity-area">
                                    <div class="activities-area" style="display: flex;">
                                        <label for="">Regarding:</label>
                                        <select id="joborder_item" name="joborder_item"
                                            style="margin-left: 40px; width: 177px;">
                                            <option selected disabled="disabled">General</option>
                                            @foreach($candidatesDetails[0]['candidateJoborder'] as $key => $details)
                                            <option value="{{$details['joborderDetails']->id}}"
                                                {{ old('candidatesJobOrderDetails') == $key ? 'selected' : ''}}>
                                                {{$details['joborderDetails']->title}}</option>
                                            @endforeach

                                        </select>
                                        <div class="checkbox-mail-area">
                                            <input class="form-check-input" type="checkbox" id="checkbox_mail_send_item"
                                                name="checkbox_mail_send_item" style="margin-left: 30px;">
                                            <label class="form-check-label" for="checkbox_mail_send_item">
                                                Send E-Mail Notification to Candidate
                                            </label>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group row">
                                        <div class="col-sm-2">Status:</div>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="checkbox_status_change" onchange="checkboxStatusChange(this)">
                                                <label class="form-check-label" for="checkbox_status_change">
                                                    Change Status
                                                </label>
                                                <br>
                                                <!-- <label for="">Regarding:</label> -->
                                                <select id="change_status_item" name="change_status_item"
                                                    class="inputbox" style="width: 150px;"
                                                    onchange="jobStatusChange(this)">
                                                    <option selected disabled>Select a Status</option>
                                                    @foreach($changeStatus as $details)
                                                    <option value="{{$details->id}}">{{$details->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="change_status_item_error errors"></span>
                                        </div>
                                    </div>
                                    <div class="regarding-area" style="display: flex;">
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

                                                            <select name="date" id="dateDropdown"></select>

                                                            <input type="text" name="year" id="year" style="width: 15%;"
                                                                value="{{ substr(date('Y'), -2) }}" id="year">

                                                            <input type="date" name="calander_date" id="calander_date"
                                                                style="margin-left: 10px; padding: 0px; width: 6%;">
                                                        </div>
                                                    </div>
                                                    <div class="title-area">
                                                        <label for="title">Title</label>
                                                        <input type="text" id="title" name="title">
                                                    </div>
                                                    <input type="hidden" id="selectedDate" name="selected_date">
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
                                                                        <div class="input-group"
                                                                            style="display: flex; flex-direction: row; flex-wrap: nowrap;">
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

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="length-area"
                                                        style="margin-left: 190px; display: grid; align-items: center; align-content: center;">
                                                        <label for="">Length:</label>
                                                        <select id="length_hours" name="length_hours"
                                                            style="width: 173px;  padding: 3px;">
                                                            <option value="15">15 minuts</option>
                                                            <option value="30">30 minuts</option>
                                                            <option value="45">45 minuts</option>
                                                            <option value="1">1 hours</option>
                                                            <option value="1.5">1.5 hours</option>
                                                            <option value="2">2 hours</option>
                                                            <option value="3">3 hours</option>
                                                            <option value="4">4 hours</option>
                                                            <option value="more">More then 4 hours</option>

                                                        </select>
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
                                                                            name="all_day_radios" id="all_day_radios"
                                                                            onclick="allDayRadios(this)"
                                                                            value="All Days">
                                                                        <div class="input-group">
                                                                            All Day / No Specific Time
                                                                        </div>
                                                                    </div>
                                                                    <input type="checkbox" name="public_entry"
                                                                        id="public_entry">
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
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary" id="save_activity_btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Activity -->
    <div class="form-group col-md-12" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">Activity</label>
        </div>


        <div class="table-responsive col-md-12">

            <table class="table table-striped table-bordered" id="table">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Entered</th>
                        <th>Regarding</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($candidatesDetails) > 0)

                    @else
                    <td colspan="12">No Avaliable Activities</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
</script>
<script>
var candidate_id = $('#candidate_id').val();

$(document).ready(function() {
    $('.close-modal').click(function() {
        $('.bd-example-modal-lg').modal('hide');
        $('#activityModal').modal('hide');
    });
});
// $('#add_candidates_to_job_order').modal('show');

function addCandidateOnJobOrder(that) {
    var jobID = $(that).data('value');
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "{{route('candidates.add.candidate.joborder')}}", 
        type: 'POST',
        data: {
            jobID: jobID,
            candidate_id: candidate_id, // Make sure 'candidate_id' is defined before using it
        },
        success: function(response) {
            if (response.status) {
                // Show success message
                Swal.fire({
                    title: response.message,
                    icon: "success",
                });
                // Hide the modal
                $('.bd-example-modal-lg').modal('hide');
            } else {
                // Show error message
                Swal.fire({
                    title: response.message,
                    icon: "warning",
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            // Handle error as needed
        },
    });
}

var candidate_id = $('#candidate_id').val();
$(document).on('click', '#submit_file', function(e) {
    e.preventDefault();
    // var candidate_id = $('#candidate_id').val();

    const formData = new FormData();
    const fileInput = $('#document_file')[0];

    let errors = [];
    $(".errors").html("");

    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        formData.append('candidate_id', candidate_id);
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
        url: "{{route('document.upload')}}", 
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
                    //     "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
                        window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});


// Document download
$(document).on('click', '#documentDownload', function() {
    var documentDownload = $(this).data('id');

    var url = "{{ route('document.download') }}" + '/' + documentDownload;
    window.open(url, '_blank'); // Open the download link in a new tab
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
                url:"{{ route('document.delete') }}" + '/' + documentId,
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
                            //     "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
                            window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
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


$(document).ready(function() {
    // Set default date to current date
    var currentDate = new Date();
    var defaultDate = currentDate.toISOString().slice(0, 10);
    $('#calander_date').val(defaultDate);

    // Initialize dropdowns with default date
    updateDropdowns(currentDate);

    // Listen for changes in the calander_date input
    $('#calander_date').change(function() {
        var selectedDate = new Date($(this).val());
        updateDropdowns(selectedDate);
    });

    function updateDropdowns(date) {
        // Set month
        $('#monthDropdown').val(date.getMonth() + 1);

        // Set day
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
        $('#dateDropdown').empty();
        for (var day = 1; day <= lastDay; day++) {
            $('#dateDropdown').append('<option value="' + day + '">' + day + '</option>');
        }

        // Set year
        $('#year').val(date.getFullYear().toString().substr(-2));
    }
});
$('.checkbox-mail-area').hide();
$('.schedule-event-area').hide();
$('.regarding-area').hide();
$('#change_status_item').prop('disabled', true);
$('#select_checkbox_activity').prop('disabled', true);

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
    // console.log(selectedText);
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

    $('#activityModal').modal('hide');

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
                    $('#activityModal').modal('hide');
                    // window.location.href =
                    //     "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
                    window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });

});





var wrapper = $(".input_fields_wrap"); // Fields wrapper
var add_button = $(".add_field_button"); // Add button ID
// $('#activityModal').modal('show');


$(add_button).click(function(e) {
    // On add input button click
    e.preventDefault();
    $(wrapper).append(
        '<div class="list-item"><div class="col-8"><div class="list-item"><input type="text" class="col-6" id="description" name="description" value=""><button type="button" class="btn btn-primary btn-sm  remove_field">Delete</button><button type="button" class="btn btn-danger btn-sm  save-btn">Save</button><br><span class="description_error errors"></span></div></div></div>'
    ); // Add input box
});


$(document).ready(function() {
    // Event handler for the "Edit" button
    $('.edit-btn').on('click', function() {
        $('#exampleModal').modal('hide');
        // Find the closest parent with class 'list-item'
        var listItem = $(this).closest('.list-item');



        // Get the values needed for the input fields
        var itemId = $(this).closest('.list-item').find('input#list_id').val();
        // alert(itemId);
        var descriptionValue = listItem.find('.description-label').text();
        listItem.find('.edit-btn').hide();
        // Create the new input field
        var newInputField = '<input type="hidden" id="list_id" name="list_id" value="' + itemId + '">' +
            '<input type="text" class="col-6" id="description" name="description" value="' +
            descriptionValue +
            '"><button type="button" class="btn btn-primary btn-sm edit-btn remove_field">Delete</button><button type="button" class="btn btn-danger btn-sm edit-btn save-btn">Save</button><br><span class="description_error errors"></span>';

        // Replace the label with the new input field
        listItem.find('.description-label').replaceWith(newInputField);
    });
});
$(document).on('click', '.remove_field', function() {
    var listItem = $(this).closest('.list-item');
    listItem.find('.description-label').show(); // Show the label
    listItem.find('.edit-btn').show(); // Show the edit button

    // Get the list_id value
    var list_id = $(this).closest('.list-item').find('input#list_id').val();

    // Alert or perform other actions with the list_id value
    if (list_id !== undefined) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t to delete this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, trigger the deletion
                window.location.href = "{{route('candidates.list.delete')}}" + '/' + list_id; // Adjust the URL as needed
            }
            window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
        });
    }

    listItem.remove();

    // Remove the list item
});
$(document).on("click", ".save-btn", function(e) {
    // User click on save button
    e.preventDefault();
    $('#exampleModal').modal('hide');
    // Get the description value
    var descriptionValue = $(this).closest('.list-item').find('input#description').val();

    var list_id = $(this).closest('.list-item').find('input#list_id').val();
    if (list_id !== undefined) {
        var list_id = list_id;
    } else {
        var list_id = null;

    }

    let errors = [];
    $(".errors").html("");

    if (descriptionValue === "") {
        errors.push(description);
        $('.description_error').html(`Description field can't be empty.`);
        return; // Stop execution if there's an error
    }
    var data_item_type = $('#data_item_type').val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "{{route('candidates.list.save')}}",
        type: 'POST',
        data: {
            list_id: list_id,
            description: descriptionValue,
            data_item_type: data_item_type,
        },
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    $('#exampleModal').modal('hide');
                    window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});

$(document).ready(function() {
    // Event handler for the "Add To List" button
    $('.add_to_list').on('click', function() {
        $('#exampleModal').modal('hide');

        // Check if at least one checkbox is checked
        if ($('input[name="checkbox_value"]:checked').length === 0) {
            alert("Please select at least one item.");
            return;
        }
        $('#odal fade bd-example-modal-lg').modal('hide');
        // Initialize an array to store selected list_ids
        var selectedListIds = [];

        $('input[name="checkbox_value"]:checked').each(function() {
            // Get the list_id and data_item_type values for each checked checkbox
            var itemId = $(this).closest('.list-item').find('input#list_id').val();
            var data_item_type = $('#data_item_type').val();

            selectedListIds.push([itemId, data_item_type]);
        });
        console.log(selectedListIds);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "{{route('candidates.list.save.entry')}}",
            type: 'POST',
            data: {
                selectedListIds: selectedListIds,
            },
            success: function(response) {
                const title = response.status ? "success" : "warning";
                Swal.fire({
                    title: response.message,
                    type: title,
                    icon: title,
                }).then(function(result) {
                    if (result.isConfirmed && response.status) {
                        $('#exampleModal').modal('hide');
                        window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            },
        });
    });
});


$(document).on('click', '#delete_activity', function() {

    var activity_id = $('#delete_activity').data('id');

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
                url: "{{route('candidates.activity.delete')}}"+'/'+activity_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
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
                url: "{{route('candidates.joborder.delete')}}"+'/'+candidate_joborder_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
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

$(document).on('click', '#joborders_delete', function() {

    var joborder_id = $(this).data('value');
    // alert(candidate_joborder_id);

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
                url: "{{route('candidates.joborder.delete')}}"+'/'+joborder_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href = "{{route('candidates.details')}}" + '/' +
                        candidate_id;
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


$(document).ready(function() {
    // Loop through each td with id 'joborder_id' in table 1
    $('#add_candidates_to_job_order_list #joborder_id').each(function() {
        var jobId = $(this).data('id');

        // Check if the jobId exists in the third column of the second table
        if ($('#job_orders_for_candidates td[data-id="' + jobId + '"]:eq(2)').length > 0) {
            // Job ID exists in table 2, remove highlight class
            $(this).removeClass('highlight');
        } else {
            // Job ID does not exist in table 2, add highlight class
            $(this).addClass('highlight');
        }
    });
});


$(document).on('click', '#schedule_event, #schedule_event td', function() {
    if ($(this).attr('value') == 'Schedule Event') {
        $('.activity-area').hide();
    }
    $('#activityModal').modal('show');
});

$(document).on('click', '#Activity, #Activity td', function() {
    if ($(this).attr('value') == 'Activity') {
        $('.activity-area').show();
    }
    $('#activityModal').modal('show');
});
</script>
@endpush