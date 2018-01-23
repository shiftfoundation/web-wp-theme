<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Shiftwp
 */

$showtitle = get_field('show_title');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if($showtitle): ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php /*
	<footer class="entry-footer box w2 h4">
		<?php edit_post_link( __( 'Edit', 'shiftwp' ), '<span class="edit-link">', '</span>' ); ?>
		<p>
		Connected User: 
		$users = get_users( array(
			'connected_type' => 'pages_to_users',
			'connected_items' => $post
		) );

		echo $users[0]->user_nicename;
		</p>	
	</footer>
	*/ ?>
</article>
