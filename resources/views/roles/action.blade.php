<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>
    <div class="dropdown-menu" x-placement="bottom-start">
        @can('edit-role')
            <a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item"> <i
                    class="ti ti-edit action-btn"></i>{{ __('Edit') }}</a>
        @endcan

        @can('show-role')
        {{--  <div class="dropdown-divider"></div>  --}}
            <a href="{{ route('roles.show', $role->id) }}" class="dropdown-item"><i
                    class="ti ti-eye action-btn"></i>{{ __('Show') }}</a>
        @endcan
        {{--  <div class="dropdown-divider"></div>  --}}
        @can('delete-role')
            <a href="{{ route('roles.index') }}" class="dropdown-item  text-danger" data-toggle="tooltip"
                data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $role->id }}')"><i
                    class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'id' => 'delete-form-' . $role->id]) !!}
            {!! Form::close() !!}
        @endcan
    </div>
</div>

