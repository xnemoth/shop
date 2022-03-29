<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashoard') ?>"> <i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Thông tin</a></li>
    </ul>





    <div class="row-fluid">

        <a class="quick-button metro green span3 metro-custom" href="<?php echo base_url('manage/customer'); ?>">
            <i class="icon-group"></i>

            <h1><?php $query = $this->db->query('SELECT * FROM tbl_customer');
                echo $query->num_rows(); ?></h1>
            <h4>Khách hàng</h4>
        </a>

        <a class="quick-button metro blue span3 metro-custom" href="<?php echo base_url('manage/order'); ?>">
            <i class="icon-shopping-cart"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM tbl_order');
                echo $query->num_rows(); ?></h1>
            <h4>Đơn hàng</h4>
        </a>

        <a class="quick-button metro red span3 metro-custom" href="<?php echo base_url('manage/category') ?>">
            <i class="icon-th"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM tbl_category');
                echo $query->num_rows(); ?></h1>
            <h4>Nhóm sản phẩm</h4>
        </a>

        <a class="quick-button metro orange span3 metro-custom" href="<?php echo base_url('manage/product') ?>">
            <i class="icon-barcode"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM tbl_product');
                echo $query->num_rows(); ?></h1>
            <h4>Sản phẩm</h4>
        </a>

        <div class="clearfix"></div>
        <hr>

    </div>
    <!--/row-->

    <div class="row-fluid">
        <div class="span3 metro-custom"></div>
        <a class="quick-button metro pink span3 metro-custom" href="<?php echo base_url('manage/brand') ?>">
            <i class="icon-bold"></i>
            <h1><?php $query = $this->db->query('SELECT * FROM tbl_brand');
                echo $query->num_rows(); ?></h1>
            <h4>Thương hiệu</h4>
        </a>
        
        <a  id="totalincome" class="quick-button metro black span3 metro-custom">
            <i class="icon-money"></i>
            <?php 
            if(!isset($_POST["date_create"]) || $_POST["date_create"] == '') {
                $temp = '';
            }else{
                $date = str_replace('/', '-', $_POST["date_create"]);
                $temp = ' WHERE date_created LIKE "' . $date . '"';
                unset($_POST["date_create"]);
            }
            ?>
            <h1><?php $query = $this->db->query('SELECT SUM( order_total)as total FROM tbl_order' . $temp . ';')->row();
                echo $query->total;
                unset($_POST["test"]);
                $temp = '';
                ?></h1>
            <h4>Tổng thu nhập</h4>
        </a>
        </div>
        
        <div class="modal hide fade" id="incomemodal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Chọn ngày thống kê</h3>
        </div>
        <div class="modal-body">
            <form action="" method="post" style="text-align: center;">
                <input type="date" name="date_create" data-date="" data-date-format="DD MMMM YYYY">
                <button type="submit" class="btn btn-primary" style="margin-top:-10px;border-radius: 3px !important; color: white;">Xác nhận</button>
            </form>
        </div>
    </div>

        <div class="span3 metro-custom"></div>
    </div>

</div>
<script src="<?php echo base_url() ?>assets/admin/js/custom.js"></script>
<!--/.fluid-container-->

<!-- end: Content -->