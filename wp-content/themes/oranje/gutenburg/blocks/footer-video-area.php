<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'footer-video-area-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'footer-video-area';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$footer_video_item = get_field('footer_video_item');    

?>

<!-- footer-video-area start -->
<div class="footer-video-area">
	<div class="container">
		<div class="row">

			 <?php if (!empty($footer_video_item)): ?>
			 	<?php foreach ($footer_video_item as $key => $viditem): ?> 
			 		<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="footer-video-promo position-relative">
							<img src="<?php echo $viditem['footer_video_thumbnail']['url'] ?>" alt=""> 
							<div class="footer-video-promo-video-area d-flex align-items-center">
								<div class="footer-video-promo-video-area-innner-content">
									<a href="<?php echo $viditem['footer_video_link'] ?>" class="video-btn mfp-iframe"><i class="fas fa-caret-right"></i></a>
								</div> 
							</div>
						</div>
					</div> 
			 	<?php endforeach ;?>
			 <?php endif; ?>
				


		</div>
	</div>
</div>
<!-- footer-video-area end -->