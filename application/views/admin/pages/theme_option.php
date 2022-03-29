<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard') ?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo base_url('theme/option') ?>">Cài đặt trang web</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red;
                    text-align: center;
                }
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('save/option') ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="siteBrand" style="display:flex;">

                            <div class="logo">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Logo cửa hàng</label>
                                    <div class="controls">
                                        <input class="span6 typeahead" name="site_logo" id="fileInput" type="file" />
                                        <input name="delete_logo" value="<?php echo get_option('site_logo'); ?>" type="hidden" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <img src="<?php echo base_url('uploads/'); ?><?php echo get_option('site_logo'); ?>" style="width:320px;height:240px" />
                                    </div>
                                </div>
                            </div>

                            <div class="ficon">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Icon trang</label>
                                    <div class="controls">
                                        <input class="span6 typeahead" name="site_favicon" id="fileInput" type="file" />
                                        <input name="delete_favicon" value="<?php echo get_option('site_favicon'); ?>" type="hidden" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <img src="<?php echo base_url('uploads/'); ?><?php echo get_option('site_favicon'); ?>" style="width:120px;height:90px" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label" for="fileInput">Số điện thoại</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php get_option('site_contact_num'); ?>" name="site_contact_num" id="fileInput" type="text" />
                            </div>
                        </div>

                        <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label" for="fileInput">Facebook</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php get_option('site_facebook_link'); ?>" name="site_facebook_link" id="fileInput" type="text" />
                            </div>
                        </div>


                        <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label" for="fileInput">Github</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php get_option('site_github_link'); ?>" name="site_github_link" id="fileInput" type="text" />
                            </div>
                        </div>

                        <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label" for="fileInput">Email</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php get_option('site_email_link'); ?>" name="site_email_link" id="fileInput" type="text" />
                            </div>
                        </div>

                        <div class="form-actions custom-panel-button">
                            <button type="submit" class="btn btn-primary custom-admin-btn">Xác nhận</button>
                            <button type="reset" class="btn custom-admin-btn">Hủy bỏ</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->

</div>
<!--/.fluid-container-->

<!-- end: Content -->