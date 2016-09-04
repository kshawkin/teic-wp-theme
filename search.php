<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEI-C
 */

get_header(); get_sidebar(); ?>

	<div id="separator">&nbsp;</div>

	<section id="content" class="content-area">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title maintitle"><?php printf( esc_html__( 'Search Results for: %s', 'teic' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<hr>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
