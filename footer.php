<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Shiftwp
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="widgets">
			<div class="wrapper">

				<div class="widget col c4">
					<h4>Contact</h4>
					<div class="cnt">
						71 St John Street<br>
						London<br>
						EC1M 4NJ, UK<br>
						United Kingdom<br>
						<a href="mailto:hello@shiftdesign.org.uk" target="_blank">hello@shiftdesign.org.uk</a>
					</div>
				</div>
				<div class="widget col c4">
					<h4>About</h4>
					<div class="cnt">
						<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
					</div>
				</div>
				<div class="widget col c3">
					<h4>Connect</h4>
					<div class="cnt">
						<a target="_blank" href="https://twitter.com/shift_org"><span class="fa-stack fa-lg"><i class="fa fa-circle-thin fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a>
						<a target="_blank" href="https://www.linkedin.com/company/1273971?trk=prof-exp-company-name"><span class="fa-stack fa-lg"><i class="fa fa-circle-thin fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x"></i></span></a>
					</div>
				</div>

			</div>
		</div>
		<div class="site-info">
			<div class="wrapper">
				<p>Copyright &copy; Shift 2014 - All Rights Reserved</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
