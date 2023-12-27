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
<h2>Lists</h2>

<table style="width:100%">
  <tr>
    <th>Count</th>
    <th>Description</th>
    <th>Data Type</th>
    <th>List Type</th>
    <th>Owner</th>
    <th>Created</th>
     <th>Modified</th>
  </tr>
              @foreach ($datas as $data)
                           <tr>
                           <td>{{ $data->number_entries }}</td> 
                           <td>{{ $data->description }}</td> 
                           <td>{{ $data->short_description }}</td>
                           <td> Static </td>
                           <td>{{ $data->first_name }}</td>
                           <td>{{ $data->date_created }}</td>
                           <td>{{ $data->date_modified }}</td>
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