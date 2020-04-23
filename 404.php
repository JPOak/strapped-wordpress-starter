<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package foundry
 */

get_header(); ?>


<main class="main main-error" role="main">

	<section class="section" id="section-error-page">

		<h1 class="page-title error-title"><?php esc_html_e( 'Content Cannot Be Found', 'foundry' ); ?></h1>

		<div class="page-body error-body">

			<p><?php esc_html_e( 'Unfortunately the content you were looking for could not be found. Please check that the URL is correct or do a search using the form below.', 'foundry' ); ?></p>

			<?php get_search_form(); ?>

		</div>

	</section>

</main>

<?php get_footer(); ?>