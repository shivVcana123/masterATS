@extends('layouts.admin')
@section('content')
<?php

$submissionsCountDataJson = json_encode($submissionsCountData);

// dd($submissionsCountDataJson);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive py-5 pb-4 dropdown_2">
                    <div class="container-fluid" style="display: flex; justify-content: space-around;">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Today</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Today'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Today'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Today'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="Today" data-value="Today"
                                        onclick="submissionsCountData('Today')"> New
                                        Submissions: {{count($submissionsCountData['Today'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['Today'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Yesterday</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Yesterday'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Yesterday'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Yesterday'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="Yesterday" data-value="Yesterday"
                                        onclick="submissionsCountData('Yesterday')"> New
                                        Submissions: {{count($submissionsCountData['Yesterday'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['Yesterday'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">This Week</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['This Week'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['This Week'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['This Week'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="ThisWeek" data-value="This Week"
                                        onclick="submissionsCountData('This Week')"> New
                                        Submissions: {{count($submissionsCountData['This Week'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['This Week'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" style="display: flex; justify-content: space-around;">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Last Week</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Last Week'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Last Week'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Last Week'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="LastWeek" data-value="Last Week"
                                        onclick="submissionsCountData('Last Week')"> New
                                        Submissions: {{count($submissionsCountData['Last Week'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['Last Week'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">This Month</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['This Month'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['This Month'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['This Month'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="ThisMonth" data-value="This Month"
                                        onclick="submissionsCountData('This Month')"> New
                                        Submissions: {{count($submissionsCountData['This Month'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['This Month'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Last Month</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Last Month'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Last Month'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Last Month'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="LastMonth" data-value="Last Month"
                                        onclick="submissionsCountData('Last Month')"> New
                                        Submissions: {{count($submissionsCountData['Last Month'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['Last Month'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" style="display: flex; justify-content: space-around;">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">This Year</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['This Year'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['This Year'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['This Year'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="ThisYear" data-value="This Year"
                                        onclick="submissionsCountData('This Year')"> New
                                        Submissions: {{count($submissionsCountData['This Year'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['This Year'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Last Year</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Last Year'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Last Year'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Last Year'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="LastYear" data-value="Last Year"
                                        onclick="submissionsCountData('Last Year')"> New
                                        Submissions: {{count($submissionsCountData['Last Year'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['Last Year'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">To Date</h5>
                                <p class="card-text">Total Job Orders: {{ count($totalCountData['Joborder'])}}</p>
                                <p class="card-text">Total Candidates: {{ count($totalCountData['Candidate']) }}</p>
                                <p class="card-text">Total Companies: {{ count($totalCountData['Company']) }}</p>
                                <p class="card-text"><a href="javascript:;" id="ToDate" data-value="To Date"
                                        onclick="submissionsCountData('To Date')"> Total
                                        Submissions: {{count($totalCountData['submissionsCount'])}} </a></p>

                                <p class="card-text">Total Contacts: {{ count($totalCountData['Contact']) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Submissions</h5>
                            <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-bordered" id="submissions_list">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('.close-modal').click(function() {
        $('.bd-example-modal-lg').modal('hide');
    });
});

function submissionsCountData(period) {
    // Get the submissions data for the selected period
    var submissionsData = {!!json_encode($submissionsCountData) !!} [period];

    // Check if submissionsData is defined and not empty
    if (submissionsData && submissionsData.length > 0) {
        // Clear existing modal content
        $('#submissions_list').empty();

        // Populate modal with submissions data
        submissionsData.forEach(function(details) {
            console.log(details.candidate_joborder);
            var title = '<h5>' + details.title + ' at ' + details.companies.company_name + ' (' + details
                .owner_user.user_name + ')</h5>';
            var rows = '';

            // Loop over candidate_joborder for each submission
            details.candidate_joborder.forEach(function(candidate) {
                var row = '<tr>' +
                    '<td>' + candidate.candidates.first_name + '</td>' +
                    '<td>' + candidate.candidates.last_name + '</td>' +
                    '<td>' + details.owner_user.user_name + '</td>' +
                    '<td>' + new Date(candidate.date_submitted).toISOString().slice(0, 10) + '</td>' +
                    '</tr>';
                rows += row;
            });

            $('#submissions_list').append('<br>' + title +
                '<table class="table table-striped table-bordered" id="submissions_list"><thead class="no-border"><tr><th style="width: 67px">First Name</th><th style="width: 67px">Last Name</th><th style="width: 67px">Candidate Owner</th><th style="width: 67px">Date Submitted</th></tr></thead><tbody id="container" class="no-border-x no-border-y ui-sortable">' +
                rows + '</tbody></table>');
        });

        // Show the modal
        $('.bd-example-modal-lg').modal('show');

    } else {
        $('.bd-example-modal-lg').modal('show');
        $('#submissions_list').append('<h4 style="margin-left: 35%;">No Data Available</h4>');
        console.log('No data available for the selected period');
    }
    
}
</script>
@endpush