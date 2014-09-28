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
					<?php the_post_thumbnail('thumbnail'); ?>
					<p class="name">
						<strong>About</strong>
						Read about our approach
					</p>
					<span class="info">
						<a href="/about" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php the_post_thumbnail('thumbnail'); ?>
					<p class="name">
						<strong>Products</strong>
						Some of our recent work
					</p>
					<span class="info">
						<a href="/products" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php the_post_thumbnail('thumbnail'); ?>
					<p class="name">
						<strong>People</strong>
						Meet our team
					</p>
					<div class="info">
						<a href="/people" class="button">See more</a>
					</div>
				</li>
				<li>
					<?php the_post_thumbnail('thumbnail'); ?>
					<p class="name">
						<strong>Comment</strong>
						Latest views from our team
					</p>
					<span class="info">
						<a href="/comment" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php the_post_thumbnail('thumbnail'); ?>
					<p class="name">
						<strong>Speaking</strong>
						View our speakers
					</p>
					<span class="info">
						<a href="/speaking" class="button">See more</a>
					</span>
				</li>
				<li>
					<?php the_post_thumbnail('thumbnail'); ?>
					<p class="name">
						<strong>Space</strong>
						See our rentable space 71b
					</p>
					<span class="info">
						<a href="/space" class="button">See more</a>
					</span>
				</li>
			</ul>

			<div class="getincontact">
				<div class="copy">
					Want to find out more?
				</div>
				<div class="person">
					<a href="/sign-up-to-newsletter">Sign up to the newsletter for updates</a>
				</div>
			</div>

	    </main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
