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
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive py-5 pb-4 dropdown_2">
                    <div class="container-fluid">
                        <!--     Table start   -->
                        <h2>Contacts</h2>
                        <div class="buttn-area" style="margin-left: 84%;">
                            <a href="{{route('contacts.create')}}"><button class="btn btn-primary">Add New
                                    Contact</button></a>
                        </div>

                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Work Phone</th>
                                    <th>Owner</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($contacts) > 0)
                                @foreach($contacts as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->first_name}}</td>
                                    <td>{{$value->last_name}}</td>
                                    <td>{{$value['companies']->company_name}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->phone_work}}</td>
                                    <td>{{$value['ownerUser']->user_name}}</td>
                                    <td>{{date("Y-m-d", strtotime($value->date_created))}}</td>
                                <td>{{date("Y-m-d", strtotime($value->date_modified))}}</td>
                                    <td>
                                        <a href="{{route('contacts.show',$value->id)}}"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('contacts.edit',$value->id)}}"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:;" id="contactDelete" data-value="{{$value->id}}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="12">No data found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$('#contactDelete').click(function() {
    var deleteID = $('#contactDelete').data('value');

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
            $.ajax({
                type: "GET",
                url: "/contacts/delete/" + deleteID,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    const title = response.status ? "success" : "warning";
                    Swal.fire({
                        title: response.message,
                        type: title,
                        icon: title,
                    }).then(function(result) {
                        if (result.isConfirmed && response.status) {
                            window.location.href = "{{route('contacts.index')}}";
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    });
});
</script>
@endpush