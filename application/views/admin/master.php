<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Quản trị hệ thống</title>
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

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/img/favicon.jpg">
    <!-- end: Favicon -->

</head>

<body>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <div class="brand" style="width: 85%">
                    <marquee scrollAmount="8">Hôm nay ngày <?php echo date("d"); ?> tháng <?php echo date("m"); ?> năm <?php echo date("Y"); ?></marquee>
                </div>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">

                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> Xin chào <?php echo $this->session->userdata('user_name'); ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url() ?>" target="_blank"><i class="halflings-icon white user"></i> Trang web</a></li>
                                <li><a href="<?php echo base_url('logout') ?>"><i class="halflings-icon white off"></i> Đăng xuất</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->

            </div>
        </div>
    </div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li class="navtab-li-custom"><a href="<?php echo base_url('dashboard') ?>"><i class="icon-dashboard"></i><span class="hidden-tablet"> Thông tin</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('add/category') ?>"><i class="icon-th"></i><span class="hidden-tablet"> Thêm nhóm hàng</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/category') ?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Nhóm hàng</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('add/brand') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Thêm nhãn hàng</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/brand') ?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> Nhãn hàng</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('add/product') ?>"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Thêm sản phẩm</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/product') ?>"><i class="icon-gift"></i><span class="hidden-tablet"> Sản phẩm</span></a></li>

                        <li class="navtab-li-custom"><a href="<?php echo base_url('add/slider') ?>"><i class="icon-font"></i><span class="hidden-tablet"> Thêm banner</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/slider') ?>"><i class="icon-picture"></i><span class="hidden-tablet"> Quản lý banner</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/order'); ?>"><i class="icon-calendar"></i><span class="hidden-tablet"> Đơn hàng</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/customer'); ?>"><i class="icon-group"></i><span class="hidden-tablet"> Khách hàng</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('manage/promo') ?>"><i class="icon-tags"></i><span class="hidden-tablet"> Mã giảm giá</span></a></li>
                        <li class="navtab-li-custom"><a href="<?php echo base_url('theme/option'); ?>"><i class="icon-book"></i><span class="hidden-tablet"> Cài đặt</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Main Menu -->

            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>Bạn cần phải bật <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> để sử dụng website tốt nhất</p>
                </div>
            </noscript>

            <?php echo $maincontent; ?>

        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->

    <!-- <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div> -->

    <div class="clearfix"></div>

    <footer>

        <p>
            <center>
                <span>Develope by &copy; Nemoth with &#10084; &nbsp; &nbsp;</span>
                <a class="btn btn-primary btn-link-footer btn-fb-footer" href="<?php echo get_option('site_facebook_link');?>" role="button" target="_blank">
                    <i class="icon-facebook"></i>
                </a>
                &nbsp;
                &nbsp;
                <a class="btn btn-primary btn-link-footer btn-gh-footer" href="<?php echo get_option('site_github_link');?>" role="button" target="_blank">
                    <i class="icon-github"></i>
                </a>
                &nbsp;
                &nbsp;
                <a class="btn btn-primary btn-link-footer btn-email-footer" href="mailto:<?php echo get_option('site_email_link');?>" role="button" target="_blank">
                    <i class="icon-envelope"></i>
                </a>

        </p>
        </center>

    </footer>

    <!-- start: JavaScript-->

    <script src="<?php echo base_url() ?>assets/admin/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-migrate-1.0.0.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery-ui-1.10.0.custom.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.ui.touch-punch.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/modernizr.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.cookie.js"></script>

    <script src='<?php echo base_url() ?>assets/admin/js/fullcalendar.min.js'></script>

    <script src='<?php echo base_url() ?>assets/admin/js/jquery.dataTables.min.js'></script>

    <script src="<?php echo base_url() ?>assets/admin/js/excanvas.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.flot.resize.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.chosen.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.uniform.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.cleditor.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.noty.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.elfinder.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.raty.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.iphone.toggle.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.uploadify-3.1.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.gritter.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.imagesloaded.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.masonry.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.knob.modified.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/jquery.sparkline.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/counter.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/retina.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/custom.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- end: JavaScript-->

</body>

</html>