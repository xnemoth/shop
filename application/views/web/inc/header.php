<!DOCTYPE HTML>

<head>
    <title>Cửa hàng linh kiện</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url() ?>assets/web/css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url() ?>assets/web/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="<?php echo base_url() ?>assets/web/js/jquerymain.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/easing.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav-hover.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('uploads/'); ?><?php echo get_option('site_favicon'); ?>" />
</head>

<body>
    <div class="wrap">
        <div class="navigation">
            <div class="menuToggle"></div>
            <ul>
                <li class="list  <?php
                                    if ($this->uri->uri_string() == '') {
                                        echo "active";
                                    }
                                    ?>" style="--clr:#1a94ff;">
                    <a href="<?php echo base_url('/'); ?>">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Trang chủ</span>
                    </a>
                </li>
                <li class="list <?php
                                if ($this->uri->uri_string() == 'product') {
                                    echo "active";
                                }
                                ?>" style="--clr:#1a94ff;">
                    <a href="<?php echo base_url('/product'); ?>">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="text">Danh mục</span>
                    </a>
                </li>
                <li class="list" style="--clr:#1a94ff;">
                    <?php
                    $customer_id = $this->session->userdata('customer_id');
                    if ($customer_id) {
                    ?>
                        <div>
                            <a href="<?php echo base_url('/customer/logout'); ?>">
                                <span class="icon">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </span>
                                <span class="text">Đăng xuất</span>
                            </a>
                        </div>
                    <?php } else {
                    ?>
                        <div>
                            <a href="<?php echo base_url('/customer/login'); ?>">
                                <span class="icon">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </span>
                                <span class="text">Đăng nhập</span>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </li>
                <li class="list" style="--clr:#1a94ff;">
                    <a href="<?php echo base_url('cart'); ?>" title="Xem giỏ hàng" rel="nofollow">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="text">Giỏ hàng <span class="no_product">(<?php echo $this->cart->total_items(); ?>)</span></span>
                    </a>
                </li>
            </ul>
        </div>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/custom.js"></script>