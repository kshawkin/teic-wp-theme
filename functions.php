<?php

/**
 * TEI-C functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TEI-C
 */

if ( ! function_exists( 'teic_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function teic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TEI-C, use a find and replace
	 * to change 'teic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'teic', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'teic' ),
		'guidelines' => esc_html__( 'Guidelines', 'teic' ),
		'activities' => esc_html__( 'Activities', 'teic' ),
		'tools' => esc_html__( 'Tools', 'teic' ),
		'membership' => esc_html__( 'Membership', 'teic' ),
		'support' => esc_html__( 'Support', 'teic' ),
		'about' => esc_html__( 'About', 'teic' ),
		'news' => esc_html__( 'News', 'teic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'teic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;

add_action( 'after_setup_theme', 'teic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function teic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'teic_content_width', 640 );
}
add_action( 'after_setup_theme', 'teic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function teic_widgets_init() {

	/**
	 * Sidebars
	 */ // Home
	register_sidebar( array(
		'name'          => esc_html__( 'Home Sidebar', 'teic' ),
		'id'            => 'sidebar-home',
		'description'   => esc_html__( 'Add widgets here.', 'teic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'teic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function teic_original_scripts() {

	wp_enqueue_style( 'teic-original-styles', get_template_directory_uri() . '/css/tei.css' );
	wp_enqueue_script( 'udm-all', get_template_directory_uri() . '/js/udm-all.js', array(), '4.6', true );
	wp_enqueue_script( 'udm-dom', get_template_directory_uri() . '/js/udm-dom.js', array(), '4.6', true );
	wp_enqueue_script( 'udm-mod-keyboard', get_template_directory_uri() . '/js/udm-mod-keyboard.js', array(), '4.6', true );

}

add_action( 'wp_enqueue_scripts', 'teic_original_scripts' );

function teic_scripts() {

	wp_enqueue_style( 'teic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'teic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	if ( is_page() ) {
		wp_enqueue_script( 'teic-toc', get_template_directory_uri() . '/js/table-of-contents.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'teic-dom', get_template_directory_uri() . '/js/teic-dom-fixes.js', array( 'jquery' ), '', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'teic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Disable wpautop();
 *
 * Because so much of the content coming over from OpenCMS
 * needs a lot of massaging, wpautop() is kind of getting
 * in the way, at least for now.
 *
 * We can disable this in the future, or target just
 * certain pieces of content..
 */
 function teic_disable_autop() {
	 global $post;
	 if ( is_page() ) :
		 remove_filter( 'the_content', 'wpautop' );
	 endif;
 }
 add_action( 'loop_start', 'teic_disable_autop' );

/**
 * Is the page a child of a specific parent?
 */

// $pid = The ID of the page we're looking for pages underneath
function is_tree( $pid ) {
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid || is_page( $pid )))
		return true;   // we're at the page or at a sub page
		else
		return false;  // we're elsewhere
	};
