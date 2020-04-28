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
		<div class="site-footer__inner row content-block ">
			<div class="col-md-4 site-footer__item site-footer__left ">

			<?php 	if ( is_active_sidebar( 'footer-left' ) ) : ?>
			
				<div id="footer-widget-area" class="widget-area">
				<?php dynamic_sidebar( 'footer-left' ); ?>
				</div>
		
			<?php endif; ?>
			
			</div>

			<div class="col-md-4 site-footer__item site-footer__center ">

				<?php get_template_part( 'components/navigation/footer-nav' ) ?>
		
			<?php 	if ( is_active_sidebar( 'footer-center' ) ) : ?>
				
				<div id="footer-widget-area" class="widget-area">
				<?php dynamic_sidebar( 'footer-center' ); ?>
				</div>
			
			<?php endif; ?>

				<?php get_template_part( 'components/footer/copyright' ) ?>

			</div>
			
			<div class="col-md-4 site-footer__item site-footer__right">
				<?php 	if ( is_active_sidebar( 'footer-right' ) ) : ?>
					
					<div id="footer-widget-area" class="widget-area">
					<?php dynamic_sidebar( 'footer-right' ); ?>
					</div>
				
				<?php endif; ?>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
