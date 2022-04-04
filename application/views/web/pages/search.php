<div class="main">
    <div class="content">
        <div class="card bg-primary text-white">
            <div class="card-body main-search" style="font-weight: bold;">
                <h3>tìm kiếm cho sản phẩm <b style="color:red"><?php if ($search) {
                                                                    echo $search;
                                                                } ?></b></h3>
            </div>
        </div>

        <?php
        $arr_chunk_product = array_chunk($get_all_product, 4);
        foreach ($arr_chunk_product as $chunk_products) {
        ?>
            <div class="section group">
                <?php foreach ($chunk_products as $single_products) { ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="<?php echo base_url('single/' . $single_products->product_id); ?>"><img style="width:250px;height:250px" src="<?php echo base_url('uploads/' . $single_products->product_image) ?>" alt="" /></a>

                        <h2><?php echo $single_products->product_title ?></h2>

                        <p><span class="price"><?php echo $this->cart->format_number($single_products->product_price) ?> ₫</span></p>

                        <span class="button btn_viewprd-from-list"><button class="btn btn-primary btn-view-prdl"><a href="<?php echo base_url('product/' . $single_products->product_id); ?>" class="details">Xem</a></button></span>
                    </div>
                <?php
                }
                ?>

            </div>
        <?php
        }
        ?>
        <div class="content_pagi">
            <div class="pagination">
                <?php $this->pagination->create_links(); ?>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>