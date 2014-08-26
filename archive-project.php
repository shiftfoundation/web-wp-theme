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

					<div class="box w4 h1">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>

				<?php endwhile; // end of the loop. ?>
			</div>

		</main>
	</div>

<?php get_footer(); ?>
