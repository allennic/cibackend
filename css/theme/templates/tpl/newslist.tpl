


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
                    <a href="newslist.php">新闻</a>
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
                                    新闻ID
                                </th>
                                <th>
                                    类别ID
                                </th>
                                <th>
                                    图片地址
                                </th>
                                <th>
                                    文章标题
                                </th>
                                <th>
                                    发布时间
                                </th>
                                <th>
                                    来源
                                </th>
                                <th>
                                    文章地址
                                </th>
                                <th>
                                    status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($q1 as $out1): ?>
                            <tr class="odd gradeX">
                                <td>
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                </td>
                                <td id="getnewsid">
                                    <?php print_r($out1['news_id']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['cate_id']);?>
                                </td>
                                <td>
                                    <img src="<?php print_r($out1['pic_url']);?>">
                                </td>
                                <td class="center">
                                    <?php print_r($out1['title']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['pubtime']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['source']);?>
                                </td>
                                <td>
                                    <?php print_r($out1['title_url']);?>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="newsedit.php?id=<?php print_r($out1['news_id']);?>">编辑</a>
                                    <!--<a class=" btn btn-danger btn-xs"  href="/admin/includefile/delete.php?id=<?php print_r($out1['news_id']);?>">删除</a>-->
                                    <a class=" btn btn-danger btn-xs" onclick="postajax(this)">删除</a>
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
<script type="text/javascript">
    function postajax(e) {
        //alert("test");
        $.ajax({
            type: 'post',
            url: '/admin/includefile/delete.php',
            data: {"news_id" : "<?php print_r($out1['news_id']);?>"},
            //dataType: 'json',
            success : function (response) {
                $(e).parents("tr").remove();
            }
        });
    }
</script>


