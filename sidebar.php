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
	global $post;

	$page = get_the_ID();

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
		'depth' => 1,
		'echo' => false,
		'title_li' => ''
	); ?>

	<ul>
	<?php echo wp_list_pages( $args );

	/**
	 * If a child page, print the title as an h2
	 */
	if ( $post->post_parent > 0 ) : ?>
		<?php if ( count( get_pages( 'child_of=' . get_the_ID() ) ) > 0 ) : ?>

		<ul class="sub-menu">
		<?php echo wp_list_pages( array(
			'child_of' => get_the_ID(),
			'depth' => 1,
			'title_li' => '',
			'echo' => false
			));	?>

		<?php elseif ( ( $post->post_parent !== $parent->ID ) && ( count( get_pages( 'child_of=' . wp_get_post_parent_id( get_the_ID() ) ) ) > 0 ) ) : ?>

		<ul class="sub-menu sub-menu__links">
		<?php echo wp_list_pages( array(
			'child_of' => wp_get_post_parent_id( get_the_ID() ),
			'depth' => 1,
			'echo' => false,
			'title_li' => ''
			));
		?>
		</ul>
		<?php endif; ?>
  <?php endif; ?>

	</div>
</aside><!-- #secondary -->
