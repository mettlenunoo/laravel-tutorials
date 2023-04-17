<!doctype html>
<html class="no-js" lang="en">
    @include('includes.frontend.head-links')
    <body>
        <!-- preloader-start -->
        {{-- <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div> --}}
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        @include('includes.frontend.header')
        @yield('content')
        @include('includes.frontend.footer')
        @include('includes.frontend.footer-links')
        
    </body>
</html>
