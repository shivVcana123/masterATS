<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>
    <div class="dropdown-menu" x-placement="bottom-start">
        @can('edit-module')
            <a href="{{ route('modules.edit', $modual->id) }}" class=" dropdown-item"><i
                    class="ti ti-edit action-btn"></i>
                {{ __('Edit') }}</a>
        @endcan
        {{--  <div class="dropdown-divider"></div>  --}}
        @can('delete-module')
            <a href="{{ route('modules.index') }}" class="dropdown-item  text-danger"
                data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
                onclick="delete_record('delete-form-{{ $modual->id }}')"><i
                    class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['modules.destroy', $modual->id], 'id' => 'delete-form-' . $modual->id]) !!}
            {!! Form::close() !!}
        @endcan
    </div>
</div>
