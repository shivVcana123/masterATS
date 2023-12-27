@php
use App\Facades\UtilityFacades;
$logo = asset(Storage::url('uploads/logo/'));
$company_favicon = UtilityFacades::getValByName('company_favicon');
$settings = Utility::settings();

if (isset($settings['color'])) {
    $primary_color = $settings['color'];
    if ($primary_color != '') {
        $color = $primary_color;
    } else {
        $color = 'theme-1';
    }
} else {
    $color = 'theme-1';
}
@endphp
<!DOCTYPE html>
<html lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name') }}</title>
    {{-- <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link rel="icon"
        href="{{ $logo . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}"
        type="image" sizes="16x16">
    @if (env('SITE_RTL') == 'on')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
        {{-- <link rel="manifest" href="{{asset('assets/favicon/manifest.json')}}"> --}}
    @endif
    {{-- <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/notifier.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <!-- vendor css -->
    @if (isset($settings['dark_mode']))
        @if ($settings['dark_mode'] == 'on')
            <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
        @endif
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body class="{{ $color }}">
    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper auth-v1">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <div class="row align-items-center justify-content-center text-start">
                <div class="col-xl-6 text-center cust-margin">
                    <div class="mx-3 mx-md-5 mt-5">

                        @if (isset($settings['dark_mode']))
                            @if ($settings['dark_mode'] == 'on')
                                <img src="{{ $logo . 'dark_logo.png' }}" class="navbar-brand-img app_logo" alt="logo">
                            @else
                                <img src="{{ $logo . 'light_logo.png' }}" class="navbar-brand-img app_logo"
                                    alt="logo">
                            @endif
                        @else
                            <img src="{{ $logo . 'light_logo.png' }}" class="navbar-brand-img app_logo" alt="logo">
                        @endif
                    </div>
                    @yield('content')
                    <footer class="dash-footer">
                        <div class="footer-wrapper">
                            <span class="text-muted">
                                @if (isset($settings['dark_mode']))
                                    @if ($settings['dark_mode'] == 'on')
                                        <img src="{{ $logo . 'light_logo.png' }}" class="navbar-brand-img app_logo"
                                            alt="logo">
                                            @else
                                            <img src="{{ $logo . 'dark_logo.png' }}" class="navbar-brand-img app_logo"
                                            alt="logo">
                                    @endif
                                @else
                                    <img src="{{ $logo . 'dark_logo.png' }}" class="navbar-brand-img app_logo"
                                        alt="logo">
                                @endif
                                {{-- <img src="{{ $logo . 'dark_logo.png' }}" class="navbar-brand-img app_logo" alt="logo"> --}}
                                {{-- <img src="{{ $logo . 'light_logo.png' }}" class="navbar-brand-img app_logo" alt="logo"> --}}
                            </span>
                            <div class="ms-auto">Powered by&nbsp;
                                {{-- <a href="https://quebixtechnology.com/" target="_new">Quebix Technology
                        </a> --}}
                                &copy; {{ date('Y') }} <a href="#" class="fw-bold ms-1"
                                    target="_blank">{{ config('app.name') }}
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script src="{{ asset('assets/js/vendor-all.js') }}"></script>
            <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

            <script src="{{ asset('assets/js/plugins/notifier.js') }}"></script>


            <script>
                @if (session('failed'))
                    notifier.show('Sorry!', '{{ session('failed')->first() }}', 'danger',
                        '{{ asset('assets/images/notification/high_priority-48.png') }}', 4000);
                @endif

                @if (session('errors'))
                    notifier.show('Sorry!', '{{ session('errors')->first() }}', 'danger',
                        '{{ asset('assets/images/notification/high_priority-48.png') }}', 4000);
                @endif

                @if (session('success'))
                    notifier.show('Success', '{{ session('success')->first() }}', 'success',
                        '{{ asset('assets/images/notification/ok-48.png') }}', 4000);
                @endif
                @if (session('successful'))
                    notifier.show('Success', '{{ session('success')->first() }}', 'success',
                        '{{ asset('assets/images/notification/ok-48.png') }}', 4000);
                @endif

                @if (session('warning'))
                    notifier.show('Warning!', '{{ session('warning')->first() }}', 'warning',
                        '{{ asset('assets/images/notification/medium_priority-48.png') }}', 4000);
                @endif

                @if (session('status'))
                    notifier.show('Success', '{{ session('status')->first() }}', 'info',
                        '{{ asset('assets/images/notification/ok-48.png') }}', 4000);
                @endif
            </script>

            @stack('scripts')

</body>

</html>
