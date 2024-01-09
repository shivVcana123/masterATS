@extends('layouts.admin')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Company Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-right: 5px;"
                href="{{ url('/companies/update',$companyDetails[0]->id) }}"> Edit</a>
        </div>
    </div>
</div>


<!-- <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company Name:</strong>
            {{ $companyDetails[0]->company_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{$companyDetails[0]->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Primary Phone:</strong>
            {{$companyDetails[0]->primary_phone }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Web Url:</strong>
            {{ $companyDetails[0]->web_url }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fax Number:</strong>
            {{$companyDetails[0]->fax_number }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Key Technologies:</strong>
            {{$companyDetails[0]->key_technologies }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {{ $companyDetails[0]->address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>City:</strong>
            {{$companyDetails[0]->city }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>State:</strong>
            {{$companyDetails[0]->state }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Postal Code:</strong>
            {{$companyDetails[0]->zip }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Note:</strong>
            {{$companyDetails[0]->notes }}
        </div>
    </div>
</div> -->
<table class="detailsOutside">
    <tbody>
        <tr style="vertical-align:top;">
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">Name:</td>
                            <td class="data">
                                <span class="jobTitleCold">{{ $companyDetails[0]->company_name }}</span>
                                <a href="javascript:void(0);"></a>
                            </td>
                        </tr>
                        <!-- CONTACT INFO -->
                        <tr>
                            <td class="vertical">Primary Phone:</td>
                            <td class="data">{{ $companyDetails[0]->primary_phone }}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Secondary Phone:</td>
                            <td class="data">{{ $companyDetails[0]->secondary_phone }}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Fax Number:</td>
                            <td class="data">{{ $companyDetails[0]->fax_number }}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Address:</td>
                            <td class="data">{{ $companyDetails[0]->address }}></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">&nbsp;</td>
                            <td class="data">
                                {{ $companyDetails[0]->city }}</td>
                        </tr>
                        <!-- /CONTACT INFO -->
                    </tbody>
                </table>
            </td>
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <!-- CONTACT INFO -->
                    <tbody>
                        <tr>
                            <td class="vertical">Billing Contact:</td>
                            <td class="data">
                                {{ $companyDetails[0]->billing_contact }}
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">Web Site:</td>
                            <td class="data">
                                <{{ $companyDetails[0]->web_url }} </td>
                        </tr>
                        <!-- /CONTACT INFO -->
                        <tr>
                            <td class="vertical">Key Technologies:</td>
                            <td class="data">{{ $companyDetails[0]->key_technologies }}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Created:</td>
                            <td class="data">{{ $companyDetails[0]->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="vertical">Owner:</td>
                            <td class="data">{{ $companyDetails[0]->owner }}</td>
                        </tr>
                        <tr>
                            <td class="vertical">&nbsp;</td>
                            <td class="data">&nbsp;</td>
                        </tr>
                        <!-- CONTACT INFO -->
                        <!-- /CONTACT INFO -->
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

                        <tr>
                            <td><a href="javascript:;" id="documentDownload" data-id="">dfdsd.pdf</a></td>
                            <td>&nbsp; &nbsp;datetime</td>
                            <td>&nbsp; &nbsp;<i class="fa fa-trash" id="document_delete_id" data-value=""></i></td>
                        </tr>

                    </tbody>
                </table><br>
                <form id="document_form" enctype="multipart/form-data" method="POST" style="margin-left: -101px;">

                    <input type="hidden" name="joborder_id" id="joborder_id" value="{{$companyDetails[0]->id}}">
                    <input type="hidden" name="company_id" id="company_id" value="{{$companyDetails[0]->company_id}}">

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
                @foreach($companyDetails[0]['user'] as $detailss)
                @foreach($companyDetails[0]['jobDetails'] as $details)
                <tr>
                    <td>{{$details->id}}</td>
                    <!-- <td>{{$details->title}}</td> -->
                    <td><a href="{{route('joborders.details',$details->id)}}">{{ $details->title }}</a></td>
                    <td>{{$details->type}}</td>
                    <td>{{$details->status}}</td>
                    <td>{{$details->date_created}}</td>
                    <td>{{$details->date_modified}}</td>
                    <td>{{$details->start_date}}</td>
                    <td>{{$details->title}}</td>
                    <td>{{$details->title}}</td>
                    <td>{{$details->p}} </td>
                    <td>{{$details->recruiter}}</td>
                    <td>{{$detailss->user_name}} </td>
                    <td>Action</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <i class="fa fa-plus"></i><a
            href="{{ url('/candidates/create', ['company_id' => $companyDetails[0]->id]) }}">Add
            Add Job Order</a>

    </div>
</div>

<div class="form-group col-md-12" style="margin-top: 7px">
    <div class="form-control" style="border-color: transparent;padding-left: 0px">
        <label style="font-size: 18px">Contacts</label>
    </div>
    <div class="table-responsive col-md-12">
        <table class="table table-striped table-bordered" id="table">
            <thead class="no-border">
                <tr>
                    <th>ID</th>
                    <th>First Name </th>
                    <th>Last Name</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Work Phone</th>
                    <th>Cell Phone</th>
                    <th>Created</th>
                    <th>Owner </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="container" class="no-border-x no-border-y ui-sortable">
                @foreach($companyDetails[0]['user'] as $details)
                @foreach($companyDetails[0]['contacts'] as $detailss)
                <tr>
                    <td>{{$detailss->id}}</td>
                    <td><a href="{{url('contacts',$detailss->id)}}">{{$detailss->first_name}}</a></td>
                    <td><a href="{{url('contacts',$detailss->id)}}">{{$detailss->last_name}}</a></td>
                    <td>{{$detailss->title}}</td>
                    <td>{{$detailss->company_department_id}}</td>
                    <td>{{$detailss->phone_work}}</td>
                    <td>{{$detailss->phone_cell}}</td>
                    <td>{{$detailss->date_created}}</td>
                    <td>{{$details->user_name}} </td>
                    <td>Action</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <i class="fa fa-plus"></i><a href="{{ url('/contacts/create', ['company_id' => $companyDetails[0]->id]) }}">Add
            Add Contact</a>

    </div>
</div>

@endsection