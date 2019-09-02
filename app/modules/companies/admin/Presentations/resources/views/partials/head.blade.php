<head>
    <meta charset="utf-8" />
    <title>Guia Localiza | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #3 for dashboard & statistics" name="description" />
    <meta content="" name="author" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="/assets/companies/admin/theme/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/companies/admin/theme/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/companies/admin/theme/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/companies/admin/theme/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    @yield('page-level-plugins-head')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS CSS -->
    @yield('page-level-scripts-css')
    <!-- END PAGE LEVEL SCRIPTS CSS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/assets/companies/admin/theme/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/assets/companies/admin/theme/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/assets/companies/admin/theme/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/companies/admin/theme/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- BEGIN PLUGINS CSS GLOBAL -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <!-- END PLUGINS CSS GLOBAL -->
    <!-- BEGIN CUSTOM GLOBAL CSS -->
    <link href="{{ asset('/assets/companies/admin/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <!-- END CUSTOM GLOBAL CSS -->

    @include('site::companies.partials.shared.html-icons')


</head>
<!-- END HEAD -->
