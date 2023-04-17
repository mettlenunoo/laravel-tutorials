<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.backend.head-links')

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('includes.backend.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('includes.backend.left-sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- End Page-content -->



                </div>
            </div>
        </div>
        <!-- end main content-->

        @include('includes.backend.footer')
    </div>
    <!-- END layout-wrapper -->

    {{-- @include('includes.backend.right-sidebar') --}}

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('includes.backend.footer-links')
</body>

</html>