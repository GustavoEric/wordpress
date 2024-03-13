<div class="col-12 col-md-4 mb-4 mb-md-4">
    <div class="card">
        <div class="card__vertical">
            <div class="card__thumb"><a href="<?= the_permalink(); ?>"><?php the_post_thumbnail('660-420'); ?></a></div>
            <div class="card__content">
                <a href="<?= get_site_url() . '/tag/' . $tagCanalEspecial->slug ?>" class="cat">
                    <?= $tagCanalEspecial->name ?>
                </a>
                <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="d-md-block d-none"><a href="<?= the_permalink(); ?>"><?= get_the_excerpt() ?></a></p>
            </div>
        </div>
    </div>
</div>