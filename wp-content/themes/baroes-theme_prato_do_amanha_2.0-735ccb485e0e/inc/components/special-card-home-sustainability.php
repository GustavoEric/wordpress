<?php
    // $categories = get_the_category();
    $thumb_url = get_the_post_thumbnail_url($post->ID, 'vertical-thumb');
?>

<div class="special-card-home-sustainability">
    <div class="card-img"><img src="<?= $thumb_url ?>" /></div>

    <div class="card-content">
        <div class="card-content-inner">
            <!-- <a class="cat-link" href="<?php //echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                <?php //echo $categories[0]->name; ?>
            </a> -->
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><a href="<?php the_permalink(); ?>"><?= get_the_excerpt(); ?></a></p>
        </div>
    </div>
</div>
<!-- /.special-card -->