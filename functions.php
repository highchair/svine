<?php
/**
 * SVINE functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SVINE
 */

if ( ! function_exists( 'svine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function svine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SVINE, use a find and replace
		 * to change 'svine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'svine', get_template_directory() . '/languages' );

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
		add_image_size( 'medium_wide', 768, 420, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'svine' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'svine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function svine_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'svine_content_width', 640 );
}
add_action( 'after_setup_theme', 'svine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function svine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'svine' ),
		'id'            => 'sidebar-default',
		'description'   => esc_html__( 'Add widgets here.', 'svine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h6">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Vehicles Archive Sidebar', 'svine' ),
		'id'            => 'sidebar-vehicles',
		'description'   => esc_html__( 'Add widgets here.', 'svine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h6">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Callout', 'svine' ),
		'id'            => 'callout',
		'description'   => esc_html__( 'Add widgets here.', 'svine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'svine' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'svine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title h6">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Social Links', 'svine' ),
		'id'            => 'social',
		'description'   => esc_html__( 'Add widgets here.', 'svine' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title h6">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'svine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function svine_scripts() {
	wp_enqueue_style( 'svine-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_style( 'svine-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i|Teko:500,700&display=swap', false );

	wp_enqueue_script( 'svine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'svine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'svine_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Remove brackets from ellipsis on excerpt
 */
function svine_excerpt_more($more) {
	global $post;
	remove_filter('excerpt_more', 'new_excerpt_more');
	return '&#8230;';
}
add_filter('excerpt_more','svine_excerpt_more');

/**
 * Customize archive page titles
 * Remove prefix from some, wrap non-prefix part of title in some others
 */
add_filter( 'get_the_archive_title', function ( $title ) {

	if ( is_category() || is_tax('vehicle_type') ) {
		$title = single_cat_title( '', false );
	} elseif( is_tax('location') ) {
		$title = sprintf( __( 'Location: <span>%s</span>' ), single_cat_title( '', false ) );
	} elseif( is_tax('model') ) {
		$title = sprintf( __( 'Model: <span>%s</span>' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: <span>%s</span>' ), single_tag_title( '', false ) );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}

	return $title;

});

/**
 * Add custom post types to category & tag archives
 * src: https://docs.pluginize.com/article/17-post-types-in-category-tag-archives
 */

function svine_cpt_tags_archive( $query ) {

	if ( is_admin() || ! $query->is_main_query() ) {
	return;
	}

	if ( is_tag() || is_category() && empty( $query->query_vars['suppress_filters'] ) ) {
	$cptui_post_types = cptui_get_post_type_slugs();

	$query->set(
		'post_type',
		array_merge(
			array( 'post' ),
			$cptui_post_types
		)
	);
	}
}
add_filter( 'pre_get_posts', 'svine_cpt_tags_archive' );
