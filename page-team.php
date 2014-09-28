<?php
/**
 * Template Name: Team
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
	
				<article class="page">
					<header class="page-title">
						<h1><?php the_title(); ?></h1>
					</header>

					<?php the_content(); ?>

					<ul class="listing users">
						<?php
						$blogusers = get_users( array(
							'meta_query' => array(
								array(
									'key' => 'corder',
									'type' => 'numeric',
									'value' => 0,
									'compare' => '>',
								),
							),
							'orderby' => 'meta_value',
						) );

						foreach ( $blogusers as $user ) { ?>
							<li id="user-<?php echo $user->ID; ?>">	
							<?php
							/*
							echo get_user_meta($user->ID, 'corder', true); 
							*/
							$avatar = get_user_meta($user->ID, 'avatar', true);

							echo wp_get_attachment_image( $avatar, 'thumbnail' ); 
							?>

							<span class="info">
								<p class="name">
									<strong><?php echo esc_html( $user->display_name ); ?></strong>
									<?php echo esc_html( $user->job_title ); ?>
								</p>
								<?php if( get_user_meta($user->ID, 'e-mail', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user->ID, 'e-mail', true) ); ?></p><?php } ?>
								<?php if( get_user_meta($user->ID, 'phone', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user->ID, 'phone', true) ); ?></p><?php } ?>

								<a href="/people/<?php echo $user->user_nicename; ?>" class="button">View Profile</a>
							</span>
							
						</li>
						<?php } ?>
					</ul>
				</article>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

