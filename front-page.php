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

	// GARDENS
	////
	$args = array(
		'post_type' => 'garden',
		'posts_per_page' => '4',
	);
	$gardens = new WP_Query($args);
	if ( $gardens->have_posts() ) :
	?>

		<section id="gardens" class="block container">
			<header class="row"><h2 class="col-sm-12"><?php _e('Last gardens','_mbbasetheme') ?></h2></header>
			<div class="row">
				<?php while ( $gardens->have_posts() ) : $gardens->the_post();
					get_template_part( 'content', 'garden' );
				endwhile; // end of the loop. ?>
			</div>
		</section><!-- #gardens -->
	<?php endif;

	// THIS PAGE CONTENT
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
	endwhile; // end of the loop. ?>

</main><!-- #main -->

<?php get_footer(); ?>
