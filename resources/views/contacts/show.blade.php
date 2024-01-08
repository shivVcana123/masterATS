@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Contact Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-right: 5px;"
                href="{{ url('/contacts/edit',$contactDetails->id) }}"> Edit</a>
        </div>
    </div>
</div>

<table class="detailsOutside">
    <tbody>
        <tr style="vertical-align:top;">
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">Name:</td>
                            <td class="data">
                                <span class="bold">
                                    <span class="jobTitleCold">
                                        {{$contactDetails->first_name}} {{$contactDetails->last_name}}
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Company:</td>
                            <td class="data">
                                <a href="index.php?m=companies&amp;a=show&amp;companyID=14">
                                    <span class="jobTitleCold">
                                        {{$contactDetails['companies']->company_name}} </span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Title:</td>
                            <td class="data"> {{$contactDetails->title}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Department:</td>
                            <td class="data"> {{$contactDetails->company_department_id}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Work Phone:</td>
                            <td class="data"> {{$contactDetails->phone_work}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Cell Phone:</td>
                            <td class="data"> {{$contactDetails->phone_cell}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Other Phone:</td>
                            <td class="data"> {{$contactDetails->phone_other}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">Reports To:</td>
                            <td class="data">
                                {{$contactDetails->reports_to}}
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">E-Mail:</td>
                            <td class="data">
                                <a href="javascript"> {{$contactDetails->email1}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">2nd E-Mail:</td>
                            <td class="data">
                                <a href="javascript:;"> {{$contactDetails->email2}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Address:</td>
                            <td class="data"> {{$contactDetails->address}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">&nbsp;</td>
                            <td class="data"></td>
                        </tr>
                        <tr>
                            <td class="vertical">Created:</td>
                            <td class="data"> {{$contactDetails->date_created}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Owner:</td>
                            <td class="data"> {{$contactDetails['ownerUser']->user_name}}</td>
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
                        <tr>
                            <td>
                                <a href="javascript:;">
                                    <!-- <img src="images/attachment.gif" alt="" width="16" height="16" border="0">
                                    &nbsp; -->
                                    gitignore
                                </a>
                            </td>
                            <td>01-08-24 (12:54:12 AM)</td>
                            <td>
                                <a href="javascript:;" title="Delete"
                                    onclick="javascript:return confirm('Delete this attachment?');">
                                    <img src="images/actions/delete.gif" alt="" width="16" height="16" border="0">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">
                    <!-- <img src="images/paperclip_add.gif" width="16" height="16" border="0" alt="add attachment"
                        class="absmiddle"> -->
                    &nbsp;Add Attachment
                </a>
            </td>
        </tr>
        <tr>
            <td valign="top" class="vertical">Misc. Notes:</td>
            <td id="shortNotes" style="display:block;" class="data">
                Toby.Padegenis@jud.ct.gov </td>
        </tr>
    </tbody>
</table>



<div class="form-group col-md-12" style="margin-top: 7px">
    <div class="form-control" style="border-color: transparent;padding-left: 0px">
        <label style="font-size: 18px">Job Orders</label>
    </div>
    <div class="table-responsive col-md-12">
        <table class="table table-striped table-bordered" id="table">
            <thead class="no-border">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th style="width: 68px">Created</th>
                    <th style="width: 80px">Modified</th>
                    <th style="width: 87px">Start</th>
                    <th style="width: 63px">Age</th>
                    <th style="width: 65px">S</th>
                    <th style="width: 67px">P </th>
                    <th style="width: 65px">Recruiter</th>
                    <th style="width: 67px">Owner </th>
                    <th style="width: 65px">Action</th>
                </tr>
            </thead>
            <tbody id="container" class="no-border-x no-border-y ui-sortable">

            </tbody>
        </table>
    </div>
</div>

<div class="form-group col-md-12" style="margin-top: 7px">
    <div class="form-control" style="border-color: transparent;padding-left: 0px">
        <label style="font-size: 18px">Activity</label>
    </div>
    <div class="table-responsive col-md-12">
        <table class="table table-striped table-bordered" id="table">
            <thead class="no-border">
                <tr>
                    <th>ID</th>
                    <th>Date </th>
                    <th>Type</th>
                    <th>Entered</th>
                    <th>Regarding</th>
                    <th> Notes</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>
</div>

@endsection