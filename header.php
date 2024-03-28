<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dds_Start_Template
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site container-fluid">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'dds-start-template' ); ?>
	</a>
	<header id="masthead" class="site-header w-100">
		<nav id="site-navigation" class="main-navigation">
			<a href="/" class="navbar-brand">
				<?php
				if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
					$logo_img = wp_get_attachment_image(
						$custom_logo_id,
						'full',
						false,
						array(
							'class'    => 'custom-logo',
							'itemprop' => 'logo',
						) 
					);
				}
				echo $logo_img;
				?>
			</a>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'header_menu',
					'menu_id'         => 'primary-menu-wrapper',
					'menu'            => 'header_menu',
					'container'       => 'div',
					'container_class' => 'menu',
					'container_id'    => '',
					'menu_class'      => 'menu-wrapper',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
				
				)
			);
			?>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span id="burger" class="dashicons dashicons-menu-alt3" style="z-index: 999999999"></span>
			</button>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="img-fluid">
		<?php 
		the_header_image_tag();
		?>
	</div>

