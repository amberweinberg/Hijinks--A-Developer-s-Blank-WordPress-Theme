<?php

// ******************* Sidebars ****************** //

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Blog',
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
//set_post_thumbnail_size( 50, 50, true );
add_image_size( 'xlarge', 1200, 1200);

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
	'has_archive' => false,
	'supports' => array('title', 'editor', 'thumbnail')
));

add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'taxo', 'custom', array( 'hierarchical' => true, 'label' => 'Custom Taxonomy', 'query_var' => true, 'rewrite' => true ) ); 
}

// ******************* ACF Options Page ****************** //

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// ******************* Include Scripts Properly ****************** //

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js", false, null, true );
   wp_enqueue_script('jquery');
}

function wpdocs_scripts_method() {
	
	// CSS

   wp_register_style( 'primary-stylesheet', get_template_directory_uri() . '/style.css');
   wp_enqueue_style( 'primary-stylesheet' ); 
   
   // JS

   wp_register_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ), '', true  );
   wp_enqueue_script('custom-scripts');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );

// ******************* Add SVG Upload Support ****************** //

function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );

add_filter( 'wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4 );  /* the hook */

 function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon) {
    if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
        if(is_array($size)) {
            $image[1] = $size[0];
            $image[2] = $size[1];
        } elseif(($xml = simplexml_load_file($image[0])) !== false) {
            $attr = $xml->attributes();
            $viewbox = explode(' ', $attr->viewBox);
            $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
            $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
        } else {
            $image[1] = $image[2] = null;
        }
    }
    return $image;
} 

// ******************* Remove Admin Bar ****************** //

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	 show_admin_bar(false);
}

// ******************* Custom Admin Styles ****************** //

// change logo

function my_login_logo() { ?>
    <style type="text/css">
	    
	    body {
		    background-color: #29375B !important;
	    }
	    
	    .login #backtoblog a, .login #nav a {
		    color: #fff !important;
	    }
	    
	    input[type="checkbox"]:focus, input[type="color"]:focus, input[type="date"]:focus, input[type="datetime-local"]:focus, input[type="datetime"]:focus, input[type="email"]:focus, input[type="month"]:focus, input[type="number"]:focus, input[type="password"]:focus, input[type="radio"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="text"]:focus, input[type="time"]:focus, input[type="url"]:focus, input[type="week"]:focus, select:focus, textarea:focus {

			border-color: #29375B !important;
    		box-shadow: none !important;

		}
		
		.login #login_error, 
		.login .message, .login .success {
			border-left-color: #f77852 !important;
		}
	    
	    .login #backtoblog a:hover, 
	    .login #nav a:hover, 
	    .login h1 a:hover {
		    color: #f77852 !important;
	    }
	    
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/svgs/logo-ss.svg);
		height:104px;
		width: 142px;
		background-size: 100% auto;
		background-repeat: no-repeat;
        	margin-bottom: 30px;
        }
        
        .wp-core-ui .button-group.button-large .button, 
		.wp-core-ui .button.button-large {
			background-color: #29375B !important;
			border: none;
			border-radius: 0;
			box-shadow: none;
			font-weight: 300;
			letter-spacing: 2.4px;
			padding: 0 24px;
			text-shadow: none;
			text-transform: uppercase;
			transition: all .25s ease;
		}
		
		.wp-core-ui .button-group.button-large .button:hover, 
		.wp-core-ui .button.button-large:hover {
			background: #f77852 !important;
		}
		
		#wpadminbar {
			background-color: #29375B !important;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// change logo url

function my_login_logo_url() {
    return 'https://studiosimpati.co/';
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Studio Simpatico';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// custom admin css

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  
  	a,
  	.wp-core-ui .button-link:hover,
  	.update-message p::before {
	  	color: #29375B !important;
	}
  
    #wpadminbar,
    #adminmenu, 
    #adminmenu .wp-submenu, 
    #adminmenuback, #adminmenuwrap {
	    background-color: #29375B !important;
	}
	
	#wpadminbar .ab-empty-item, 
	#wpadminbar a.ab-item, 
	#wpadminbar > #wp-toolbar span.ab-label, 
	#wpadminbar > #wp-toolbar span.noticon,
	#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover > a, 
	#wpadminbar .quicklinks .menupop ul li a:focus, 
	#wpadminbar .quicklinks .menupop ul li a:focus strong, 
	#wpadminbar .quicklinks .menupop ul li a:hover, 
	#wpadminbar .quicklinks .menupop ul li a:hover strong, 
	#wpadminbar .quicklinks .menupop.hover ul li a:focus, 
	#wpadminbar .quicklinks .menupop.hover ul li a:hover, 
	#wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus, 
	#wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover, 
	#wpadminbar li #adminbarsearch.adminbar-focused::before, 
	#wpadminbar li .ab-item:focus .ab-icon::before, 
	#wpadminbar li .ab-item:focus::before, 
	#wpadminbar li a:focus .ab-icon::before, 
	#wpadminbar li.hover .ab-icon::before, 
	#wpadminbar li.hover .ab-item::before, 
	#wpadminbar li:hover #adminbarsearch::before, 
	#wpadminbar li:hover .ab-icon::before, 
	#wpadminbar li:hover .ab-item::before, 
	#wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, 
	#wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover, 
	#adminmenu li:hover div.wp-menu-image::before,
	#adminmenu a,
	#adminmenu .wp-submenu a,
	#adminmenu li a:focus div.wp-menu-image::before,
	#adminmenu div.wp-menu-image::before,
	#wpadminbar .ab-icon::before,
	#wpadminbar .ab-item::before,
	.acf-tooltip a,
	.acf-tooltip a[data-event="confirm"]:hover {
		color: #fff !important;
	}
	
	a:hover,
	#adminmenu .wp-submenu a:hover,
	.wp-core-ui .button-link,
	.plugin-update .update-message p,
	.acf-tooltip a[data-event="confirm"],
	.acf-tooltip a:hover {
		color: #f77852 !important;
	}
	
	#wpadminbar .ab-top-menu > li.hover > .ab-item, 
	#wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus, 
	#wpadminbar:not(.mobile) .ab-top-menu > li:hover > .ab-item, 
	#wpadminbar:not(.mobile) .ab-top-menu > li > .ab-item:focus,
	#wpadminbar .menupop .ab-sub-wrapper, 
	#wpadminbar .shortlink-input,
	#adminmenu li.menu-top:hover, 
	#adminmenu li.opensub > a.menu-top, 
	#adminmenu li > a.menu-top:focus,
	#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
		background-color: #f77852 !important;
		color: #fff !important;
	}
	
	#wpadminbar .quicklinks .menupop ul.ab-sub-secondary, 
	#wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu,
	#adminmenu .awaiting-mod, 
	#adminmenu .update-plugins {
		background: #666 !important;
	}
	
	.wp-core-ui .button-primary {
		background-color: #29375B !important;
		border: none;
		border-radius: 0;
		box-shadow: none;
		color: #fff !important;
		font-weight: 300;
		letter-spacing: 2.4px;
		padding: 0 24px;
		text-shadow: none;
		text-transform: uppercase;
		transition: all .25s ease;
	}
	
	.wp-core-ui .button-primary:hover {
		background: #f77852 !important;
	}
	
	.notice-warning.notice-alt {
		border-left-color: #29375B !important;
	}
	
	.plugin-update-tr.active td, 
	.plugins .active th.check-column,
	.notice-info {
		border-left-color: #f77852 !important;
	}
	
	.plugins .active td, 
	.plugins .active th {
		background: #fff;
	}
	
	.notice-warning.notice-alt {
		background: #eee;
	}
		
  </style>';
}

?>
