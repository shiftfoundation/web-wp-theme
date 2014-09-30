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
			<article class="hentry page desc">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		  <?php endwhile; // end of the loop. ?>

			<ul class="listing">
				<li>
					<?php echo wp_get_attachment_image( 479, 'thumbnail'); ?>
					<p class="name">
						<strong>About</strong>
						Read about our approach
					</p>
					<span class="info">
						<a href="/about" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php echo wp_get_attachment_image( 8154, 'thumbnail'); ?>
					<p class="name">
						<strong>Products</strong>
						Some of our recent work
					</p>
					<span class="info">
						<a href="/products" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php echo wp_get_attachment_image( 8197, 'thumbnail'); ?>
					<p class="name">
						<strong>People</strong>
						Meet our team
					</p>
					<div class="info">
						<a href="/people" class="button">See more</a>
					</div>
				</li>
				<li>
					<?php echo wp_get_attachment_image( 8451, 'thumbnail'); ?>
					<p class="name">
						<strong>Comment</strong>
						Latest views from our team
					</p>
					<span class="info">
						<a href="/comment" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php echo wp_get_attachment_image( 8202, 'thumbnail'); ?>
					<p class="name">
						<strong>Speaking</strong>
						View our speakers
					</p>
					<span class="info">
						<a href="/speaking" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php echo wp_get_attachment_image( 8450, 'thumbnail'); ?>
					<p class="name">
						<strong>Space</strong>
						See our rentable space 71b
					</p>
					<span class="info">
						<a href="/space" class="button">See more</a>
					</span>
				</li>
			</ul>

			<article class="hentry">
				<h1>@Shift</h1>
				<div id="twitter"></div>

				<a class="getincontact" href="/sign-up-to-newsletter">
					<div class="copy">
						<span class="c1">Do you want to get involved?</span>
						<span class="c2">We'd love to hear from you</span>
					</div>
					<div class="person">
						<?php $avatar = get_user_meta($featuredUser[0]->ID, 'avatar', true); ?>
						<div class="avatar">
							<?php echo wp_get_attachment_image( $avatar, 'thumbnail' ); ?>
						</div>
						<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x"></i></span>
						Sign up to our newsletter
					</div>
				</a>
			</article>

	    </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
