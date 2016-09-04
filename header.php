<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TEI-C
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'teic' ); ?></a>

	<header id="banner" class="site-header" role="banner">

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo get_template_directory_uri() . '/css/banner.jpg' ?>" alt="Text Encoding Initiative logo and banner">
		</a>

		<nav id="site-naviation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id' => 'udm',
				'menu_class' => 'udm',
				'container' => 'ul'
			) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<?php
	if ( function_exists('yoast_breadcrumb') ) {
			 yoast_breadcrumb('<div id="breadcrumb">','</div>');
	}
	?>

	<main id="main" class="site-main" role="main">
