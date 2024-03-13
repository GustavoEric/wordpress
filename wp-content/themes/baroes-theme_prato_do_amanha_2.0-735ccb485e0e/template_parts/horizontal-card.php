<?php
    $categories = get_the_category();
?>

<div class="card mb-4">
    <div class="card__horizontal">
        <div class="card__thumb"><a href="<?= the_permalink(); ?>"><?php the_post_thumbnail('376-244'); ?></a></div>
        <div class="card__content">
            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat">
                <?php echo $categories[0]->name; ?>
            </a>
            <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><a href="<?= the_permalink(); ?>"><?= get_the_excerpt() ?></a></p>
        </div>
    </div>
</div>
<?php $exclude_ids[] = $post->ID; ?>