<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Đơn hàng</a></li>
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
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Thanh toán</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($all_manage_order_info as $single_order){
                            $i++;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $single_order->customer_name?></td>
                            <td><?php echo $single_order->customer_phone?></td>
                            <td><?php echo $single_order->customer_email?></td>
                            <td><?php echo $this->cart->format_number($single_order->order_total)?></td>
                            <td>
                                
                                <a class="btn btn-info" href="<?php echo base_url('order/details/'.$single_order->order_id);?>" style="border-radius: 3px;">Chi tiết</a>
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