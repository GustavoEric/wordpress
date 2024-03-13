<div class="header-sensor"></div>

<header class="header py-md-4 py-0">
    <div class="container py-2">
        <div class="row">
            <div class="<?= (is_front_page()) ? 'col-md-9 px-2 px-md-5 d-flex justify-content-between ' : 'col-md-10 d-flex justify-content-between mx-auto' ?>">
                <div class="logo-menu">
                    <a href="#" class="menu-btn">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Menu.svg" alt="">
                    </a>
                    <div class="d-flex align-items-center gap-2 gap-md-3">
                        <a href="<?= get_site_url(); ?>" class="logo logo-header">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/logo-white-pratodoamanha.png" alt="">
                        </a>
                        <span class="divisor-logo"></span>
                        <a href="https://www.marfrig.com.br/pt" target="_blank" class="logo por-marfrig-header">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/logo-white-por-marfrig.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="dark-mode-search">
                    <?php // get_template_part("template_parts/dark-mode-switch") ?>

                    <input type="checkbox" id="darkmode-toggle" class="d-none"/>
                    <label for="darkmode-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                            <mask id="mask0_104_117" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                <rect width="44" height="44" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_104_117)">
                                <path d="M19.0209 29.7L21.1293 31.8542C21.3793 32.0986 21.6709 32.2209 22.0043 32.2209C22.3376 32.2209 22.6265 32.0986 22.8709 31.8542L24.9291 29.7H28.5084C28.8445 29.7 29.1272 29.5763 29.3563 29.3288C29.5855 29.0813 29.7001 28.7925 29.7001 28.4625V24.9123L31.7626 22.8709C32.007 22.6209 32.1293 22.3292 32.1293 21.9959C32.1293 21.6625 32.007 21.3736 31.7626 21.1292L29.7001 19.0711V15.4917C29.7001 15.1556 29.5855 14.873 29.3563 14.6438C29.1272 14.4146 28.8445 14.3 28.5084 14.3H24.9582L22.9168 12.1917C22.6668 11.9473 22.3751 11.825 22.0418 11.825C21.7084 11.825 21.4195 11.9473 21.1751 12.1917L19.0668 14.3H15.5376C15.2076 14.3 14.9188 14.4146 14.6713 14.6438C14.4238 14.873 14.3001 15.1556 14.3001 15.4917V19.0711L12.2376 21.1292C11.9932 21.3792 11.8709 21.6709 11.8709 22.0042C11.8709 22.3375 11.9932 22.6264 12.2376 22.8709L14.3001 24.9123V28.4625C14.3001 28.7925 14.4238 29.0813 14.6713 29.3288C14.9188 29.5763 15.2076 29.7 15.5376 29.7H19.0209ZM22.0001 27.5917V16.4084C23.5584 16.4084 24.88 16.9525 25.9647 18.0409C27.0494 19.1292 27.5918 20.4507 27.5918 22.0054C27.5918 23.5602 27.0481 24.8799 25.9609 25.9646C24.8736 27.0493 23.5533 27.5917 22.0001 27.5917ZM7.33343 37.7667C5.99739 37.7667 4.85366 37.291 3.90226 36.3395C2.95082 35.3881 2.4751 34.2444 2.4751 32.9084V11.0917C2.4751 9.75566 2.95082 8.61193 3.90226 7.66053C4.85366 6.70909 5.99739 6.23337 7.33343 6.23337H36.6668C38.0028 6.23337 39.1465 6.70909 40.0979 7.66053C41.0494 8.61193 41.5251 9.75566 41.5251 11.0917V32.9084C41.5251 34.2444 41.0494 35.3881 40.0979 36.3395C39.1465 37.291 38.0028 37.7667 36.6668 37.7667H7.33343Z" fill="white"/>
                            </g>
                        </svg>
                    </label>
                    <span>/</span>
                    
                    <a href="#" class="search-btn">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Search.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /#header -->

<nav class="drawer-nav">
    <div class="drawer-nav__inner">
        <a href="#" class="close-menu-btn">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Close.svg" alt="">
        </a>

        <!-- <a href="<?= get_site_url(); ?>">
            <img 
                src="<?php echo get_template_directory_uri() ?>/assets/images/logos/logo-white-pratodoamanha.png"
                alt="Prato do Amanhã"
                class="mb-3 drawer-logo-pratodoamanha"
            >
        </a> -->

        <div class="d-flex align-items-center gap-2 gap-md-3 mb-3 mb-md-4 ms-md-5">
            <a href="<?= get_site_url(); ?>" class="logo logo-header">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/logo-white-pratodoamanha.png" class="drawer-logo-pratodoamanha">
            </a>
            <span class="divisor-logo"></span>
            <a href="https://www.marfrig.com.br/pt" target="_blank" class="logo por-marfrig-header">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/logo-white-por-marfrig.png" class="drawer-logo-pratodoamanha marfrig">
            </a>
        </div>

        <div class="drawer-nav__menu-1" style="">
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => false,
            ]);
            ?>
        </div>

        <hr>

        <div class="drawer-nav__menu-2" style="">
            <?php
            wp_nav_menu([
                'theme_location' => 'second-menu',
                'container' => false,
            ]);
            ?>
        </div>

        <div class="drawer-newsletter d-none d-md-block">
            <?php get_template_part('template_parts/newsletter-drawer-version') ?>
        </div>
     
    </div>
</nav>
