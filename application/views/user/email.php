<style>
    body { padding-top: 70px; }

    #load { height: 100%; width: 100%; }
    #load {
        position    : fixed;
        z-index     : 99999; /* or higher if necessary */
        top         : 0;
        left        : 0;
        overflow    : hidden;
        text-indent : 100%;
        font-size   : 0;
        opacity     : 0.6;
        background  : #E0E0E0  url(<?php echo base_url('/css/assets/images/load.gif');?>) center no-repeat;
    }

    .RbtnMargin { margin-left: 5px; }
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
                    <a href="#">邮件</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> 邮件
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
                        <div id="load">Please wait ...</div>



                        <center><a href="<?php echo site_url('user/message');?>">点击查看邮件</a></center><br />
                        <div class="container">
                            <div class="row">
                                <div id="notif"></div>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="well well-sm">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <legend class="text-center">邮件</legend>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="name">收件姓名</label>
                                                    <div class="col-md-9">
                                                        <input id="name" type="text" placeholder="Your name" class="form-control" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="email">发件邮箱</label>
                                                    <div class="col-md-9">
                                                        <input id="email" type="email" placeholder="Your email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="subject">标题</label>
                                                    <div class="col-md-9">
                                                        <input id="subject" type="text" placeholder="Your subject" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="message">内容</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 text-right">
                                                        <button type="button" id="submit" class="btn btn-primary">发送</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </div>
</div>
<script src="<?php echo base_url('css/assets/js/jquery-1.11.2.min.js');?>"></script>
<script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>
<script>
    $(document).ready(function(){

        $("#load").hide();

        $("#submit").click(function(){

            $( "#load" ).show();

            var dataString = {
                name : $("#name").val(),
                email : $("#email").val(),
                subject : $("#subject").val(),
                message : $("#message").val()
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/send/submit');?>",
                data: dataString,
                dataType: "json",
                cache : false,
                success: function(data){

                    $("#load").hide();
                    $("#name").val('');
                    $("#email").val('');
                    $("#subject").val('');
                    $("#message").val('');

                    if(data.success == true){

                        $("#notif").html(data.notif);

                        var socket = io.connect( 'http://'+window.location.hostname+':3000' );

                        socket.emit('new_count_message', {
                            new_count_message: data.new_count_message
                        });

                        socket.emit('new_message', {
                            name: data.name,
                            email: data.email,
                            subject: data.subject,
                            created_at: data.created_at,
                            id: data.id
                        });

                    } else if(data.success == false){

                        $("#name").val(data.name);
                        $("#email").val(data.email);
                        $("#subject").val(data.subject);
                        $("#message").val(data.message);
                        $("#notif").html(data.notif);

                    }

                } ,error: function(xhr, status, error) {
                    alert(error);
                },

            });

        });

    });
</script>
