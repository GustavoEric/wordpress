<?php
    $categories = get_the_category();
?>

<div class="card absolute">
    <div class="card__vertical">
        <div class="card__thumb">
            <a href="<?= the_permalink(); ?>" class="mask">
                <?php the_post_thumbnail('376-244'); ?>
            </a>
            <div class="absolute-cat">
                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat">
                    <?php echo $categories[0]->name; ?>
                </a>
            </div>
        </div>
        <div class="card__content">
            <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><a href="<?= the_permalink(); ?>"><?= get_the_excerpt() ?></a></p>
        </div>
    </div>
</div>