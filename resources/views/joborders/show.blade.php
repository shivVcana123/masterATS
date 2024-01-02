@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show jobDetails</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('joborders.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Title:</strong>
                {{ $jobDetails[0]['title'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company Name:</strong>
                {{ $jobDetails[0]['id'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>recruiter:</strong>
                {{ $jobDetails[0]['recruiter'] }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>contact_id:</strong>
                {{ $jobDetails[0]['contact_id'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>entered_by:</strong>
                {{ $jobDetails[0]['entered_by'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>owner:</strong>
                {{ $jobDetails[0]['owner'] }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>site_id:</strong>
                {{ $jobDetails[0]['site_id'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>client_job_id:</strong>
                {{ $jobDetails[0]['client_job_id'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                {{ $jobDetails[0]['description'] }}
            </div>
        </div>
    </div>
@endsection
