<?php
    get_header();
    ## Traz somente categorias filhas em primeiro grau
    $term = get_queried_object();
    $exclude_ids = [];
?>
<style>
    html, body {
        @media only screen and (max-width: 575.98px) {
            overflow-x: hidden;
        }
    }
</style>

<main id="main">
    <?php if (have_posts()): ?>
        <?php $countPosts = count($posts); ?>
        <?php $iPrintedPosts = 0; ?>

        <!-- category-header -->
        <div id="category-header" class="mb-4 mb-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mb-4 mb-md-0">
                        <h1 class=""><?php single_cat_title(); ?></h1>

                        <?php
                            $sectionPosts = 1;
                            $pointStop = $iPrintedPosts + $sectionPosts;
                            for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                                if ($iPrintedPosts >= $pointStop) {
                                    break;
                                }
                            $post = $posts[$iPrintedPosts];
                            $foto_entrevista = get_field('img_perfil_entrevista');
                            $nome = get_field('nome_pessoa_entrevista');
                            // $cargo_ocupacao = get_field('cargo_ocupacao');
                            ?>

                                <!-- CARD-DESTAQUE -->
                                <div class="card entrevistas">
                                    <div class="card__entrevistas destaque">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-6 col-md-5 p-0 px-md-2">
                                                <div class="card__thumb">
                                                    <img src="<?= $foto_entrevista ?>">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-7 p-0 px-md-2 d-flex">
                                                <div class="card__content">
                                                    <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
                                                    <p><a href="<?= the_permalink(); ?>"><?= get_the_excerpt(); ?></a></p>
                                                    <span class="btn"><a href="<?= the_permalink(); ?>">ver entrevista completa</a></span>
                                                    <span class="author"><?= $nome ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $exclude_ids[] = $post->ID; ?>

                        <?php } ?>
                    </div>

                    <div class="col-md-3 mb-4 mb-md-0">
                        <div class="banner-quadrado">
                            <div class="banner">
                                <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank">
                                    <img src="<?= get_template_directory_uri() .'/assets/images/banner_300_250.png' ?>" alt="Marfrig">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>

        <!-- category content -->
        <div class="container">
            <div class="row">
                <?php
                    $sectionPosts = 2;
                    $pointStop = $iPrintedPosts + $sectionPosts;
                    for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                        if ($iPrintedPosts >= $pointStop) {
                            break;
                        }
                    $post = $posts[$iPrintedPosts];
                    $foto_entrevista = get_field('img_perfil_entrevista');
                    $nome = get_field('nome_pessoa_entrevista');
                    $cargo_ocupacao = get_field('cargo_ocupacao');
                    ?>

                        <!-- card menor -->
                        <div class="col-md-6 mb-3">
                            <div class="card entrevistas mb-4 mb-md-5">
                                <div class="card__entrevistas mb-3">
                                    <div class="row">
                                        <div class="col-6 col-md-6">
                                            <div class="card__thumb">
                                                <img src="<?= $foto_entrevista; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 d-flex">
                                            <div class="card__content">
                                                <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="author-section">
                                    <div class="name"><?= $nome ?></div>
                                    <div class="role"><?= $cargo_ocupacao ?></div>
                                </div>
                            </div>
                        </div>
                        <?php $exclude_ids[] = $post->ID; ?>

                <?php } ?>
            </div>

            <div class="mb-5">
                <?php get_template_part('template_parts/newsletter-banner') ?>
            </div>

            <div class="row">
                <?php
                    $sectionPosts = 8;
                    $pointStop = $iPrintedPosts + $sectionPosts;
                    for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                        if ($iPrintedPosts >= $pointStop) {
                            break;
                        }
                    $post = $posts[$iPrintedPosts];
                    $foto_entrevista = get_field('img_perfil_entrevista');
                    $nome = get_field('nome_pessoa_entrevista');
                    $cargo_ocupacao = get_field('cargo_ocupacao');
                    ?>

                        <!-- card menor -->
                        <div class="col-md-6 mb-3">
                            <div class="card entrevistas mb-4 mb-md-5">
                                <div class="card__entrevistas mb-3">
                                    <div class="row">
                                        <div class="col-6 col-md-6">
                                            <div class="card__thumb">
                                                <img src="<?= $foto_entrevista; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 d-flex">
                                            <div class="card__content">
                                                <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="author-section">
                                    <div class="name"><?= $nome ?></div>
                                    <div class="role"><?= $cargo_ocupacao ?></div>
                                </div>
                            </div>
                        </div>
                        <?php $exclude_ids[] = $post->ID; ?>

                <?php } ?>
             
            </div>

            <!-- More Posts -->
            <section class="more-posts">
                <?php
                    echo do_shortcode('[ajax_load_more id=""
                    post_type="post"
                    posts_per_page="2"
                    scroll="false"
                    tag="entrevistas"
                    button_label="Ver mais"
                    button_loading_label="Carregando"
                    seo="true"
                    pause="false"
                    theme_repeater="card-tag-entrevistas.php"
                    post__not_in="' . implode(",", $exclude_ids) . '"
                    images_loaded="true"]');
                ?>
            </section>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>