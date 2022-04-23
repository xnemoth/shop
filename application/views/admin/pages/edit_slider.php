<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('manage/slider') ?>">Quảng cáo</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo base_url('edit/slider/'.$slider_info_by_id->slider_id)?>">Cập nhật thông tin slider</a>
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
                <form class="form-horizontal" action="<?php echo base_url('update/slider/'.$slider_info_by_id->slider_id);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label custom-admin-label" for="fileInput">Tên banner/slider</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $slider_info_by_id->slider_title;?>" name="slider_title" type="text"/>
                            </div>
                        </div> 
                        
                         <div class="control-group">
                            <label class="control-label custom-admin-label" for="fileInput">Hình ảnh</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="slider_image" type="file"/>
                                <input class="span6 typeahead" value="<?php echo $slider_info_by_id->slider_image;?>" name="slider_delete_image" type="hidden"/>
                            </div>
                        </div>
                        
                        
                         <div class="control-group">
                            <label class="control-label custom-admin-label" for="fileInput">Hình ảnh hiện tại</label>
                            <div class="controls">
                                <img style="width:500px;height:200px" src="<?php echo base_url('uploads/'.$slider_info_by_id->slider_image);?>"/>
                            </div>
                        </div>
                        
                         <div class="control-group">
                            <label class="control-label custom-admin-label" for="fileInput">Đường dẫn chèn</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $slider_info_by_id->slider_link;?>" name="slider_link" type="url"/>
                            </div>
                        </div>
                        
                                
                        <div class="control-group">
                            <label class="control-label custom-admin-label" for="textarea2">Trạng thái</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Chưa đăng tải</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions custom-panel-button">
                            <button type="submit" id="save_category" class="btn btn-primary custom-admin-btn">Cập nhật</button>
                            <a href="<?php echo base_url('manage/slider') ?>"><button type="button" class="btn custom-admin-btn">Hủy bỏ</button></a>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

    
    
</div><!--/.fluid-container-->

<!-- end: Content -->