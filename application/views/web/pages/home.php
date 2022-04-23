<div class="main">
    <div class="content" style="padding-top: 0px;">
        <div class="card bg-primary text-white">
            <div class="card-body" style="font-weight: bold;">
                <h2 class="content-product-block">
                    <ion-icon name="flame"></ion-icon> Sản phẩm hot
                </h2>
            </div>
        </div>
        <div class="section group">
            <?php
            foreach ($all_featured_products as $single_feature_product) {
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="single-feature-product listimg listimg_2_of_1">
                        <a href="<?php echo base_url('single/' . $single_feature_product->product_id); ?>"><img src="<?php echo base_url('uploads/' . $single_feature_product->product_image) ?>" alt="" /></a>
                        <h2 class="feature-prd" style="margin-top: 40px;"><?php echo $single_feature_product->product_title; ?> </h2>
                        <p style="margin-bottom: 0px;"><span class="price" style="font-weight: bold;"><?php echo $this->cart->format_number($single_feature_product->product_price); ?> ₫ </span></p>
                        <span class="button btn-add-suggest"><button class="btn btn-warning add-cart-suggest btn-view-prd"><a href="<?php echo base_url('product/' . $single_feature_product->product_id); ?>" class="details">Xem</a></button></span>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="card bg-primary text-white" style="margin-top: 7px;">
            <div class="card-body" style="font-weight: bold;">
                <h2 class="content-product-block">
                    <ion-icon name="gift"></ion-icon> Sản phẩm mới cập nhật
                </h2>
            </div>
        </div>
        <div class="section group">
            <?php foreach ($all_new_products as $single_new_product) { ?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class=" single-feature-product listimg listimg_2_of_1">
                        <a href="<?php echo base_url('product/' . $single_new_product->product_id); ?>"><img src="<?php echo base_url('uploads/' . $single_new_product->product_image) ?>" alt="" /></a>

                        <h2 class="feature-prd"><?php echo $single_new_product->product_title; ?></h2>
                        <p><span class="price"><?php echo $this->cart->format_number($single_new_product->product_price); ?> ₫</span></p>

                        <span class="button btn-add-suggest"><button class="btn btn-warning add-cart-suggest btn-view-prd"><a href="<?php echo base_url('product/' . $single_new_product->product_id); ?>" class="details">Xem</a></button></span>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="card bg-primary text-white">
            <div class="card-body" style="font-weight: bold;">
                <h2 class="content-product-block">
                <ion-icon name="paper-plane"></ion-icon> Tin tức
                </h2>
            </div>
        </div>
        <div class="news">
            <?php
            $this->load->library('DOMParser/simple_html_dom.php');
            $url = 'https://anonyviet.com/category/tin-tuc/';
            $html = file_get_html($url);
            $news = $html->find('.jeg_post.jeg_pl_lg_2.format-standard');
            ?>
            <ul class="news-list" style="list-style:none;">
            <?php
            for($i = 1; $i <= 6; $i++) {
            ?>
                    <li class="news-list-item">
                        <div class="news-img"><a href="<?= $news[$i]->first_child()->children(0)->href ?>"><?= $news[$i]->first_child()->children(0)->innertext ?></a></div>
                        <div class="news-title"><p><?= $news[$i]->children(1)->first_child()->innertext ?></p><p><?= $news[$i]->children(1)->children(2)->first_child()->plaintext ?></p></div>
                    </li>
            <?php } ?>
            </ul>
        </div>
        <div class="more-news">Xem them</div>
    </div>
</div>
</div>