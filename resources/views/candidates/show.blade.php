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
                                        <input type="hidden" id="candidate_id" value="{{ $candidatesDetails[0]->id }}">
                                        <button type="button" class="btn btn-secondary ">
                                            {{ $candidatesDetails[0]->first_name }}
                                            {{ $candidatesDetails[0]->middle_name }}
                                            {{ $candidatesDetails[0]->last_name }}</button>
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
                                        {{ $candidatesDetails[0]->email1 }} </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">2nd E-Mail:</td>
                                <td class="data">
                                    <a href="mailto:">
                                        {{ $candidatesDetails[0]->email2 }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">Home Phone:</td>
                                <td class="data">{{ $candidatesDetails[0]->phone_home}}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Cell Phone:</td>
                                <td class="data">{{ $candidatesDetails[0]->phone_cell  }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Work Phone:</td>
                                <td class="data">{{ $candidatesDetails[0]->phone_work  }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Best Time To Call:</td>
                                <td class="data">{{ $candidatesDetails[0]->best_time_to_call }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Address:</td>
                                <td class="data">{{ $candidatesDetails[0]->address }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">&nbsp;</td>
                                <td class="data">
                                    1 </td>
                            </tr>
                            <tr>
                                <td class="vertical">Web Site:</td>
                                <td class="data">{{ $candidatesDetails[0]->web_site }}
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical">Source:</td>
                                <td class="data">{{ $candidatesDetails[0]->source }}</td>
                            </tr>
                            <tr>
                                <td class="vertical"></td>
                                <td class="data">2</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="50%" height="100%" valign="top">
                    <table class="detailsInside" height="100%">
                        <tbody>
                            <tr>
                                <td class="vertical">Date Available:</td>
                                <td class="data">{{ $candidatesDetails[0]->date_available }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Current Employer:</td>
                                <td class="data">{{ $candidatesDetails[0]->current_employer }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Key Skills:</td>
                                <td class="data">{{ $candidatesDetails[0]->key_skills }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Can Relocate:</td>
                                <td class="data">{{ $candidatesDetails[0]->can_relocate }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Current Pay:</td>
                                <td class="data">{{ $candidatesDetails[0]->current_pay }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Desired Pay:</td>
                                <td class="data">{{ $candidatesDetails[0]->desired_pay }}</td>
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
                                <td class="data">{{ $candidatesDetails[0]->date_created  }}</td>
                            </tr>
                            <tr>
                                <td class="vertical">Owner:</td>
                                <td class="data">{{ $candidatesDetails[0]->owner  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="detailsOutside">
        <tbody>
            <tr>
                <td>
                    <table class="detailsInside">
                        <tbody>
                            <tr>
                                <td valign="top" class="vertical">Misc. Notes:</td>
                                <td id="shortNotes" style="display:block;" class="data">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="vertical">Upcoming Events:</td>
                                <td id="schedule_event" class="data" value="Schedule Event"><a href="javascript:;">Schedule Event</a></td>
                            </tr>
                            <tr>
                                <td valign="top" class="vertical">Attachments:</td>
                                <td valign="top" class="data">
                                    <table class="attachmentsTable">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="javascript:;">
                                                        <!-- <img src="images/attachment.gif" alt="" width="16" height="16"
                                                            border="0"> -->

                                                        Sirisha Kotha.DOCX
                                                    </a>
                                                </td>
                                                <td><a href="javascript:;">
                                                        <!-- <img width="15" height="15" style="border: none;"
                                                            src="images/search.gif" alt="(Preview)"> -->
                                                    </a></td>
                                                <td> 01-03-24 (05:24:22 PM)</td>
                                                <td>
                                                    <a href="javascript:;">
                                                        <!-- <img src="images/actions/delete.gif" alt="" width="16"
                                                            height="16" border="0" title="Delete"> -->
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="javascript:;">
                                        <!-- <img src="images/paperclip_add.gif" width="16" height="16" border="0"
                                            alt="Add Attachment" class="absmiddle"> -->
                                        &nbsp;Add Attachment
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="vertical">Tags:
                                    <a href="javascript:;">
                                        Add/Remove
                                    </a>
                                </td>
                                <td valign="top" class="data"> </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Candidates Details End -->

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
                            <input type="hidden" id="data_item_type" name="data_item_type" value="100">
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
    <div class="form-group col-md-12" style="margin-top: 7px">
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
                    @foreach($candidatesJobOrderDetails as $details)
                    <tr>
                        <td>{{$details->id}}</td>
                        <td>3232</td>
                        <td data-id="{{$details['joborderDetails']->id}}" id="joborderDetails_id"><a
                                href="{{route('joborders.profile',$details['joborderDetails']->id)}}">{{ $details['joborderDetails']->title }}</a>
                        </td>
                        <td><a
                                href="{{route('companies.deatils',$details['joborderDetails']['companies']->id)}}">{{ $details['joborderDetails']['companies']->company_name}}</a>
                        </td>
                        <td>@if($details['ownerUser'])
                            {{ $details['ownerUser']->user_name }}
                            @else
                            No associated company
                            @endif
                        </td>
                        <td>
                            {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_submitted), 'd m Y') }}
                        </td>
                        <td>{{$details['users']->user_name}}</td>
                        <td>{{$details->status}}</td>
                        <td>
                            <i class="fa fa-pencil" id="Activity" value="Activity"></i>
                            <i class="fa fa-trash" id="candidate_joborders_delete" data-value="{{$details->id}}"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <i class="fa fa-plus"></i><a href="javascript:;" data-toggle="modal" data-target=".bd-example-modal-lg">Add
                This Candidate to Job Order</a>
        </div>
    </div>

    <!-- Lising For Candidates -->
    <div class="form-group col-md-12" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">List</label>
        </div>
        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered" id="table">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    @foreach($savedList as $details)
                    <tr>
                        <td>{{$details->id}}</td>
                        <td><a href="{{route('joborders.profile',$details->id)}}">{{ $details->description }}</a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </thead>
                <tbody id="container" class="no-border-x no-border-y ui-sortable">

                </tbody>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Job Orders For listing -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: 210%; margin-left: -45%;">
                <div class="form-group col-md-12" style="margin-top: -15px; margin-left: -5px; padding: 2%;">
                    <div class="form-control" style="border-color: transparent;padding-left: 0px">
                        <label style="font-size: 18px">Add Candidates to Job Order</label>
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
                                <tr>
                                    <td>{{$details->id}}</td>
                                    <td>3232</td>
                                    <!-- style="color: #51459d;" -->
                                    <td id="joborder_id" data-id="{{$details->id}}">{{ $details->title }}</td>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset class="form-group">
                        <div class="container">
                            <div class="activity-area">
                                <label for="">Regarding:</label>
                                <select id="joborder_item" name="joborder_item" style="margin-left: 23px;">
                                    <option selected disabled="disabled">General</option>
                                    @foreach($candidatesJobOrderDetails as $details)
                                    <option value="{{$details['joborderDetails']->id}}">
                                        {{$details['joborderDetails']->title}}</option>
                                    @endforeach
                                </select>
                                <input class="form-check-input" type="checkbox" id="checkbox_mail_send_item"
                                    name="checkbox_mail_send_item" style="margin-left: 30px;">
                                <label class="form-check-label" for="checkbox_mail_send_item">
                                    Send E-Mail Notification to Candidate
                                </label>
                                <br><br>
                                <div class="form-group row">
                                    <div class="col-sm-2">Status:</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkbox_status_change">
                                            <label class="form-check-label" for="checkbox_status_change">
                                                Change Status
                                            </label>
                                            <br>
                                            <!-- <label for="">Regarding:</label> -->
                                            <select id="change_status_item" name="change_status_item" class="inputbox"
                                                style="width: 150px;">
                                                <option selected disabled>Select a Status</option>
                                                @foreach($changeStatus as $details)
                                                <option value="{{$details->id}}">{{$details->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">Activity:</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkbox_activity">
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
                                        <input class="form-check-input" type="checkbox" id="checkbox_schedule">
                                        <label class="form-check-label" for="checkbox_schedule">
                                            Schedule Event
                                        </label>
                                        <br>
                                        <!-- <label for="">Regarding:</label> -->
                                        <select id="schedule_event_type" name="schedule_event_type">
                                            <option selected disabled>Select Event Type</option>
                                            @foreach($calendarEvenType as $details)
                                            <option value="{{$details->id}}">{{$details->short_description}}</option>
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
                                                                    name="hoursRadios" id="hoursRadios1" value=""
                                                                    checked>
                                                                <div class="input-group"
                                                                    style="display: flex; flex-direction: row; flex-wrap: nowrap;">
                                                                    <select id="hours" name="hours">
                                                                        @for ($hour = 1; $hour <= 12; $hour ++) <option
                                                                            value="{{ $hour  }}">
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
                                                                    name="all_day_radios" id="all_day_radios" value=""
                                                                    checked>
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
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_activity_btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Activity -->
    <div class="form-group col-md-12" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">Activity</label>
        </div>


        <div class="table-responsive col-md-12">
            @if(count($candidatesJobOrderDetails) > 0)
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
                    @foreach($candidatesJobOrderDetails as $details)
                    @if(
                    $details['activities'] != null &&
                    $details['joborderDetails'] != null &&
                    $details['users'] != null &&
                    $details['candidatesDetails'] != null
                    )
                    <tr>
                        <td>{{$details->id}}</td>
                        <td>
                            {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_created), 'd m Y (h:iA)') }}
                        </td>


                        <td>{{$details['activities']['activityTypes'][0]->short_description}} </td>
                        <td>{{$details['users']->user_name}}</td>
                        <td>{{$details['joborderDetails']->title}}
                            ({{$details['joborderDetails']['companies']->company_name}})</td>
                        <td>{{substr(optional($details['activities'])->notes, 0, 30)}}</td>
                        <td>
                            <i class="fa fa-pencil"></i>
                            <i class="fa fa-trash" id="delete_activity" data-id="{{$details->id}}"></i>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="7">No data found</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>

            </table>
            @else
            <p>No data found</p>
            @endif
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
</script>
<script>
var candidate_id = $('#candidate_id').val();

$(document).on('click', '#add_candidates_to_job_order_list tbody td#joborder_id', function() {
    var jobID = $(this).data('id');
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: '/candidates/add/candidate/joborder',
        type: 'POST',
        data: {
            jobID: jobID,
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
                        "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: '/candidates/activity/save',
        type: 'POST',
        data: {
            joborder_item: joborder_item,
            change_status_item: change_status_item,
            select_checkbox_activity: select_checkbox_activity,
            activity_type_description: activity_type_description,
            schedule_event_type: schedule_event_type,
            monthDropdown: monthDropdown,
            dateDropdown: dateDropdown,
            year: year,
            title: title,
            hours: hours,
            minutes: minutes,
            day_am_pm: day_am_pm,
            length_hours: length_hours,
            length_description: length_description,
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
                    window.location.href =
                        "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
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
                window.location.href = '/candidates/list/delete/' + list_id; // Adjust the URL as needed
            }
            window.location.href =
                "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
        });
    }

    listItem.remove();

    // Remove the list item
});
$(document).on("click", ".save-btn", function(e) {
    // User click on save button
    e.preventDefault();
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
        url: '/candidates/list/save',
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
                    window.location.href =
                        "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
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
        // Check if at least one checkbox is checked
        if ($('input[name="checkbox_value"]:checked').length === 0) {
            alert("Please select at least one item.");
            return;
        }

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
                        window.location.href =
                            "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
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
                url: '/candidates/activity/delete/' + activity_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href =
                                "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
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
                url: '/candidates/candidate/joborder/delete/' + candidate_joborder_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href =
                                "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
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
                url: '/candidates/joborder/delete/' + joborder_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href =
                                "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
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
    if($(this).attr('value') == 'Schedule Event'){
        $('.activity-area').hide();
    }
    $('#activityModal').modal('show');
});

$(document).on('click', '#Activity, #Activity td', function() {
    if($(this).attr('value') == 'Activity'){
        $('.activity-area').show();
    }
    $('#activityModal').modal('show');
});
</script>
@endpush