<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>          
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <a href="<?php echo base_url('add/brand')?>">Thêm nhãn hàng</a>
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
                <form class="form-horizontal" action="<?php echo base_url('save/brand')?>" method="post">
                    <fieldset>

                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="fileInput">Tên nhãn hiệu</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="brand_name" id="fileInput" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group" style="margin-left: 80px;">
                            <label class="control-label custom-admin-label" for="textarea2">Mô tả</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="brand_description" rows="3"></textarea>
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
                            <button type="submit" class="btn btn-primary custom-admin-btn custom-admin-label">Xác nhận</button>
                            <button type="reset" class="btn custom-admin-btn">Hủy bỏ</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->