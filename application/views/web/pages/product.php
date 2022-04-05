<div class="main main-product">
    <div class="content">
        <div class="card bg-primary text-white">
            <div class="card-body" style="font-weight: bold;text-transform: uppercase;">
                <h2 class="content-product-block">
                    danh mục sản phẩm
                </h2>
            </div>
        </div>

        <?php
        $arr_chunk_product = array_chunk($get_all_product, 4);

        foreach ($arr_chunk_product as $chunk_products) {
        ?>
            <div class="section group">
                <?php foreach ($chunk_products as $single_products) { ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="<?php echo base_url('product/' . $single_products->product_id); ?>"><img src="<?php echo base_url('uploads/' . $single_products->product_image) ?>" alt="" /></a>

                        <div class="list-product-info">
                            <h2><?php echo $single_products->product_title ?></h2>

                            <p class="prd_price"><span class="price"><?php echo $this->cart->format_number($single_products->product_price) ?> ₫</span></p>
                        </div>

                        <span class="button btn_viewprd-from-list"><button class="btn btn-primary btn-view-prdl"><a href="<?php echo base_url('product/' . $single_products->product_id); ?>" class="details">Xem</a></button>
                        </span>
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
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>
</div>
</div>