<div class="main customer-login-main">
    <div class="content" style="text-align: center">
        <div class="login_panel" style="width:400px;text-align:center;display:inline-block;float: none">
            <h1>Cửa hàng nemoth</h1>
            <h5>Đăng nhập tài khoản</h5>
            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red
                }
            </style>
            <div id="result" class="customer-login-result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <form action="<?php echo base_url('customer/logincheck'); ?>" method="post" class="customer-login-form">
                <input name="customer_email" placeholder="Email đăng nhập" type="text" />
                <input name="customer_password" placeholder="Mật khẩu" type="password" />
                <p class="note">Hoặc <a href="<?php echo base_url('/customer/register'); ?>">Đăng ký</a> nếu bạn chưa có tài khoản </p>
                <div class="buttons">
                    <div><button class="btn btn-primary" style="border-radius: 5px;">Đăng nhập</button></div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div>