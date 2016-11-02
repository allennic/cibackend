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
                    <a href="">账号设置</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">修改密码</a>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <form class="form-horizontal" role="form" method="post" id="validateform" name="validateform">
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <i class='icon-edit icon-large'></i>
                    修改密码
                </div>
                <div class='panel-body'>
                    <fieldset>
                        <legend>请输入您的帐号信息</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">新密码</label>
                            <div class="col-sm-4">
                                <input type="password" name="password2" class="form-control" placeholder="请输入新密码" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">确认新密码</label>
                            <div class="col-sm-4">
                                <input type="password" name="password3" class="form-control" data-match="#password2" data-match-error="Whoops, these don't match" placeholder="请再次输入新密码" >
                            </div>
                        </div>

                    </fieldset>
                    <div class='form-actions'>
                        <button name="dosubmit" class="btn  btn-primary " type="submit">保存修改</button>
                    </div>
                </div>
            </div>
        </form>

        <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
        <div class="page-quick-sidebar-wrapper">
            <div class="page-quick-sidebar">
                <div class="nav-justified">
                </div>
            </div>
        </div>
<script type="text/javascript" src="<?php echo base_url('/js/vali/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('/js/admin/bootstrapValidator.js')?>"></script>
<script language="JavaScript" type="text/javascript">
    $(function () {
        $("#validateform").bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    password2: {
                        validators: {
                            notEmpty: {
                                message: '新密码不能为空'
                            },
                            stringLength: {
                                min: 6,
                                max: 18,
                                message: '长度必须在6到18位之间'
                            },
                            identical: {
                                field: 'password3',
                                message: '与确认新密码不相符'
                            }
                        }
                    },
                    password3: {
                        validators: {
                            notEmpty: {
                                message: '确认新密码不能为空'
                            },
                            stringLength: {
                                min: 6,
                                max: 18,
                                message: '长度必须在6到18位之间'
                            },
                            identical: {
                                field: 'password2',
                                message: '与新密码不相符'
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
                    url: '<?php echo base_url('/admin/profile')?>',
                    type: 'POST',
                    data: $("#validateform").serialize(),
                    success: function(result) {
                        alert("suceed!");
                        location.href="/admin/admin/index";
                    }
                })
            })
    })
</script>




