<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */

$img_size = 'post-thumbnail';
if ( has_post_thumbnail() ) {
	$loop_image = '<aside class="col-sm-4 entry-content-img"><figure class="'.$loop_prefix.'-img">'.get_the_post_thumbnail($post->ID,$img_size,array('class' => 'img-responsive')).'</figure></aside>';
} else {
	$loop_image = "";
}

$loop_classes = ( is_page_template('templates/page-map.php') ) ? 'col-sm-12' : 'col-sm-8 entry-content-text' ;

$show_tit = get_post_meta($post->ID,'_page_show_tit',true);
$tit_class = ( $show_tit ) ? '' : ' notext notext-extra';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('block container'); ?>>
	<header class="row">
		<?php the_title( '<h1 class="col-sm-12 entry-title'.$tit_class.'">', '</h1>' ); ?>
	</header>
	<div class="row entry-content">
	<div class="<?php echo $loop_classes ?>">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_mbbasetheme' ),
				'after'  => '</div>',
			) );
		?>
		</div>
		<?php echo $loop_image; ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', '_mbbasetheme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
