<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>   
            <a href="<?php echo base_url('dashboard')?>"><i class="icon-home"></i>Trang chủ</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Khách hàng</a></li>
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
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($all_customer as $single_customer){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_customer->customer_name;?></td>
                            <td class="center"><?php echo $single_customer->customer_email;?></td>
                            <td class="center"><?php echo $single_customer->customer_phone;?></td>
                            <td class="center"><?php echo $single_customer->customer_address;?></td>
                            <td class="center">
                                <?php if ($single_customer->customer_active == 1) { ?>
                                    <span class="label label-success" style="border-radius: 3px;">Hoạt động</span>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red; border-radius: 3px;">Chờ</span>
                                    <?php }
                                ?>
                            </td>
                           <td class="center">
                                    <?php if ($single_customer->customer_active == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('active/customer/' . $single_customer->customer_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unactive/customer/' . $single_customer->customer_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>
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