<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>
    <div class="dropdown-menu" x-placement="bottom-start">
        @can('edit-langauge')
            <a href="{{ route('manage.language', [$lang]) }}" class="dropdown-item"> <i class="ti ti-edit action-btn"></i>
                {{ __('Edit') }}</a>
        @endcan
        {{--  <div class="dropdown-divider"></div>  --}}
        @can('delete-langauge')
            <a href="{{ route('index') }}" class="dropdown-item  text-danger " data-toggle="tooltip"
                data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $lang }}')"><i
                    class="ti ti-trash action-btn"></i> {{ __('Delete') }}</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $lang], 'id' => 'delete-form-' . $lang]) !!}
            {!! Form::close() !!}
        @endcan
    </div>
</div>
