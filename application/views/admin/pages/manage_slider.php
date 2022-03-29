<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard') ?>"> <i class="icon-home"></i>Trang chủ</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/slider') ?>">Quảng cáo</a></li>
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
                            <th>Tên QC</th>
                            <th>Đường dẫn chèn</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_slider as $single_slider) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="center"><?php echo $single_slider->slider_title; ?></td>
                                <td class="center"><a target="_blank" href="<?php echo base_url($single_slider->slider_title);?>">Xem</a></td>
                                <td class="center"><img src="<?php echo base_url('uploads/'.$single_slider->slider_image);?>" style="width:300px;height:100px"/></td>
                                <td class="center">
                                    <?php if ($single_slider->publication_status == 1) { ?>
                                        <span class="label label-success" style="border-radius: 3px;">Hoạt động</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger" style="background:red; border-radius: 3px;">Chờ</span>
                                    <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_slider->publication_status == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('published/slider/' . $single_slider->slider_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unpublished/slider/' . $single_slider->slider_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                    <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('edit/slider/' . $single_slider->slider_id); ?>" style="border-radius:50% !important;">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/slider/' . $single_slider->slider_id); ?>" style="border-radius:50% !important;">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->