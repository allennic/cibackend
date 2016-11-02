<div class="page-content-wrapper">
    <div class="page-content">
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
            </div>
        </div>

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="">主页</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">请假</a>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box grey-cascade">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>请假
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
                                    <a class="btn green" href="<?php echo base_url('user/vacate/add')?>">申请假期</a>
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
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                    <tr>
                        <th>
                            部门
                        </th>
                        <th>
                            姓名
                        </th>
                        <th>
                            类型
                        </th>
                        <th>
                            开始时间
                        </th>
                        <th>
                            结束时间
                        </th>
                        <th>
                            状态
                        </th>
                        <th>
                            说明
                        </th>
                    </tr>
                    </thead>
                    <tbody id="div">
                    <?php

                    if($out->num_rows() > 0){

                    foreach($out->result() as $out1){

                    ?>
                        <tr class="odd gradeX">
                            <td>
                                <?php echo $out1->va_depart;?>
                            </td>
                            <td>
                                <?php echo $out1->va_name;?>
                            </td>
                            <td>
                                <?php echo $out1->va_type;?>
                            </td>
                            <td class="center">
                                <?php echo $out1->va_begin;?>
                            </td>
                            <td class="center">
                                <?php echo $out1->va_end;?>
                            </td>
                            <td>
                                <?php echo $out1->va_status;?>
                            </td>
                            <td>
                                <?php echo $out1->va_note;?>
                            </td>
                        </tr>
                        <?php

                    }


                    } else {

                    ?>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
        <div class="page-quick-sidebar-wrapper">
            <div class="page-quick-sidebar">
                <div class="nav-justified">
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('/css/theme/assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>