<!doctype html>
<html class="no-js" lang="">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Marfrig</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" async>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin async>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" async />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Start Data Map -->
    <?php
        $my_tags = get_the_tags();
        $tag_names = [];
        if ( $my_tags ) {
            foreach ( $my_tags as $tag ) {
                $tag_names[] = $tag->name;
            }
        }

        $setTargetings = [];
        if (is_single()) {
            $categories = get_the_category();
            $catName = '';
            if (!empty($categories)) {
                $catName = esc_html($categories[0]->name);
            }
            $current_url = get_the_permalink();

            $setTargetings[] = ".setTargeting('pageType', 'post')";
            $setTargetings[] = ".setTargeting('pageTags', '". implode( ',', $tag_names ) ."')";
            $setTargetings[] = ".setTargeting('pageCategories', '". $catName . "')";
            // $setTargetings[] = ".setTargeting('pageType', '')";
            $setTargetings[] = ".setTargeting('urlPath', '". $current_url ."')";
        } else if (is_front_page() || is_home()) {
            $current_url = get_bloginfo('url');
            $setTargetings[] = ".setTargeting('pageType', 'home')";
            $setTargetings[] = ".setTargeting('urlPath', '". $current_url ."')";
        } else if (is_category()) {
            $catName = single_cat_title('', false);
            $current_url = get_category_link( get_query_var( 'cat' ) );
            $setTargetings[] = ".setTargeting('pageType', 'category')";
            $setTargetings[] = ".setTargeting('pageCategories', '". $catName . "')";
            $setTargetings[] = ".setTargeting('urlPath', '". $current_url ."')";
        }
    ?>

    <!-- End Data Map -->
    
</head>
<body <?php body_class(); ?>>

<header id="header">
    <div class="container">
        <div class="row">

            <div class="col-12 d-flex align-items-center justify-content-center">
                

                <div class="logo">
                <a href="<?= get_site_url(); ?>/sustainability/">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/sustainability/logo-sust.png" >  
                </a>
                </div>

                
            </div>
            <!-- /.col-12 -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</header>
<!-- /#header -->