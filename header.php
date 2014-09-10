<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Shiftwp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'shiftwp' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper-wide">

			<div class="site-branding">
				<h1 id="logo" class="site-title">
					<a class="logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			</div>

			<button class="menu-toggle"><i class="fa fa-bars"></i><i class="fa fa-times"></i><span><?php _e( 'Primary Menu', 'shiftwp' ); ?></span></button>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
			<p><?php bloginfo( 'description' ); ?></p>

		</div>
	</header><!-- #masthead -->

	<div class="banner">

		<?php
			if( is_single() ) {
				the_post_thumbnail();
			}else {
				echo get_the_post_thumbnail( 8063 );
			}
		 ?>

	</div>


	<div id="content" class="site-content <?php if( is_archive() || $post->post_name == 'team' ) { ?>wrapper-wide<?php } else { ?>wrapper<?php } ?>">
