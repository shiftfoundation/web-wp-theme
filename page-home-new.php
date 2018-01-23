<?php
/**
 * Template Name: Homepage
 *
 * @package Shiftwp
 */

$featured_products_title				= get_field('featured_products_title');
$featured_products_description			= get_field('featured_products_description');
$featured_products_button_text			= get_field('featured_products_button_text');
$featured_products						= get_field('featured_products');

$our_approach_title						= get_field('our_approach_title');
$our_approach_description				= get_field('our_approach_description');
$our_approach_button_text				= get_field('our_approach_button_text');
$our_approach_button_link				= get_field('our_approach_button_link');

$our_team_title							= get_field('our_team_title');
$our_team_description					= get_field('our_team_description');
$our_team_button_text					= get_field('our_team_button_text');
$our_team_button_link					= get_field('our_team_button_link');
$our_team_background_image				= get_field('our_team_background_image');

$working_with_us_title					= get_field('working_with_us_title');
$working_with_us_description			= get_field('working_with_us_description');
$working_with_us_button_text			= get_field('working_with_us_button_text');
$working_with_us_button_link			= get_field('working_with_us_button_link');
$working_with_us_logos					= get_field('our_team_background_image');
$working_with_us_testimonials			= get_field('working_with_us_testimonials');

$our_awards_title						= get_field('our_awards_title');
$our_awards_logos						= get_field('our_awards_logos');

$open_resources_title					= get_field('open_resources_title');
$open_resources_description				= get_field('open_resources_description');
$open_resources_button_text				= get_field('open_resources_button_text');
$open_resources_button_link				= get_field('open_resources_button_link');

$rentable_space_title					= get_field('rentable_space_title');
$rentable_space_description				= get_field('rentable_space_description');
$rentable_space_button_text				= get_field('rentable_space_button_text');
$rentable_space_button_link				= get_field('rentable_space_button_link');
$rentable_space_background_image		= get_field('rentable_space_background_image');

get_header(); ?>

    <div id="primary" class="content-area">
	    <main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="wrapper">
				<article class="desc">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
			<?php endwhile; // end of the loop. ?>
			
			<?php if( $featured_products ): ?>
			<section class="section lightgray">
				<div class="wrapper">
					<h2><?=$featured_products_title?></h2>	

					<ul class="listing">
					<?php foreach( $featured_products as $product ): ?>
						<li>
							<a href="<?php echo get_permalink($product->ID) ?>">
								<?php echo wp_get_attachment_image( get_post_thumbnail_id($product->ID), 'thumbnail'); ?>
								<div class="name">
									<strong><?php echo $product->post_title; ?></strong>
									<?php echo get_post_meta($product->ID, 'what_does_it_do', true); ?>
								</div>
								<div class="info">
									<p><?php echo $product->post_excerpt; ?></p>
									<span class="button">See more</span>
								</div>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>


					<p><?=$featured_products_description?></p>	
					<p><a class="button" href="/portfolio"><?=$featured_products_button_text?></a></p>	
				</div>
			</section>
			<?php endif; ?>

			<?php if( $our_approach_title ): ?>
			<section class="section yellow">
				<div class="wrapper">
					<h2><?=$our_approach_title?></h2>	
					<p><?=$our_approach_description?></p>	
					<p><a class="button" target="_blank" href="http://progressively.org.uk"><?=$our_approach_button_text?></a></p>
				</div>
			</section>
			<?php endif; ?>

			<?php if( $our_team_title ): ?>
			<section class="section box" style="background-image: url('<?php echo $our_team_background_image['url']; ?>');">
				<div class="wrapper">
					<div class="box">
						<h2><?=$our_team_title?></h2>	
						<p><?=$our_team_description?></p>
						<p><a class="button" href="<?=$our_team_button_link?>"><?=$our_team_button_text?></a></p>
					</div>
				</div>
			</section>
			<?php endif; ?>

			<?php if( $working_with_us_title ): ?>
			<section class="section working_with_us">
				<div class="wrapper">
					<h2><?=$working_with_us_title?></h2>	
					<p><?=$working_with_us_description?></p>	
					<p><a class="button" href="<?=$working_with_us_button_link?>"><?=$working_with_us_button_text?></a></p>

					<?php if( have_rows('working_with_us_logos') ): ?>
						<ul class="logos">
						<?php while( have_rows('working_with_us_logos') ): the_row(); $image = get_sub_field('image'); $url = get_sub_field('url'); ?>
							<li>
								<a href="<?php echo $url; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></a>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>

					<?php if( have_rows('working_with_us_testimonials') ): ?>
						<ul class="testimonials">
						<?php while( have_rows('working_with_us_testimonials') ): the_row();
								$comment = get_sub_field('comment'); 
								$author = get_sub_field('author'); 
								$company = get_sub_field('company'); 
								?>
							<li>
								<span class="comment"><?php echo $comment; ?></span>
								<span class="author"><?php echo $author; ?></span>
								<span class="company"><?php echo $company; ?></span>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</section>
			<?php endif; ?>

			<?php if( $our_awards_title ): ?>
			<section class="section lightgray">
				<div class="wrapper">
					<h2><?=$our_awards_title?></h2>	

					<?php if( have_rows('our_awards_logos') ): ?>
						<ul class="logos awards">
						<?php while( have_rows('our_awards_logos') ): the_row(); $image = get_sub_field('image'); $url = get_sub_field('url'); ?>
							<li>
								<a href="<?php echo $url; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></a>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>

				</div>
			</section>
			<?php endif; ?>

			<?php if( $open_resources_title ): ?>
			<section class="section yellow">
				<div class="wrapper">
					<h2><?=$open_resources_title?></h2>	
					<p><?=$open_resources_description?></p>	
					<p><a class="button" href="<?=$open_resources_button_link?>"><?=$open_resources_button_text?></a></p>
				</div>
			</section>
			<?php endif; ?>

			<?php if( $rentable_space_title ): ?>
			<section class="section box" style="background-image: url('<?php echo $rentable_space_background_image['url']; ?>');">
				<div class="wrapper">
					<div class="box">
						<h2><?=$rentable_space_title?></h2>
						<p><?=$rentable_space_description?></p>
						<p><a class="button" href="<?=$rentable_space_button_link?>"><?=$rentable_space_button_text?></a></p>
					</div>
				</div>
			</section>
			<?php endif; ?>

			<div class="wrapper">
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
			</div>

	    </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
