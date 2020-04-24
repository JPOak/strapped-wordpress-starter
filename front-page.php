<?php
/**
 * The template for displaying frontpage by default
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

get_header();
?>

<section class="site-hero">
	
	<?php get_template_part( 'components/page/hero' ); ?>

</section>

<main class="main homepage" role="main">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); // @codingStandardsIgnoreLine ?>

			<?php get_template_part( 'template-parts/content', 'front' ) ?>

		<?php endwhile; ?>

	<?php else :?>

		<?php get_template_part( 'template-parts/content', 'none' );?>

	<?php endif; ?>

</main>

<?php get_footer(); ?>
