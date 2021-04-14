<?php

/**
 *Dds_Start_Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dds_Start_Template
 */

/*
 * Actions
 */
add_action( 'wp_head', 'dds_structure_data', 10 );
add_action( 'after_setup_theme', 'dds_start_template_setup' );
add_action( 'after_setup_theme', 'dds_start_template_content_width', 0 );
add_action( 'wp_enqueue_scripts', 'dds_start_template_scripts' );
add_action( 'widgets_init', 'dds_start_template_widgets_init' );

function dds_structure_data() {
	$structure_data_post    = array(
		"@context"    => "https://schema.org",
		"@type"       => "Article",
		"headline"    => the_title(),
		"image"       => the_post_thumbnail_url(),
		"author"      => the_author(),
		"url"         => the_permalink(),
		"dateCreated" => get_the_date(),
		"description" => the_excerpt(),
	);
	$structure_data_product = array(
		"@context"        => "https://schema.org/",
		"@type"           => "Product",
		"name"            => the_title(),
		"image"           => the_post_thumbnail_url(),
		"description"     => the_excerpt(),
		"mpn"             => "925872",
		"brand"           => array(
			"@type" => "Thing",
			"name"  => "Unilyuba"
		),
		"aggregateRating" => array(
			"@type"       => "AggregateRating",
			"ratingValue" => get_comment_meta( $comment->comment_ID, 'rating', true ),
			"reviewCount" => "89"
		),
		"offers"          => array(
			"@type"           => "Offer",
			"priceCurrency"   => "USD",
			"price"           => "119.99",
			"priceValidUntil" => "2020-11-05",
			"itemCondition"   => "http://schema.org/UsedCondition",
			"availability"    => "http://schema.org/InStock",
			"seller"          => array(
				"@type" => "Organization",
				"name"  => "Executive Objects"
			)
		)
	);
	/*
	 * Список тегов страниц wordpress
	 * https://wp-kama.ru/function-tag/uslovnyie-tegi
	 *
	 * 	is_archive()
	 *  is_category()
	 *  is_front_page()
	 *  is_page()
	 *  is_post_type_archive()
	 *  is_singular()
	 *
	 * Список условных тегов Woocommerce
	 *
	 *  is_cart()
	 *  is_checkout()
	 *  is_checkout_pay_page()
	 *  is_product()
	 *  is_product_tag()
	 *  is_shop()
	 *  is_woocommerce()
	 *  wc_coupons_enabled()
	 */
	if ( is_singular( 'post' ) ) {
//		$result = array_merge( $structure_data_post, $structure_data_product );
		echo '<script type="application/ld+json">';
//		$result array_filter( array $result [, callable $callback [, int $flag = 0 ]] )
		echo json_encode( array_filter( $structure_data_post ), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
		echo '</script>';
	} elseif ( is_product() ) {
//		$result = array_merge( $structure_data_post, $structure_data_product );
		echo '<script type="application/ld+json">';
//		$result array_filter( array $result [, callable $callback [, int $flag = 0 ]] )
		echo json_encode( array_filter( $structure_data_product ), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
		echo '</script>';
	}

}

if ( ! defined( 'DDS_START_TEMPLATE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'DDS_START_TEMPLATE_VERSION', '1.0.1' );
}

if ( ! function_exists( 'dds_start_template_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dds_start_template_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based onDds_Start_Template, use a find and replace
		 * to change 'dds-start-template' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dds-start-template', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'header_menu' => esc_html__( 'header_menu', 'dds-start-template' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dds_start_template_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dds_start_template_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dds_start_template_content_width', 640 );
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dds_start_template_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dds-start-template' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dds-start-template' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}


/**
 * Enqueue scripts and styles.
 */
function dds_start_template_scripts() {

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'dds-start-template-style', get_stylesheet_uri(), array( 'bootsrtap' ), DDS_START_TEMPLATE_VERSION );

	wp_style_add_data( 'dds-start-template-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootsrtap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.css', array(), '5.0.0-beta1' );

	wp_enqueue_script( 'dds-start-template-navigation', get_template_directory_uri() . '/js/navigation.js', array(), DDS_START_TEMPLATE_VERSION, true );

	wp_enqueue_script( 'dds-start-template-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), DDS_START_TEMPLATE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


require get_template_directory() . '/inc/class-term-meta-img.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


//todo серьезно пересмотреть следующее
/**
 * Display native post thumbnail or a fallback image.
 *
 * @param string $size
 * @param string $attr
 */
function the_post_thumbnail_fallback( $size = 'post-thumbnail', $attr = '' ) {
	if ( has_post_thumbnail() ) :
		echo get_the_post_thumbnail( null, $size, $attr );

	else :
		$post_thumbnail_id = get_option( 'default_post_thumbnail' );

		$html = wp_get_attachment_image( $post_thumbnail_id, $size, false, $attr );

		/**
		 * Filters the post thumbnail HTML.
		 *
		 * @param string $html The post thumbnail HTML.
		 * @param int $post_id The post ID.
		 * @param string $post_thumbnail_id The post thumbnail ID.
		 * @param string|array $size The post thumbnail size. Image size or array of width and height values (in that order). Default 'post-thumbnail'.
		 * @param string $attr Query string of attributes.
		 *
		 * @since 2.9.0
		 */
		echo apply_filters( 'post_thumbnail_html', $html, null, $post_thumbnail_id, $size, $attr );

	endif;
}
