<div class="main customer-register-main">
    <div class="content customer-info-content" style="text-align: center">
        <div class="register_account">
            <h1>Thông tin cá nhân</h1>

            <div id="result" class="customer-register-result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <form method="post" action="<?php echo base_url('user/update/info'); ?>" class="customer-info-form">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-floating">
                                    <input id="customer-name" class="form-control" type="text" name="customer_name" placeholder=" " value="<?php echo $user_info->customer_name; ?>">
                                    <label for="customer_name">Họ và tên</label>
                                </div>

                                <div class="form-floating">
                                    <input id="customer-email" class="form-control" type="text" name="customer_email" placeholder=" " value="<?php echo $user_info->customer_email; ?>" disabled='true'>
                                    <label for="customer_email">Email</label>
                                </div>
                            </td>

                            <td>
                                <div class="form-floating">
                                    <input id="customer-phone" class="form-control" type="text" name="customer_phone" placeholder=" " value="<?php echo $user_info->customer_phone; ?>">
                                    <label for="customer_phone">Số điện thoại</label>
                                </div>

                                <div class="form-floating">
                                    <input id="customer-address" class="form-control" type="text" name="customer_address" placeholder=" " value="<?php echo $user_info->customer_address; ?>">
                                    <label for="customer_address">Địa chỉ</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-floating">
                                    <input id="customer-password" class="form-control" type="password" name="customer_password" placeholder=" ">
                                    <label for="customer_password">Mật khẩu cũ</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-floating">
                                    <input id="customer-new-password" class="form-control" type="password" name="customer_new_password" placeholder=" ">
                                    <label for="customer_new_password">Mật khẩu mới</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="buttons">
                    <div><button class="btn btn-primary" style="border-radius: 5px;">Cập nhật</button></div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="card bg-primary text-white cart-header-box" style="width:100%;">
        <div class="card-body cart-header" style="font-weight: bold;">
            <h2 class="content-product-block"> Lịch sử đặt hàng </h2>
        </div>
    </div>
    <div id="result" class="customer-register-result">
        <p><?php echo $this->session->flashdata('del_ord'); ?></p>
    </div>
    <div class="order-history" style="width:100%;">
        <table class="table table-hover table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày mua</th>
                    <th>Người nhận</th>
                    <th>Địa chỉ nhận</th>
                    <th>Tổng đơn</th>
                    <th>Giảm giá</th>
                    <th>Thanh toán</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                if ($order_history) {
                    foreach ($order_history as $single_order_history) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $single_order_history->date_created ?></td>
                            <td><?php echo $single_order_history->shipping_name ?></td>
                            <td><?php echo $single_order_history->shipping_address ?></td>
                            <td>
                                <?php $total = $single_order_history->order_total;
                                echo $this->cart->format_number($total) . ' ₫'; ?>
                            </td>
                            <td>
                                <?php $sale = $single_order_history->sale_off;
                                if ($sale > 100 || $sale == 0) {
                                    echo $this->cart->format_number($sale) . ' ₫';
                                } else {
                                    echo $sale . ' %';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($sale > 100 || $sale == 0) {
                                    echo $this->cart->format_number($total - $sale) . ' ₫';
                                } else {
                                    echo $this->cart->format_number($total - ($sale / 100) * $total) . ' ₫';
                                }
                                ?>
                            </td>
                            <td>
                                <form class="form-action-rm" action="<?php echo base_url('user/delete/order/' . $single_order_history->order_id); ?>" method="post">
                                    <input type="hidden" name="rowid" value="<?php echo $single_order_history->shipping_id ?>" />
                                    <button class="btn btn-warning" type="submit" name="submit">Hủy</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    pwdField = document.getElementById("customer-password");
    pwdField.onkeydown = (() => {
        pwdField.type = "text";
    })
    pwdField.onkeyup = (() => {
        pwdField.type = "password";
    })
</script>
</div>
</div>