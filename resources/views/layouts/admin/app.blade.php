<html lang="en" data-bs-theme-mode="light" data-bs-theme="light">

<head>
    <title>MJRENTAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link href="{{ asset('metronic') }}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('metronic') }}/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('metronic') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('metronic') }}/css/style.bundle.css" rel="stylesheet" type="text/css">
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" class="app-default" cz-shortcut-listen="true">

    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page  flex-column flex-column-fluid" id="kt_app_page">
            @include('layouts.admin.header')

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('layouts.admin.sidebar')

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-xxxl">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        var hostUrl = "{{ asset('metronic') }}/";
    </script>

    <script src="{{ asset('metronic') }}/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('metronic') }}/js/scripts.bundle.js"></script>

    <script src="{{ asset('metronic') }}/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('metronic') }}/js/scripts.bundle.js"></script>
    <script src="{{ asset('metronic') }}/plugins/custom/datatables/datatables.bundle.js"></script>

    @yield('script')
</body>

</html>
