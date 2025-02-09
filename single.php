<?php
/**
 * The template for displaying all single posts.
 *
 * @package jov
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'single' ); ?>

					<?php endwhile; // end of the loop. ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
