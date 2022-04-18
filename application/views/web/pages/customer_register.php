<div class="main customer-register-main" style="margin-bottom: 10px;">
    <div class="content" style="text-align: center">
        <div class="register_account">
            <h1>Cửa hàng nemoth</h1>
            <h5>Đăng kí tài khoản mới</h5>

            <div id="result" class="customer-register-result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <form method="post" action="<?php echo base_url('customer/save'); ?>" class="customer-register-form">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input id="register-name" type="text" name="customer_name" placeholder="Họ và tên">
                                </div>
                                <div>
                                    <input id="register-email" type="text" name="customer_email" placeholder="Email">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="register-pnb" type="text" name="customer_phone" placeholder="Số điện thoại">
                                </div>
                                <div>
                                    <input id="register-pwd" type="password" name="customer_password" placeholder="Mật khẩu">
                                </div>
                            </td>
                        </tr>
                        <tr colspan="2">
                            <td colspan="2" style="text-align: center;">
                                <div>
                                    <input id="register-addr" type="text" name="customer_address" placeholder="Địa chỉ">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="note">Hoặc <a href="<?php echo base_url('/customer/login'); ?>">Đăng nhập</a> nếu bạn đã có tài khoản </p>
                <div class="buttons">
                    <div><button class="btn btn-primary" style="border-radius: 5px;">Đăng kí</button></div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
    pwdField = document.getElementById("register-pwd");
    pwdField.onkeydown = (() => {
        pwdField.type = "text";
    })
    pwdField.onkeyup = (() => {
        pwdField.type = "password";
    })
</script>
</div>
</div>