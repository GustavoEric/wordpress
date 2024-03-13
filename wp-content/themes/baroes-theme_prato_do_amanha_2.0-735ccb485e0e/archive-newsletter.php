<?php get_header(); ?>

<!-- <head>
    <meta property="og:image" content="https://pratodoamanha.com.br/wp-content/uploads/2023/01/image.png" />
</head> -->

<style>
    #footer {
        z-index: 99;
    }
</style>

<main id="main">
    <section class="headerPage">
        <div class="container">
            <div class="col-md-8">
                <h1>Assine nossa Newsletter</h1>
                <p>
                    Cadastre-se para receber nossa newsletter semanalmente.
                </p>
                
                <form class="d-flex flex-wrap" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" action="https://gmail.us14.list-manage.com/subscribe/post?u=225df3c157f292e48d9577e71&amp;id=36f00b84c3" method="POST">
                    <!-- <input type="hidden" name="redirect_success" value="<?php // echo get_bloginfo('url') . '/obrigado' ?>" /> -->
                    <div class="inputs d-flex flex-wrap mb-3">
                        <label>
                            <span class="material-icons">mail</span>
                            <input class="me-md-3" type="email" name="EMAIL" placeholder="Seu email" required>
                        </label>
                        <button class="d-flex align-items-center" type="submit">Assinar<span class="material-icons ps-md-2">&#xf1df;</span></button>
                    </div>
                    <div class="checkform">
                        <input type="checkbox" required>
                        <label class="termos">
                            Concordo com a política de privacidade e aceito receber informações sobre produtos e serviços da Marfrig.
                        </label>
                    </div>
                </form>
                
            </div>
        </div>
    </section>

    <!-- Edições da Newsletter -->
    <div class="container">
        <section class="bodyPage">
            <div class="col-md-8">
                <h2>Últimas edições</h2>

                <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'orderby' =>'post_date',
                        'order' => 'DESC',
                        'post_type' => 'newsletter',
                        'post__not_in' => $exclude_ids,
                    );
                ?>

                    <?php $query = new WP_Query($args);
                        if ($query->have_posts()):
                    ?>
                        <?php while ( $query->have_posts() ) {
                            $query->the_post();
                            $exclude_ids[] = $post->ID;
                        ?>
                            <?php 
                                $title_news = get_field('titulo_newsletter');
                                $data_news = get_field('data_newsletter');
                                $url_news = get_field('url_newsletter');
                            ?>

                            <div class="news-information">
                                <div class="news-date"><a href="<?= $url_news; ?>"><?= $data_news; ?></a></div>
                                <div class="news-title"><a href="<?= $url_news; ?>"><?= $title_news; ?></a></div>
                            </div>

                        <?php } ?>
                    <?php endif; ?>

                <?php wp_reset_postdata(); ?>
                
                <div class="ver-maisNews">
                    <?php
                        echo do_shortcode('[ajax_load_more id="default"
                            post_type="newsletter"
                            posts_per_page="3"
                            scroll="false"
                            button_label="Ver todas"
                            button_loading_label="Carregando"
                            seo="true"
                            pause="true"
                            theme_repeater="newsletter-pg-matriz.php"
                            post__not_in="' . implode(",", $exclude_ids) . '"
                        ]');
                    ?>
                </div>
            </div>

            <!-- Preview da última news -->
            <div class="col-md-4 newsPreview px-0">

                <?php
                    $args_preview = array(
                        'posts_per_page' => 1,
                        'orderby' =>'post_date',
                        'order' => 'DESC',
                        'post_type' => 'newsletter',
                    );
                ?>
                <?php $preview_newsletter = new WP_Query($args_preview);
                    if ($preview_newsletter->have_posts()):
                ?>
                    <?php while ( $preview_newsletter->have_posts() ) {
                        $preview_newsletter->the_post();
                        //                        
                        $data_preview = get_field('data_preview');
                        $resumo_preview = get_field('resumo_preview');
                        $materia_destaque = get_field('materia_destaque');
                        $materia_2 = get_field('materia_2');
                        $materia_3 = get_field('materia_3');
                        $materia_4 = get_field('materia_4');
                    ?>

                        <div id="newspreview">
                            <div class="headerNewsletter">
                                    <img src="<?= get_template_directory_uri() ?>/assets/images/newsletter/headerNews.png" alt="" />
                            </div>

                            <div class="bodyNewsletter">
                                <div class="date">
                                    <p><?= $data_preview ?></p>
                                </div>

                                <div class="resume">
                                    <?= $resumo_preview ?>
                                </div>

                                <!-- matéria destaque -->
                                <?php if($materia_destaque[0]) { ?>
                                    <?php $categories = get_the_category($materia_destaque[0]); ?>
                                    <?php // var_dump($categories) ?>
                                    <div class="post1">
                                        <div class="post-body">
                                            <div class="thumb card-img">
                                                <a href="<?= the_permalink($materia_destaque[0]) ?>"><img src="<?= get_the_post_thumbnail_url($materia_destaque[0]) ?>" alt="" /></a>
                                            </div>
                                            <div class="description">
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat-link"><?php echo $categories[0]->name; ?></a>
                                                <h3><a href="<?= the_permalink($materia_destaque[0]) ?>"><?= get_the_title($materia_destaque[0]); ?></a></h3>
                                                <p><a href="<?= the_permalink($materia_destaque[0]) ?>"><?= get_the_excerpt($materia_destaque[0]) ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- matéria 2 -->
                                <?php if($materia_2[0]) { ?>
                                    <?php $categories = get_the_category($materia_2[0]); ?>
                                    <div class="horizontal-card">
                                        <div class="card-img">
                                            <a href="<?= the_permalink($materia_2[0]) ?>"><img src="<?= get_the_post_thumbnail_url($materia_2[0]) ?>" alt=""></a>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-content-inner">
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat-link"><?php echo $categories[0]->name; ?></a>
                                                <h3><a href="<?= the_permalink($materia_2[0]) ?>"><?= get_the_title($materia_2[0]); ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- matéria 3 -->
                                <?php if($materia_3[0]) { ?>
                                    <?php $categories = get_the_category($materia_3[0]); ?>
                                    <div class="horizontal-card">
                                        <div class="card-img">
                                            <a href="<?= the_permalink($materia_3[0]) ?>"><img src="<?= get_the_post_thumbnail_url($materia_3[0]) ?>" alt=""></a>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-content-inner">
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat-link"><?php echo $categories[0]->name; ?></a>
                                                <h3><a href="<?= the_permalink($materia_3[0]) ?>"><?= get_the_title($materia_3[0]); ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- matéria 4 -->
                                <?php if($materia_4[0]) { ?>
                                    <?php $categories = get_the_category($materia_4[0]); ?>
                                    <div class="horizontal-card">
                                        <div class="card-img">
                                            <a href="<?= the_permalink($materia_4[0]) ?>"><img src="<?= get_the_post_thumbnail_url($materia_4[0]) ?>" alt=""></a>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-content-inner">
                                                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="cat-link"><?php echo $categories[0]->name; ?></a>
                                                <h3><a href="<?= the_permalink($materia_4[0]) ?>"><?= get_the_title($materia_4[0]); ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>