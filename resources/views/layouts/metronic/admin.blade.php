<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>{{Config::get('app.name')}}</title>

        @metronic_partial('meta')

        @yield('vendor-css')
        
        @metronic_partial('css')        
        
        @yield('css')
        
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
    <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
    <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
    <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
    <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
    <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
    <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
    <body class="page-header-fixed page-quick-sidebar-over-content ">

        @metronic_partial('header')        
        <div class="clearfix"></div>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            @metronic_partial('sidebar')
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @if ($enable_theme_modification)
                    @metronic_partial('style-customizer')
                    @endif

                    <h3 class="page-title">
                        @if (array_key_exists('page_title', View::getSections()))
                        @yield('page_title')
                        @else
                        {!! config('app.name_header_html') !!}
                        @endif                                               
                    </h3>

                    @if ($enable_breadcrumbs)
                    @include('layouts.metronic.components.breadcrumbs')                    
                    @endif
                    
                    @yield('content')

                </div>
            </div>
            <!-- END CONTENT -->

            @if ($enable_quick_sidebar)
            @metronic_partial('quick-sidebar')
            @endif
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                2018 &copy; <a href="https://www.nuworks.ph/" target="_blank">NuWorks Interactive Labs Inc.</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        
        @metronic_partial('data.app')        
        @metronic_partial('data.session')
        @metronic_partial('data.ratchet')
        
        @metronic_partial('js')
        
        @yield('vendor-js')
        
        @yield('js')
    </body>
    <!-- END BODY -->
</html>