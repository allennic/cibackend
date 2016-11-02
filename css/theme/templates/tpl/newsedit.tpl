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
                    <a href="#">新闻编辑</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> 新闻编辑
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
                        <form class="form-horizontal" role="form" action="/admin/includefile/editpost.php" method="post">
                            <?php foreach($q1 as $q):?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">新闻ID</label>
                                    <div class="col-md-9">
                                        <input type="text" name="news_id" class="form-control" value="<?php print_r($q['news_id']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">类别ID</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cate_id"class="form-control" value="<?php print_r($q['cate_id']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">图片地址</label>
                                    <div class="col-md-9">
                                        <input type="text" name="pic_url" class="form-control" value="<?php print_r($q['pic_url']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章标题</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" value="<?php print_r($q['title']); ?>">
                                    </div>
                                </div>
                                <div class="form-group last">
										                <label class="control-label col-md-3">新闻内容
                										</label>
              										<div class="col-md-9">
              											<textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"><?php print_r($q['content']); ?></textarea>
              											<div id="editor2_error">
              											</div>
              										</div>
              									</div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">发布时间</label>
                                    <div class="col-md-9">
                                        <input type="text" name="pubtime" class="form-control" value="<?php print_r($q['pubtime']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">来源</label>
                                    <div class="col-md-9">
                                        <input type="text" name="source" class="form-control" value="<?php print_r($q['source']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">文章地址</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title_url" class="form-control" value="<?php print_r($q['title_url']); ?>">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" name="submit">修改</button>
                                        <button type="submit" class="btn btn-danger" name="add">增加</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->
            </div>
        </div>
        <div class="row ">
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
