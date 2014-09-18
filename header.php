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

	<?php
	if( is_single() ) {

		$bannerImage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

	}else if( is_author() ) {

		global $wp_query;
		$curauth = $wp_query->get_queried_object();
		$personAvatar = get_user_meta( $curauth->ID, 'avatar', true);
		$bannerImage = wp_get_attachment_image_src( $personAvatar, 'full' );
		
	}else {

		$bannerImage = wp_get_attachment_image_src( '8063', 'full' );

	}
	?>

	<div class="banner" style="background-image: url(<?php echo $bannerImage[0]; ?>);">

		<?php if( get_post_type( $post ) == 'project' ) { ?>

			<?php echo '<span class="info"><h1 class="name">' . get_the_title() . '</h1><span class="title">' . get_post_meta( get_the_ID(), 'what_does_it_do', true ) . '</span></span>'; ?>
		
			<a class="nav-btn all" href="/projects"><i class="fa fa-th"></i> All Projects</a>
			<?php /* ?><a class="nav-btn next" href="#"><i class="fa fa-angle-right"></i> Next Project</a><?php */ ?>

			<ul class="subnav">
				<li class="selected"><a href="#overview">Overview</a></li>
				<li><a href="#research">Research</a></li>
				<li><a href="#comment">Comment</a></li>
				<?php if( get_post_meta( get_the_ID(), 'coverage', true ) ) { ?><li><a href="#coverage">Coverage</a></li><?php } ?>
				<?php if( get_post_meta( get_the_ID(), 'partners', true ) ) { ?><li><a href="#partners">Partners</a></li><?php } ?>
				<?php if( get_post_meta( get_the_ID(), 'jobs', true ) ) { ?><li><a href="#jobs">Jobs</a></li><?php } ?>
				<?php if( get_post_meta( get_the_ID(), 'awards', true ) ) { ?><li><a href="#awards">Awards</a></li><?php } ?>
			</ul>

		<?php }	?>

		<?php if( is_author() ) { ?>
			
			<?php echo '<span class="info"><h1 class="name">' . $curauth->first_name . ' ' . $curauth->last_name . '</h1><span class="title">' . $curauth->job_title . '</span></span>'; ?>

			<a class="nav-btn all" href="/people"><i class="fa fa-th"></i> All People</a>
			<a class="nav-btn next" href="/people"><i class="fa fa-angle-right"></i> Next Profile</a>

			<ul class="subnav">
				<li class="selected"><a href="#">Profile</a></li>
				<li><a href="#">Projects</a></li>
				<li><a href="#">Videos</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Tweets</a></li>
				<li><a href="#">Reports</a></li>
			</ul>

		<?php }	?>

	</div>


	<div id="content" class="site-content <?php if( is_archive() || $post->post_name == 'people' ) { ?>wrapper-wide<?php } else { ?>wrapper<?php } ?>">
