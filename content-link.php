<?php
/**
 * @package Shiftwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo get_post_meta( get_the_ID(), 'url', true ); ?>" target="_blank"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->
	<footer class="entry-footer">
		<?php shiftwp_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'shiftwp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
