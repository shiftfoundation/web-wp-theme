<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shiftwp
 */

get_header(); ?>

	<header class="page-title">
	  <h1>Open Tools</h1>
	</header>

	<div id="primary" class="content-area">

		<?php /* ?>
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php shiftwp_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php */ ?>

		<?php echo do_shortcode('[ajax_load_more post_type="post, research" posts_per_page="10" max_pages="10"]'); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
