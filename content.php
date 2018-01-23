<?php
/**
 * @package Shiftwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( 'research' == get_post_type()) : ?>
		<?php $fileurl = get_field('file_url'); ?>
		<div class="entry-image">
			<div class="entry-image"><a href="<?php echo $fileurl; ?>"><?php the_post_thumbnail('large'); ?></a></div>
		</div>
		<div class="entry-type"><strong>Research</strong></div>
	<?php endif; ?>
	<header class="entry-header">
		<h3>
    	<?php if( 'research' == get_post_type() ) { ?>
    		<a target="_blank" href="<?php echo $fileurl; ?>" title="<?php the_title(); ?>">
        <?php }else{ ?>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php } ?>
        	<?php the_title(); ?>
			</a>
		</h3>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if ( 'post' == get_post_type() || 'research' == get_post_type()) : ?>
		<span class="entry-meta">
			<?php shiftwp_posted_on(); ?>
		</span><!-- .entry-meta -->
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'shiftwp' ) );
				if ( $categories_list && shiftwp_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'shiftwp' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'shiftwp' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'shiftwp' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><i class="fa fa-comment"></i> <?php comments_popup_link( __( 'Leave a comment', 'shiftwp' ), __( '1 Comment', 'shiftwp' ), __( '% Comments', 'shiftwp' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'shiftwp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
