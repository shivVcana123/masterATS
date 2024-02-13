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
                    <div class="container-fluid">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Today</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Today'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Today'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Today'] }}</p>
                                <p class="card-text"><a href="javascript:;" id="Yesterday" data-value="Yesterday"
                                        onclick="submissionsCountData()"> New
                                        Submissions: {{count($submissionsCountData['Today'])}} </a></p>

                                <p class="card-text">New Contacts: {{ $contactCount['Today'] }}</p>
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
                                <thead class="no-border">
                                    <tr>
                                        <th style="width: 67px">ID</th>
                                        <th style="width: 67px">First Name </th>
                                        <th style="width: 67px">Last Name</th>
                                        <th style="width: 67px">Candidate Owner</th>
                                        <th style="width: 67px">Date Submitted</th>

                                    </tr>
                                </thead>
                                <tbody id="container" class="no-border-x no-border-y ui-sortable">
                                    <tr>
                                        <td>1</td>
                                        <td>first</td>
                                        <td>last</td>
                                        <td>Owner</td>
                                        <td>date </td>
                                    </tr>
                                </tbody>
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

function submissionsCountData() {
    $('.bd-example-modal-lg').modal('show');


    var submissionsDetails = <?php echo $submissionsCountDataJson; ?>;
    console.log('submissionsDetails', submissionsDetails);

    var dataValue = $('#Yesterday').data('value');
    var yesterdayArray = submissionsDetails['Yesterday'];
    yesterdayArray.forEach(function(element, index) {
        // Get the <td> element corresponding to the "Date Submitted" column in the current row
        var tdId = $('#submissions_list tbody tr:eq(' + index + ') td:eq(0)');
        var tdFirstName = $('#submissions_list tbody tr:eq(' + index + ') td:eq(1)');
        var tdLastName = $('#submissions_list tbody tr:eq(' + index + ') td:eq(2)');
        var tdCandidateOwner = $('#submissions_list tbody tr:eq(' + index + ') td:eq(3)');
        var tdElement = $('#submissions_list tbody tr:eq(' + index + ') td:eq(4)');

        // Update the text content of the <td> element with the submission_deadline value
        tdId.text(element.id);
        tdFirstName.text(element.candidateJoborder.first_name);
        tdLastName.text(element.candidateJoborder.last_name);
        tdCandidateOwner.text(element.submission_deadline);
        tdElement.text(element.submission_deadline);
    });
}
</script>
@endpush