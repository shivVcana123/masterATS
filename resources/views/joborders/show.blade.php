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

    <!-- `joborder_id`, `recruiter`, `contact_id`, `company_id`, `entered_by`, `owner`, `site_id`, `client_job_id`, `title`, `description`, `notes`, `type`, `duration`, `rate_max`, `salary`, `status`, `is_hot`, `openings`, `city`, `state`, `start_date`, `end_date`, `date_created`, `date_modified`, `public`, `company_department_id`, `is_admin_hidden`, `openings_available`, `questionnaire_id`, `import_id`, `actualrate`, `actual_rate`, `gross_margin`, `expected_rate`, `max_submission`, `interview_type`, `submission_deadline`, `work_arrangement`, `p`, `_token`, `updated_at`, `created_at -->
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
                {{ $jobDetails[0]['company_id'] }}
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
