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
                    <a href="#">打卡记录</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> 打卡记录
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
                    <div class="portlet-body">
                        <div class="attendance">
                            <?php echo form_open('user/uindex/attendpost'); ?>
                            <form method="post">
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="datepicker1" name="data1post">
                                          <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button" id="data1btn" >上班打卡</button>
                                          </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="datepicker2" name="data2post">
                                          <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button" id="data2btn">下班打卡</button>
                                          </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btnctrl">提交</button>
                            </form>
                            <div class="attenctrl" >
                                <table class="table table-bordered table-hover col-md-6" >
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            上班时间
                                        </th>
                                        <th>
                                            下班时间
                                        </th>
                                        <th>
                                            ip地址
                                        </th>
                                        <th>
                                            说明
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($qret as $qout): ?>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <?php print_r($qout['work']);?>
                                        </td>
                                        <td>
                                            <?php print_r($qout['off']);?>
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <span class="label label-info">
                                                <?php print_r($qout['judge']);?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row ">
        </div>
    </div>
</div>
<script src="<?php echo base_url('/css/theme/assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('/js/jquery-ui.min.js')?>"></script>
<script src="<?php echo base_url('/js/jquery-ui-timepicker-addon.js')?>" type="text/javascript"></script>

<script>
    var data1 = $('#datepicker1');

    data1.datetimepicker();

    $('#data1btn').click(function(){

        data1.datetimepicker(
            "setDate", (new Date())

        );


    });

    var data2 = $('#datepicker2');

    data2.datetimepicker();

    $('#data2btn').click(function(){

        data2.datetimepicker(
            "setDate", (new Date())
        );

    });

</script>




