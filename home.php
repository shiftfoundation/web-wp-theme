<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="boxes">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
