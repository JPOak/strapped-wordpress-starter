<?php
/**
 * Template Name: Bootstrap Tests
 * description: Template part for displaying Bootstrap tests.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapped
 */

get_header();
?>

<div id="primary" class="container content-area">
	<main id="main" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'bootstrap' );

	endwhile; // End of the loop.
	?>

<!-- Add Bootstrap Tests -->
<div class="container">
	<h1 class="text-center">Some Quick Tests</h1>
	<div class="bd-example-row">
			<hr>
			<h2 class="text-center">Grid</h2>
			<div class="row">
					<div class="col-sm">
							One of three columns
					</div>
					<div class="col-sm">
							One of three columns
					</div>
					<div class="col-sm">
							One of three columns
					</div>
			</div>
			<hr>
			<div class="row">
					<div class="col">
							1 of 2
					</div>
					<div class="col">
							2 of 2
					</div>
			</div>
			<div class="row">
					<div class="col">
							1 of 3
					</div>
					<div class="col">
							2 of 3
					</div>
					<div class="col">
							3 of 3
					</div>
			</div>
	</div>
	<hr>
	<h2 class="text-center">Alerts</h2>
	<div class="alert alert-primary" role="alert">
			This is a primary alert—check it out!
	</div>
	<div class="alert alert-secondary" role="alert">
			This is a secondary alert—check it out!
	</div>
	<div class="alert alert-success" role="alert">
			This is a success alert—check it out!
	</div>
	<div class="alert alert-danger" role="alert">
			This is a danger alert—check it out!
	</div>
	<hr>
	<h2 class="text-center">Buttons</h2>
	<button type="button" class="btn btn-primary">Primary</button>
	<button type="button" class="btn btn-secondary">Secondary</button>
	<button type="button" class="btn btn-success">Success</button>
	<button type="button" class="btn btn-danger">Danger</button>
	<button type="button" class="btn btn-warning">Warning</button>
	<button type="button" class="btn btn-info">Info</button>
	<button type="button" class="btn btn-light">Light</button>
	<button type="button" class="btn btn-dark">Dark</button>
	<hr>
	<h2 class="text-center">Collapse</h2>
	<p>
			<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
	</p>
	<div class="row">
			<div class="col">
					<div class="collapse multi-collapse" id="multiCollapseExample1">
							<div class="card card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
							</div>
					</div>
			</div>
			<div class="col">
					<div class="collapse multi-collapse" id="multiCollapseExample2">
							<div class="card card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
							</div>
					</div>
			</div>
	</div>

	<hr>

	<h2 class="text-center">Dropdown</h2>
	<!-- Large button groups (default and split) -->
	<div class="btn-group">
		<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			Large button
		</button>
		<ul class="dropdown-menu">
			<li>Item 1</li>
			<li>Item 2</li>
		</ul>
	</div>
	<div class="btn-group">
		<button class="btn btn-secondary btn-lg" type="button">
			Large split button
		</button>
		<button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
			<span class="visually-hidden">Toggle Dropdown</span>
		</button>
		<ul class="dropdown-menu">
			<li>Item 1</li>
			<li>Item 2</li>
		</ul>
	</div>

	<hr>

	<h2 class="text-center">Modal</h2>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Launch demo modal
	</button>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<h2 class="text-center">Pagination</h2>
	<nav aria-label="Page navigation example">
			<ul class="pagination">
					<li class="page-item"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
	</nav>
	<hr>
		</div> <!-- end tests -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
