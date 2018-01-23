<?php
/**
 * Template Name: People
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
	
				<article class="page">

					<?php if($showtitle): ?>
					<header class="page-title">
						<h1><?php the_title(); ?></h1>
					</header>
					<?php else: ?>
					<br>
					<br>
					<br>
					<?php endif; ?>

					<?php the_content(); ?>

					<?php
					$people = get_field('people');
					?>
					<ul class="listing users">
						<?php

						foreach ( $people as $user ) { ?>
							<li id="user-<?php echo $user['ID']; ?>">	
								<a href="/people/<?php echo $user['user_nicename']; ?>">
								<?php
									$avatar = get_user_meta($user['ID'], 'avatar', true);

									echo wp_get_attachment_image( $avatar, 'thumbnail' ); 
								?>

								<span class="name">
									<strong><?php echo esc_html( $user['display_name'] ); ?></strong>
									<?php echo esc_html(  get_user_meta( $user['ID'], 'job_title', true) ); ?>
								</span>
								<span class="info">
									<?php if( get_user_meta($user['ID'], 'e-mail', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user['ID'], 'e-mail', true) ); ?></p><?php } ?>
									<?php if( get_user_meta($user['ID'], 'phone', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user['ID'], 'phone', true) ); ?></p><?php } ?>
									<?php if( get_user_meta($user['ID'], 'twitter', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user['ID'], 'twitter', true) ); ?></p><?php } ?>

									<span class="button">View Profile</span>
								</span>
								
							</a>
						</li>
						<?php } ?>
					</ul>
				</article>

				<article class="page">
					<header class="page-title">
						<h1>The Board</h1>
					</header>

					<?php
					$theboard = get_field('the_board');
					?>
					<ul class="listing users">
						<?php

						foreach ( $theboard as $user ) { ?>
							<li id="user-<?php echo $user['ID']; ?>">	
								<a href="/people/<?php echo $user['user_nicename']; ?>">
								<?php
									$avatar = get_user_meta($user['ID'], 'avatar', true);

									echo wp_get_attachment_image( $avatar, 'thumbnail' ); 
								?>

								<span class="name">
									<strong><?php echo esc_html( $user['display_name'] ); ?></strong>
									<?php echo esc_html(  get_user_meta( $user['ID'], 'job_title', true) ); ?>
								</span>
								<span class="info">
									<?php if( get_user_meta($user['ID'], 'e-mail', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user['ID'], 'e-mail', true) ); ?></p><?php } ?>
									<?php if( get_user_meta($user['ID'], 'phone', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user['ID'], 'phone', true) ); ?></p><?php } ?>
									<?php if( get_user_meta($user['ID'], 'twitter', true) ) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span><?php echo esc_html( get_user_meta($user['ID'], 'twitter', true) ); ?></p><?php } ?>

									<span class="button">View Profile</span>
								</span>
								
							</a>
						</li>
						<?php } ?>
					</ul>
				</article>

				<article class="page">
					<header class="page-title">
						<h1>Historypin</h1>
					</header>
					<p class="page-title"><a class="button" target="_blank" href="https://about.historypin.org/team/">Meet the team</a></p>
				</article>

				<article class="page">
					<header class="page-title">
						<h1>BFB Labs</h1>
					</header>
					<p class="page-title"><a class="button" target="_blank" href="https://www.bfb-labs.com/">Meet the team</a></p>
				</article>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

