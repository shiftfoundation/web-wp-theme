<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article class="page">
				<header class="page-title">
					<h1>Projects</h1>
				</header>

				<ul class="listing projects">
				<?php while ( have_posts() ) : the_post(); ?>
					<li id="project-<?php echo $user->id; ?>">	
						<a href="<?php the_permalink(); ?>">

							<?php the_post_thumbnail(); ?>

							<span class="info">
								<p class="name">
									<strong><?php the_title(); ?></strong>
								</p>

							</span>

						</a>
					</li>
				<?php endwhile; // end of the loop. ?>
				</ul>
			</article>

		</main>
	</div>

<?php get_footer(); ?>
