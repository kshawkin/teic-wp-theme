<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TEI-C
 */

?>

<aside id="sidebar" class="widget-area" role="complementary">
	<div id="nav-supp">

	<?php if ( is_front_page() ) : dynamic_sidebar( 'sidebar-home' ); else : ?>
	<nav id="site-naviation" class="sidebar-navigation" role="navigation">

	<?php if ( is_tree( 21849 ) ) : wp_nav_menu( array( 'theme_location' => 'guidelines' ) ); ?>
	<?php elseif ( is_tree( 22830 ) ) : wp_nav_menu( array( 'theme_location' => 'activities' ) ); ?>
	<?php elseif ( is_tree( 21809 ) ) : wp_nav_menu( array( 'theme_location' => 'tools' ) ); ?>
	<?php elseif ( is_tree( 21831 ) ) : wp_nav_menu( array( 'theme_location' => 'support' ) ); ?>
	<?php elseif ( is_tree( 21586 ) ) : wp_nav_menu( array( 'theme_location' => 'activities' ) ); ?>
	<?php endif;?>

	</nav><!-- #site-navigation -->
	<?php endif;?>

	<?php /*
	if ( !is_search() && !is_front_page() ) :
		global $post;
		$page = get_the_ID();;

		if ( $post->post_parent > 0 ) {

			/* Get an array of Ancestors and Parents if they exist *
			$parents = get_post_ancestors( $post->ID );

			/* Get the top Level page->ID count base 1, array base 0 so -1 *
			$id = ($parents) ? $parents[count($parents)-1]: $post->ID;

			/* Get the parent and set the $class with the page slug (post_name) *
			$parent = get_post( $id );
			$page = $parent->ID;
		}

		/**
		 * Return a list of sub-pages
		 *
		$args = array(
			'child_of' => $page,
			'depth' => 2,
			'echo' => false,
			'title_li' => ''
		); ?>

		<ul><?php echo wp_list_pages( $args ); ?></ul>
		<?php endif; */?>

	</div>
</aside><!-- #secondary -->
