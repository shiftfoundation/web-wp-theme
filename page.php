<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php 
			$featuredUser = get_users( array(
				'connected_type' => 'page_to_users',
				'connected_items' => $post
			) ); ?>

			<?php
			// Display connected pages
			if ( $featuredUser ) { ?>

			<article class="hentry">
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
			</article>
			<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
