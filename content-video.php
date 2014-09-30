<?php
/**
 * @package Shiftwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?> <i class="fa fa-youtube-play"></i></a></h3>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer class="entry-footer">
		<?php shiftwp_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'shiftwp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
