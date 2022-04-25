<div class="news-page">
    <?php
    $this->load->library('DOMParser/simple_html_dom.php');
    $url = 'https://anonyviet.com/category/tin-tuc/';
    $html = file_get_html($url);
    $news = $html->find('.jeg_post.jeg_pl_lg_2.format-standard');
    ?>
    <ul class="news-page_list" style="list-style:none;">
        <?php
        for ($i = 1; $i <= 9; $i++) {
        ?>
            <li class="news-page_list-item">
                <div class="news-page_list-item_image"><a href="<?= $news[$i]->first_child()->children(0)->href ?>"><?= $news[$i]->first_child()->children(0)->innertext ?></a></div>
                <div class="news-page_list-item_desc">
                    <p class="news-page_list-item_short-desc"><?= $news[$i]->children(1)->first_child()->innertext ?></p>
                    <p class="news-page_list-item_long-desc"><?= $news[$i]->children(1)->children(2)->first_child()->plaintext ?></p>
                </div>
            </li>
        <?php } ?>
        <div id="more"></div>
    </ul>
</div>
<div class="load-more_news"><button class="btn btn-primary" id="more-news">Xem thêm</buttonc>
</div>

<script type="text/javascript">
    function newsLinks(){
        let links = document.querySelectorAll('.news-page_list-item a');
        Array.prototype.forEach.call(links, function(link) {
            link.setAttribute("target", "_blank");
            link.style.textDecoration = "none";
        });
    }
    newsLinks();

    let Page = 1;
    $("#more-news").on("click", function() {
        Page += 1;
        $.ajax({
            url: '<?= base_url('') ?>web/load_more_news',
            method: "POST",
            data: {
                Page: Page,
            },
            success: function(response) {
                $('#more').replaceWith(response);
                $("#more").on("change",newsLinks());
            }
        });
    });
</script>
</div>
</div>