<!--[if lt IE 9]>
<script src="/assets/companies/admin/theme/global/plugins/respond.min.js"></script>
<script src="/assets/companies/admin/theme/global/plugins/excanvas.min.js"></script> 
<script src="/assets/companies/admin/theme/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="/assets/companies/admin/theme/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/assets/companies/admin/theme/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/assets/companies/admin/theme/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('page-level-plugins-body')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS JS -->
@yield('page-level-scripts-js')
<!-- END PAGE LEVEL SCRIPTS JS -->

<!-- BEGIN CUSTOM GLOBAL JS -->
<script src="{{asset('/js/plugins/jquery/jquery.maskedinput.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="{{asset('/assets/companies/admin/js/global/modal-locations.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/companies/admin/js/global/main.js')}}" type="text/javascript"></script>
<!-- END CUSTOM GLOBAL JS -->
