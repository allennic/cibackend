
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
                    <a href="">人事行政部</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">人员编辑</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> 人员编辑
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="" class="reload">
                            </a>

                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="<?php echo base_url('/admin/hr/hrpost')?>" method="post">
                            <?php foreach($hr_item as $q):?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ID</label>
                                        <div class="col-md-9">
                                            <input type="text" name="hr_id" class="form-control" value="<?php print_r($q['hr_id']);; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">职位</label>
                                        <div class="col-md-9">
                                            <input type="text" name="hr_job"class="form-control" value="<?php print_r($q['hr_job']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">姓名</label>
                                        <div class="col-md-9">
                                            <input type="text" name="hr_name" class="form-control" value="<?php print_r($q['hr_name']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">手机</label>
                                        <div class="col-md-9">
                                            <input type="text" name="hr_phone" class="form-control" value="<?php print_r($q['hr_phone']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">QQ
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" name="hr_qq" class="form-control" value="<?php print_r($q['hr_qq']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">邮箱</label>
                                        <div class="col-md-9">
                                            <input type="text" name="hr_email" class="form-control" value="<?php print_r($q['hr_email']); ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit">修改</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row ">
        </div>
    </div>
</div>
<script src="<?php echo base_url('/css/theme/assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>

