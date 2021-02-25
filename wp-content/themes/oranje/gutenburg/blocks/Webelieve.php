<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Webelieve' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Webelieve';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$we_believe_background = get_field('we_believe_background');   
$we_believe_thumbnail = get_field('we_believe_thumbnail');   
$webelieve_title = get_field('webelieve_title');   
$we_believe_desc = get_field('we_believe_desc');   
$we_believe_list_box = get_field('we_believe_list_box');   
$we_believe_video_button_link = get_field('we_believe_video_button_link');   

?>

<!-- Webelieve area start -->
<div class="what-make-area Webelieve-area" style="background-image: url(<?php echo $we_believe_background['url'] ?>);">
	
	<div class="container">
		<div class="row align-items-center justify-content-center">
			

			<div class="col-lg-9">
				<div class="what-make-area-inner-content">
					<div class="site-title">
						<h2><?php echo $webelieve_title ?></h2>
						<div class="site-title-desc">
							<?php echo $we_believe_desc ?>
						</div>
					</div>
				
					<?php if (!empty($we_believe_list_box)): ?>
						<div class="what-we-make-list Webelieve-list-box">
							<ul>								
							<?php foreach ($we_believe_list_box as $key => $webelievelistbox): ?>
								<li><i class="fas fa-check"></i><?php echo $webelievelistbox['we_believe_list_box_description'] ?></li>
							<?php endforeach ;?>								
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if (!empty($we_believe_video_button_link)): ?>
				<div class="col-lg-3">
					<div class="video-pop-up-button text-left">
						<a class="video-btn-mfp  mfp-iframe" href="<?php echo $we_believe_video_button_link ?>"> <i class="fas fa-play"></i></a>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
	<div class="what-make-area-before-image"  style="background-image: url(<?php echo $we_believe_thumbnail['url'] ?>);">
		 
	</div>
</div>
<!-- Webelieve area end -->