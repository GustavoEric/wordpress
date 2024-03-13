<?php
    $categories = get_the_category();
?>

<div class="card">
    <div class="card__big">
        <a href="<?= the_permalink(); ?>"><div class="card__thumb"><?php the_post_thumbnail('660-420'); ?></div></a>
        <div class="card__content">
            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat">
                <?php echo $categories[0]->name; ?>
            </a>
            <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
    </div>
</div>