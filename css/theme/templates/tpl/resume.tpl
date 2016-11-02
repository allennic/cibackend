


<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN STYLE CUSTOMIZER -->
        <!-- END STYLE CUSTOMIZER -->
        <!-- BEGIN PAGE HEADER-->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">新闻</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">新闻列表</a>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box grey-cascade">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>新闻列表
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn green" href="newsedit.php">Add New</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th class="table-checkbox">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                </th>
                                <th>
                                    用户ID
                                </th>
                                <th>
                                    姓名
                                </th>
                                <th>
                                    性别ID
                                </th>
                                <th>
                                    出生年月
                                </th>
                                <th>
                                    地址ID
                                </th>
                                <th>
                                    手机号码
                                </th>
                                <th>
                                    电话号码
                                </th>
                                <th>
                                    学历ID
                                </th>
                                <th>
                                    婚否
                                </th>
                                <th>
                                    所在公司
                                </th>
                                <th>
                                    现任工作
                                </th>
                                <th>
                                    行业ID
                                </th>
                                <th>
                                    加入时间
                                </th>
                                <th>
                                    简历地址
                                </th>
                                <th>
                                    status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($q as $out1): ?>
                            <tr class="odd gradeX">
                                <td>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                </td>
                                <td>
                                    <?php print_r($out1['user_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['name']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['sex_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['born']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['adr_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['tel_phone']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['phone']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['edu_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['mari_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['cur_unit']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['cur_job']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['ind_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['jo_year']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['upload']);?>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="newsedit.php">编辑</a>
                                    <a class="btn btn-danger btn-xs" href="#">删除</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <div class="row">
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
<div class="page-quick-sidebar-wrapper">
    <div class="page-quick-sidebar">
        <div class="nav-justified">
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->
</div>
