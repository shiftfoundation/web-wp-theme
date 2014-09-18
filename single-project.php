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


			<article id="post-<?php the_ID(); ?>" class="hentry project">

				<section class="entry-content">

					<div id="overview" class="tabs-container">
						<header class="entry-header">
							<h1><?php the_title(); ?> - <?php echo get_post_meta( get_the_ID(), 'what_does_it_do', true ); ?></h1>
						</header>
						<?php the_content(); ?>
					</div>

					<div id="research" class="tabs-container">
						<header class="entry-header">
							<h1>Research</h1>
						</header>
					</div>

					<div id="comment" class="tabs-container">
						<header class="entry-header">
							<h1>Comment</h1>
						</header>
					</div>

					<?php if( get_post_meta( get_the_ID(), 'coverage', true ) ) { ?>
					<div id="coverage" class="tabs-container">
						<header class="entry-header">
							<h1>Coverage</h1>
						</header>
						<?php echo wpautop( get_post_meta( get_the_ID(), 'coverage', true ) ); ?>
					</div>
					<?php } ?>

					<?php if( get_post_meta( get_the_ID(), 'partners', true ) ) { ?>
					<div id="partners" class="tabs-container">
						<header class="entry-header">
							<h1>Partners</h1>
						</header>
						<?php echo wpautop( get_post_meta( get_the_ID(), 'partners', true ) ); ?>
					</div>
					<?php } ?>

					<?php if( get_post_meta( get_the_ID(), 'awards', true ) ) { ?>
					<div id="awards" class="tabs-container">
						<header class="entry-header">
							<h1>Awards</h1>
						</header>
						<?php echo wpautop( get_post_meta( get_the_ID(), 'awards', true ) ); ?>
					</div>
					<?php } ?>

					<?php if( get_post_meta( get_the_ID(), 'jobs', true ) ) { ?>
					<div id="jobs" class="tabs-container">
						<header class="entry-header">
							<h1>Jobs</h1>
						</header>
						<?php echo wpautop( get_post_meta( get_the_ID(), 'jobs', true ) ); ?>
					</div>
					<?php } ?>

				</section>

				<?php 
				/*
				Connected User: 
				$users = get_users( array(
				  'connected_type' => 'projects_to_users',
				  'connected_items' => $post
				 ) );

					echo $users[0]->user_nicename;
				 */
				?>

			</article>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
