

        <div class="header_bottom_right_images">
            <!-- FlexSlider -->
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        $slider_posts = $this->web_model->get_all_slider_post();
                        foreach ($slider_posts as $slider_post) {
                        ?>
                            <li><a href="<?php echo $slider_post->slider_link ?>"><img src="<?php echo base_url() ?>uploads/<?php echo $slider_post->slider_image ?>" alt="" /></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
            <!-- FlexSlider -->
        </div>
        <div class="suggest-box">
            <div class="card bg-primary text-white">
                <div class="card-body" style="font-weight: bold;">
                    <h2 class="content-product-block">
                        <ion-icon name="star-outline"></ion-icon> Sản phẩm gợi ý
                    </h2>
                </div>
            </div>
            <?php
            $popular_posts = $this->web_model->get_all_popular_posts();

            $popular_posts_chunk = array_chunk($popular_posts, 4);
            foreach ($popular_posts_chunk as $single_popular_chunk) {
            ?>
                <div class="section group">
                    <?php foreach ($single_popular_chunk as $single_popular) { ?>
                        <div class="listview_1_of_2 images_1_of_2">
                            <div class="listimg listimg_2_of_1">
                                <a href="<?php echo base_url('single/' . $single_popular->product_id); ?>"> <img src="<?php echo base_url() ?>uploads/<?php echo $single_popular->product_image ?>" alt="" /></a>
                                <span class="button btn-add-suggest"><button class="btn btn-primary add-cart-suggest"><a href="<?php echo base_url('single/' . $single_popular->product_id); ?>">Mua</a></button></span>
                            </div>
                            <div class="text list_2_of_1">
                                <h1><?php echo word_limiter($single_popular->product_title, 2) ?></h1>
                                <h1 style="font-size: 14px;"><?php echo word_limiter($single_popular->product_price, 5) ?> ₫ </h1>
                                <h2 style="font-size: 13px;">Còn lại</h2>
                                <div class="progress" style="text-align: center !important;">
                                    <div class="progress-bar bg-warning" style="width:<?php echo word_limiter($single_popular->product_quantity, 5) / 1 ?>%;">
                                        <?php echo word_limiter($single_popular->product_quantity, 5) / 1 ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>