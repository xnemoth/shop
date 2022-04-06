<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard') ?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo base_url('manage/order') ?>">Đơn hàng</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('order/details') ?>">Chi tiết</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red;
                    text-align: center;
                }
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <div class="box-content">
                <div class="span4 text-left">
                    <h2>ID.<?php echo $customer_info->customer_id; ?> Thông tin người mua</h2>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tên người mua: </td>
                            <td><?php echo $customer_info->customer_name; ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td><?php echo $customer_info->customer_address; ?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại: </td>
                            <td><?php echo $customer_info->customer_phone; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $customer_info->customer_email; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="span4"></div>
                <div class="span4 text-right" class="table table-striped table-bordered">
                    <h2>ID.<?php echo $shipping_info->shipping_id; ?> Thông tin người nhận</h2>
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <td>Tên người nhận:</td>
                            <td><?php echo $shipping_info->shipping_name; ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ nhận:</td>
                            <td><?php echo $shipping_info->shipping_address; ?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><?php echo $shipping_info->shipping_phone; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $shipping_info->shipping_email; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="span4" style="margin: 15px 0px 20px;width: 100%;">
                    <h1 style="color: blue;text-align:center;font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h1>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($order_details_info as $single_order_details) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_order_details->product_name ?></td>
                                <td><img src="<?php echo base_url('uploads/' . $single_order_details->product_image); ?>" style="width:200px;height:100px" /></td>
                                <td><?php echo $this->cart->format_number($single_order_details->product_price) ?> </td>
                                <td><?php echo $single_order_details->product_sales_quantity ?></td>
                                <td><?php echo $this->cart->format_number($single_order_details->product_price * $single_order_details->product_sales_quantity) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="5">Tổng cộng</td>
                            <td><?php
                                $sale = $this->cart->format_number($order_info->sale_off);
                                $total = $this->cart->format_number($order_info->order_total);
                                echo $total;
                                ?>
                        </tr>
                        <tr>
                            <td colspan="5">Giảm giá</td>
                            <td><?php echo $sale < 100 ? $sale . ' %' : $sale . ' ₫'; ?> </td>
                        </tr>
                        <tr>
                            <td colspan="5">Thanh toán</td>
                            <td><?php if ($sale > 100) {
                                    echo $total - $sale;
                                } else {
                                    echo $total - ($sale / 100) * $total;
                                } ?> </td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->



</div>
<!--/.fluid-container-->

<!-- end: Content -->