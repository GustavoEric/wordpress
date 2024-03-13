<?php get_header(); ?>
<?php 
    global $exclude_ids;
    $exclude_ids = [];
    $exclude_ids[] = $post->ID;
    //
    $author_select = get_field('author_select');
    $author_wp = get_the_author();
    $post_id = get_the_id();
    $tags = get_the_tags();
    $categories = get_the_category();
    //
    $pilar = get_field('pilares_marfrig_verde_+_');
?>

<!-- FB Meta Pixel -->
<script>
    function waitFbq(callback){
        if(typeof fbq !== 'undefined'){
            callback()
        } else {
            setTimeout(function () {
                waitFbq(callback)
            }, 100)
        }
    }

    waitFbq(function () {
        fbq('track', '<?= $categories[0]->name ?>')
    })
</script>

<main id="main">
    <div class="single-header mb-5">
        <span class="thumb__caption d-none d-md-block"><?php echo (get_the_post_thumbnail_caption()) ? the_post_thumbnail_caption() : '' ?></span>
        <div class="single__thumb">
            <?php echo the_post_thumbnail('1440-560'); ?>
        </div>
    </div>
    
    <div class="container">
        <div class="single-content">
            <div class="row">
                <!-- LEFT COLUMN -->
                <div class="col-md-7 content-content <?= (has_tag('marfrig-verde')) ? 'marfrig-verde-section' : '' ?>">
                    <!-- MARFRIG VERDE MAIS+ COLUMN -->
                    <?php if (has_tag('marfrig-verde')) { ?>
                        <div class="marfrig-verde-column">
                            <div class="marfrig-verde">
                                <div class="selos d-flex flex-column align-items-center">
                                    <div class="selo-marfrig">
                                        <a href="<?= get_site_url() .'/marfrig-verde-mais/' ?>" target="_blank">
                                            <img src="<?= get_template_directory_uri() ?>/assets/images/verde+/selo-grande.png" />
                                        </a>
                                    </div>
                                    <div class="seloPilar <?= $pilar ?>"></div>
                                </div> <!-- selos -->
                            </div>
                        </div>
                    <?php } ?>

                    <div class="content-header">
                        <span class="thumb__caption d-block d-md-none mobile"><?php echo (get_the_post_thumbnail_caption()) ? the_post_thumbnail_caption() : '' ?></span>
                        <div class="breadcrumb mb-0"><?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?></div>
                        <div class="content-title">
                            <h1><?php the_title(); ?></h1>
                            <h2><?= get_the_excerpt(); ?></h2>
                        </div>
                        <div class="d-flex">
                            <!-- authors -->
                            <div class="single-author d-none d-md-block">
                                <div class="d-flex">
                                    <p class="author mb-0"> <?= ($author_select) ? $author_select->post_title : $author_wp ?></p>
                                    <p class="data mb-0 ms-1">em <?php echo get_the_date('j \d\e F \d\e Y'); ?></p>
                                </div>
                            </div>
                            <!-- share social -->
                            <div class="social-share ms-md-auto">
                                <div class="share d-flex justify-content-center">
                                    <div class="ml-md-2 d-flex align-items-center p-md-0">
                                        <ul class="list-unstyled list-share d-flex">
                                            <li class="d-flex align-items-center">
                                                <a class="btn-icon" href="http://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(get_permalink())); ?>&title=<?php print(urlencode(the_title())); ?>">
                                                    <i class="icons fb-icon" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <a class="btn-icon" href="http://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())); ?>+<?php print(urlencode(get_permalink())); ?>">
                                                    <i class="icons twitter-icon" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <a class="btn-icon" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print(urlencode(get_permalink())); ?>&title=<?php print(urlencode(the_title())); ?>">
                                                    <i class="icons linkedin-icon" aria-hidden="true"></i>    
                                                </a>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <a class="btn-icon" href="https://api.whatsapp.com/send?text=<?php the_title(); ?> - <?php the_permalink(); ?>" data-action="share/whatsapp/share" target="_BLANK">
                                                    <i class="icons whatsapp-icon" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="newsletter-inscrever ms-5 ms-md-3">
                                            <a href="<?= get_site_url() .'/newsletter/' ?>">
                                                <span>Newsletter</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <!-- Article -->
                    <div id="article">
                        <?php the_content(); ?>
                    </div>

                    <!-- Typeform Code -->
                    <div data-tf-live="01HGXRWGT54Q6XBH6VP4B7G3N8"></div>
                    <script src="//embed.typeform.com/next/embed.js"></script>

                    <?php $auxDataGA4 = json_encode([
                            'event_type' => 'scrollHere',
                            'event_name' => 'leitura_completa',
                            'event_parameters' => [
                                'leitura_completa' => 'TRUE'
                            ]
                        ]); 
                    ?>
                    <!-- TAGS List -->
                    <div class="post-tags mt-4 mt-md-5" data-ga4='<?= $auxDataGA4 ?? '' ?>'>
                        <div class="title">Tags</div>
                        <div class="tags-list">
                            <?php the_tags(false, ' '); ?>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-md-4 ms-auto mt-md-4 pt-md-3">
                    <div class="related-posts mb-3 mb-md-5">
                        <h2 class="title-section">Notícias Relacionadas</h2>

                        <?php $related_posts_select = get_field('related_posts_select');
                            if ($related_posts_select) : 
                        ?>
                          <?php foreach ($related_posts_select as $post) : setup_postdata($post); ?>
                                <?php get_template_part('template_parts/small-card') ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <?php $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 5,
                                'post__status' => 'publish',
                                'post__not_in' => $exclude_ids,
                            );
                            ?>
                            <?php $related_posts = new WP_Query($args);
                                if ($related_posts->have_posts()):
                            ?>
                            <?php while ( $related_posts->have_posts() ) {
                                $related_posts->the_post();
                            ?>
                
                                <?php get_template_part('template_parts/small-card') ?>
                                <?php $exclude_ids[] = $post->ID; ?>
                        
                            <?php } endif; wp_reset_query(); ?>

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

                </div>

                <!-- Newsletter Banner -->
                <div class="mb-4 mb-md-5 pb-3 pb-md-4">
                    <?php get_template_part('template_parts/newsletter-banner') ?>
                </div>

                <!-- Banner retangular -->
                <div class="banner d-none d-md-flex justify-content-center mb-5 pb-4">
                    <a href="https://marfrig.com.br/pt?utm_source=Prato_do_Amanha&utm_medium=content" target="_blank">
                        <img src="<?= get_template_directory_uri() .'/assets/images/banner_970x90.png' ?>" class="d-none d-md-block" alt="Marfrig">
                    </a>
                </div>

                <!-- More Posts -->
                <section class="more-posts">
                    <?php
                        echo do_shortcode('[ajax_load_more id=""
                        post_type="post"
                        posts_per_page="4"
                        scroll="false"
                        button_label="Ver mais"
                        button_loading_label="Carregando"
                        seo="true"
                        pause="false"
                        theme_repeater="card-vertical.php"
                        post__not_in="' . implode(",", $exclude_ids) . '"
                        images_loaded="true"]');
                    ?>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
    echo ga4PageEvents([
        'pageview' => [
            'tags' => $tags ? $tags : null,
            'categorias' => $categories ? $categories : null,
            'camposTematicos' => $pillar_content && $pillar_content !== '' ? $pillar_content : null,
            'data_de_publicacao' => get_the_date('d/m/Y'),
            'data_de_atualizacao' => get_the_modified_date('d/m/Y'),
            // 'tempo_de_leitura' => $readMinutes == 1 ? "$readMinutes minuto" : "$readMinutes minutos",
            'nome_autor' => sanitize_title(get_the_author()),
            'template' => $post->post_type,
            'etapa_do_funil' => $etapaFunil,
            'quantidade_de_palavras' => str_word_count(strip_tags(strip_shortcodes(get_post_field('post_content', $post_id)))),
            'classificacao' => null,
            'tipo_materia' => null,
            //'cta_content' => $cta_in_content ? $cta_in_content->post_title : null,
            //'cta' => $cta->post_title ? $cta->post_title : null,
            'tipo_de_conteudo' => $tipo_de_conteudo ? $tipo_de_conteudo : null
        ]
    ]);
?>

<?php get_footer(); ?>