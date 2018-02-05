<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */

get_header(); ?>


<main id="main" class="site-main" role="main">

	<?php
	// SLIDESHOW
	////
	get_template_part( 'content', 'carousel' );

	// NEWS
	////
	$args = array(
		'post_type' => array('activity','download','new'),
		'posts_per_page' => '4',
/*		'meta_query' => array(
			array(
				'key'     => '_act_date_end',
				'value'   => date( "Y-m-d" ),
				'compare' => '>',
			),
		)*/
	);
	$news = new WP_Query($args);
	if ( $news->have_posts() ) :
	?>

		<section id="news" class="block container">
			<header class="row"><h2 class="col-sm-12"><?php _e('Last publications','_mbbasetheme') ?></h2></header>
			<div class="row">
				<?php while ( $news->have_posts() ) : $news->the_post();
					get_template_part( 'content', get_post_type() );
				endwhile; // end of the loop. ?>
			</div>
		</section><!-- #news -->
	<?php endif;

	// THIS PAGE CONTENT
	////
	while ( have_posts() ) : the_post();
	//	$the_content = get_the_content();
		if ( get_the_content() != '' ) {
	?>
		<section class="block container">
			<div class="row">
				<div class="col-sm-12">
					<?php the_content(); ?>
				</div>
			</div>
		</section>

	<?php 	}
	endwhile; // end of the loop. 

	// MAPS
	////
	$args = array(
		'post_type' => 'map',
		'posts_per_page' => '4',
	);
	$maps = new WP_Query($args);
	if ( $maps->have_posts() ) :
	?>

		<section id="maps" class="block container">
			<header class="row"><h2 class="col-sm-12"><?php _e('Last produced maps','_mbbasetheme') ?></h2></header>
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
