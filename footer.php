<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _mbbasetheme
 */
?>

	</div><!-- #content -->

	<footer id="epi" class="site-footer bargd" role="contentinfo">
		<?php $location = "footer";
		if ( has_nav_menu( $location ) ) { ?>
			<nav id="epi-menu" class="navbar navbar-inverse" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#epi-menu-collapse">
							<span class="sr-only"><?php _e('Show/hide menu','_mbbasetheme') ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="epi-menu-collapse">

						<?php $args = array(
							'theme_location'  => $location,
							'container' => false,
							'menu_id' => 'navbar-footer',
							'menu_class' => 'nav navbar-nav navbar-center navbar-menu'
						);
						wp_nav_menu( $args ); ?>
					</div>
				</div>
			</nav>
		<?php } ?>
		<?php if ( is_active_sidebar( 'epi-widgets' ) ) {
			echo '<div id="epi-meta" class="container"><div class="row">';
				dynamic_sidebar( 'epi-widgets' );
			echo '</div></div>';
		} ?>

	</footer><!-- #epi -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
