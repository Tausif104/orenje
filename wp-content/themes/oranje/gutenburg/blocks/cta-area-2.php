<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-area-two' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-area-two';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$cta_area_2_title = get_field('cta_area_2_title');       
$cta_area_2_before_thumb = get_field('cta_area_2_before_thumb');       
$cta_area_2_after_thumb = get_field('cta_area_2_after_thumb'); 
$cta_area_2_button_link = get_field('cta_area_2_button_link'); 
$Ctaarea2button_text = get_field('Ctaarea2button_text'); 
$cta_area_2_background = get_field('cta_area_2_background'); 
?>


 <!-- cta area start -->
<div class="cta-area cta-area-two" style="background-image: url(<?php echo $cta_area_2_background['url'] ?>);">
	<div class="cta-area-before-thumbnail">
		<img src="<?php echo $cta_area_2_before_thumb['url'] ?>" alt="">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cta-area-inner-content text-center">
					<h3><?php echo $cta_area_2_title ?></h3>
					<?php if (!empty($cta_area_2_button_link)): ?>
						<div class="cta-btn">
							<a data-toggle="modal" data-target="#exampleModalCenter" href="<?php echo $cta_area_2_button_link ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ctaabtn.png" alt=""><?php echo $Ctaarea2button_text ?></a>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
	<div class="cta-area-after-thumbnail">
		<img src="<?php echo $cta_area_2_after_thumb['url'] ?>" alt="">
	</div>
</div>
 <!-- cta area end -->