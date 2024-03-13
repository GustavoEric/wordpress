<?php // Template Name: Webstories ?>
<?php get_header(); ?>
<link rel='stylesheet' id='web-stories-list-styles-css'  href='<?php echo get_site_url(); ?>/wp-content/plugins/web-stories/assets/css/web-stories-list-styles.css?ver=1.11.0' media='all' />

<style>
.web-stories-list__story-poster:before{
    display:none;
}

.web-stories-list__story-poster a:before{
    content: "";
    display: block;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1;
}

.subtitle p{font-size:16px;}

.alm-reveal {
        display: flex;
        flex-wrap: wrap;
        margin-right: calc(var(--bs-gutter-x) * -.5);
        margin-left: calc(var(--bs-gutter-x) * -.5);
        margin-bottom: 1.5rem;
    }
.alm-reveal >div {
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
}
</style>

<main id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="col-md-9">
                    <h1 class="m-0"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>

        <div class="row mt-md-4 pt-3">
            <div class="col-md-11 mx-auto">
                
                <div class="web-stories-list alignnone is-view-type-grid columns-4 is-style-default">
                    <div class="web-stories-list__inner-wrapper">
                        <?php $exclude_ids = [] ?>
                        <?php
                            $query_story = new WP_Query(array(
                                'post_type' => 'web-story',
                                'posts_per_page' => 12,
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
                            
                            <div class="web-stories-list__story mb-4">
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


                    </div> <!-- web-stories-list__inner-wrapper -->
                        <?php
                            echo do_shortcode('[ajax_load_more id="default"
                                post_type="web-story"
                                posts_per_page="4"
                                scroll="false"
                                meta_key= "aprovacao_web_stories"
                                meta_value= "aprovado"
                                button_label="Carregar Mais"
                                button_loading_label="Carregando"
                                pause="false"
                                theme_repeater="webstories-page-card.php"
                                post__not_in="' . implode(",", $exclude_ids) . '"
                                images_loaded="true"]
                            ');
                        ?>
                </div> <!-- web-stories-list -->

            </div> <!-- col-12 -->

        </div> <!-- row -->
    </div> <!-- Container -->
</main>

<?php get_footer(); ?>