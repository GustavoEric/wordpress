<?php
get_header('sustainability');
$post_id = get_the_id();

?>

<main id="main" class="<?= $especial_single ?>">

    <?php if (have_posts()) : ?>

    <?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php
            $post_class = get_post_class("cf", $post_id);
            $post_class = is_array($post_class)
                ? implode(" ", $post_class)
                : $post_class;
            ?>


    <article id="post-<?php the_ID(); ?>" class="<?php echo $post_class; ?>" role="article">

        
        <div id="single-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 mx-md-auto z-control">
                        <div class="single-thumb">
                            <?php the_post_thumbnail('1000-585'); ?>
                            <?php if ( get_the_post_thumbnail_caption()) : ?>
                            <span class="post-thumb-capt"><?php the_post_thumbnail_caption(); ?></span>
                            <?php endif; ?>
                        </div>
                        <!-- /.single-thumb -->
                    </div>

                    <div class="col-12 col-md-10 mx-md-auto z-control">

                        <h1><?php the_title(); ?></h1>

                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#single-header -->

        <div id="single-content" class="mb-1">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-8 mx-md-auto">
                                
                        <h2 class="excerpet"><?= get_the_excerpt(); ?></h2>

                        <div class="the-content">

                            <?php the_content(); ?>

                        </div>
                        <!-- /.the-content -->

                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#single-content -->

    </article>

    <section class="leia-mais">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <p class="single-leia-mais">read more</p>
                </div>
                <?php
                    $query = new WP_Query(array(
                        'post_type' => 'sustainability',
                        'posts_per_page' => 3,
                        'post__status' => 'published',
                        'offset' => 0,
                        'post__not_in' =>  array($post_id) 
                        
                    ));
                ?>
                <?php while ($query ->have_posts()) : $query ->the_post(); ?>
                    <div class="col-12 col-md-4">
                        <div class="vertical-card-wrapper">
                            <?php get_template_part('template_parts/special-card-sustainability'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
    <?php endif; ?>


</main>
<!-- /#main -->


<?php get_footer(); ?>