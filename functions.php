<?php

// Include Scripts and CSS

function zenlife_theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap-3.3.5.css' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome-4.6.3/css/font-awesome.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'zenlife_theme_styles');

function zenlife_theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
  
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', 'true');
}

add_action( 'wp_enqueue_scripts', 'zenlife_theme_js');

// Add WP Basic Features Support

if ( ! function_exists( 'zenlife_setup' ) ) :

	function zenlife_setup() {

	// Add Support for Feed Links
	
	add_theme_support( 'automatic-feed-links' );
	
	// Add Menu Support
	
	add_theme_support ( 'menus' );
	
	// Add Thumbnails Support
	
	add_theme_support( 'post-thumbnails' );
	
	// Add Support for Flexible Title Tag
	
	add_theme_support( 'title-tag' );

	}
endif;

add_action( 'after_setup_theme', 'zenlife_setup' );

// Check for Front Page being used

function zenlife_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'zenlife_filter_front_page_template' );

// Add Support for WooCommerce

add_action( 'after_setup_theme', 'zenlife_woocommerce_support' );
function zenlife_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add Support for Google Fonts

function zenlife_google_fonts() {
  $query_args = array(
    'family' => 'Open+Sans:400,400italic,600,600italic,700,700italic|Roboto:400,400italic,700,700italic|Lato:400,400italic,700,700italic|Raleway:400,400italic,600,600italic,700,700italic|PT+Sans:400,400italic,700,700italic|Lora:400,400italic,700,700italic|Ubuntu:400,400italic,700,700italic|Noto+Sans:400,400italic,700,700italic|Playfair+Display:400,400italic,700,700italic|Alegreya+Sans:400,400italic,700,700italic|Muli:400italic|Cabin:400,600,400italic,600italic,700,700italic|Noto+Serif:400,400italic,700,700italic',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'zenlife_google_fonts');

// Content Width Requirement

function zenlife_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zenlife_content_width', 800 );
}
add_action( 'after_setup_theme', 'zenlife_content_width', 0 );

// MENUS!

function zenlife_register_theme_menus() {

	register_nav_menus (
		array (
			'header-menu' => __( 'Header Menu', 'zen-life')
	));
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Register Menus
add_action ( 'init', 'zenlife_register_theme_menus');


// WIDGETS!

require_once get_template_directory() . '/inc/widgets.php';

// Include About Box Sidebar Widget
require_once get_template_directory() . '/inc/aboutbox-widget.php';

// Include Home Feature Widget
require_once get_template_directory() . '/inc/home-feature-widget.php';

// Include CTA Bar Widget
require_once get_template_directory() . '/inc/ctabar-widget.php';

// Include CTA Button Widget
require_once get_template_directory() . '/inc/ctabutton-widget.php';

// Include Social Icons Widgets
require_once get_template_directory() . '/inc/social-widget-footer.php';
require_once get_template_directory() . '/inc/social-widget-header.php';
require_once get_template_directory() . '/inc/social-widget-sidebar.php';

// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';
require_once get_template_directory() . '/inc/theme-customizer.php';


// Adjust Wordpress Excerpt

function zenlife_new_excerpt($text) {
	if ($text == '') 	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 40);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, ' ... ');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'zenlife_new_excerpt');

?>