<?php
/**
 * @package Shiftwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h3 class="entry-title"><a href="<?php echo get_post_meta( get_the_ID(), 'url', true ); ?>" target="_blank"><?php the_title(); ?> <i class="fa fa-external-link"></i></a></h3>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer class="entry-footer">
		<?php shiftwp_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'shiftwp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
