<?php
$loop_prefix = 'map';
$img_size = 'medium';
$loop_classes = 'col-sm-3 '.$loop_prefix;

$loop_desc = get_the_excerpt();
$loop_tit = get_the_title();
$loop_date = get_post_meta($post->ID,'_map_year',true);
$loop_perma = get_permalink();

if ( has_post_thumbnail() ) {
	$img_id = get_post_thumbnail_id();
	$img_url_array = wp_get_attachment_image_src($img_id, $img_size, true);
	$big_img_url_array = wp_get_attachment_image_src($img_id, 'extralarge', true);
	$img_url = $img_url_array[0];
	$big_img_url = $big_img_url_array[0];
	$loop_image = '<figure class="'.$loop_prefix.'-img" style="background: url('.$img_url.') no-repeat;"><a href="' .$big_img_url. '" data-lightbox="image-'.$img_id.'" data-title="'.$loop_tit.'" data-alt="'.$loop_tit.'">'.get_the_post_thumbnail($post->ID,$img_size,array('class' => 'img-responsive')).'</a></figure>';
		
} else { $loop_image = ""; }

$loop_file_array = get_post_meta($post->ID,'_map_pdf',true);
$loop_file = ( $loop_file_array['guid'] ) ? '<footer class="'.$loop_prefix.'-file"><a target="_blank" href="'.$loop_file_array['guid'].'"><i class="fa fa-2x fa-arrow-down"></i> <i class="fa fa-2x fa-file-pdf-o"></i></a></footer>': '';
?>

<article class="<?php echo $loop_classes; ?>">
	<?php echo $loop_image ?>
	<div class="<?php echo $loop_prefix; ?>-text">
		<header class="<?php echo $loop_prefix; ?>-heading">
			<a href="<?php echo $loop_perma ?>"><h3 class="<?php echo $loop_prefix; ?>-tit"><?php echo $loop_tit ?></h3></a>
			<span class="<?php echo $loop_prefix; ?>-date"><?php echo $loop_date ?></span>
		</header>
		<div class="<?php echo $loop_prefix; ?>-desc">
			<?php echo $loop_desc; ?>
		</div>
		<?php echo $loop_file; ?>
	</div>
	
</article>

