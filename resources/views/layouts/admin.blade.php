@php
use App\Facades\UtilityFacades;
$logo = asset(Storage::url('uploads/logo/'));
$company_favicon = UtilityFacades::getValByName('company_favicon');
$settings = UtilityFacades::settings();
if(isset($settings['color']))
{
    $primary_color = $settings['color'];
    if ($primary_color!="") {
        $color = $primary_color;
    } else {
        $color = 'theme-1';
    }
}
else{
    $color = 'theme-1';
}

if(isset($settings['dark_mode']))
{
    $dark_mode = $settings['dark_mode'];
    if ($dark_mode!="") {
        $dark_mode = $dark_mode;
    } else {
        $dark_mode = "";
    }
}
else{
    $dark_mode = "";
}





@endphp
<!DOCTYPE html>
<html dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}" lan="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ $logo . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}" type="image" sizes="16x16">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" /> --}}

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{--  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">  --}}



    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">

    {{-- Notification --}}
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/notifier.css') }}">

{{--  {{ dd($settings['dark_mode']) }}  --}}
    @if (env('SITE_RTL') == 'on')
    <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @else
        @if ($dark_mode == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
        @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
        @endif
    @endif

        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        @yield('css')
        <link href="{{ asset('vendor/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    {{--  <link href="{{ asset('css/style.css') }}" rel="stylesheet">  --}}

    @stack('style')
</head>

<body class="{{ $color }}">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="dash-mob-header dash-header">
        <div class="pcm-logo">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="logo logo-lg" />
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="dash-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <!-- <i data-feather="menu"></i> -->
            </a>
            <a href="#!" class="dash-head-link" id="headerdrp-collapse">
                <i data-feather="align-right"></i>
            </a>
            <a href="#!" class="dash-head-link" id="header-collapse">
                <i data-feather="more-vertical"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->

    <!-- [ navigation menu ] start -->
    {{--  @include('layouts.sidebar')  --}}
    @include('partial.nav-builder')

    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    {{--  @include('include.header')  --}}
    @include('partial.header')

</body>

<!-- [ Main Content ] start -->
<div class="dash-container">
    <div class="dash-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">

                        <div class="page-header-title">
                            <h4 class="m-b-10">@yield('title')</h4>
                        </div>
                        @yield('breadcrumb')

                    </div>
                </div>
            </div>
        </div>
{{--  {{ dd(Session::all() )}}  --}}
        @yield('content')
    </div>
</div>
<!-- [ Main Content ] end -->

{{--  <footer class="dash-footer">
    <div class="footer-wrapper">
        <span class="text-muted">
            <img src="{{ $logo . 'dark_logo.png' }}" class="navbar-brand-img main-logo" alt="logo">
        </span>
        <div class="ms-auto">Powered by&nbsp;
             &copy; {{ date('Y') }} <a href="#" class="fw-bold ms-1"
                target="_blank">{{ config('app.name') }}
        </div>
    </div>
</footer>  --}}

<footer class="dash-footer">
    <div class="footer-wrapper">
        <span class="text-muted">
            Powered by&nbsp;
            &copy; {{ date('Y') }} <a href="#" class="fw-bold ms-1"
                target="_blank">{{ config('app.name') }}
            {{--  <img src="{{ $logo . 'dark_logo.png' }}" class="main-logo" alt="logo">  --}}

        </span>
        {{--  <div class="ms-auto ff">Powered by&nbsp;
            &copy; {{ date('Y') }} <a href="#" class="fw-bold ms-1"
                target="_blank">{{ config('app.name') }}
        </div>  --}}

        <div class="py-1">
            <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a class="link-secondary" href="javascript:"></a>
                </li>
                <li class="list-inline-item">
                    <a class="link-secondary" href="javascript:"> </a>
                </li>
                <li class="list-inline-item">
                    <a class="link-secondary" href="javascript:"></a>
                </li>
                <li class="list-inline-item">
                    <a class="link-secondary" href="javascript:"></a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<!-- Form Modal -->
<div class="modal fade" role="dialog" id="common_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="body">

            </div>
        </div>
    </div>
</div>


<!-- Form Modal Ends -->

    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  --}}

    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/dash.js') }}"></script>



    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
   

    <!-- Apex Chart -->
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>

      <script>
        function removeClassByPrefix(node, prefix) {
          for (let i = 0; i < node.classList.length; i++) {
            let value = node.classList[i];
            if (value.startsWith(prefix)) {
              node.classList.remove(value);
            }
          }
        }
      </script>

{{-- Notiffication --}}

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/notifier.js') }}"></script>
<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('js/coreui-utils.js') }}"></script>
{{--  <script src="{{ asset('js/select2.min.js') }}"></script>  --}}
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
{{--  <script src="{{ asset('js/custom.js') }}"></script>  --}}
    <script>
        var toster_pos = "{{ env('SITE_RTL') == 'on' ? 'left' : 'right' }}";
    </script>
    <script>
        function delete_record(id) {
            event.preventDefault();
            if (confirm('Are You Sure?')) {
                document.getElementById(id).submit();
            }
        }
    </script>

    @include('layouts.includes.alerts')
    @yield('javascript')

    @stack('scripts')
</body>

</html>
