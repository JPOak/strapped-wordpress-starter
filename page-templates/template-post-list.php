<?php
/**
 * Template Name: Post List
 *
 * The template for displaying the list of posts
 *
 * @package Strapped
 */

get_header();
?>

<div id="primary" class="container content-area">
  <main id="main" class="site-main">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

	  <div class="entry-content">
			<?php
				$strapped_paged	= ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			  $strapped_query_args = array(
				  'post_status' => 'publish',
				  'post_type'   => 'post',
			  );

			  $strapped_the_query = new WP_Query( $strapped_query_args );
				?>

			<?php
			if ( $strapped_the_query->have_posts() ) :
				while ( $strapped_the_query->have_posts() ) :
					$strapped_the_query->the_post(); // run the loop
					?>
			<article class="post-list-item">
			  <header>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-meta"><?php strapped_posted_on(); ?></div><!-- .entry-meta -->
			  </header>
				<div class="entry-summary">
					<p>
						<?php
						$strapped_get_content = get_the_content();
						echo wp_trim_words( $strapped_get_content, 50, '...' );
						?>
					</p>
					<a href="<?php the_permalink(); ?>" class="btn btn-primary" role="button">Read More</a>
				</div>
				<footer class="entry-footer">
					<?php strapped_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article>

				<?php endwhile; ?>
				<?php
				endif;
				wp_reset_postdata();
			?>

		</div><!-- .entry-content -->
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
