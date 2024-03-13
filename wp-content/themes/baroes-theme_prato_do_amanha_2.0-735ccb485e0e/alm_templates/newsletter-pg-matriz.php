<?php 
    $title_news = get_field('titulo_newsletter');
    $data_news = get_field('data_newsletter');
    $url_news = get_field('url_newsletter');
?>

<div class="news-information">
    <div class="news-date"><a href="<?= $url_news; ?>"><?= $data_news; ?></a></div>
    <div class="news-title"><a href="<?= $url_news; ?>"><?= $title_news; ?></a></div>
</div>