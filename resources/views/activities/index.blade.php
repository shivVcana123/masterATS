@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive py-5 pb-4 dropdown_2">
                        <div class="container-fluid">
                            <!--     Table start   -->
                         

<style>
table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: #f2f2f2;
}

th, td {
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
<h2>Activities</h2>

                     <table style="width:100%">
                        <tr>
                       <th>Date</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                        <th>Regarding</th>
                        <th>Activity</th>
                       <th>Notes</th>
                       <th>Entered By</th>
                       </tr>
                       @foreach ($datas as $data)
                           <tr>
                           <td>{{ $data->date_created }}</td>
                           <td>{{ $data->first_name }}</td> 
                           <td>{{ $data->last_name }}</td>
                          <td>{{ $data->title }}</td>
                           <td>{{ $data->short_description }}</td>
                           <td>{{ $data->notes }}</td>
                           <td>{{ $data->first_name }}</td>
                           </tr>
                             @endforeach
</table>

 <!--     Table end   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


