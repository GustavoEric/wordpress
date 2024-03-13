<?php
/* Template Name: Canal Especial */
get_header();
//
$bg_img = get_field('bg_img');
$font_color = get_field('font_color') ?: '';
$tagCanalEspecial = get_field('tag' , $post->ID);
$web_stories = get_field('web_stories');
$entrevistas = get_field('entrevistas');
$b_ignored_posts = [];
//

if($tagCanalEspecial->slug == 'cop-28') {
  $posts = b_query_posts(4, [
    'tag' => $tagCanalEspecial->slug
  ]);
} else {
  $posts = b_query_posts(10, [
    'tag' => $tagCanalEspecial->slug
  ]);
}

?>

<main id="main">
  <header class="header-canal-especial" style="background-image: url('<?= $bg_img; ?>');">
    <div class="container d-flex flex-wrap">
      <div class="col-md-6 align-self-center px-0 px-md-3">

        <div class="content">
          <div class="category" style="color: <?= $font_color ?>">
            <p>ESPECIAL</p>
          </div>
          <div class="title">
            <h1 style="color: <?= $font_color ?>"><?= the_title(); ?></h1>
          </div>
          <div class="description" style="color: <?= $font_color ?>">
            <?= the_content(); ?>
          </div>
        </div>

      </div>
  
      <div class="col-md-6 px-0 px-md-3">

        <!-- special-card canal especial-->
        <?php
          $post = array_splice($posts, 0, 1)[0];
          setup_postdata($post);
          $thumb_url = get_the_post_thumbnail_url($post->ID, 'vertical-thumb');
        ?>
          <div class="special-card-canal-especial">
              <div class="card-img"><img src="<?= $thumb_url ?>" /></div>

              <div class="card-content">
                  <div class="card-content-inner">
                      <a class="cat" href="<?= get_site_url() . '/tag/' . $tagCanalEspecial->slug ?>">
                          <?= $tagCanalEspecial->name ?>
                      </a>
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <p><a href="<?php the_permalink(); ?>"><?= get_the_excerpt(); ?></a></p>
                  </div>
              </div>
          </div>
        <?php $b_ignored_posts[] = $post->ID; ?>
        <?php wp_reset_postdata(); ?>
      </div>
  
    </div>
  </header>
  
  <section class="body-canal-especial mt-md-5 pt-md-5">

    <?php if($tagCanalEspecial->slug == 'cop-28') { ?>

      <!-- x3 Posts -->
      <div class="container">  
        <div class="row gap-y-4 mb-md-3 mb-0">
          <?php foreach($posts as $post) { ?>
            <?php setup_postdata($post); ?>
  
            <!-- VERTICAL CARD CANAL ESPECIAL -->
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
  
            <?php $b_ignored_posts[] = $post->ID; ?>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        </div>
      </div>

      <!-- Webstories -->
      <?php if($web_stories) { ?>
        <div class="container my-3 my-md-5 webstories">
          <hr class="mb-3 mb-md-5">
          <div class="col-md-9">
              <h2 class='texto-webstories'>Webstories</h2>
          </div>
          <div class="web-stories-list alignnone is-view-type-grid is-style-default">
            <div class="d-flex justify-content-between ov-scroll">
                <link rel='stylesheet' id='web-stories-list-styles-css' href='<?php echo get_site_url(); ?>/wp-content/plugins/web-stories/assets/css/web-stories-list-styles.css?ver=1.11.0' media='all'/>
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
              </div>
            </div>
            <hr class="mt-3 mt-md-5">
        </div>
      <?php } ?>

      <!-- Entrevistas -->
      <!-- <div class="container">
        <div class="col-md-5">

        <?php if($entrevistas) { ?>

          <?php foreach ($entrevistas as $post) : setup_postdata($post); ?>
          <?php $nome = get_field('nome_pessoa_entrevista'); ?>
            <div class="card_entrevista mb-4">
              <div class="card__thumb"><?php the_post_thumbnail(''); ?></div>
              <div class="card__content">
                <span class="author"><?= $nome ?></span>
                <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
              </div>
            </div>
            <?php $exclude_ids[] = $post->ID; ?>
          <?php endforeach; ?>

        <?php } else { ?>

          <?php $args = array(
            'post_type' => 'post',
            'tag' => 'entrevistas',
            'posts_per_page' => 2,
            'post__status' => 'publish',
            'offset' => 0,
            'post__not_in' => $exclude_ids,
            );
          ?>
  
          <?php $query_entrevistas_canal = new WP_Query($args);
            if ($query_entrevistas_canal->have_posts()):
          ?>
          <?php while ( $query_entrevistas_canal->have_posts() ) {
            $query_entrevistas_canal->the_post();
            $nome = get_field('nome_pessoa_entrevista');
          ?>
            <div class="card_entrevista mb-4">
              <div class="card__thumb"><?php the_post_thumbnail(''); ?></div>
              <div class="card__content">
                <span class="author"><?= $nome ?></span>
                <h2><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h2>
              </div>
            </div>
            <?php $exclude_ids[] = $post->ID; ?>
          <?php } endif; wp_reset_query(); ?>

        <?php } ?>

        </div>
      </div> -->

      <!-- Load-more -->
      <div class="container">
        <div id="latest-posts">
            <?php
              echo do_shortcode('[ajax_load_more
                acf="true"
                acf_post_id="'.$page_id.'"
                acf_field_type="repeater"
                acf_field_name="{tag}"
                id="default"
                post_type="post"
                tag="'. $tagCanalEspecial->slug .'"
                meta_compare="tag"
                meta_value="'. $tagCanalEspecial->slug .'"
                posts_per_page="6"
                scroll="false"
                button_label="Carregar mais"
                button_loading_label="Carregando"
                theme_repeater="vertical-card-canal-especial.php"
                pause="false"
                post__not_in="' . b_ignored_posts('string') . '"
                images_loaded="true"]
              ');
            ?>
        </div>
      </div>

    <?php } else { ?>

      <!-- Posts -->
      <div class="container">  
        <div class="row gap-y-4 mb-md-3 mb-0">
          <?php foreach($posts as $post) { ?>
            <?php setup_postdata($post); ?>
  
            <!-- VERTICAL CARD CANAL ESPECIAL -->
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
  
            <?php $b_ignored_posts[] = $post->ID; ?>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        </div>
      </div>
  
      <!-- Load-more -->
      <div class="container">
        <div id="latest-posts">
            <?php
              echo do_shortcode('[ajax_load_more
                acf="true"
                acf_post_id="'.$page_id.'"
                acf_field_type="repeater"
                acf_field_name="{tag}"
                id="default"
                post_type="post"
                tag="'. $tagCanalEspecial->slug .'"
                meta_compare="tag"
                meta_value="'. $tagCanalEspecial->slug .'"
                posts_per_page="6"
                scroll="false"
                button_label="Carregar mais"
                button_loading_label="Carregando"
                theme_repeater="vertical-card-canal-especial.php"
                pause="true"
                post__not_in="' . b_ignored_posts('string') . '"
                images_loaded="true"]
              ');
            ?>
        </div>
      </div>

    <?php } ?>

  </section>
</main>

<?php get_footer(); ?>