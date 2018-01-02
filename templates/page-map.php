<?php
/**
 * Template Name: Map Page
 *
 * Displays content for map page layouts
 *
 * @package _mbbasetheme
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php
	// MAPS
	////
	$args = array(
		'post_type' => 'map',
		'posts_per_page' => '-1',
	);
	$maps = new WP_Query($args);
	if ( $maps->have_posts() ) :
	?>

		<section id="maps" class="block container">
			<header class="row"><h2 class="col-sm-12"><?php _e('Produced maps','_mbbasetheme') ?></h2></header>
			<div class="row">
				<?php
				$count = 0;
				while ( $maps->have_posts() ) : $maps->the_post();
					$count++;
					get_template_part( 'content', 'map' );
					if ( $count == 4 ) {
						echo '<div class=".hidden-xs clearfix"></div>';
						$count = 0;
					}
				endwhile; // end of the loop. ?>
			</div>
		</section><!-- #gardens -->
	<?php endif; ?>
</main><!-- #main -->

<?php get_footer(); ?>
