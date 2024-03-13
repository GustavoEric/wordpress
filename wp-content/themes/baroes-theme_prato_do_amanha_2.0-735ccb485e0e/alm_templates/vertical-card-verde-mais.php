<?php 
    $categories = get_the_category();
    $pilar = get_field( "pilares_marfrig_verde_+_" );
?>
<?php $exclude_ids[] = $post->ID; ?>

<div class="col-md-3 mb-4 mb-md-5">
    <div class="card">
        <div class="card__vertical">
            <a href="<?= the_permalink(); ?>">
                <div class="card__thumb">
                    <?php the_post_thumbnail('376-244'); ?>
                    <div class="selo <?= $pilar ?>"></div>
                </div>
            </a>
            <div class="card__content">
                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat">
                    <?php echo $categories[0]->name; ?>
                </a>
                <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><a href="<?= the_permalink(); ?>"><?= get_the_excerpt() ?></a></p>
            </div>
        </div>
    </div>
</div>