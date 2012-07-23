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
	'supports' => array('title', 'editor', 'author'),
));
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'taxo', 'custom', array( 'hierarchical' => true, 'label' => 'Custom Taxonomy', 'query_var' => true, 'rewrite' => true ) ); 
}

// ******************* Add Custom Meta Boxes ****************** //

add_action( 'add_meta_boxes', 'cd_add_quote_meta' );
function cd_add_quote_meta()
{
    add_meta_box( 'quote-meta', __( 'A Custom Meta Box' ), 'cd_quote_meta_cb', 'page', 'normal', 'high' );
}

function cd_quote_meta_cb( $post )
{
    // Get values for filling in the inputs if we have them.
    $customMeta = get_post_meta( $post->ID, '_cd_custom_meta', true );

    // Nonce to verify intention later
    wp_nonce_field( 'save_quote_meta', 'custom_nonce' );
    ?>
    <p>
        <label for="customMeta">The title</label>
         <input type="text" class="widefat" id="customMeta" name="_cd_custom_meta" value="<?php echo $customMeta;?>" />
    </p>    
<?php

}

add_action( 'save_post', 'cd_custom_meta_save' );
function cd_custom_meta_save( $id )
{

    if( isset( $_POST['_cd_custom_meta'] ) )
        update_post_meta( $id, '_cd_custom_meta', $_POST['_cd_custom_meta'] );

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

?>