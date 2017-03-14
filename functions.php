<?php
/**
 * jov functions and definitions
 *
 * @package jov
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	//$content_width = 640; /* pixels */
}

if ( ! function_exists( 'jov_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jov_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jov, use a find and replace
	 * to change 'jov' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jov', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jov' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	//add_theme_support( 'custom-background', apply_filters( 'jov_custom_background_args', array(
		//'default-color' => 'ffffff',
		//'default-image' => '',
	//) ) );
}
endif; // jov_setup
add_action( 'after_setup_theme', 'jov_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jov_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'jov' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jov_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jov_scripts() {
	wp_enqueue_style( 'jov-style', get_stylesheet_uri() );
	
    // custom CSS file
    wp_enqueue_style( 'jov-app', get_template_directory_uri() . "/css/app.css" );
    wp_enqueue_style( 'jov-fa', "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" );

	// Bootsrap JS
    wp_enqueue_script( 'jov-bootsrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true );
	
    wp_enqueue_script( 'jov-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'jov-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jov_scripts' );

// Make slider all sticky icky icky 

function sticky_header_js(){ ?>

<script type="text/javascript">
jQuery(function($) {
 $(window).scroll(function() {
  if ($(this).scrollTop() > 1){  
     $('header').addClass("sticky");
     $('#content').addClass("small-nav");
   }
   else{
     $('header').removeClass("sticky");
     $('#content').removeClass("small-nav");
   }
 });
});
</script>

<?php } 

add_action('wp_footer', 'sticky_header_js', 20);


function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Options file.
 */
require get_template_directory() . '/inc/options.php';
