<?php

// ******************* Sidebars ****************** //

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Pages',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

// ******************* Add Custom Menus ****************** //

add_theme_support( 'menus' );

// ******************* Add Custom Excerpt Lengths ****************** //

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

// ******************* Add Post Thumbnails ****************** //

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'category-thumb', 300, 9999, true );

// ******************* Add Custom Post Types & Taxonomies ****************** //

register_post_type('custom', array(
	'label' => __('Custom Post Type'),
	'singular_label' => __('Custom Post Type'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'query_var' => false,
	'has_archive' => true,
	'supports' => array('title', 'editor', 'author')
));

add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'taxo', 'custom', array( 'hierarchical' => true, 'label' => 'Custom Taxonomy', 'query_var' => true, 'rewrite' => true ) ); 
}


// ******************* Add Options to Theme Customizer ****************** //


function themename_customize_register($wp_customize){
    $wp_customize->add_section('themename_section_name', array(
	    'title' => __('Section Title', 'themename'),
	    'priority' => 120,
	));
	
	$wp_customize->add_setting('themename_theme_options[themename_option_name]', array(
	    'default'        => 'Input description',
	    'capability'     => 'edit_theme_options',
	    'type'           => 'option',
	));
	
	$wp_customize->add_control('themename_option_name', array(
	    'label'      => __('Name of option', 'themename'),
	    'section'    => 'themename_section_name',
	    'settings'   => 'themename_theme_options[themename_option_name]',
	));
}

add_action('customize_register', 'themename_customize_register');


// ******************* Add Shortcode ****************** //

function secondaryCallout($atts, $content = null) {
	extract(shortcode_atts(array(
	'link'	=> '#',
    'link_title'	=> '',
    'content'	=> '',
    ), $atts));

	$out = '
		<div class="secondaryCallout tertiaryColorBkg">
			'.$content.' <a class="secondaryColorText" title="'.$link_title.'" href="'.$link.'">'.$link_title.' &gt;</a>
		</div>
	';

    return $out;
}
 
add_shortcode('secondary_callout', 'secondaryCallout');

add_filter('widget_text', 'do_shortcode');

// ******************* Include jQuery Properly ****************** //

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

?>