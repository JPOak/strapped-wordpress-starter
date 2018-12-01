<?php
/**
 * Template Name: Sidebar Right
 *
 * The template for displaying a page with a right sidebar.
 *
 * @package Strapped
 */

get_header();
?>

<div id="primary" class="container content-area">
  <div class="row">
		<main id="main" class="site-main sidebar">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>

  </div>
</div><!-- #primary -->

<?php
get_footer();
