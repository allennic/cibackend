
<style>
    #pagination{


    }
    .input_text {
        display: inline;
        margin: 100px;
    }
    .input_name {
        display: inline;
        margin: 65px;
    }
    .input_email {
        display: inline;
        margin-left: 73px;
    }
    .input_num {
        display: inline;
        margin: 36px;
    }
    .input_country {
        display: inline;
        margin: 53px;
    }
    .tsc_pagination li a
    {
        border:solid 1px;
        border-radius:3px;
        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        padding:6px 9px 6px 9px;
    }
    .tsc_pagination li
    {
        padding-bottom:1px;
    }
    .tsc_pagination li a:hover,
    .tsc_pagination li a.current
    {
        color:#FFFFFF;
        box-shadow:0px 1px #EDEDED;
        -moz-box-shadow:0px 1px #EDEDED;
        -webkit-box-shadow:0px 1px #EDEDED;

        float: left;

    }
    .tsc_pagination
    {
        margin:4px 0;
        padding:0px;
        height:100%;
        overflow:hidden;
        font:12px 'Tahoma';
        list-style-type:none;

        margin-left: 450px;
    }
    .tsc_pagination li
    {
        float:left;
        margin:0px;
        padding:0px;
        margin-left:5px;
    }
    .tsc_pagination li a
    {
        color:black;
        display:block;
        text-decoration:none;
        padding:7px 10px 7px 10px;
        float: left;

        margin-right: 10px;
    }
    .tsc_pagination li a img
    {
        border:none;
    }
    .tsc_pagination li a
    {
        color:#0A7EC5;
        border-color:#8DC5E6;
        background:#F8FCFF;
    }
    .tsc_pagination li a:hover,
    .tsc_pagination li a.current
    {
        text-shadow:0px 1px #388DBE;
        border-color:#3390CA;
        background:#58B0E7;
        background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
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
                    <a href="">财务部</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">人员列表</a>
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
                            <i class="fa fa-globe"></i>人员列表
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
                                    <a class="btn green" href="<?php echo base_url('admin/finace/add')?>">Add New</a>
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
                        <th class="table-checkbox">
                            #
                        </th>
                        <th>
                            id
                        </th>
                        <th>
                            职位
                        </th>
                        <th>
                            姓名
                        </th>
                        <th>
                            手机
                        </th>
                        <th>
                            QQ
                        </th>
                        <th>
                            邮箱
                        </th>
                        <th>
                            status
                        </th>
                    </tr>
                    </thead>
                    <tbody id="div">
                    <?php foreach($money_item as $out1): ?>
                        <tr class="odd gradeX" id="q<?php print_r($out1['money_id']);?>">
                            <td>
                                <input type="checkbox" name="pchid[]" value="<?php print_r($out1['money_id']);?>"/>
                            </td>
                            <td id="postdata">
                                <?php print_r($out1['money_id']);?>
                            </td>
                            <td id="getnewsid">
                                <?php print_r($out1['money_job']);?>
                            </td>
                            <td>
                                <?php print_r($out1['money_name']);?>
                            </td>
                            <td>
                                <?php print_r($out1['money_phone']);?>
                            </td>
                            <td class="center">
                                <?php print_r($out1['money_qq']);?>
                            </td>
                            <td>
                                <?php print_r($out1['money_email']);?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xs" name="gid" href="<?php echo base_url('/admin/finace/editmoney?gid=')?><?php print_r($out1['money_id']);?>">编辑</a>
                                <a class=" btn btn-danger btn-xs" onclick="postajax(<?php print_r($out1['money_id']);?>)">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" id="reverseBtn" onclick="othercheck()"><a class="glyphicon glyphicon-ok"></a> 反选</button>
                                <button type="button" id="deleteBtn"  class="btn btn-default" onclick="postajax1()"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
                            </div>
                        </div>
                    </tr>
                    </tbody>
                </table>
                <div id="pagination">
                    <ul class="tsc_pagination">


                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                        } ?>
                    </ul>
                </div>

            </div>
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



<script>
    var CheckBox=div.getElementsByTagName('input');
    var Values="";
    function othercheck(){
        var d='';
        for(i=0;i<CheckBox.length;i++){
            if(CheckBox[i].checked==true){ CheckBox[i].checked=false;}
            else{ CheckBox[i].checked=true;Values+=d+"'"+CheckBox[i].value+"'";d=',';}
        }
    }
    var sList = "";

    function postajax1() {
        //alert(e);
        var c='';
        for(i=0;i<CheckBox.length;i++){
            if(CheckBox[i].checked==true){sList+=c+"'"+CheckBox[i].value+"'";c=',';}
        }
        //alert(sList);
        $.ajax({
            type: 'post',
            url: '/admin/finace/deletecheck',
            data: {money_id: sList},
            //dataType: 'json',
            success : function (response) {
                //$('.reallinp').remove();
                location.reload();
            }
        });
    }
</script>


<script type="text/javascript">
    function postajax(e) {
//alert(e);
        $.ajax({
            type: 'post',
            url: '/admin/finace/delete',
            data: {money_id : e},
            //dataType: 'json',
            success : function (response) {
                $('#q'+e).remove();
            }
        });
    }
</script>




