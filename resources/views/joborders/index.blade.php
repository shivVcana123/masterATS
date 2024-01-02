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
            <h2>Job orders</h2>
            <div class="buttn-area">
            <form class="example" action="{{ route('joborders.index') }}">
                <input type="text" placeholder="Search.." name="search" value="{{ $request->input('search') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

          </div>
          <a href="{{route('joborders.create')}}">
          <button class="btn btn-primary">Add Job Order</button>
          </a>
          @if(count($datas) > 0)
          <table style="width:100%">
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
            </tr>
                    @foreach ($datas as $data)
                                <tr>
                                <td>{{ $data->id }}</td>
                                <td><a href="{{route('joborders.profile',$data->id)}}">{{ $data->title }}</a></td>
                                <td>{{ $data->company_name }}</td>
                                <td>{{ $data->type }}</td>
                                <td>{{ $data->status }}</td>
                                <td>{{ $data->date_created }}</td>
                                <td> {{ $data->client_job_id }}</td>
                                <td> {{ $data->date_modified }}</td>
                                <td></td>
                                <td>{{ $data->recruiter_name }}</td>
                                <td>{{ $data->owner_name }}</td>
                                </tr>
                      @endforeach
</table>
@else
<p>No data found</p>
@endif
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

