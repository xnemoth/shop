<div class="main payment-main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h2>Phương thức thanh toán</h2>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form class="shipping-form" method="post" action="<?php echo base_url('save/order');?>" style="text-align: left">
                <span><input type="radio" name="payment" value="cod"/> Thanh toán khi nhận hàng</span><br/>
                <div class="search"><div><button class="btn btn-primary">Xác nhận</button></div></div>
            </form>
           
        </div>  	
        <div class="clear"></div>
    </div>
</div>
</div>
</div>