<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TEI-C
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="sidebar" class="widget-area" role="complementary">
	<div id="nav-supp">

	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

	<?php
	if ( !is_search() && !is_page( 'home' ) ) :
		global $post;
		$page = get_the_ID();;

		if ( $post->post_parent > 0 ) {

			/* Get an array of Ancestors and Parents if they exist */
			$parents = get_post_ancestors( $post->ID );

			/* Get the top Level page->ID count base 1, array base 0 so -1 */
			$id = ($parents) ? $parents[count($parents)-1]: $post->ID;

			/* Get the parent and set the $class with the page slug (post_name) */
			$parent = get_post( $id );
			$page = $parent->ID;
		}

		/**
		 * Return a list of sub-pages
		 */
		$args = array(
			'child_of' => $page,
			'depth' => 2,
			'echo' => false,
			'title_li' => ''
		); ?>

		<ul><?php echo wp_list_pages( $args ); ?></ul>
		<?php endif; ?>

	</div>
</aside><!-- #secondary -->
