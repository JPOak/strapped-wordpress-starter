<?php
/**
 * Page Hero
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/


if ( has_post_thumbnail() ) : ?>
	<section class="section hero">
		<img class="img-fluid hero-image">
			<?php the_post_thumbnail (); ?>
		</img>
		<div class="hero-content">
		
		</div>
	</section>
<?php endif; ?>