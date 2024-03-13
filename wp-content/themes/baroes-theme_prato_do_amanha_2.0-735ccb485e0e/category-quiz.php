<?php
    get_header();
    ## Traz somente categorias filhas em primeiro grau
    $cat_id = get_query_var('cat');
    $term = get_queried_object();
?>

<style>
    .card__vertical .card__content .cat {
        display: none;
    }
    .card__vertical .card__thumb {
        margin-bottom: 10px;
    }
</style>

<main id="main">
    <div id="category-header" class="mb-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 z-control">
                    <h1 class="m-0"><?php single_cat_title(); ?></h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#category-header -->

    <div class="container">
        <div class="row">
            <?php
                $args = array(
                    'post_type'   => 'quiz',
                    'post_status' => 'publish',
                    'post__not_in' => $exclude_ids,
                );
                $new_post_loop = new WP_Query( $args );
                if ($new_post_loop->have_posts()):
            ?>
                <?php while ( $new_post_loop->have_posts() ) {
                    $new_post_loop->the_post();
                ?>
            
                    <div class="col-12 col-md-3 mb-5">
                        <div class="vertical-card-wrapper">
                            <?php get_template_part('template_parts/vertical-card'); ?>
                        </div>
                    </div>
                    
                <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-12 mt-4 text-center d-flex justify-content-center">
                <?= bootstrap_pagination() ?>
            </div>
        </div>
        <!-- /.row -->
        <?php endif; ?>
    </div>
    <!-- /.container -->
</main>
<!-- /#main -->

<?php get_footer(); ?>