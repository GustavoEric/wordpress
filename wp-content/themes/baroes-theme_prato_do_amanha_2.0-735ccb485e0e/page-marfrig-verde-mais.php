<?php
/* Template Name: Marfrig Verde Mais  */
get_header();

$video_destaque = get_field('video_destaque');

?>

<main id="main">
    <?php if (! wp_is_mobile()) { ?>
        <div class="sectionFirulas-verdemais">
            <img class="detalhe-3 d-md-block d-none" src="<?= get_template_directory_uri() ?>/assets/images/verde+/detalhe-layout-verdemais.svg" />
        </div>
    <?php } ?>
    
    <header class="header-canal-marfrig-verde-mais" >
        <div class="container d-flex flex-wrap pt-md-5 pt-4 pb-md-5 pb-3">
            <div class="row align-items-center" >
                <div class="col-md-5 d-flex align-items-center">
                    <div class="selos">
                        <div class="selo-marfrig">
                            <a href="https://www.marfrig.com.br/pt/sustentabilidade/marfrig-verde-mais" target="_blank">
                                <img src="<?= get_template_directory_uri() ?>/assets/images/verde+/selo-grande.png" />
                            </a>
                        </div>
                    </div> <!-- selos -->

                    <div class="description-canal ms-3" >
                        <?= the_content(); ?>
                    </div>
                </div> <!-- col-md-6 -->

                <div class="col-md-7 pr-md-0 ms-auto">
                    <div class="blocos-pilares">
                        <div class="desenvolvimento">
                            Desenvolvimento de mecanismos financeiros inovadores
                        </div>

                        <div class="estruturacao">
                            Estruturação de assistência técnica e tecnificação
                        </div>

                        <div class="mecanismos">
                            Mecanismos de monitoramento e rastreabilidade
                        </div>
                    </div> <!-- pilares -->
                </div> <!-- col-md-6 -->
            </div>
        </div> <!-- container -->
    </header>

    <div class="container conteudo">

        <!-- Destaque -->
        <div class="row destaque">
            <?php $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'tag' => 'marfrig-verde',
                'post__status' => 'publish',
                'offset' => 0,
                'post__not_in' => $exclude_ids,
                'ignore_sticky_posts' => 1
                );
            ?>
            <?php $query_01 = new WP_Query($args);
                if ($query_01->have_posts()):
            ?>
            <?php while ( $query_01->have_posts() ) {
                $query_01->the_post();
                $categories = get_the_category();
                $pilar = get_field( "pilares_marfrig_verde_+_" );
            ?>

                <div class="col-md-9 mb-3 mb-md-0">
                    <div class="card">
                        <div class="card__big">
                            <a href="<?= the_permalink(); ?>"><div class="card__thumb"><?php the_post_thumbnail('1000-585'); ?></div></a>
                            <div class="card__content">
                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat">
                                    <?php echo $categories[0]->name; ?>
                                </a>
                                <h2 class="mb-2"><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><a href="<?= the_permalink(); ?>"><?= get_the_excerpt() ?></a></p>
                            </div>
                            <div class="selo <?= $pilar ?>"></div>
                        </div>
                    </div>
                </div>

                <?php $exclude_ids[] = $post->ID; ?>

            <?php } endif; wp_reset_query(); ?>

            <div class="double-cards col-md-3">
                    <?php
                        $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'post__status' => 'publish',
                        'tag' => 'marfrig-verde',
                        'post__not_in' => $exclude_ids,
                    );
                        $i = 1;
                    ?>
                    <?php $query_02 = new WP_Query($args);
                        if ($query_02->have_posts()):
                    ?>
                        <?php while ( $query_02->have_posts() ) {
                            $query_02->the_post();
                            $categories = get_the_category();
                            $pilar = get_field( "pilares_marfrig_verde_+_" );
                        ?>
    
                            <div class="card <?= ($i == 1) ? 'default' : 'second' ?>">
                                <div class="selo <?= $pilar ?>"></div>
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
                        <?php $exclude_ids[] = $post->ID; ?>
    
                    <?php $i++; } endif; wp_reset_query(); ?>
            </div>
        </div>

        <hr class="divisor-verdemais">

        <!-- x4 cards -->
        <div class="row">
            <?php 
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'post__status' => 'publish',
                'tag' => 'marfrig-verde',
                'post__not_in' => $exclude_ids,
                );
            ?>
            <?php $query_03 = new WP_Query($args);
                if ($query_03->have_posts()):
            ?>
            <?php while ( $query_03->have_posts() ) {
                $query_03->the_post();
                $categories = get_the_category();
                $pilar = get_field( "pilares_marfrig_verde_+_" );
            ?>
                <div class="col-md-3 mb-4 mb-md-0">
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
                <?php $exclude_ids[] = $post->ID; ?>
            <?php } endif; wp_reset_query(); ?>

        </div>
        
        <hr class="divisor-verdemais">

        <!-- metas -->
        <section id="metas">
            <div class="metas-verde-mais mb-4">
                <h2>Metas</h2>
                <p class="subt ms-3 ms-md-4">Metas de controle de origem do Marfrig Verde +</p>
            </div>

            <img src="<?= get_template_directory_uri() .'/assets/images/verde+/bioma-amazonia.png' ?>" alt="Bioma - Amazônia" class="bioma-amaz d-none d-md-block">
            <img src="<?= get_template_directory_uri() .'/assets/images/verde+/bioma-amazonia-mobile.png' ?>" alt="Bioma - Amazônia" class="bioma-amaz d-block d-md-none mx-auto">


            <img src="<?= get_template_directory_uri() .'/assets/images/verde+/bioma-cerrado.png' ?>" alt="Bioma - Cerrado" class="bioma-cerrado d-none d-md-block">
            <img src="<?= get_template_directory_uri() .'/assets/images/verde+/bioma-cerrado-mobile.png' ?>" alt="Bioma - Cerrado" class="bioma-cerrado d-block d-md-none mx-auto">

            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="2" viewBox="0 0 319 2" fill="none" class="d-block d-md-none">
                <path d="M0 1.0332L318.005 1.0332" stroke="#2E2E2E" stroke-opacity="0.1"/>
            </svg>
        </section>
        

        <div class="video mt-0 mt-md-4 col-md-12 mb-4 mb-md-5">
            <?= $video_destaque ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="319" height="2" viewBox="0 0 319 2" fill="none" class="d-block d-md-none">
                <path d="M0 1.01685L318.005 1.01685" stroke="#2E2E2E" stroke-opacity="0.1"/>
            </svg>
        </div>

        <!-- Load-more Posts -->
        <div class="row load-more">
            <?php
                echo do_shortcode('[ajax_load_more id="default"
                    post_type="post"
                    tag="marfrig-verde"
                    posts_per_page="4"
                    theme_repeater="vertical-card-verde-mais.php"
                    scroll="false"
                    button_label="Ver mais"
                    button_loading_label="Carregando"
                    seo="true"
                    pause="false"
                    post__not_in="' . implode(",", $exclude_ids) . '"
                    images_loaded="true"]
                ');
            ?>
        </div>

    </div> <!-- container -->
</main>

<?php get_footer(); ?>