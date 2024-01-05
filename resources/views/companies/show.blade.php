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


<div class="row">
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
</div>
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
            </thead>
            <tbody id="container" class="no-border-x no-border-y ui-sortable">

            </tbody>
        </table>
    </div>
</div>

@endsection