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

	<form role="search" method="get" class="search-form" action="http://localhost/teic/">
		<label>
			<span class="screen-reader-text">Search for:</span>
			<input type="search" class="search-field" placeholder="Search …" value="" name="s">
		</label>
		<input type="submit" class="search-submit" value="Search">
	</form>

	<!--<form action="http://www.google.com/search" method="get">
		<input style="color:#225588;" value="" maxlength="255" size="20" name="q" type="text">&nbsp;
		<select name="sitesearch">
		<option value="http://www.tei-c.org/" selected="selected">Entire site</option>
		<option value="http://www.tei-c.org/release/doc/tei-p5-doc/en/html/">P5 Guidelines</option></select>&nbsp;<input style="font-size:100%; font-weight:bold;  color:#FFFFFF; background-color:#225588; height: 2em;" value="Search" type="submit">
	</form>-->

	<?php get_search_form(); ?>

	<main id="main" class="site-main" role="main">
