<?php
    get_header();
    ## Traz somente categorias filhas em primeiro grau
    $term = get_queried_object();
    $exclude_ids = [];
?>

<main id="main">

    <div id="category-header" class="mb-3 mb-md-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="m-0"><?php single_cat_title(); ?></h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#category-header -->

    <div class="container">

        <?php if (have_posts()): ?>
            <?php $countPosts = count($posts); ?>
            <?php $iPrintedPosts = 0; ?>

            <div class="row tags-top-list mb-0">
                <?php
                $sectionPosts = 1;
                $pointStop = $iPrintedPosts + $sectionPosts;
                for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                    if ($iPrintedPosts >= $pointStop) {
                        break;
                    }
                    $post = $posts[$iPrintedPosts];
                    ?>

                        <div class='col-md-6 mb-4 mb-md-0'>
                            <?php get_template_part('template_parts/big-card'); ?>
                            <?php $exclude_ids[] = $post->ID; ?>
                        </div>

                <?php } ?>


                <?php
                $sectionPosts = 1;
                $pointStop = $iPrintedPosts + $sectionPosts;
                for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                    if ($iPrintedPosts >= $pointStop) {
                        break;
                    }
                    $post = $posts[$iPrintedPosts];
                    ?>

                    <div class='col-md-3 mod'> <!-- card médio -->
                        <?php get_template_part('template_parts/vertical-card-absolute'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>

                <?php } ?>

                <div class="col-md-3 d-flex flex-wrap justify-content-between mt-4 mt-md-0">
                    <?php
                    $sectionPosts = 2;
                    $pointStop = $iPrintedPosts + $sectionPosts;
                    for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                        if ($iPrintedPosts >= $pointStop) {
                            break;
                        }
                        $post = $posts[$iPrintedPosts];
                        ?>

                        <?php get_template_part('template_parts/card-no-pic'); ?>
                        <?php $exclude_ids[] = $post->ID; ?>

                    <?php } ?>
                </div>

                <hr class="last-hr">
            </div>

            <div class="row tags-post-list">

                <?php
                $sectionPosts = 8;
                $pointStop = $iPrintedPosts + $sectionPosts;
                for ($iPrintedPosts; $iPrintedPosts < $countPosts; $iPrintedPosts++) {
                    if ($iPrintedPosts >= $pointStop) {
                        break;
                    }
                    $post = $posts[$iPrintedPosts];
                    ?>

                    <div class="col-12 col-md-3 mb-5">
                        <?php get_template_part('template_parts/vertical-card') ?>
                        <?php $exclude_ids[] = $post->ID; ?>
                    </div>

                <?php } ?>

            </div>
            <!-- /.row -->

            <!-- PAGINACAO -->
            <section class="pagination-box py-5">
                <div class="container">
                    <nav aria-label="Pagination" class="d-flex justify-content-center">
                        <?php bootstrap_pagination(); ?>
                    </nav>
                </div>
            </section>

        <?php endif; ?>

    </div>
    <!-- /.container -->

</main>
<!-- /#main -->

<?php get_footer(); ?>