<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shiftwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

<?php 

$post_terms = wp_get_object_terms(get_the_ID(), 'issues', array('fields'=>'ids'));

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 5,
	'post__not_in' => array( get_the_ID() ),
    'tax_query' => array(
        array(
            'taxonomy' => 'issues',
            'field' => 'id',
            'terms' => $post_terms
        )
    )
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) { ?>
			<article class="hentry">
				<h2>Related posts</h2>
				<br>
				</article>
<?php
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
				get_template_part( 'content', get_post_format() );
    }
}
wp_reset_postdata();

			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : 
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
