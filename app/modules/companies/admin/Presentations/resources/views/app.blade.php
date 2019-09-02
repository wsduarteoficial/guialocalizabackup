<!DOCTYPE html>
<!--
    Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
    Version: 4.7.1
    Author: KeenThemes
    Website: http://www.keenthemes.com/
    Contact: support@keenthemes.com
    Follow: www.twitter.com/keenthemes
    Dribbble: www.dribbble.com/keenthemes
    Like: www.facebook.com/keenthemes
    Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
    Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
    License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
    -->
<!--[if IE 8]>
<html lang="pt-br" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="pt-br" class="ie9 no-js">
<![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    @include('admin::partials.head')
    <body class="page-container-bg-solid page-header-menu-fixed">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        @include('admin::partials.headertop')
                        @include('admin::partials.headermenu')
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            @include('admin::partials.pagehead')
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE BREADCRUMBS -->
                                    @yield('breadcrumb')
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    @yield('main-content')
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->

                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    @include('admin::partials.footer')
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>

        @include('admin::partials.modal-locations')

        <!-- END QUICK NAV -->
        @include('admin::partials.scritpshtml')
    </body>
</html>
