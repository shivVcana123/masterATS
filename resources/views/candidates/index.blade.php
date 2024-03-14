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
    background-color: skyblue;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive py-5 pb-4 dropdown_2">
                    <div class="container-fluid">
                        <!--     Table start   -->
                        <h2>Candidates</h2>
                        <a href="{{ route('candidates.create') }}">
                            <button class="btn btn-primary" style="margin-left: 85%;">Add Candidate</button>
                        </a>
                        <table style="width:100%">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Key Skills</th>
                                <th>Owner</th>
                                <th>Created</th>
                                <th>Modified</th>
                                <th>Action</th>
                            </tr>
                            @if(count($datas) > 0)
                            @foreach ($datas as $data)
                            <tr>
                                <td><a href="{{route('candidates.details',$data->id )}}">{{ $data->first_name }}</a>
                                </td>
                                <td>{{ $data->last_name }}</td>
                                <td>{{ $data->city }}</td>
                                <td>{{ $data->state }}</td>
                                <td>{{ $data->key_skills }}</td>
                                <td>{{ $data->user_name }}</td>
                                <td>{{date("Y-m-d", strtotime($data->date_created))}}</td>
                                <td>{{date("Y-m-d", strtotime($data->date_modified))}}</td>
                                <td>
                                    <a href="{{route('candidates.details',$data->id )}}"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('/candidates/update',$data->id )}}"><i class="fa fa-pencil"></i></a>
                                    <a id="candidateDelete" data-id="{{$data->id}}" href="javascript:;"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="12">No data found</td>
                            </tr>
                            @endif
                        </table>
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
$(document).on('click', '#candidateDelete', function() {

    var candidateDelete_id = $('#candidateDelete').data('id');
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
                url:"{{ route('candidates.list.delete') }}" + '/' + candidateDelete_id,
                type: 'GET',
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.reload();
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