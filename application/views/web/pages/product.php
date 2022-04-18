<div class="main main-product">
    <div class="content">

        <div class="card bg-primary text-white" style="margin-bottom: 2%;">
            <div class="card-body" style="font-weight: bold;text-transform: uppercase;">
                <h2 class="content-product-block">
                    loại sản phẩm
                </h2>
            </div>
        </div>

        <div class="catag">
            <?php
            $get_all_category = $this->web_model->get_all_category();
            foreach ($get_all_category as $single_category) { ?>
                <a href="<?php echo base_url('get/category/' . $single_category->id); ?>"><button class="categ-btn btn btn-outline-primary btn-light"><?php echo $single_category->category_name ?></button></a>
            <?php } ?>
        </div>

        <form method="get" class="cat-filter" name="fil">
            <div> Chọn mức giá
                <div style="display:flex;flex-direction: column; align-items:center;">
                    <input type="range" class="form-range" id="customRange" step="200000" name="prc" max="100000000" min="200000" onInput="$('#rangeval').html($(this).val())">
                    <span id="rangeval">50200000</span>
                </div>
            </div>
    </div>
    <div class="slc">
        <select name="brd" class="form-select" style="width: 80%;">
            <option value="">Thương hiệu sản xuất</option>
            <?php
            $get_all_brand = $this->web_model->get_full_brand();
            foreach ($get_all_brand as $single_brand) { ?>
                <option value="<?php echo $single_brand->brand_id; ?>"><?php echo $single_brand->brand_name ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary">Lọc</button>
    </div>
    </form>

    <div class="card bg-primary text-white">
        <div class="card-body" style="font-weight: bold;text-transform: uppercase;">
            <h2 class="content-product-block">
                danh mục sản phẩm
                <?php
                if (isset($categ_name)) {
                    echo $categ_name->category_name;
                }
                if (isset($brd_name)) {
                    echo $brd_name->brand_name;
                }
                ?>
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