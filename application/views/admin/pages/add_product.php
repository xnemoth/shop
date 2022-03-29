<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('add/product')?>">Thêm sản phẩm</a>
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
                <form class="form-horizontal" action="<?php echo base_url('save/product');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Tên sản phẩm</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_title" id="fileInput" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="textarea2">Mô tả chung</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_description" id="textarea2" rows="2"></textarea>
                            </div>
                        </div>        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="textarea2">Chi tiết sản phẩm</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" id="textarea2" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Chọn hình ảnh</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Giá bán</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_price" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Số lượng trong kho</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_quantity" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Nhóm hàng</label>
                            <div class="controls">
                                <select name="product_category">
                                    <?php foreach($all_published_category as $single_category){?>
                                    <option value="<?php echo $single_category->id;?>"><?php echo $single_category->category_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Thương hiệu</label>
                            <div class="controls">
                                <select name="product_brand">
                                    <?php foreach($all_published_brand as $single_brand){?>
                                    <option value="<?php echo $single_brand->brand_id;?>"><?php echo $single_brand->brand_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Hiển thị</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="0" name="product_feature" id="fileInput" type="radio" checked="true"/> Sản phẩm đề xuất mới
                                <input class="span6 typeahead" value="1" name="product_feature" id="fileInput" type="radio" />Có sẵn
                             </div>
                        </div>
                        
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="textarea2">Trạng thái</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Chờ</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions custom-panel-button">
                            <button type="submit" class="btn btn-primary custom-admin-btn">Xác nhận</button>
                            <button type="reset" class="btn custom-admin-btn">Hủy bỏ</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->