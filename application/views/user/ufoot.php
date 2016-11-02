<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
<div class="page-quick-sidebar-wrapper">
    <div class="page-quick-sidebar">
        <div class="nav-justified">
        </div>
    </div>
</div>

</div>

<div class="page-footer">
    <div class="page-footer-inner">
        2016 &copy; YSK-admin. <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank"></a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script src="<?php echo base_url('/css/theme/assets/global/scripts/metronic.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('/css/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('/css/theme/assets/admin/layout/scripts/layout.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('/css/theme/assets/admin/layout/scripts/quick-sidebar.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('/css/theme/assets/admin/pages/scripts/index.js')?>" type="text/javascript"></script>





<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        Index.init();
        Index.initDashboardDaterange();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        //TableEditable.init();
    });
</script>

</body>

</html>
