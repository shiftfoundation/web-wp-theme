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


			<article id="post-<?php the_ID(); ?>" class="hentry product">

				<section class="entry-content">

					<div id="overview" class="tabs-container active">
						<header class="entry-header">
							<h1><?php echo get_post_meta( get_the_ID(), 'tagline', true ); ?></h1>
						</header>
						<?php the_content(); ?>
					</div>

					<div id="research" class="tabs-container">
						<header class="entry-header">
							<h1>Research</h1>
						</header>

						<?php

						// Display connected pages
						if ( $research_to_product->have_posts() ) : ?>
						<?php while ( $research_to_product->have_posts() ) : $research_to_product->the_post(); ?>

							<div class="cleaning"></div>
							<a target="_blank" class="research-image" href="<?php echo get_post_meta( get_the_ID(), 'file_url', true ); ?>"><?php the_post_thumbnail(array('class' => 'research')); ?></a>
							<div class="col c6">
								<h3><a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'file_url', true ); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_date(); ?></p>
								<?php the_content(); ?>
							</div>

						<?php endwhile;	
						// Prevent weirdness
						wp_reset_postdata();
						endif;
						?>

					</div>

					<div id="comment" class="tabs-container">
						<header class="entry-header">
							<h1>Comment</h1>
						</header>

						<?php
						// Display connected pages
						if ( $post_to_product->have_posts() ) : ?>
						<?php while ( $post_to_product->have_posts() ) : $post_to_product->the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; 	
						// Prevent weirdness
						wp_reset_postdata();
						endif;
						?>

						<h1>@Shift</h1>
						<div id="twitter"></div>
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
				$featuredUser = get_users( array(
					'connected_type' => 'product_to_users_featured',
					'connected_items' => $post
				) ); ?>

				<?php
				// Display connected pages
				if ( $featuredUser ) { ?>

				<a class="getincontact" target="_blank" href="mailto:<?php echo get_user_meta($featuredUser[0]->ID, 'e-mail', true); ?>">
					<div class="copy">
						<span class="c1">Do you want to get involved?</span>
						<span class="c2">We'd love to hear from you</span>
					</div>
					<div class="person">
						<?php $avatar = get_user_meta($featuredUser[0]->ID, 'avatar', true); ?>
						<div class="avatar">
							<?php echo wp_get_attachment_image( $avatar, 'thumbnail' ); ?>
						</div>
						Email me - <?php echo get_user_meta($featuredUser[0]->ID, 'e-mail', true); ?>
					</div>
				</a>
				<?php } ?>

<?php /*
				$featuredUser = get_users( array(
					'connected_type' => 'product_to_users_featured',
					'connected_items' => $post
				) ); ?>

<?php
				print_r($featuredUser);
				// Display connected pages
				if ( $featuredUser ) { ?>

				<div class="getincontact">
					<div class="copy">
						We'd love to hear from you
					</div>
					<div class="person">
						<?php $avatar = get_user_meta($featuredUser[0]->ID, 'avatar', true); ?>
						<div class="avatar">
							<?php echo wp_get_attachment_image( $avatar, 'thumbnail' ); ?>
						</div>
						Email me - <a href="mailto:<?php echo get_user_meta($featuredUser[0]->ID, 'e-mail', true); ?>"><?php echo get_user_meta($featuredUser[0]->ID, 'e-mail', true); ?></a>
					</div>
				</div>
				<?php } */ ?>


			</article>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
