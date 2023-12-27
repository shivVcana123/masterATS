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
                <h2>Candidates</h2>
                 <a href="{{ route('candidates.create') }}">
                <button>Add Candidate</button>
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
                              </tr>
                               @foreach ($datas as $data)
                           <tr>
                           <td>{{ $data->first_name }}</td> 
                           <td>{{ $data->last_name }}</td> 
                           <td>{{ $data->city }}</td>
                           <td>{{ $data->state }}</td>
                           <td>{{ $data->key_skills }}</td>
                           <td>{{ $data->user_name }}</td>
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