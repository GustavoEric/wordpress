<?php
    get_header();
    ## Traz somente categorias filhas em primeiro grau
    $cat_id = get_query_var('cat');
    $term = get_queried_object();
    global $exclude_ids;
    $exclude_ids = [];
?>

<main id="main">
    <?php if (have_posts()): ?>
        <?php $countPosts = count($posts); ?>
        <?php $iPrintedPosts = 0; ?>

        <section id="category-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="cat-title">
                            <h1 class="m-0"><?php single_cat_title(); ?></h1>
                        </div>
                        <div class="double-cards">
                            <div class="row mb-3 mb-md-0">
                                <?php
                                    $i = 1;
                                    $sectionPosts = 2;
                                    $pointStop = $iPrintedPosts + $sectionPosts;
                                    for($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                                        if ($iPrintedPosts >= $pointStop) { break; }
                                        $post = $posts[$iPrintedPosts];
                                        $exclude_ids[] = $post->ID;
                                        $categories = get_the_category();
                                ?>
                                    <div class="col-6 col-md-6">
                                        <div class="card <?= ($i == 1) ? 'default' : 'second' ?>">
                                            <a href="<?= the_permalink(); ?>">
                                                <div class="thumb-card">
                                                    <?php the_post_thumbnail('306-282'); ?>
                                                </div>
                                            </a>
                                            <div class="card__content">
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat">
                                                    <?php echo $categories[0]->name; ?>
                                                </a>
                                                <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++; ?>
                                <?php } ?>
    
                            </div>
                        </div>
                    </div>

                    <?php
                        $sectionPosts = 1;
                        $pointStop = $iPrintedPosts + $sectionPosts;
                        for($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                            if ($iPrintedPosts >= $pointStop) { break; }
                            $post = $posts[$iPrintedPosts];
                            $exclude_ids[] = $post->ID;
                            $categories = get_the_category();
                    ?>
                        <div class="col-md-6">
                            <?php get_template_part('template_parts/big-card') ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="banner my-5 my-md-5 py-md-4">
            <div class="container">
                <div class="retangular d-none d-md-flex justify-content-center">
                    <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank">
                        <img src="<?= get_template_directory_uri() .'/assets/images/banner_970x90.png' ?>" class="d-none d-md-block" alt="Marfrig">
                    </a>
                </div>
                <div class="quadrado d-flex justify-content-center d-md-none">
                    <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank">
                        <img src="<?= get_template_directory_uri() .'/assets/images/banner_300_250.png' ?>" alt="Marfrig">
                    </a>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <?php
                            $sectionPosts = 8;
                            $pointStop = $iPrintedPosts + $sectionPosts;
                            for($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                                if ($iPrintedPosts >= $pointStop) { break; }
                                $post = $posts[$iPrintedPosts];
                                $exclude_ids[] = $post->ID;
                        ?>
                            <?php get_template_part('template_parts/horizontal-card') ?>
                        <?php } ?>

                        <?php get_template_part('template_parts/newsletter-banner') ?>

                        <!-- Loadmore  -->
                        <div class="d-none d-md-block">
                            <?php
                                echo do_shortcode('[ajax_load_more id=""
                                post_type="post"
                                posts_per_page="4"
                                category="' . $term->slug . '"
                                scroll="false"
                                button_label="Ver mais"
                                button_loading_label="Carregando"
                                seo="true"
                                pause="false"
                                theme_repeater="horizontal-card-category.php"
                                post__not_in="' . implode(",", $exclude_ids) . '"
                                images_loaded="true"]');
                            ?>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-md-4 ms-auto">
                        <div class="related-posts mb-3 mb-md-5">
                            <h2 class="title-section">Mais lidas</h2>

                            <?php $mais_lidas_global = get_field('mais_lidas_global', 'option');
                                if ($mais_lidas_global) : 
                            ?>
                                <?php foreach ($mais_lidas_global as $post) : setup_postdata($post); ?>
                                    <?php get_template_part('template_parts/small-card') ?>
                                    <?php $exclude_ids[] = $post->ID; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <hr class="d-block d-md-none">
                        </div>

                        <?php get_template_part('template_parts/especiais') ?>

                        <div class="sticky-aside">
                            <!-- Banner quadrado -->
                            <div class="banner-quadrado mb-3 mb-md-5 pb-4 d-flex justify-content-center">
                                <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank">
                                    <img src="<?= get_template_directory_uri() .'/assets/images/banner_300_250.png' ?>" alt="Marfrig">
                                </a>
                            </div>

                            <!-- Mais buscadas -->
                            <?php get_template_part('template_parts/mais-buscadas-no-google') ?>
                        </div>

                        <!-- Loadmore  -->
                        <div class="d-block d-md-none">
                            <?php
                                echo do_shortcode('[ajax_load_more id=""
                                post_type="post"
                                posts_per_page="4"
                                category="' . $term->slug . '"
                                scroll="false"
                                button_label="Ver mais"
                                button_loading_label="Carregando"
                                seo="true"
                                pause="false"
                                theme_repeater="horizontal-card-category.php"
                                post__not_in="' . implode(",", $exclude_ids) . '"
                                images_loaded="true"]');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else: ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>