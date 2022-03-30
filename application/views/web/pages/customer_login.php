

<div class="main customer-login-main">
    <div class="content" style="text-align: center">
         <div class="login_panel" style="width:400px;text-align:center;display:inline-block;float: none">
            <h3>Đăng nhập</h3>
            <p>Chào mừng bạn trở lại</p>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/logincheck');?>" method="post">
                <input name="customer_email" placeholder="Email đăng nhập" type="text"/>
                <input name="customer_password" placeholder="Mật khẩu" type="password"/>
                <p class="note">Hoặc đăng ký nếu bạn chưa có tài khoản <a href="#">Đăng ký</a></p>
                <div class="buttons"><div><button class="grey">Đăng nhập</button></div></div>
            </form>
        </div>	
        <div class="clear"></div>
    </div>
</div>