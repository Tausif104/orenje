<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'who-we-area-really-video-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'who-we-area-really-video';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$who_we_area_really_video_title = get_field('who_we_area_really_video_title');       
$who_we_area_really_video_button_link = get_field('who_we_area_really_video_button_link');       
$who_we_area_really_video_background = get_field('who_we_area_really_video_background');       
$who_we_area_really_video_before_thumb = get_field('who_we_area_really_video_before_thumb');       
$who_we_area_really_video_after_thumb = get_field('who_we_area_really_video_after_thumb');       


?>
<!-- we-care-so-much area start -->
 <div class="we-care-so-much-area who-we-area-really-video" style="background-image: url(<?php echo $who_we_area_really_video_background['url'] ?>)"> 
 <div class="thumb-before">
 	<img src="<?php echo $who_we_area_really_video_before_thumb['url'] ?>" alt="">
 </div> 
	<div class="we-care-so-much-items d-flex align-items-center">
	    <div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="ccol-lg-5">
					<div class="we-care-so-much-inner-content text-center">
						<div class="we-care-so-much-inner-content-wrapper">
							<h3><?php echo $who_we_area_really_video_title; ?></h3>
						</div>
						<?php if (!empty($who_we_area_really_video_button_link)): ?>
							<a href="<?php echo $who_we_area_really_video_button_link ?>" class="video-btn mfp-iframe"><i class="fas fa-caret-right"></i></a>
						<?php endif ;?>
						
					</div>
				</div>
			</div>
	    </div>
	</div> 	
	 <div class="thumb-after">
	 	<img src="<?php echo $who_we_area_really_video_after_thumb['url'] ?>" alt="">
	 </div> 

 </div>
<!-- we-care-so-much area end -->