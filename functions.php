<?php
function my_theme_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_et_pb_gallery_image_size( $size ) {
return 1080;
}
add_filter( 'et_pb_gallery_image_width', 'my_et_pb_gallery_image_size' );

function my_et_pb_gallery_image_size_height( $size ) {
return 1080;
}
add_filter( 'et_pb_gallery_image_height', 'my_et_pb_gallery_image_size_height' );


function my_et_theme_image_sizes( $sizes ) {
$sizes['1080x1080'] = 'my-et-pb-post-main-image';
return $sizes;
}
add_filter( 'et_theme_image_sizes', 'my_et_theme_image_sizes' );