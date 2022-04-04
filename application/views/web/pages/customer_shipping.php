

<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Địa chỉ giao hàng</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/save/shipping/address');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="shipping_name" placeholder="Họ và tên người nhận">
                                </div>

                                <div>
                                    <input type="text" name="shipping_phone" placeholder="Số điện thoại người nhận">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="shipping_email" placeholder="Email người nhận">
                                </div>
                                        

                                <div>
                                    <input type="text" name="shipping_address" placeholder="Địa chỉ nhận hàng">
                                </div>
                                
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="btn btn-primary">Xác nhận</button></div></div>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>