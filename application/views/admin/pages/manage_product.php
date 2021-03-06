<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>   
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Sản phẩm</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red; text-align: center;}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <div class="box-content">
                <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá bán</th>
                            <th>Tồn kho</th>
                            <th>Trạng thái</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($get_all_product as $single_product){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_product->product_title;?></td>
                            <td class="center"><img src="<?php echo base_url('uploads/'.$single_product->product_image);?>" style="width:200px;height:75px"/></td>
                            <td class="center"><?php echo $this->cart->format_number($single_product->product_price);?></td>
                            <td class="center"><?php echo $single_product->product_quantity;?></td>
                            <td class="center">
                                <?php if ($single_product->pstatus == 1) { ?>
                                    <span class="label label-success" style="border-radius: 3px;">Hoạt động</span>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red; border-radius: 3px;">Chờ</span>
                                    <?php }
                                ?>
                            </td>
                           <td class="center">
                                    <?php if ($single_product->pstatus == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('published/product/' . $single_product->product_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unpublished/product/' . $single_product->product_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('edit/product/' . $single_product->product_id); ?>" style="border-radius:50% !important;">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/product/' . $single_product->product_id); ?>" style="border-radius:50% !important;">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->