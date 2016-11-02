


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

        <div class="theme-panel hidden-xs hidden-sm">
        </div>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="#">后台首页</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <h3 class="page-title">
        </h3>
        <div class="col-md-12">
            <section class="panel panel-info ">
                <header class="panel-heading">
                    系统信息
                </header>
                <div class="list-group bg-white">
                    <div class="list-group-item">
                        <i class="fa fa-fw fa-eye"></i> 服务器操作系统 : <span class=" text-muted"><?php print_r(PHP_OS);?></span>
                    </div>
                    <div class="list-group-item">
                        <i class="fa fa-fw fa-phone"></i> PHP版本 : <span class=" text-muted"><?php echo phpversion();?></span>
                    </div>
                    <div class="list-group-item">
                        <i class="fa fa-fw fa-phone"></i> apache版本 : <span class=" text-muted"><?php echo apache_get_version();?></span>
                    </div>
                    <div class="list-group-item">
                        <i class="fa fa-fw fa-comments-o"></i> MYSQL版本 ：<span class=" text-muted"><?php $mysqli = new mysqli("localhost", "root", "../Huang1994");
                            echo $mysqli->server_info;
                            $mysqli->close();?></span>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12">
            <section class="panel panel-info ">
                <header class="panel-heading">
                    登录信息
                </header>
                <div class="list-group bg-white">
                    <div class="list-group-item">
                        <i class="fa fa-fw fa-eye"></i> 最近一次登录 : <span class=" text-muted"><?php if( ! ini_get('date.timezone') )
                            {
                                date_default_timezone_set('Asia/Shanghai');
                            }
                            echo date('Y-m-d H:i:s');?></span>
                    </div>
                    <div class="list-group-item">
                        <i class="fa fa-fw fa-phone"></i> 登录ip : <span class=" text-muted"><?php echo $this->input->ip_address();?></span>
                    </div>
                </div>
            </section>
        </div>

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
