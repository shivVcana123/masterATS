@extends('layouts.admin')
@section('title', __('Show Permissions '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
        <li class="breadcrumb-item">{{ __('Show') }}
        </li>
    </ul>
@endsection
@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
            <div class="col-12 m-auto">
                <div class="card">
                    <div class="card-header"><strong>{{ __('Add / Edit Permissions to ') }} {{ $role->name }}
                            {{ __(' Role') }}
                        </strong> </div>
                    {!! Form::model($role, ['method' => 'POST', 'route' => ['roles_permit', $role->id]]) !!}
                    <div class="card-body">
                        <table class="table table-flush permission-table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="200px">{{ __('Module') }}</th>
                                    <th>{{ __('Permissions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($moduals as $row)
                                    <tr>
                                        <td> {{ __(ucfirst($row)) }}</td>
                                        <td>
                                            <div class="row">
                                                <?php $default_permissions = ['manage', 'create', 'edit', 'delete', 'show']; ?>
                                                @foreach ($default_permissions as $permission)
                                                    @if (in_array($permission . '-' . $row, $allpermissions))
                                                        @php($key = array_search($permission . '-' . $row, $allpermissions))
                                                        <div class="col-3 custom-control custom-checkbox">
                                                            {{ Form::checkbox('permissions[]', $key, in_array($permission . '-' . $row, $permissions), ['class' => 'form-check-input input-light-primary', 'id' => 'permission_' . $key]) }}
                                                            {{ Form::label('permission_' . $key, ucfirst($permission), ['class' => 'form-check-label']) }}
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <?php $modules = []; ?>
                                @foreach ($modules as $module)
                                    <?php $s_name = $module; ?>
                                    <tr>
                                        <td>
                                            {{ __(ucfirst($module)) }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                @if (in_array('manage-' . $s_name, $allpermissions))
                                                    @php($key = array_search('manage-' . $s_name, $allpermissions))
                                                    <div class="col-3 custom-control custom-checkbox">
                                                        {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'form-check-input input-light-primary', 'id' => 'permission_' . $key]) }}
                                                        {{ Form::label('permission_' . $key, __('Manage'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                @endif
                                                @if (in_array('create-' . $module, $allpermissions))
                                                    @php($key = array_search('create-' . $module, $allpermissions))
                                                    <div class="col-3 custom-control custom-checkbox">
                                                        {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'form-check-input input-light-primary', 'id' => 'permission_' . $key]) }}
                                                        {{ Form::label('permission_' . $key, __('Create'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                @endif
                                                @if (in_array('edit-' . $module, $allpermissions))
                                                    @php($key = array_search('edit-' . $module, $allpermissions))
                                                    <div class="col-3 custom-control custom-checkbox">
                                                        {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'form-check-input input-light-primary', 'id' => 'permission_' . $key]) }}
                                                        {{ Form::label('permission_' . $key, __('Edit'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                @endif
                                                @if (in_array('delete-' . $module, $allpermissions))
                                                    @php($key = array_search('delete-' . $module, $allpermissions))
                                                    <div class="col-3 custom-control custom-checkbox">
                                                        {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'form-check-input input-light-primary', 'id' => 'permission_' . $key]) }}
                                                        {{ Form::label('permission_' . $key, __('Delete'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                @endif
                                                @if (in_array('view-' . $module, $allpermissions))
                                                    @php($key = array_search('view-' . $module, $allpermissions))
                                                    <div class="col-3 custom-control custom-checkbox">
                                                        {{ Form::checkbox('permissions[]', $key, in_array($key, $permissions), ['class' => 'form-check-input input-light-primary', 'id' => 'permission_' . $key]) }}
                                                        {{ Form::label('permission_' . $key, __('show'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a class="btn btn-secondary mb-3" href="{{ route('roles.index') }}"> {{ __('Back') }}</a>
                            {{ Form::submit(__('Update Permission'), ['class' => 'btn btn-primary mb-3']) }}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>

    <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>
@endsection
