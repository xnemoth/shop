<!-- start: Content -->
<div id="content" class="span10">


    <ul id="breadcrumb-custom" class="breadcrumb">
        <li>
            <a href="<?php echo base_url('dashboard') ?>"><i class="icon-home"></i>Trang chủ</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/promo') ?>">Khuyến mãi</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">

            <style type="text/css">
                #result {
                    color: red;
                    padding: 5px
                }

                #result p {
                    color: red;
                    text-align: center;
                }
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <div class="box-content">
                <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã giảm giá</th>
                            <th>Giá trị</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_promo as $single_promo) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="center"><?php echo $single_promo->promo_code; ?></td>
                                <td class="center"><?php echo $single_promo->promo_value; ?> %</td>
                                <td class="center">
                                    <?php if ($single_promo->active_code == 1) { ?>
                                        <span class="label label-success" style="border-radius: 3px;">Hoạt động</span>
                                    <?php } else {
                                    ?>
                                        <span class="label label-danger" style="background:red; border-radius: 3px">Chờ</span>
                                    <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_promo->active_code == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('active/promo/' . $single_promo->promo_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    <?php } else {
                                    ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unactive/promo/' . $single_promo->promo_id); ?>" style="border-radius:50% !important;">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    <?php }
                                    ?>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/promo/' . $single_promo->promo_id); ?>" style="border-radius:50% !important;">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


                <!-- add promo area -->
                <form class="form-horizontal" action="<?php echo base_url('save/promo') ?>" method="post">
                    <fieldset>

                        <div class="control-group" style="margin-left: 200px;">
                            <label class="control-label custom-admin-label" for="fileInput">Mã giảm giá</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="promo_code" id="fileInput" type="text" />
                            </div>
                        </div>
                        <div class="control-group" style="margin-left: 200px;">
                            <label class="control-label custom-admin-label" for="textarea2">Giá trị giảm</label>
                            <div class="controls">
                            <input class="span6 typeahead" name="promo_value" id="fileInput" type="number" />
                            </div>
                        </div>

                        <div class="control-group" style="margin-left: 200px;">
                            <label class="control-label custom-admin-label" for="textarea2">Trạng thái</label>
                            <div class="controls">
                                <select name="active_code">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Chưa đăng tải</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions custom-panel-button">
                            <button type="submit" class="btn btn-primary custom-admin-btn custom-admin-label">Xác nhận</button>
                            <button type="reset" class="btn custom-admin-btn">Hủy bỏ</button>
                        </div>
                    </fieldset>
                </form>
                <!-- end add promo area -->

            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->

</div>
<!--/.fluid-container-->

<!-- end: Content -->