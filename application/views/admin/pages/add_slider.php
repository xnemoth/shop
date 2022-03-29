<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('add/slider')?>">Thêm quảng cáo</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red; text-align: center;}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('save/slider');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label custom-admin-label" for="fileInput">Tên banner/ slider</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="slider_title" type="text"/>
                            </div>
                        </div> 
                        
                         <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label custom-admin-label" for="fileInput">Hình ảnh</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="slider_image" type="file"/>
                            </div>
                        </div>
                        
                         <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label custom-admin-label" for="fileInput">Đường dẫn chèn</label>
                            <div class="controls">
                                <input class="span6 typeahead"  name="slider_link" type="url"/>
                            </div>
                        </div>
                        
                                
                        <div class="control-group" style="margin-left: 190px;">
                            <label class="control-label custom-admin-label" for="textarea2">Trạng thái</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Chưa đăng tải</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions custom-panel-button">
                            <button type="submit" id="save_category" class="btn btn-primary custom-admin-btn">Xác nhận</button>
                            <button type="reset" class="btn custom-admin-btn">Hủy bỏ</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

    
    
</div><!--/.fluid-container-->

<!-- end: Content -->