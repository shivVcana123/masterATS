@extends('layouts.admin')


@section('content')
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
                href="{{ url('/candidates/update',$candidatesDetails[0]->candidate_id ) }}"> Edit</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary "> {{ $candidatesDetails[0]->first_name }}
                    {{ $candidatesDetails[0]->middle_name }}
                    {{ $candidatesDetails[0]->last_name }}</button>
                <button type="button" class="btn btn-secondary  dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#exampleModal">Add to
                        List</a>
                    <a class="dropdown-item" href="javascript:;">Add to Job Order </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Candidates Details -->
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-Mail:</strong>
                {{ $candidatesDetails[0]->email1 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>2nd E-Mail:</strong>
                {{ $candidatesDetails[0]->email2 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Home Phone:</strong>
                {{ $candidatesDetails[0]->phone_home  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cell Phone:</strong>
                {{ $candidatesDetails[0]->phone_cell  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Work Phone:</strong>
                {{ $candidatesDetails[0]->phone_work  }}
            </div>
        </div>
    </div>

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

                    <input type="text" id="">
                        <input type="hidden" style="width:200px;" id="dataItemArray" value="74">
                        <div class="evenDivRow" id="savedListRow2">
                            <span style="float:left;">
                                <input type="checkbox" id="savedListRowCheck2">
                                &nbsp;
                                <span id="savedListRowDescriptionArea2">p</span>&nbsp;(1)
                            </span>
                            <span style="float:right; padding-right:25px;">
                                <a href="javascript:void(0);" onclick="editListRow(2);"
                                    style="text-decoration:none;">&nbsp;Edit</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="new_list">New List</button>
                    <button type="button" class="btn btn-primary">Add To List</button>
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
                        <th></th>
                    </tr>
                    @foreach($candidatesDetails as $details)
                    <tr>
                        <td>{{$details->joborder_id}}</td>
                        <!-- <td>{{$details->title}}</td> -->
                        <td><a href="{{route('joborders.profile',$details->joborder_id)}}">{{ $details->title }}</a>
                        </td>
                        <td>{{$details->type}}</td>
                        <td>{{$details->status}}</td>
                        <td>{{$details->date_created}}</td>
                        <td>{{$details->date_modified}}</td>
                        <td>{{$details->start_date}}</td>
                        <td>{{$details->title}}</td>
                        <td>{{$details->title}}</td>
                        <td>{{$details->p}} </td>
                        <td>{{$details->recruiter}}</td>
                        <td>{{$details->user_name}} </td>
                        <td>Action</td>
                        <td></td>
                    </tr>
                    @endforeach
                </thead>
                <tbody id="container" class="no-border-x no-border-y ui-sortable">

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script>

</script>
@endpush