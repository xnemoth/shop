<div class="main" style="margin-bottom: 10px;">
    <div class="content" style="text-align: center">
        <div class="register_account shipping-info" style="text-align:center;display:inline-block;float: none">
            <h1>Địa chỉ giao hàng</h1>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }
            </style>
            <form class="shipping-form" method="post" action="<?php echo base_url('customer/save/shipping/address'); ?>">
                <div>
                    <input type="text" name="shipping_name" placeholder="Họ và tên người nhận">
                </div>
                <div>
                    <input type="text" name="shipping_phone" placeholder="Số điện thoại người nhận">
                </div>
                <div>
                    <input type="text" name="shipping_email" placeholder="Email người nhận">
                </div>
                <div>
                    <input type="text" name="shipping_address" placeholder="Địa chỉ nhận hàng">
                </div>
                <div class="search">
                    <div><button class="btn btn-primary">Xác nhận</button></div>
                </div>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div>