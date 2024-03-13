<?php
    get_header(); 
    //
    $destaque_maior = get_field('destaque_maior', 'option');
    $destaque_menor_foto = get_field('destaque_menor_foto', 'option');
    $destaque_menor_sem_foto = get_field('destaque_menor_sem_foto', 'option');
    $ativar_bloco_entrevistas = get_field('ativar_bloco_entrevistas', 'option');
    // $entrevistas_select = get_field('entrevistas_select', 'option');
    //
    $first_scroll_post_foto_maior = get_field('first_scroll_post_foto_maior', 'option');
    $first_scroll_post_foto_menor = get_field('first_scroll_post_foto_menor', 'option');
    $first_scroll_posts_sem_foto = get_field('first_scroll_posts_sem_foto', 'option');
    $first_scroll_04_posts_sem_foto = get_field('first_scroll_04_posts_sem_foto', 'option');
    $web_stories = get_field('web_stories', 'option');
    $mais_lidas_global = get_field('mais_lidas_global', 'option');
    $embed_video = get_field('embed_video', 'option');
?>

<main id="main">

    <!-- Destaque principal -->
    <section class="destaque-principal">
        <div class="container">
            <div class="row">
                <!-- Destaque maior -->
                <?php if($destaque_maior) { ?>
                    <?php foreach ($destaque_maior as $post) : setup_postdata($post); ?>
                    <?php $categories = get_the_category(); ?>
                        <div class="col-12 col-md-9 mb-3 mb-md-0">
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
                                </div>
                            </div>
                        </div>
                        <?php $exclude_ids[] = $post->ID; ?>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php $args = array(
                        'post_type' => array('post', 'quiz'),
                        'posts_per_page' => 1,
                        'post__status' => 'publish',
                        'offset' => 0,
                        'post__not_in' => $exclude_ids,
                        );
                    ?>
                    <?php $query_01 = new WP_Query($args);
                        if ($query_01->have_posts()):
                    ?>
                    <?php while ( $query_01->have_posts() ) {
                        $query_01->the_post();
                        $categories = get_the_category();
                    ?>
                        <div class="col-12 col-md-9 mb-3 mb-md-0">
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
                                </div>
                            </div>
                        </div>
                        <?php $exclude_ids[] = $post->ID; ?>
    
                    <?php } endif; wp_reset_query(); ?>
                <?php } ?>

                <!-- x2 cards destaque -->
                <div class="col-md-3">
                    <?php if($destaque_menor_foto) { ?>
                        <?php foreach ($destaque_menor_foto as $post) : setup_postdata($post); ?>
                            <div class="mod">
                                <?php get_template_part('template_parts/vertical-card-absolute') ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <!-- query start -->
                        <?php $args = array(
                            'post_type' => array('post', 'quiz'),
                            'posts_per_page' => 1,
                            'post__status' => 'publish',
                            'offset' => 0,
                            'post__not_in' => $exclude_ids,
                            );
                        ?>
                        <?php $query_02 = new WP_Query($args);
                            if ($query_02->have_posts()):
                        ?>
                        <?php while ( $query_02->have_posts() ) {
                            $query_02->the_post();
                        ?>
                            <div class="mod">
                                <?php get_template_part('template_parts/vertical-card-absolute') ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            </div>
    
                        <?php } endif; wp_reset_query(); ?>
                    <?php } ?>

                    <?php if($destaque_menor_sem_foto) { ?>
                        <?php foreach ($destaque_menor_sem_foto as $post) : setup_postdata($post); ?>
                            <div class="card-spacing">
                                <?php get_template_part('template_parts/card-no-pic') ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <!-- query start -->
                        <?php $args = array(
                            'post_type' => array('post', 'quiz'),
                            'posts_per_page' => 1,
                            'post__status' => 'publish',
                            'offset' => 0,
                            'post__not_in' => $exclude_ids,
                            );
                        ?>
                        <?php $query_03 = new WP_Query($args);
                            if ($query_03->have_posts()):
                        ?>
                        <?php while ( $query_03->have_posts() ) {
                            $query_03->the_post();
                        ?>
                            <div class="card-spacing">
                                <?php get_template_part('template_parts/card-no-pic') ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            </div>
    
                        <?php } endif; wp_reset_query(); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner horizontal -->
    <section class="banner-horizontal mb-5">
        <div class="container pb-0 pb-md-5">
            <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank" style="display: contents;">
                <img src="<?= get_template_directory_uri() .'/assets/images/banner_970x90.png' ?>" class="d-none d-md-block" alt="Marfrig">
            </a>
            <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank" style="display: contents;">
                <img src="<?= get_template_directory_uri() .'/assets/images/banner_300_250.png' ?>" class="d-block d-md-none" alt="Marfrig">
            </a>
        </div>
    </section>

    <!-- Section Entrevista -->
    <?php if($ativar_bloco_entrevistas == 'Sim') { ?>
        <?php $posts_entrevistas = get_field('posts_entrevistas', 'option'); ?>

        <!-- Desktop Component-->
        <section class="entrevistaTabs mb-5 mb-md-0 d-none d-md-block">
            <div class="entrevistaBkg">
                <div class="container mt-5">
                    <div class="col-md-12">
                        <div class="tabs-entrevistas-marfrig">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <h2 class="title-section">Entrevista</h2>
                                
                                <?php 
                                    $i = 0;
                                    $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__status' => 'publish',
                                    'tag' => 'entrevistas',
                                    'post__in' => $posts_entrevistas,
                                    'orderby' => 'post__in',
                                    );

                                    if (! $posts_entrevistas ) {
                                        $args = array (
                                            'post_type' => 'post',
                                            'posts_per_page' => 3,
                                            'post__status' => 'publish',
                                            'tag' => 'entrevistas',
                                            'post__in' => '',
                                            'orderby' => '',
                                            'order' => 'DESC',
                                        );
                                    }

                                ?>
                                <?php $query_entrevistas = new WP_Query($args);
                                    if ($query_entrevistas->have_posts()):
                                ?>
                                    <?php while ( $query_entrevistas->have_posts() ) {
                                        $query_entrevistas->the_post();
                                        $nome_pessoa_entrevista = get_field('nome_pessoa_entrevista');
                                    ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?= ($i == 0) ? 'active' : '' ?>" id="entrevista-tab-<?= $i ?>" data-bs-toggle="tab" data-bs-target="#entrevista-<?= $i ?>" type="button" role="tab" aria-controls="entrevista-<?= $i ?>" aria-selected="<?= ($i == 0) ? 'true' : 'false' ?>"><?= $nome_pessoa_entrevista ?></button>
                                        </li>
                                <?php $i++; } endif; wp_reset_query(); ?>
                            
                                <li class="nav-item ver-todas">
                                    <a href="<?= get_site_url() .'/tag/entrevistas' ?>">ver todas as entrevistas</a>
                                </li>
                            </ul>
                
                            <div class="tab-content" id="myTabContent">
    
                                <?php 
                                    $i = 0;
                                    $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__status' => 'publish',
                                    'tag' => 'entrevistas',
                                    'post__in' => $posts_entrevistas,
                                    'orderby' => 'post__in',
                                    );
                                    
                                    if (! $posts_entrevistas ) {
                                        $args = array (
                                            'post_type' => 'post',
                                            'posts_per_page' => 3,
                                            'post__status' => 'publish',
                                            'tag' => 'entrevistas',
                                            'post__in' => '',
                                            'orderby' => '',
                                            'order' => 'DESC',
                                        );
                                    }
                                ?>
                                <?php $query_entrevistas = new WP_Query($args);
                                    if ($query_entrevistas->have_posts()):
                                ?>
                                    <?php while ( $query_entrevistas->have_posts() ) {
                                        $query_entrevistas->the_post();
                                        $modelo_img = get_field('modelo_alternativo');
                                        //var_dump($modelo_img);

                                        if ($modelo_img) {
                                            $img_perfil_entrevista = get_field('img_perfil_entrevista_alternativo'); }
                                        else {
                                            $img_perfil_entrevista = get_field('img_perfil_entrevista');
                                        }
                                    ?>
    
                                        <div class="tab-pane fade <?= ($i == 0) ? 'show active' : '' ?>" id="entrevista-<?= $i ?>" role="tabpanel" aria-labelledby="entrevista-tab-<?= $i ?>">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="perfil col-md-3">
                                                        <div class="thumbnail">
                                                            <img src="<?= $img_perfil_entrevista ?>" <?php if ($modelo_img) { ?> class="foto-alternativa" <?php } ?>  >
                                                        </div>
                                                    </div>
                                                    <div class="title col-7 col-md-4">
                                                        <p><?= the_title() ?></p>
                                                    </div>
                                                    <div class="more-content col-md-4">
                                                        <p><?= the_excerpt(); ?></p>
                                                        <span class="btn"><a href="<?= the_permalink(); ?>">ver entrevista completa</a></span>
                                                    </div>
    
                                                </div>
                                            </div>
                                        </div>
                                        <?php $exclude_ids[] = $post->ID; ?>
    
                                <?php $i++; } endif; wp_reset_query(); ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-md-none">
                <a href="<?= get_site_url() .'/tag/entrevistas' ?>" class="d-flex justify-content-end ver-todas">ver todas as entrevistas</a>
                <hr class="m-0 mt-4">
            </div>
        </section>

        <!-- Mobile Component -->
        <section class="entrevistaMobile mb-5 d-md-none">
            <div class="container heading-wrapper mb-3">
                 <h3>Entrevista</h3>
                 <hr>
            </div>
            
            <div class="entrevistaBkg">
                <div class="container px-0">
                    <div class="tabs-entrevistas-marfrig-mobile">

                        <?php 
                            $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'post__status' => 'publish',
                            'tag' => 'entrevistas',
                            'post__in' => $posts_entrevistas,
                            'orderby' => 'post__in',
                            );

                            if (! $posts_entrevistas ) {
                                $args = array (
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__status' => 'publish',
                                    'tag' => 'entrevistas',
                                    'post__in' => '',
                                    'orderby' => '',
                                    'order' => 'DESC',
                                );
                            }
                        ?>
                        <?php $query_entrevistas = new WP_Query($args);
                            if ($query_entrevistas->have_posts()):
                        ?>
                            <?php while ( $query_entrevistas->have_posts() ) {
                                $query_entrevistas->the_post();
                                $nome_pessoa_entrevista = get_field('nome_pessoa_entrevista');
                            
                                $modelo_img = get_field('modelo_alternativo');
                                //var_dump($modelo_img);

                                if ($modelo_img) {
                                    $img_perfil_entrevista = get_field('img_perfil_entrevista_alternativo_mobile'); }
                                else {
                                    $img_perfil_entrevista = get_field('img_perfil_entrevista');
                                }

                                // $exclude_ids[] = $post->ID;
                            ?>

                                <div class="entrevista px-0">
                                    <div class="row">
                                        <div class="content px-0">
                                            <div class="pessoa-entrevista"><p><?= $nome_pessoa_entrevista ?></p></div>
                                            <div class="col-3 px-0 img-entrevista">
                                                <img src="<?= $img_perfil_entrevista ?>" <?php if ($modelo_img) { ?> class="foto-alternativa" <?php } ?>>
                                            </div>
                                            <div class="col-6 ms-auto me-2 pe-2 txt-entrevista">
                                                <p><?= the_title() ?></p>
                                                <div class="more-content">
                                                    <span class="btn"><a href="<?= the_permalink(); ?>">ver entrevista completa</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                               
                        <?php endif; wp_reset_query(); ?>

                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    $('.tabs-entrevistas-marfrig-mobile').slick({
                    infinite: true,
                    slidesToShow: 1,
                    dots: true,
                    });
                });
            </script>

            <div class="container">
                <a href="<?= get_site_url() .'/tag/entrevistas' ?>" class="d-flex justify-content-end ver-todas">ver todas as entrevistas</a>
                <hr class="m-0 mt-4">
            </div>
        </section>
    <?php } ?>

    <!-- Bloco de Posts -->
    <section class="bloco-posts">
        <div class="container"> 
            <div class="row mb-md-5"> 
                <!-- card grande -->
                <?php if($first_scroll_post_foto_maior) { ?>
                    <?php foreach ($first_scroll_post_foto_maior as $post) : setup_postdata($post); ?>
                        <div class='col-md-6 mb-3 mb-md-0'>
                            <?php get_template_part('template_parts/big-card'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php
                    $args = array(
                        'post_type' => array('post', 'quiz'),
                        'posts_per_page' => 1,
                        'post__status' => 'publish',
                        'post__not_in' => $exclude_ids,
                    );
                    $query_nome_ = new WP_Query($args);
                    if ($query_nome_->have_posts()) :
                        while ($query_nome_->have_posts()) {
                            $query_nome_->the_post();
                    ?>
                        <div class='col-md-6 mb-3 mb-md-0'>
                            <?php get_template_part('template_parts/big-card'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>

                    <?php
                        }
                    endif;
                    wp_reset_query();
                    ?>
                <?php } ?>

                <!-- card foto menor -->
                <?php if($first_scroll_post_foto_menor) { ?>
                    <?php foreach ($first_scroll_post_foto_menor as $post) : setup_postdata($post); ?>
                        <div class='col-md-3 mod'> <!-- card médio -->
                            <?php get_template_part('template_parts/vertical-card-absolute'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php
                    $args = array(
                        'post_type' => array('post', 'quiz'),
                        'posts_per_page' => 1,
                        'post__status' => 'publish',
                        'post__not_in' => $exclude_ids,
                    );
                    $query_nome_ = new WP_Query($args);
                    if ($query_nome_->have_posts()) :
                        while ($query_nome_->have_posts()) {
                            $query_nome_->the_post();
                    ?>
                        <div class='col-md-3 mod'> <!-- card médio -->
                            <?php get_template_part('template_parts/vertical-card-absolute'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>
                    <?php
                        }
                    endif;
                    wp_reset_query();
                    ?>
                <?php } ?>

                <div class="col-md-3 d-flex flex-wrap">  
                    <!-- cards no pic -->
                    <?php if($first_scroll_posts_sem_foto) { ?>
                        <?php foreach ($first_scroll_posts_sem_foto as $post) : setup_postdata($post); ?>
                            <div class='card-spacing'>
                                <?php get_template_part('template_parts/card-no-pic'); ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <?php
                        $args = array(
                            'post_type' => array('post', 'quiz'),
                            'posts_per_page' => 2,
                            'post__status' => 'publish',
                            'post__not_in' => $exclude_ids,
                        );
                        $query_nome_ = new WP_Query($args);
                        if ($query_nome_->have_posts()) :
                            while ($query_nome_->have_posts()) {
                                $query_nome_->the_post();
                        ?>
                            <div class='card-spacing'>
                                <?php get_template_part('template_parts/card-no-pic'); ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            </div>
                        <?php
                            }
                        endif;
                        wp_reset_query();
                        ?>
                    <?php } ?>
                </div>
            </div>

            <hr class='d-block d-md-none'>
        </div>
    </section>

    <!-- Divisor -->
    <div class="container mb-5 d-none d-md-block">
        <hr class="sec-divisor">
    </div>

    <!-- Canais Especiais -->
    <section>
        <div class="container">
            <?php get_template_part('template_parts/especiais') ?>
        </div>
    </section>

    <!-- x4 posts no pic -->
    <section>
        <div class="container mb-4 mb-md-5">
            <div class="row">
                <?php if($first_scroll_04_posts_sem_foto) { ?>
                    <?php foreach ($first_scroll_04_posts_sem_foto as $post) : setup_postdata($post); ?>
                        <div class='col-6 col-md-3 mb-4 mb-md-0'>
                            <?php get_template_part('template_parts/card-no-pic'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php $args = array(
                    'post_type' => array('post', 'quiz'),
                    'posts_per_page' => 4,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                    );
                    ?>


                    <?php $query_nome_ = new WP_Query($args);
                    if ($query_nome_->have_posts()):
                    ?>


                    <?php while ( $query_nome_->have_posts() ) {
                    $query_nome_->the_post();
                    ?>

                        <div class='col-6 col-md-3 mb-4 mb-md-0'>
                            <?php get_template_part('template_parts/card-no-pic'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>

                    <?php } endif; wp_reset_query(); ?>
                <?php } ?>
            </div>
            <hr class='d-block d-md-none'>
        </div>
    </section>

    <!-- Web Stories -->
    <section class='webstories-1'>
        <link rel='stylesheet' id='web-stories-list-styles-css' href='<?php echo get_site_url(); ?>/wp-content/plugins/web-stories/assets/css/web-stories-list-styles.css?ver=1.11.0' media='all'/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-9">
                        <h1 class='texto-webstories'>Webstories</h1>
                    </div>
                    <div class="web-stories-list alignnone is-view-type-grid is-style-default">
                        <div class="d-flex justify-content-between ov-scroll">
                            <?php if($web_stories) { ?>
                                <?php foreach ($web_stories as $post) : setup_postdata($post); ?>
                                    <?php $post_id = get_the_ID(); ?>
                                    <?php $img_url = get_the_post_thumbnail_url($post_id, 'web-stories-poster-portrait'); ?>
                                    <?php $exclude_ids[] = $post_id; ?>
                                    <div class="web-stories-list__story mb-4 mb-md-0">
                                        <div class="web-stories-list__story-poster">
                                            <a href="<?php the_permalink();?>" target="_blank" >
                                                <img src="<?= $img_url  ?>" alt="<?php the_title();?>" width="185" height="308">
                                            </a>
                                            <span class="arrow-ws"></span>
                                        </div>
                                        <div class="web-stories-list__story-content-overlay">
                                            <div class="story-content-overlay__title">
                                                <?php the_title();?>
                                            </div>
                                        </div>
                                    </div> <!-- web-stories-list__story -->
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php
                                    $query_story = new WP_Query(array(
                                        'post_type' => 'web-story',
                                        'posts_per_page' => 6,
                                        'post__status' => 'published',
                                        'offset' => 0,
                                        'meta_key' => 'aprovacao_web_stories',
                                        'meta_value' => 'aprovado',
                                        'post__not_in' => $exclude_ids
                                    ));
                                ?>
                                <?php while ($query_story->have_posts()) : $query_story->the_post(); ?>
                                    <?php $post_id = get_the_ID(); ?>
                                    <?php $img_url = get_the_post_thumbnail_url($post_id, 'web-stories-poster-portrait'); ?>
                                    <?php $exclude_ids[] = $post_id; ?>
                                    
                                    <div class="web-stories-list__story mb-4 mb-md-0">
                                        <div class="web-stories-list__story-poster">
                                            <a href="<?php the_permalink();?>" target="_blank" >
                                                <img src="<?= $img_url  ?>" alt="<?php the_title();?>" width="185" height="308">
                                            </a>
                                            <span class="arrow-ws"></span>
                                        </div>
                                        <div class="web-stories-list__story-content-overlay">
                                            <div class="story-content-overlay__title">
                                                <?php the_title();?>
                                            </div>
                                        </div>
                                    </div> <!-- web-stories-list__story -->
    
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                            <?php } ?>
                        </div>
                        <a href="<?= get_site_url() .'/webstories/' ?>" class="assistir-todos">Assistir todos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divisor -->
    <div class="container mb-5 d-none d-md-block">
        <hr class="sec-divisor">
    </div>

    <!-- mais lidas  e video-->
    <section class='mais-lidas'>    
        <div class="container mb-5">
            <div class="row d-flex justify-content-between">
                <div class="related-posts col-md-4">
                    <h2 class='texto-lidas'>Mais lidas</h2>

                    <?php if ($mais_lidas_global) :?>
                        <?php foreach ($mais_lidas_global as $post) : setup_postdata($post); ?>
                            <?php get_template_part('template_parts/small-card') ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <hr class="d-block d-md-none">
                </div>
                <div class="two-colors col-md-7">
                    <h2 class='mb-3'>Nossa marca é azul. <span> Nosso sonho é verde.</span></h2>
                    <?= $embed_video ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Divisor -->
    <div class="container mb-5 d-none d-md-block">
        <hr class="sec-divisor">
    </div>

    <!-- Section sustentabilidade -->
    <section class="custom-category mb-5 ">
        <div class="container"> 
            <div class="heading-wrapper mb-3">
                <h3><a href="<?= get_site_url() .'/category/sustentabilidade/' ?>">Sustentabilidade</a></h3>
                <hr>
            </div>
            <div class="row"> <!-- card grande -->
                <?php
                $args = array(
                    'category_name' => 'sustentabilidade',
                    'post_type' => 'post', 
                    'posts_per_page' => 1,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $query_sutentability_ = new WP_Query($args);
                if ($query_sutentability_->have_posts()) :
                    while ($query_sutentability_->have_posts()) {
                        $query_sutentability_->the_post();
                ?>
                    <div class='col-md-6 mb-3 mb-md-0'>
                        <?php get_template_part('template_parts/big-card'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                <?php
                    }
                endif;
                wp_reset_query();
                ?>

                <?php
                $args = array(
                    'category_name' => 'sustentabilidade',
                    'post_type' => 'post', 
                    'posts_per_page' => 1,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $query_sutentability_ = new WP_Query($args);
                if ($query_sutentability_->have_posts()) :
                    while ($query_sutentability_->have_posts()) {
                        $query_sutentability_->the_post();
                ?>    
                    <div class='col-md-3 mod'> <!-- card médio -->
                        <?php get_template_part('template_parts/vertical-card'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                <?php
                    }
                endif;
                wp_reset_query();
                ?>
                <div class="col-md-3 d-flex flex-wrap">  <!-- card no pic -->
                    <?php
                    $args = array(
                        'category_name' => 'sustentabilidade',
                        'post_type' => 'post', 
                        'posts_per_page' => 2,
                        'post__status' => 'publish',
                        'post__not_in' => $exclude_ids,
                    );
                    $query_sutentability_ = new WP_Query($args);
                    if ($query_sutentability_->have_posts()) :
                        while ($query_sutentability_->have_posts()) {
                            $query_sutentability_->the_post();
                    ?>
                    <div class='card-spacing'>
                        <?php get_template_part('template_parts/card-no-pic'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                    <?php
                        }
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section negocios -->
    <section class="custom-category mb-5">
        <div class="container"> 
            <div class="heading-wrapper mb-3">
                <h3><a href="<?= get_site_url() .'/category/negocios/' ?>">Negócios</a></h3>
                <hr>
            </div>
            <div class="row"> <!-- card grande -->
                <?php
                $args = array(
                    'category_name' => 'negocios',
                    'post_type' => 'post', 
                    'posts_per_page' => 1,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $query_nome_ = new WP_Query($args);
                if ($query_nome_->have_posts()) :
                    while ($query_nome_->have_posts()) {
                        $query_nome_->the_post();
                ?>
                    <div class='col-md-6 mb-3 mb-md-0'>
                        <?php get_template_part('template_parts/big-card'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                <?php
                    }
                endif;
                wp_reset_query();
                ?>

                <?php
                $args = array(
                    'category_name' => 'negocios',
                    'post_type' => 'post', 
                    'posts_per_page' => 1,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $query_nome_ = new WP_Query($args);
                if ($query_nome_->have_posts()) :
                    while ($query_nome_->have_posts()) {
                        $query_nome_->the_post();
                ?>
                        <div class='col-md-3 mod'> <!-- card médio -->
                            <?php get_template_part('template_parts/vertical-card'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>
                <?php
                    }
                endif;
                wp_reset_query();
                ?>
                <div class="col-md-3 d-flex flex-wrap">  <!-- card no pic -->
                    <?php
                    $args = array(
                        'category_name' => 'negocios',
                        'post_type' => 'post', 
                        'posts_per_page' => 2,
                        'post__status' => 'publish',
                        'post__not_in' => $exclude_ids,
                    );
                    $query_nome_ = new WP_Query($args);
                    if ($query_nome_->have_posts()) :
                        while ($query_nome_->have_posts()) {
                            $query_nome_->the_post();
                    ?>
                    <div class='card-spacing'>
                        <?php get_template_part('template_parts/card-no-pic'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                    <?php
                        }
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section tendencias -->
    <section class="custom-category mb-5">
        <div class="container"> 
            <div class="heading-wrapper mb-3">
                <h3><a href="<?= get_site_url() .'/category/tendencias/' ?>">Tendências</a></h3>
                <hr>
            </div>

            <div class="row"> <!-- card grande -->
                <?php
                $args = array(
                    'category_name' => 'tendencias',
                    'post_type' => 'post', 
                    'posts_per_page' => 1,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $query_nome_ = new WP_Query($args);
                if ($query_nome_->have_posts()) :
                    while ($query_nome_->have_posts()) {
                        $query_nome_->the_post();
                ?>
                        <div class='col-md-6 mb-3 mb-md-0'>
                            <?php get_template_part('template_parts/big-card'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>

                <?php
                    }
                endif;
                wp_reset_query();
                ?>

                <?php
                $args = array(
                    'category_name' => 'tendencias',
                    'post_type' => 'post', 
                    'posts_per_page' => 1,
                    'post__status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $query_nome_ = new WP_Query($args);
                if ($query_nome_->have_posts()) :
                    while ($query_nome_->have_posts()) {
                        $query_nome_->the_post();
                ?>
                    <div class='col-md-3 mod'> <!-- card médio -->
                        <?php get_template_part('template_parts/vertical-card'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                <?php
                    }
                endif;
                wp_reset_query();
                ?>
                <div class="col-md-3 d-flex flex-wrap">  <!-- card no pic -->
                    <?php
                    $args = array(
                        'category_name' => 'tendencias',
                        'post_type' => 'post', 
                        'posts_per_page' => 2,
                        'post__status' => 'publish',
                        'post__not_in' => $exclude_ids,
                    );
                    $query_nome_ = new WP_Query($args);
                    if ($query_nome_->have_posts()) :
                        while ($query_nome_->have_posts()) {
                            $query_nome_->the_post();
                    ?>
                    <div class='card-spacing'>
                        <?php get_template_part('template_parts/card-no-pic'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>
                    <?php
                        }
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Divisor -->
    <div class="container mb-4 mb-md-5">
        <hr class="sec-divisor">
    </div>

    <!-- Newsletter + Mais Buscadas no Google -->
    <section class="news-maisBuscadas">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7">
                    <div class="newsletter-home">
                        <?php get_template_part('template_parts/newsletter-banner') ?>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-wrap justify-content-center">
                    <div class="mais-buscadas-home order-1 order-md-0">
                        <?php get_template_part('template_parts/mais-buscadas-no-google') ?>
                    </div>
                    <div class="banner-quadrado d-flex justify-content-center order-0 order-md-1 my-4 my-md-0">
                        <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank">
                            <img src="<?= get_template_directory_uri() .'/assets/images/banner_300_250.png' ?>" alt="Marfrig">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Loadmore -->
    <section class="loadMore">
        <div class="container">
            <div class="row">
                <?php
                    echo do_shortcode('[ajax_load_more id=""
                    post_type="post, quiz"
                    posts_per_page="4"
                    scroll="false"
                    button_label="Ver mais"
                    button_loading_label="Carregando"
                    seo="true"
                    pause="false"
                    theme_repeater="card-no-pic-home.php"
                    post__not_in="' . implode(",", $exclude_ids) . '"
                    images_loaded="true"]');
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>