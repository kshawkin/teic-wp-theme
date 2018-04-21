<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TEI-C
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title maintitle">TEI: ', '</h1>' ); ?>
		<hr>
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'teic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

		<footer class="entry-footer">
			<hr>
			<div><small>Copyright TEI Consortium. Except where otherwise noted, content on this site is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported license</a> and a <a href="http://www.opensource.org/licenses/BSD-2-Clause">BSD 2-Clause license</a>.</small></div>
			<div><small>Last recorded change to this page:
			<?php the_modified_date( 'Y-m-d' ); ?></small></div>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'teic' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
