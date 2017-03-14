<?php
/**
 * @package jov
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<header class="entry-header col-md-8 col-md-offset-2 col-sm-12">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header>
	</div>

	<div class="row">
		<div class="entry-meta col-md-2 col-sm-hidden">
			<h3><strong>Posted on:</strong></h3>
			<p><?php the_date(); ?></p>

			<h3><strong>Comments:</strong></h3>
			<p><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></p>

			<?php 
			if ( function_exists( 'sharing_display' ) ) {
			    sharing_display( '', true );
			}
			 
			if ( class_exists( 'Jetpack_Likes' ) ) {
			    $custom_likes = new Jetpack_Likes;
			    echo $custom_likes->post_likes( '' );
			}
			?>

		</div>

		<div class="entry-content col-md-8 col-sm-12">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jov' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div>

		<footer class="entry-footer col-md-2 col-sm-12">
			<p><strong>Tags:</strong></p>
			<?php the_tags('',', ',''); ?>
		</footer>
	</div>

	<div class="row">
		<div class="single-footer col-md-8 col-md-offset-2 col-sm-12">
			<?php comment_form(); ?>
		</div>
	</div>

</article><!-- #post-## -->
