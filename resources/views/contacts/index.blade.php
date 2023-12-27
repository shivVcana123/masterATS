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
<h2>Contacts</h2>

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
</table>

<p>To understand the example better, we have added borders to the table.</p>

 <!--     Table end   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection