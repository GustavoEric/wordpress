<?php
    $categories = get_the_category();
?>

<div class="card">
    <div class="card__small">
        <div class="card__thumb"><a href="<?= the_permalink(); ?>"><?php the_post_thumbnail('87-55'); ?></a></div>
        <div class="card__content"><h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
    </div>
</div>