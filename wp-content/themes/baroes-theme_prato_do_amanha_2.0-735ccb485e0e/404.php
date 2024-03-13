<?php get_header(); ?>

<style>
    header.header {
        background-color: #035866;
    }
    #main {
        margin-top: 125px;
    }
    @media only screen and (max-width: 575px) {
        #main {
            margin-top: 70px;
        }
    }
</style>

<main id="main">

    <div id="header-page" class="mt-5">
        <div class="container pt-4">
            <div class="row text-center">
                <div class="col-md-8 mx-auto">
                    <h1 class="title-page">Página não encontrada</h1>
                </div>
            </div>
        </div><!-- /.container-->
    </div>
    <div class="container text-left content mt-4">
        <div class="row">
            <div class="box-page col-md-12 text-center">
                <a href="<?= get_home_url() ?>" style="text-decoration: none; font-weight: bold;">Voltar para home</a>
            </div>
        </div>
    </div><!-- /.container-->

</main>
<!-- /#main -->

<?php get_footer(); ?>
