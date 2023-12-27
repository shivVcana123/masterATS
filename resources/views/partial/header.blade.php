@php
use App\Facades\UtilityFacades;
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = UtilityFacades::languages();
$profile = asset(Storage::url('uploads/avatar/'));
@endphp

 <header class="dash-header transprent-bg">
    <div class="header-wrapper">
      <div class="ms-auto ml-0">
        <ul class="list-unstyled">
            <li class="dropdown dash-h-item drp-language">
                <a
                  class="dash-head-link dropdown-toggle arrow-none me-0"
                  data-bs-toggle="dropdown"
                  href="#"
                  role="button"
                  aria-haspopup="false"
                  aria-expanded="false"
                >
                  <i class="ti ti-world nocolor"></i>
                  <span class="drp-text hide-mob">{{ Str::upper($currantLang) }}</span>
                  <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @foreach ($languages as $language)
                    <a class="dropdown-item @if ($language == $currantLang) text-danger @endif"
                        href="{{ route('change.language', $language) }}">{{ Str::upper($language) }}</a>
                    @endforeach
                </div>
            </li>
            <li class="dropdown dash-h-item">
                <a class="dash-head-link custom-header dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false" >
                    <img class="rounded-circle" width="35px"
                    {{--  src="{{ !empty($users->avatar) ? $profile . $users->avatar : $profile . '/avatar.png' }}">  --}}
                    src="{{ $profile . '/avatar.png' }}">

                    <span>
                        <h6 class="d-inline-block ps-2">{{ Auth::user()->name }}</h6>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </span>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="ti ti-user"></i> <span>{{ __('Profile') }}</span>
                    </a>
                    @role('admin')
                    <a class="dropdown-item" href="{{ route('settings.index') }}">
                        <i class="ti ti-settings"></i>
                            <span>{{ __('Settings') }}</span>
                    </a>
                    @endrole
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="dropdown-item has-icon">
                        <i class="ti ti-power"></i> {{ __('Logout') }}
                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                </div>
            </li>
          {{--    --}}
        </ul>
      </div>

    </div>
  </header>
