<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Đăng nhập quản trị</title>
    <meta name="description" content="CPanel">
    <meta name="author" content="Nemoth">
    <meta name="keyword" content="Shop Nemoth Cpanel">
    <meta http-equiv="content-language" content="vi">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet">
    <link id="base-style" href="<?php echo base_url() ?>assets/admin/css/custom.css" rel="stylesheet">
    <link id="base-style-responsive" href="<?php echo base_url() ?>assets/admin/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <link id="ie-style" href="<?php echo base_url() ?>assets/admin/css/ie.css" rel="stylesheet">
        <![endif]-->

    <!--[if IE 9]>
                <link id="ie9style" href="<?php echo base_url() ?>assets/admin/css/ie9.css" rel="stylesheet">
        <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/img/favicon.jpg">
    <!-- end: Favicon -->

    <style type="text/css">
        body {
            background: url(<?php echo base_url() ?>assets/admin/img/bg-admin-login.jpg) repeat !important;}
    </style>



</head>

<body>
    <div class="container-fluid-full">
        <div class="row-fluid">

            <div class="row-fluid">
                <div class="login-box login-box-custom">
                    <div class="icons">
                        <a href="<?php echo base_url();?>"  target="_blank"><i class="halflings-icon home"></i></a>
                    </div>
                    <h1 class="text-center" style="font-weight: 700;">Admin Panel</h1>
                    <style type="text/css">
                        #result {
                            color: red
                        }

                        #result p {
                            color: red
                        }
                    </style>
                    <div id="result" class="admin-validate">
                        <p><?php echo $this->session->flashdata('message'); ?></p>
                    </div>
                    <form id="adminlogincheck" class="form-horizontal" action="<?php echo base_url() ?>admin_login_check" method="post">
                        <fieldset>

                            <div class="input-prepend login-admin-custom" title="Email đăng nhập">
                                <span class="add-on login-admin-custom"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10 custom-login-input" style="border: 1px solid goldenrod !important; border-left: none !important;" value="<?php set_value('user_name'); ?>" name="user_email" id="user_email" type="text" placeholder="Email" />
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend login-admin-custom" title="Mật khẩu">
                                <span class="add-on login-admin-custom"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10 custom-login-input" style="border: 1px solid goldenrod !important; border-left: none !important;" name="user_password" id="user_password" type="password" placeholder="Mật khẩu" />
                            </div>

                            <div id="submit-login-custom" class="button-login">
                                <button type="submit" class="btn btn-primary adminlogincheck admin-login-check-custom">Đăng nhập</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>

                    </form>


                </div>
                <!--/span-->
            </div>
            <!--/row-->


        </div>
        <!--/.fluid-container-->

    </div>
    <!--/fluid-row-->

    <script src="<?php echo base_url() ?>assets/admin/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-migrate-1.0.0.min.js"></script>

</body>

</html>