<?php 
/**
* Add theme supports
*/
add_theme_support('menus');
add_theme_support('post_thumbnails');
add_image_size('projImgCrop', 450, 540, true);
add_image_size('blogFeatImgCrop', 400, 200, true);


function register_theme_menus() {
	register_nav_menus(
		array('primary-menu' => __( 'Primary Menu' ), 
		)
	);
} 
add_action( 'init', 'register_theme_menus' );

/**
Add theme support for WooCommerce (optional)
*/
 add_action( 'after_setup_theme', 'woocommerce_support' );
 function woocommerce_support() {
     add_theme_support( 'woocommerce' );
 }



/**
* Enqueue scripts and styles.
>>> REPLACE "theme" with namespace for this theme <<<
*/
function tjr_theme_styles_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'tjr-main', get_theme_file_uri( '/style.css' ) );
	wp_enqueue_style( 'tjr-all', get_theme_file_uri( '/css/all.css' ) );

	if( is_front_page() ){
		wp_enqueue_style( 'tjr-homepage', get_theme_file_uri( '/css/home.css' ) );
	}

	wp_enqueue_style( 'tjr-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' );
	wp_enqueue_style( 'tjr-gfonts', 'https://fonts.googleapis.com/css?family=Lora:400,700|Oswald:200,400,700' );
	wp_enqueue_style( 'tjr-animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' );
	wp_enqueue_script( 'tjr-global', get_theme_file_uri( '/js/tjrogersdesign.js' ), array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'tjr_theme_styles_scripts' );




/**
* Register our sidebars and widgetized areas.
*/
function create_widget($name, $id, $description) {

    register_sidebar(array(
        'name' => __( $name ),    
        'id' => $id,
        'description' => __( $description ),
        'before_widget' => '<div id="'.$id.'" class="widget %1$s %2$s">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => esc_html__( 'Feature Area' ),    
        'id' => 'feature-area',
        'description' => esc_html__( 'Feature images & text.' ),
        'before_widget' => '<div class="widget feature">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => esc_html__( 'Right Sidebar' ),    
        'id' => 'right-sidebar',
        'description' => esc_html__( 'Right Sidebar' ),
        'before_widget' => '<div class="widget sidebar-right">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => esc_html__( 'Content Bottom' ),    
        'id' => 'content-bottom',
        'description' => esc_html__( 'Full Width Content above Prefooter.' ),
        'before_widget' => '<div class="widget content-bottom">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => esc_html__( 'Prefooter' ),    
        'id' => 'prefooter',
        'description' => esc_html__( 'Prefooter Content.' ),
        'before_widget' => '<div class="widget prefooter">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
 
}
// Create the actual widgets (ID is a unique string)
create_widget("Name", "id", "Description");
//add_action( 'widgets_init', 'create_widget' );



