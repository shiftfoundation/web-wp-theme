<?php
/**
 * Author profile
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?
			global $wp_query;
			$curauth = $wp_query->get_queried_object();

			?>
			<article class="hentry author">
				<section class="entry-content">

					<div id="profile" class="tabs-container">
						<header>
							<h1>Profile</h1>
						</header>
					  <?php echo wpautop($curauth->description, false); ?>

					  <?php if(get_user_meta($curauth->ID, 'e-mail', true)) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span> <?php echo esc_html( get_user_meta($curauth->ID, 'e-mail', true) ); ?></p><?php } ?>
					  <?php if(get_user_meta($curauth->ID, 'phone', true)) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span> <?php echo esc_html( get_user_meta($curauth->ID, 'phone', true) ); ?></p><?php } ?>
					</div>

					<div id="comment" class="tabs-container">
						<header class="entry-header">
							<h1>Comment</h1>
						</header>

						<?php
						// Display connected pages
						foreach ( $current_user_posts as $post ) : setup_postdata( $post ); ?>

							<?php get_template_part( 'content', get_post_format() ); ?>

						<?php
						endforeach; 
						wp_reset_postdata();?>

						<h1>@Shift</h1>
						<div id="twitter"></div>
					</div>

					<div id="research" class="tabs-container">
						<header class="entry-header">
							<h1>Research</h1>
						</header>

						<?php
						// Display connected pages
						if ( $connected_research->have_posts() ) :
						?>
						<?php while ( $connected_research->have_posts() ) : $connected_research->the_post(); ?>

							<div class="cleaning"></div>
							<a target="_blank" class="research-image" href="<?php echo get_post_meta( get_the_ID(), 'file_url', true ); ?>"><?php the_post_thumbnail(array('class' => 'research')); ?></a>
							<div class="col c5">
								<h3><a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'file_url', true ); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_date(); ?></p>
								<?php the_content(); ?>
							</div>

						<?php endwhile; ?>
						<?php 
						// Prevent weirdness
						wp_reset_postdata();

						endif;
						?>

					</div>

					<div id="products" class="tabs-container">
						<header class="entry-header">
							<h1>Products</h1>
						</header>

						<?php
						// Display connected pages
						if ( $connected_product->have_posts() ) : ?>
						<ul class="listing products">
						<?php while ( $connected_product->have_posts() ) : $connected_product->the_post(); ?>

							<li id="project-<?php echo $user->id; ?>">	
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('thumbnail'); ?>
									<p class="name">
										<strong><?php the_title(); ?></strong>
										<?php echo get_post_meta( get_the_ID(), 'what_does_it_do', true ); ?>
									</p>
								</a>
							</li>

						<?php endwhile; ?>
						</ul>
						<?php 
						// Prevent weirdness
						wp_reset_postdata();

						endif;
						?>

					</div>

					<?php if(get_user_meta($curauth->ID, 'coverage', true)) { ?>
					<div id="coverage">
						<header class="entry-header">
							<h1>Coverage</h1>
						</header>
						<?php echo wpautop(get_user_meta($curauth->ID, 'coverage', true)); ?>
					</div>
					<?php } ?>

				</section>
				<?php /*
				<ul>
					<li><?php echo $curauth->aim; ?></li>
					<li><?php echo $curauth->display_name; ?></li>
					<li><?php echo $curauth->first_name; ?></li>
					<li><?php echo $curauth->ID; ?></li>
					<li><?php echo $curauth->jabber; ?></li>
					<li><?php echo $curauth->last_name; ?></li>
					<li><?php echo $curauth->nickname; ?></li>
					<li><?php echo $curauth->user_email; ?></li>
					<li><?php echo $curauth->user_login; ?></li>
					<li><?php echo $curauth->user_nicename; ?></li>
					<li><?php echo $curauth->user_registered; ?></li>
					<li><?php echo $curauth->user_url; ?></li>
					<li><?php echo $curauth->yim; ?></li>
				</ul>
				*/ ?>
			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
