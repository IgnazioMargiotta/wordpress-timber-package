<?php

// Start Timber
$timber = new Timber\Timber();

// Add requirements for twig
add_filter( 'timber/context', 'add_to_context' );
function add_to_context( $context ) {

    // Set menu
    $context['menu'] = new \Timber\Menu( 'header-menu' );

    return $context;
}



// Include Scripts and Styles
function add_styles() {
    wp_enqueue_style( 'app-style', get_template_directory_uri() . '/assets/dist/app.css', false );
}
 
function add_scripts() {
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/dist/app.js', array(), false, true );
}
 
add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );


// Include block ( if we want to use Gutenberg )

require_once 'blocks/blocks.php';


// Create Category for blocks

function category_blocks( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'blocks',
				'title' => __( 'Theme', 'blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'category_blocks', 10, 2);


// Configuration Theme

function register_menu_theme() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Header Menu' ),
	  )
	);
  }
  add_action( 'init', 'register_menu_theme' );

function theme_add_support() {
	add_theme_support( 'woocommerce' ); // Enable support for woocommerce
	add_theme_support( 'post-formats');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
}

function timber_set_product( $post ) {
    global $product;

    if ( is_woocommerce() ) {
        $product = wc_get_product( $post->ID );
    }
}

add_action( 'after_setup_theme', 'theme_add_support' );