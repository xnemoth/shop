<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('add/category')?>">Thêm nhóm sản phẩm</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red;text-align: center;}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('save/category');?>" method="post">
                    <fieldset>

                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Tên loại nhóm</label>
                            <div class="controls">
                                <input class="span6 typeahead" id="category_name" name="category_name" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="textarea2">Mô tả chi tiết</label>
                            <div class="controls">
                                <textarea class="cleditor" id="category_description" name="category_description" rows="3"></textarea>
                            </div>
                        </div>
                                
                        <div class="control-group" style="margin-left: 80px;">
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
                            <button type="reset" class="btn custom-admin-btn">Xóa thay đổi</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->
    
</div><!--/.fluid-container-->

<!-- end: Content -->