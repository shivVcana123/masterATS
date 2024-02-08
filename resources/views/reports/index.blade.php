@extends('layouts.admin')


@section('content')

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
                                <a href="javascript:;" onclick="submissionsCountData()">
                                    <p class="card-text"> New Submissions: {{count($submissionsCountData['Today'])}}</p>
                                </a>
                                <p class="card-text">New Contacts: {{ $contactCount['Today'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Yesterday</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Yesterday'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Yesterday'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Yesterday'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['Yesterday']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['Yesterday'] }}</p>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">This Week</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['This Week'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['This Week'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['This Week'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['This Week']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['This Week'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Last Week</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Last Week'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Last Week'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Last Week'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['Last Week']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['Last Week'] }}</p>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">This Month</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['This Month'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['This Month'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['This Month'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['This Month']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['This Month'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Last Month</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Last Month'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Last Month'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Last Month'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['Last Month']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['Last Month'] }}</p>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">This Year</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['This Year'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['This Year'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['This Year'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['This Year']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['This Year'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Last Year</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['Last Year'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['Last Year'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['Last Year'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['Last Year']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['Last Year'] }}</p>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">To Date</h5>
                                <p class="card-text">New Job Orders: {{ $jobOrderCount['To Date'] }}</p>
                                <p class="card-text">New Candidates: {{ $candidateCount['To Date'] }}</p>
                                <p class="card-text">New Companies: {{ $companyCount['To Date'] }}</p>
                                <p class="card-text"> New Submissions: {{$submissionsCount['To Date']}}</p>
                                <p class="card-text"> New Placements</p>
                                <p class="card-text">New Contacts: {{ $contactCount['To Date'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
function submissionsCountData() {
   $('.bd-example-modal-lg').show();
}
</script>
@endpush