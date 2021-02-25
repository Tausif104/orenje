<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'we-care-so-much' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'we-care-so-much';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$we_care_item = get_field('we_care_item');       


?>
<!-- we-care-so-much area start -->
 <div class="we-care-so-much-area we-care-so-much-area-id">

 	<?php if (!empty($we_care_item)): ?>
 		<?php foreach ($we_care_item as $key => $wecareitem): ?>
 			<div class="we-care-so-much-items d-flex align-items-center" style="background-image: url(<?php echo $wecareitem['we_care_item_background']['url']; ?>);">
		 	    <div class="container">
			 		<div class="row align-items-center justify-content-center">
			 			<div class="ccol-lg-5">
			 				<div class="we-care-so-much-inner-content text-center">
			 					<a href="<?php echo $wecareitem['why_we_care_item_video_link'] ?>" class="video-btn mfp-iframe"><i class="fas fa-caret-right"></i></a>
			 					<div class="we-care-so-much-inner-content-wrapper">
			 						<h3><?php echo $wecareitem['we_care_item_description']; ?></h3>
			 					</div>
			 				</div>
			 			</div>
			 		</div>
		 	    </div>
		 	</div>
 		<?php endforeach; ?>

 	<?php endif ;?>
 	

 </div>
<!-- we-care-so-much area end -->