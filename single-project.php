<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="boxes">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header box w3 h1">
						<h1><?php the_title(); ?></h1>

						<div class="entry-meta">
							<?php shiftwp_posted_on(); ?>
						</div>
							
						Connected User: 
						<?php 
						$users = get_users( array(
						  'connected_type' => 'projects_to_users',
						  'connected_items' => $post
						 ) );

						echo $users[0]->user_nicename;
						?>
					</header>

					<div class="entry-description box w2 h4">
						<?php the_content(); ?>
					</div>

					<div class="entry-content box w4 h5"></div>

				</article>

			</div>


			<?php shiftwp_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
