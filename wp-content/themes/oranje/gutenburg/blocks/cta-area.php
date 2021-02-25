<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-area' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-area';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$cta_area_content = get_field('cta_area_content');       
$cta_before_shape = get_field('cta_before_shape');       
$cta_after_shape = get_field('cta_after_shape'); 
$cta_page_link_text = get_field('cta_page_link_text'); 
$cta_page_link = get_field('cta_page_link'); 
?>


 <!-- cta area start -->
<div class="cta-area">
	<div class="cta-area-before-thumbnail">
		<img src="<?php echo $cta_before_shape['url'] ?>" alt="">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cta-area-inner-content">
					<h3><?php echo $cta_area_content ?></h3>
					<?php if (!empty($cta_page_link)): ?>
						<div class="cta-btn">
							<a data-toggle="modal" data-target="#exampleModalCenter" href="<?php echo $cta_page_link ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ctaabtn.png" alt=""><?php echo $cta_page_link_text ?></a>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
	<div class="cta-area-after-thumbnail">
		<img src="<?php echo $cta_after_shape['url'] ?>" alt="">
	</div>
</div>
 <!-- cta area end -->