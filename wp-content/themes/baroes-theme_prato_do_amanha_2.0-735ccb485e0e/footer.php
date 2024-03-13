<footer id="footer" class="mt-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 d-md-none mb-5">
                <div class="logo-white-pratodoamanha mb-4 pb-2">
                    <a href="<?= get_site_url() ?>"><img src="<?= get_template_directory_uri() .'/assets/images/logos/logo-white-pratodoamanha.png' ?>" alt="Logo: Prato do Amanhã"></a>
                </div>
                <a href="https://www.marfrig.com.br/pt"><img src="<?= get_template_directory_uri() .'/assets/images/logos/logo-white-marfrig.png' ?>" class="d-flex mx-auto" style="width: 80px;" alt="Logo: Marfrig"></a>
            </div>

            <div class="col-6 col-md-4">
                <nav class="footer">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => 'nav',
                    )); 
                    ?>
                </nav>
            </div>
    
            <div class="col-md-4 d-none d-md-flex align-items-center justify-content-center">
                <div class="logo-white-pratodoamanha">
                    <a href="<?= get_site_url() ?>"><img src="<?= get_template_directory_uri() .'/assets/images/logos/logo-white-pratodoamanha.png' ?>" alt="Logo: Prato do Amanhã"></a>
                </div>
            </div>

            <div class="col-4 col-md-4">
                <div class="marfrig-descriptions">
                    <a href="https://www.marfrig.com.br/pt" class="d-none d-md-block"><img src="<?= get_template_directory_uri() .'/assets/images/logos/logo-white-marfrig.png' ?>" alt="Logo: Marfrig"></a>
    
                    <div class="copyright">
                        2023 Marfrig. Todos os direitos reservados <br>
                        marfrig.com.br
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php if (! wp_is_mobile()) { ?>
    <div class="sectionFirulas">
        <img class="detalhe-1 d-md-block d-none" src="<?= get_template_directory_uri() ?>/assets/images/detalhe-layout.svg" />
        <img class="detalhe-2 d-md-block d-none" src="<?= get_template_directory_uri() ?>/assets/images/detalhe-layout-2.svg" />
        <?php // if(is_front_page()) { ?>
            <!-- <img class="detalhe-3 d-md-block d-none" src="<?//= get_template_directory_uri() ?>/assets/images/detalhe-layout-3.svg" /> -->
        <?php // } ?>
    </div>
<?php } ?>

<?php wp_footer(); ?>