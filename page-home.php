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

			<?php if( have_rows('tout') ): ?>

				<ul class="listing">

				<?php while( have_rows('tout') ): the_row(); 

					// vars
					$title = get_sub_field('title');
					$subtitle = get_sub_field('subtitle');
					$desc = get_sub_field('description');
					$link = get_sub_field('link');
					$image = get_sub_field('image');

					?>

					<?php if( $link ) { ?>
					<li>
						<a href="<?php echo $link; ?>">
							<?php echo wp_get_attachment_image( $image, 'thumbnail'); ?>
							<p class="name">
								<strong><?php echo $title; ?></strong>
								<?php echo $subtitle; ?>
							</p>
							<span class="info">
								<p><?php echo $desc; ?></p>
								<span class="button">See more</span>
							</span>
						</a>
					</li>
					<?php } ?>

				<?php endwhile; ?>
				</ul>
			<?php endif; ?>


			<article class="hentry">
				<h1><a href="https://twitter.com/shift_org">@Shift_org</a></h1>
				<div id="twitter"></div>

				<a class="getincontact" href="/sign-up-to-newsletter">
					<div class="copy">
						<span class="c1">Do you want to get involved?</span>
						<span class="c2">We'd love to hear from you</span>
					</div>
					<div class="person">
						<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x"></i></span>
						Sign up to our newsletter
					</div>
				</a>
			</article>

	    </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
