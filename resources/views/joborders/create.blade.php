@extends('layouts.admin')
<!-- resources/views/joborders/create.blade.php -->


@section('content')
    <div class="container">
        <h2>Create Job Order</h2>
        <form action="{{ route('joborders.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" >
            </div>
              <!-- <div class="form-group">
                <label for="joborder_id">Joborder Id</label>
                <input type="text" name="joborder_id" class="form-control" >
            </div> -->
            
             <div class="form-group">
                <label for="recruiter">Recruiter</label>
                <input type="text" name="recruiter" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="contact_id">Contact Id</label>
                <input type="text" name="contact_id" class="form-control" >
            </div>
            
            
            
             <div class="form-group">
                <label for="company_id">Company Id</label>
                <input type="text" name="company_id" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="client_job_id">Client Job ID</label>
                <input type="text" name="client_job_id" class="form-control" >
            </div>


           
         
            <div class="form-group">
                <label for="recruiter">Recruiter</label>
                <input type="text" name="recruiter" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" >
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" >
            </div>
            
            
             <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" class="form-control" >
            </div>
            
              <div class="form-group">
                <label for="rate_max">Rate Max</label>
                <input type="text" name="rate_max" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="salary">salary</label>
                <input type="text" name="salary" class="form-control" >
            </div>
            

            


            <div class="form-group">
                <label for="expected_rate">Expected Rate</label>
                <input type="text" name="expected_rate" class="form-control" >
            </div>
            
              <div class="form-group">
                <label for="actual_rate">Actual Rate</label>
                <input type="text" name="actual_rate" class="form-control" >
            </div>
            
           
            </div>
                                        <div class="col-md-6">

              <div class="form-group">
                <label for="expected_rate">Expected Rate</label>
                <input type="text" name="expected_rate" class="form-control" >
            </div>
            

            <div class="form-group">
                <label for="interview_type">Interview Type</label>
                <input type="text" name="interview_type" class="form-control" >
            </div>

            <div class="form-group">
                <label for="submission_deadline">Submission Deadline</label>
                <input type="date" name="submission_deadline" class="form-control" >
            </div>
            
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" >
            </div>
            
            <div class="form-group">
                <label for="is_hot">Is Hot</label>
                <input type="text" name="is_hot" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="openings">Openings</label>
                <input type="text" name="openings" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" >
            </div>
            
            
            
             <div class="form-group">
                <label for="state">State</label>
                <input type="text" name="state" class="form-control" >
            </div>
            
            
             <div class="form-group">
                <label for="public">Public</label>
                <input type="text" name="public" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="openings_available">Openings Available</label>
                <input type="text" name="openings_available" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="questionnaire_id">Questionnaire_id</label>
                <input type="text" name="questionnaire_id" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="interview_type">Interview Type</label>
                <input type="text" name="interview_type" class="form-control" >
            </div>
            
          
            
            <div class="form-group">
                <label for="work_arrangement">Work Arrangement</label>
                <input type="text" name="work_arrangement" class="form-control" >
            </div>
             <div class="form-group">
                <label for="gross_margin">Gross Margin</label>
                <input type="text" name="gross_margin" class="form-control" >
            </div>
            
            </div>
           
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" >
            </div>
            
             <div class="form-group">
                <label for="notes">Notes</label>
                <input type="text" name="notes" class="form-control" >
            </div>

            <!-- Add more form fields based on your requirements -->

            <button type="submit" class="btn btn-primary">Create Job Order</button>
        </form>
    </div>
@endsection


