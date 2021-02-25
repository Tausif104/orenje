<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Wearerun-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Wearerun';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$we_are_run__area_title = get_field('we_are_run__area_title'); 
$we_are_run_description = get_field('we_are_run_description'); 
$we_are_run_area_thumbnail = get_field('we_are_run_area_thumbnail'); 

?>
<!-- Wearerun area start -->
<div class="Wearerun-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 order-lg-2">
				<div class="Wearerun-area-right">
					<img src="<?php echo $we_are_run_area_thumbnail['url'] ?>" alt="">
				</div>
			</div>
			<div class="col-lg-8  order-lg-1">
				<div class="Wearerun-area-left">
					<div class="site-title">
						<h2><?php echo $we_are_run__area_title ?></h2>					 
					</div>
					<div class="Wearerun-area-left-long-content">
						<?php echo $we_are_run_description ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- Wearerun area end -->