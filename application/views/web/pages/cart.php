<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <div class="card bg-primary text-white cart-header-box">
                    <div class="card-body cart-header" style="font-weight: bold;">
                        <h2 class="content-product-block">
                            Giỏ hàng
                        </h2>
                    </div>
                </div>
                <?php if ($this->cart->total_items()) { ?>
                    <table class="tblone">
                        <tr>
                            <th width="5%">STT</th>
                            <th width="30%">Sản phẩm</th>
                            <th width="10%">Chi tiết</th>
                            <th width="15%">Giá</th>
                            <th width="20%">Số lượng</th>
                            <th width="15%">Tổng tiền</th>
                            <th width="5%"><button class="btn btn-primary" id="rmAction">Loại bỏ</button></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($cart_contents as $cart_items) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cart_items['name'] ?></td>
                                <td><a href="<?php echo base_url('product/' . $cart_items['id']); ?>"><img src="<?php echo base_url('uploads/' . $cart_items['options']['product_image']) ?>" alt="<?php echo $cart_items['name'] ?>" /></a></td>
                                <td><?php echo $this->cart->format_number($cart_items['price']) ?> ₫</td>
                                <td>
                                    <form action="<?php echo base_url('update/cart'); ?>" method="post">
                                        <input type="number" name="qty" value="<?php echo $cart_items['qty'] ?>" />
                                        <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
                                        <input type="submit" name="submit" value="Cập nhật" />
                                    </form>
                                </td>
                                <td><?php echo $this->cart->format_number($cart_items['subtotal']) ?> ₫</td>

                                <td id="rmCols" class="form-action-rm hidden">
                                    <form action="<?php echo base_url('remove/cart'); ?>" method="post">
                                        <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
                                        <input type="submit" name="submit" value="X" />
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>


                    </table>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>Tổng cộng : </th>
                            <td><?php echo $this->cart->format_number($this->cart->total()) ?> ₫</td>
                        </tr>
                        <tr>
                            <th>Giảm giá : </th>
                            <td>
                                <?php
                                $total = $this->cart->total();
                                $tax = ($total * 15) / 100;
                                echo $this->cart->format_number($tax);
                                ?> ₫
                            </td>
                        </tr>
                        <tr>
                            <th>Thành tiền :</th>
                            <td><?php echo $this->cart->format_number($tax + $this->cart->total()); ?> ₫ </td>
                        </tr>
                    </table>
                <?php
                } else { ?>
                <div class="empty-cart-noti">
                    <h2>Trống rỗng rồi</h2>
                    <p><img src="<?php echo base_url() ?>assets/web/images/empty-cart.png" alt="Empty" width="200px"></img></p>
                </div>
                <?php }
                ?>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <h2><p>Tiếp tục mua hàng</p></h2>
                    <a href="<?php echo base_url('product') ?>"><img src="<?php echo base_url() ?>assets/web/images/cat-shopping.png" alt="Tiếp tục mua hàng" /></a>
                </div>
                <div class="shopright">
                    <?php
                    $customer_id = $this->session->userdata('customer_id');
                    if (empty($customer_id)) {
                    ?>
                    <h2><p>Đăng nhập để đặt hàng<p></h2>
                        <p><a href="<?php echo base_url('/customer/login') ?>"> <img src="<?php echo base_url() ?>assets/web/images/checkout.png" alt="Thanh toán" /></a></p>
                    <?php
                    } elseif (!empty($customer_id)) {
                    ?>
                    <h2><p>Hoàn tất đặt hàng</p></h2>
                        <p><a href="<?php echo base_url('customer/shipping') ?>"> <img src="<?php echo base_url() ?>assets/web/images/checkout.png" alt="Thanh toán" /></a></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    let rmAction = document.getElementById('rmAction');
    let rmForm = document.getElementById('rmCols');
    rmAction.addEventListener("click", function(){
        rmForm.classList.toggle('hidden');
    });
</script>
</div>
</div>