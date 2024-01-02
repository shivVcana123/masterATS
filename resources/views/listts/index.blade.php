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
                                <td><a href="{{url('/companies/deatils',$data->id)}}">{{ $data->description }}</a></td>
                                <td>@switch($data->data_item_type)
                                    @case('100')
                                    <p>Candidate</p>
                                    @break
                                    @case('200')
                                    <p>Company</p>
                                    @break
                                    @case('300')
                                    <p>joborders</p>
                                    @break
                                    @default
                                    <p>okk</p>
                                    @break
                                    @endswitch
                                </td>
                                <td> Static </td>
                                <td>{{ $data->first_name }}</td>
                                <td>{{date_format($data->date_created,'d m Y') }}</td>
                                <td>{{date_format($data->date_modified,'d m Y') }}</td>
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