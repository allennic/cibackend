<link rel="stylesheet" href="<?php echo base_url('/css/jquery-ui.min.css')?>">
<style>
    .ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
    .ui-timepicker-div dl { text-align: left; }
    .ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
    .ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
    .ui-timepicker-div td { font-size: 90%; }
    .ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
    .attendance{
        width: 1200px;
        height: 600px;

    }
    .attenctrl{
        width: 1100px;
        height: 500px;
        margin-left: 15px;
    }
    .btnctrl{
        width: 100px;
        margin-left: 20px;
    }
</style>
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
                    <a href="#">申请假期</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> 申请假期
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
                        <form class="form-horizontal" id="myvaliForm" role="form" action="<?php echo base_url('user/vacate/add')?>" method="post">
                            <div class="form-body">
                                <div class="form-group last">
                                    <label class="control-label col-md-3">开始时间
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="va_begin" class="form-control"  id="datepicker1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">截止时间</label>
                                    <div class="col-md-9">
                                        <input type="text" name="va_end" class="form-control" id="datepicker2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">部门</label>
                                    <div class="col-md-9">
                                        <input type="text" name="va_depart"class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">姓名</label>
                                    <div class="col-md-9">
                                        <input type="text" name="va_name" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">类型</label>
                                    <div class="col-md-9">
                                        <input type="text" name="va_type" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">说明</label>
                                    <div class="col-md-9">
                                        <input type="text" name="va_note" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit">申请</button>
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
<script type="text/javascript" src="<?php echo base_url('/js/vali/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/js/admin/bootstrapValidator.js')?>"></script>
<script src="<?php echo base_url('/js/jquery-ui.min.js')?>"></script>
<script src="<?php echo base_url('/js/jquery-ui-timepicker-addon.js')?>" type="text/javascript"></script>

<script>
    var data1 = $('#datepicker1');

    data1.datetimepicker();

    var data2 = $('#datepicker2');

    data2.datetimepicker();

</script>
<script language="JavaScript" type="text/javascript">
    $(function () {
        $("#myvaliForm").bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    va_depart: {
                        message: '部门验证失败',
                        validators: {
                            notEmpty: {
                                message: '部门不能为空'
                            }
                        }
                    },
                    va_name: {
                        message: '姓名验证失败',
                        validators: {
                            notEmpty: {
                                message: '姓名不能为空'
                            }
                        }
                    },
                    va_type: {
                        message: '请假类型验证失败',
                        validators: {
                            notEmpty: {
                                message: '请假类型不能为空'
                            }
                        }
                    },
                    va_note: {
                        message: '请假说明验证失败',
                        validators: {
                            notEmpty: {
                                message: '请假说明不能为空'
                            }
                        }
                    }
                }
            })
            .on('success.form.bv', function(e) {
                e.preventDefault();
                var $form = $(e.target),
                    fv    = $form.data('bootstrapValidator');
                $.ajax({
                    url: '<?php echo base_url('/user/vacate/add')?>',
                    type: 'POST',
                    data: $("#myvaliForm").serialize(),
                    success: function(result) {
                        alert("succeed!");
                        location.href="/user/vacate";
                    }
                })
            })
    })
</script>

