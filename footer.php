<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package jov
 */
?>
	</div><!-- #content -->

    <footer id="colophon" class="site-footer container-fluid" role="contentinfo" style="background:#eee;">
		<div class="site-info row" style="padding:20px 0;">
            <div class="col-md-12">
                <h3 class="text-center"><?php echo the_field('title', 'option'); ?></h3>
                <p class="text-center"><?php echo the_field('address', 'option'); ?></p> 
                <p class="text-center">Telephone: <?php echo the_field('phone', 'option'); ?> Email: <?php echo the_field('email', 'option'); ?></p>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>


</style>
</body>
</html>
