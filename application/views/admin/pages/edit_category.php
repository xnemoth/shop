<!-- start: Content -->
<div id="content" class="span10">

    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('manage/category')?>">Nhóm sản phẩm</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('edit/category/'.$category_info_by_id->id)?>">Cập nhật thông tin nhóm sản phẩm</a>
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
                <form class="form-horizontal" action="<?php echo base_url('update/category/'.$category_info_by_id->id);?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label custom-admin-label" for="fileInput">Tên loại nhóm</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $category_info_by_id->category_name;?>" id="category_name" name="category_name" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label custom-admin-label" for="textarea2">Mô tả</label>
                            <div class="controls">
                                <textarea class="cleditor" id="category_description" name="category_description" rows="3">
                                    <?php echo $category_info_by_id->category_description;?>
                                </textarea>
                            </div>
                        </div>
                                
                        <div class="control-group">
                            <label class="control-label custom-admin-label" for="textarea2">Trạng thái</label>
                            <div class="controls">
                                <select id="slect" name="publication_status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Chưa đăng tải</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions custom-panel-button">
                            <button type="submit" id="save_category" class="btn btn-primary custom-admin-btn">Cập nhật</button>
                            <button type="reset" class="btn btn-primary custom-admin-btn">Hủy bỏ</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

   
    
</div><!--/.fluid-container-->

<!-- end: Content -->