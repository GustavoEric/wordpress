<?php

add_action( 'wp_head', 'prefix_add_og_image', 10, 1 );
function prefix_add_og_image( $img ) {
    if( is_post_type_archive( 'newsletter' ) ) {
	    echo '<meta property="og:image" content="https://pratodoamanha.com.br/wp-content/uploads/2023/01/image.png" />';
    }
}