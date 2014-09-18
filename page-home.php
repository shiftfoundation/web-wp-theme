<?php
/**
 * Template Name: Home
 *
 * @package Shiftwp
 */

get_header(); ?>

    <div id="primary" class="content-area">
	    <main id="main" class="site-main" role="main">

		  <?php while ( have_posts() ) : the_post(); ?>
			<article class="hentry">
				<?php the_content(); ?>
			</article>
		  <?php endwhile; // end of the loop. ?>

	    </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
