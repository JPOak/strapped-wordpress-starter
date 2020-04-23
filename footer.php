<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

?>

</div><!-- #content -->

	<footer class="site-footer">
		<div class="site-footer__inner">
			<?php get_template_part( 'components/footer/copyright' ) ?>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
