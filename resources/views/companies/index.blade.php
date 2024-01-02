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

.buttn-area {
    margin-left: 28%;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: space-between;
    justify-content: flex-end;
    align-items: center;
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
                        <!--     Table start   -->
                        <h2>Company</h2>
                        <div class="buttn-area">
                            <!-- <form class="example" action="{{ route('companies.index') }}">
                                <input type="text" placeholder="Search.." name="search" value="">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->


                            <a href="{{route('companies.create')}}"><button class="btn btn-primary">Add New
                                    Company</button></a>
                        </div>
                        <table style="width:100%">
                            @if(count($datas) > 0)
                            <tr>
                                <th>Name</th>
                                <th>Jobs</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Phone</th>
                                <th>Owner</th>
                                <th>Created</th>
                                <th>Modified</th>
                                <th>Action</th>
                            </tr>
                            @foreach($datas as $data)
                            @foreach($data['user'] as $user) 
                            <tr>
                                <td><a
                                        href="{{route('companies.deatils',$data->id )}}">{{ $data->company_name }}</a>
                                </td>
                                <td>{{$data['jobDetails']->count() }} </td>
                                <td>{{ $data->city }}</td>
                                <td>{{ $data->state }}</td>
                                <td>{{ $data->primary_phone }}</td>

                                <td>{{ $user->user_name }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td>
                                    <a href="{{route('companies.deatils',$data->id )}}"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ url('/companies/update',$data->id )}}"><i
                                            class="fa fa-pencil"></i></a>
                                    <a id="companiesDelete" data-id="{{$data->id}}" href="javascript:;"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                            @else
                            <p>No data fonnd</p>
                            @endif
                        </table>
                        <!-- @foreach (range('A', 'Z') as $letterOption)
                        <a href="{{ route('companies.index', ['letter' => $letterOption]) }}"
                            class="{{ $letterOption == $letter ? 'active' : '' }}">
                            {{ $letterOption }}
                        </a>
                        @endforeach -->

                        <!-- "All" Link -->
                        <!-- <a href="{{ route('companies.index') }}" class="{{ !$letter ? 'active' : '' }}">All</a> -->
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
$('#companiesDelete').click(function() {
    // alert('okkk');
    // {{route('companies.delete',$data->id )}}

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t to delete this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user confirms, trigger the deletion
            window.location.href = '/delete/' + recordId; // Adjust the URL as needed
        }
    });
});
</script>
@endpush