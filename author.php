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
					<header>
						<h1>Profile</h1>
					</header>
					<div class="col c5">
                                          <?php echo wpautop($curauth->description, false); ?>

                                          <?php if(get_user_meta($curauth->ID, 'e-mail', true)) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span> <?php echo esc_html( get_user_meta($curauth->ID, 'e-mail', true) ); ?></p><?php } ?>
                                          <?php if(get_user_meta($curauth->ID, 'phone', true)) { ?><p><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span> <?php echo esc_html( get_user_meta($curauth->ID, 'phone', true) ); ?></p><?php } ?>
					</div>
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
