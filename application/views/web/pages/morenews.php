<?php
$this->load->library('DOMParser/simple_html_dom.php');
$url = 'https://anonyviet.com/category/tin-tuc/page/' . $Page;
$html = file_get_html($url);
$news = $html->find('.jeg_post.jeg_pl_lg_2.format-standard');
?>
<?php
for ($i = 1; $i <= 6; $i++) {
?>
    <li class="news-page_list-item">
        <div class="news-page_list-item_image"><a href="<?= $news[$i]->first_child()->children(0)->href ?>"><?= $news[$i]->first_child()->children(0)->innertext ?></a></div>
        <div class="news-page_list-item_desc">
            <p class="news-page_list-item_short_desc"><?= $news[$i]->children(1)->first_child()->innertext ?></p>
            <p class="news-page_list-item_long-desc"><?= $news[$i]->children(1)->children(2)->first_child()->plaintext ?></p>
        </div>
    </li>
<?php } ?>
<div id="more"></div>