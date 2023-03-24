<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    @include('Admin.layoutAdmin.header')
</head>
<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            @include('Admin.layoutAdmin.menuLeft')
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
               @include('Admin.layoutAdmin.menu')
               @yield('content')
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <script src="{{ ('assetsAdmin/js/pace.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/popper/popper.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/bootstrap.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/sidenav.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/layout-helpers.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/material-ripple.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/eve/eve.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/flot/flot.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/flot/curvedLines.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/chart-am4/core.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/chart-am4/charts.js')}}"></script>
    <script src="{{ ('assetsAdmin/libs/chart-am4/animated.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/demo.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/analytics.js')}}"></script>
    <script src="{{ ('assetsAdmin/js/pages/dashboards_index.js')}}"></script>
</body>
</html>
