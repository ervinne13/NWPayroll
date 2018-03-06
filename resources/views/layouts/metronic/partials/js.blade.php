<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{asset("assets/global/plugins/respond.min.js")}}"></script>
<script src="{{asset("assets/global/plugins/excanvas.min.js")}}"></script> 
<![endif]-->
<script src="{{asset("assets/global/plugins/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/jquery-migrate.min.js")}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset("assets/global/plugins/jquery-ui/jquery-ui.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/jquery.blockui.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/jquery.cokie.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/uniform/jquery.uniform.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN THEME LEVEL SCRIPTS -->
<script src="{{asset("assets/global/scripts/metronic.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/admin/layout/scripts/layout.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/admin/layout/scripts/quick-sidebar.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/admin/layout/scripts/demo.js")}}" type="text/javascript"></script>        
<!-- END THEME LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function () {
    // initiate layout and plugins
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features    
});
</script>

<script src="{{asset("assets/global/scripts/lib/formutils.js")}}" type="text/javascript"></script>