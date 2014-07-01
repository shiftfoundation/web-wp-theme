<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Shiftwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header box w2 h1">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<footer class="entry-footer box w2 h4">
		<?php edit_post_link( __( 'Edit', 'shiftwp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<div class="entry-content box w4 h5">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'shiftwp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
