<script>
    function imageZoom(imgID, resultID) {
        var img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(resultID);
        /*create lens:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "img-zoom-lens");
        /*insert lens:*/
        img.parentElement.insertBefore(lens, img);
        /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);

        function moveLens(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            /*calculate the position of the lens:*/
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            /*prevent the lens from being positioned outside the image:*/
            if (x > img.width - lens.offsetWidth) {
                x = img.width - lens.offsetWidth;
            }
            if (x < 0) {
                x = 0;
            }
            if (y > img.height - lens.offsetHeight) {
                y = img.height - lens.offsetHeight;
            }
            if (y < 0) {
                y = 0;
            }
            /*set the position of the lens:*/
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            /*display what the lens "sees":*/
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }

        function getCursorPos(e) {
            var a, x = 0,
                y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {
                x: x,
                y: y
            };
        }
    }
</script>
<div class="main single-prd-main">
    <div class="content">
        <div class="section group single-prd-section">
            <div class="desc span_3_of_2 single_prd-shortdesc">
                <div class="card bg-primary text-white single-prd-desc">
                    <div class="card-body" style="font-weight: bold;">
                        <h2 class="content-product-block"><?php echo $get_single_product->category_name ?> &nbsp; <i class="fas fa-chevron-right"></i> &nbsp; <?php echo $get_single_product->brand_name ?> &nbsp; <i class="fas fa-chevron-right"></i> &nbsp; <?php echo $get_single_product->product_title ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2 single_prd-img">
                    <img id="prd-img" src="<?php echo base_url('uploads/' . $get_single_product->product_image) ?>" width="100%" height="100%">
                    <p class="shortdesc-content"><?php echo $get_single_product->product_short_description ?></p>
                    <div class="price">
                        <p><span><?php echo $this->cart->format_number($get_single_product->product_price) ?> ???</span></p>
                    </div>
                    <div class="add-cart">
                    <form action="<?php echo base_url('save/cart'); ?>" method="post">
                        <input class="qtt-to-buy" type="number" class="buyfield" name="qty" value="1" min="1" max="<?php echo $get_single_product->product_quantity ?>"/>
                        <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id ?>" />
                        <input type="submit" class="btn btn-primary buysubmit" name="submit" value="Mua" />
                    </form>
                </div>
                </div>
                <div id="zoomresult" class="img-zoom-result"></div>
            </div>
            <div class="product-desc">
                <div class="card bg-primary text-white single-prd-desc">
                    <div class="card-body" style="font-weight: bold;">
                        <h2 class="content-product-block"> Chi ti???t s???n ph???m
                        </h2>
                    </div>
                </div>
                <p class="single-prd-longdesc"><?php echo $get_single_product->product_long_description ?></p>
            </div>
        </div>
    </div>
    <script>
        imageZoom("prd-img", "zoomresult");
    </script>
</div>
</div>
</div>