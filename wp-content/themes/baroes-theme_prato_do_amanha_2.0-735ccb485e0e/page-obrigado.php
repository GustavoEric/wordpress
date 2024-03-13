<?php // Template Name: Página de Obrigado ?>
<?php get_header(); ?>
    <main id="main">

        <div id="header-page" class="mt-5">
            <div class="container pt-4">
                <div class="row text-center">
                    <div class="col-md-8 mx-auto">
                        <h1 class="title-page"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div><!-- /.container-->
        </div>
        <div class="container text-left content mt-4">
            <div class="row">
                <div class="box-page col-md-12 text-center">
                    <?php the_content(); ?> 
                </div>
            </div>
        </div><!-- /.container-->

    </main>
<!-- /#main -->

<?php get_footer(); ?>
