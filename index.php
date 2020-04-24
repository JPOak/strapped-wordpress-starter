<?php
/**
 * The index file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

get_header();
?>


<main role="main" class=" main index-main">

<?php
if ( have_posts() ) :?>

	<header>
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	</header>

<?php
	/* Start the Loop */
	while ( have_posts() ) :

		the_post();
		get_template_part( 'template-parts/content', get_post_type() );

	endwhile;

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #main -->


<?php
get_footer();
