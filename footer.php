<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TEI-C
 */

?>

	</main><!-- #main -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<p>
			<?php dynamic_sidebar( 'footer' );  ?>
		</p>
	</footer>

</div><!-- #container -->

<?php wp_footer(); ?>

</body>
</html>
