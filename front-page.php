<?php
/**
 * The template for displaying frontpage by default
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapped
 */

get_header();
?>

<div id="primary" class="container content-area" >
	<main id="main" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'front' );

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
	<div id="scene" style=" margin-top:350px;">
		<div data-depth="0.2">My first Layer!</div>
		<div data-depth="0.6">My second Layer!</div>
		<div data-aos="fade-up" data-depth="0.9" style=" margin-top:50px;width:30px;height:30px;background:red;"></div>
	</div>

</div><!-- #primary -->


<?php
get_footer();
