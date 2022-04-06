<div class="main customer-register-main">
    <div class="content" style="text-align: center">
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
                                    <input id="customer-email" class="form-control" type="text" name="customer_email" placeholder=" " value="<?php echo $user_info->customer_email;?>"
                                    disabled='true'>
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