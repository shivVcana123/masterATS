@extends('layouts.admin')


@section('content')

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #f2f2f2;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
}

.buttn-area {
    margin-left: 53%;
    display: flex;
    margin-top: -40px;
}

body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 78%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #41377e;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive py-5 pb-4 dropdown_2">
                    <div class="container-fluid">
                        <h2>Job orders</h2>
                        <div class="buttn-area">
                            <form class="example" action="{{ route('joborders.index') }}">
                                <input type="text" placeholder="Search.." name="search"
                                    value="{{ $request->input('search') }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <a href="{{route('joborders.create')}}">
                                <button class="btn btn-primary">Add Job Order</button>
                            </a>
                        </div>

                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Cpy Job Id</th>
                                    <th>Modified</th>
                                    <th>Submission Deadline</th>
                                    <th>Recruiter</th>
                                    <th>Owner</th>
                                    <th style="width:80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($datas) > 0)
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td><a href="{{route('joborders.details',$data->id)}}">{{ $data->title }}</a></td>
                                    <td>{{ $data['companies']->company_name }}</td>
                                    <td> @switch($data->type)
                                        @case('C')
                                        <span> C (Contract)</span>
                                        @break

                                        @case('C2H')
                                        <span> C2H (Contract To Hire)</span>
                                        @break
                                        @case('FL')
                                        <span> FL (Freelance)</span>
                                        @break

                                        @case('H')
                                        <span>H (Hire)</span>
                                        @break

                                        @default
                                        <span>NA</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->date_created }}</td>
                                    <td> {{ $data->client_job_id }}</td>
                                    <td> {{ $data->date_modified }}</td>
                                    <td> {{ $data->submission_deadline }}</td>
                                    <td>{{ $data['recruiterUser']->user_name }}</td>
                                    <td>{{ $data['ownerUser']->user_name }}</td>
                                    <td>
                                        <a href="{{route('joborders.details',$data->id)}}"><i class="fa fa-eye"></i></a>
                                        <a href="{{url('/joborder/update',$data->id)}}"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:;" id="joborder_delete_id" data-id="{{$data->id}}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <td colspan="12">No data found</td>
                            @endif
                        </table>
                        <!-- Pagination Links -->
                        @foreach (range('A', 'Z') as $letterOption)
                        <a href="{{ route('joborders.index', ['letter' => $letterOption]) }}"
                            class="{{ $letterOption == $letter ? 'active' : '' }}">
                            {{ $letterOption }}
                        </a>
                        @endforeach
                        <!-- "All" Link -->
                        <a href="{{ route('joborders.index') }}" class="{{ !$letter ? 'active' : '' }}">All</a>

                        <!--     Table end   -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).on('click', '#joborder_delete_id', function() {

    var joborder_delete_id_id = $('#joborder_delete_id').data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t to delete this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/candidates/list/delete/' + joborder_delete_id_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href =
                                "{{ url('/candidates/index'";
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                },
            });
        }
    });
});
</script>
@endpush