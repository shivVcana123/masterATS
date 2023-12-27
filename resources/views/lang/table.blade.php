@extends('layouts.admin')
@section('title', __('Language'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Language') }}
        </li>
    </ul>
@endsection

@section('content')

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="section-body">
                    <div class="col-md-6 m-auto">
                        <div class="card">
                            <div class="card-header"><h5> {{ __('Manage Languages') }}
                                <a href="{{ route('create.language') }}" data-url=""
                                    class="btn btn-sm btn-primary float-end"
                                    data-ajax-popup="true" data-title="{{ __('Create New Language') }}">
                                     {{ __('Create') }}
                                </a>
                            </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('No.') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Action') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $key=> $lang)
                                            <tr>
                                                <td class="w-50">
                                                    {{$key+1 }}
                                                </td>
                                                <td class="w-100">
                                                    {{ Str::upper($lang) }}
                                                </td>
                                                <td class="w-100">
                                                    @include('lang.action')
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
