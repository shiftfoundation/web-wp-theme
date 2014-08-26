<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shiftwp
 */

get_header(); ?>

    <header class="page-title">
      <h1>Blog</h1>
    </header>

    <div id="primary" class="content-area">
	    <main id="main" class="site-main" role="main">

		  <?php while ( have_posts() ) : the_post(); ?>
			  <?php get_template_part( 'content' ); ?>
		  <?php endwhile; // end of the loop. ?>

	    </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
