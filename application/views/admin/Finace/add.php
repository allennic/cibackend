
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
                    <a href="">财务部</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">人员添加</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> 人员添加
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
                        <form class="form-horizontal" role="form" id="myvaliForm" action="<?php echo base_url('admin/finace/add')?>" method="post">
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">职位</label>
                                    <div class="col-md-9">
                                        <input type="text" name="money_job"class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">姓名</label>
                                    <div class="col-md-9">
                                        <input type="text" name="money_name" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">手机</label>
                                    <div class="col-md-9">
                                        <input type="text" name="money_phone" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3">QQ
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="money_qq" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">邮箱</label>
                                    <div class="col-md-9">
                                        <input type="text" name="money_email" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit">添加</button>
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
                    money_job: {
                        message: '职位验证失败',
                        validators: {
                            notEmpty: {
                                message: '不能为空'
                            },
                            stringLength: {
                                min: 1,
                                max: 18,
                                message: '职位长度必须在1到18位之间'
                            },
                            regexp: {
                                regexp: /^[-'a-zA-Z\u4e00-\u9eff]{1,20}$/,
                                message: '职位名只能包含英文大写、小写、中文'
                            }
                        }
                    },
                    money_email: {
                        validators: {
                            notEmpty: {
                                message: '邮箱不能为空'
                            },
                            emailAddress: {
                                message: '邮箱地址格式有误'
                            }
                        }
                    },
                    money_name: {
                        validators: {
                            notEmpty: {
                                message: '姓名不能为空'
                            }
                        }
                    },
                    money_qq: {
                        validators: {
                            notEmpty: {
                                message: 'qq不能为空'
                            },
                            regexp: {
                                regexp: /^[0-9\.]+$/,
                                message: 'qq号只能全为数字'
                            }
                        }
                    },
                    money_phone: {
                        validators: {
                            notEmpty: {
                                message: '手机不能为空'
                            },
                            regexp: {
                                regexp: /^[0-9\.]+$/,
                                message: '手机号只能全为数字'
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
                    url: '<?php echo base_url('/admin/finace/add')?>',
                    type: 'POST',
                    data: $("#myvaliForm").serialize(),
                    success: function(result) {
                        alert("suceed!");
                        location.href="/admin/finace/";
                    }
                })
            })
    })
</script>

<!--<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function() {
            alert("submitted!");
        }
    });
    $().ready(function() {
        $("#myvaliForm").validate({
            rules: {
                money_job: "required",
                money_name: "required",
                money_phone: "required",
                money_qq: "required",
                money_email: "required"
            },
            messages: {
                money_job: "不能为空",
                money_name: "不能为空",
                money_phone: "不能为空",
                money_qq: "不能为空",
                money_email: "不能为空"
            }
        });
    });
</script>-->

