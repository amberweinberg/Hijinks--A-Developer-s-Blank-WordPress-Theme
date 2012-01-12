<?php

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

add_theme_support( 'menus' );

function wpe_excerptlength_news($length) {
    return 15;
}

function wpe_excerptlength_teaser($length) {
    return 35;
}
function wpe_excerptlength_index($length) {
    return 160;
}
function wpe_excerptmore($more) {
    return '...<a href="'. get_permalink().'">Read More ></a>';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'category-thumb', 300, 9999, true );

register_post_type('custom', array(
	'label' => __('Custom Post Type'),
	'singular_label' => __('Custom Post Type'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author'),
));
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'tax', 'custom', array( 'hierarchical' => true, 'label' => 'Custom Taxonomy', 'query_var' => true, 'rewrite' => true ) );
  
}


?>
