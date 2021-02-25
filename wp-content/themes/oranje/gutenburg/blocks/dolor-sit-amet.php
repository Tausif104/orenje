<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Dolor sit amet-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Dolor sit amet';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$dolor_sit_amet_background_image = get_field('dolor_sit_amet_background_image');    
$dolor_sit_amet_title = get_field('dolor_sit_amet_title');    
$dolor_sit_amet_button_text = get_field('dolor_sit_amet_button_text');    
$dolor_sit_amet_button_link = get_field('dolor_sit_amet_button_link');    
?>

<!-- Dolor sit amet start -->
<div class="Dolor-sit-amet-area">
	<div class="container">
		<div class="Dolor-sit-amet-area-outer-row" style="background-image: url(<?php echo $dolor_sit_amet_background_image['url'] ?>);">
			<div class="row justify-content-end">
				<div class="col-lg-6">
					<div class="Dolor-sit-amet-area-inner-content text-right">
						<div class="site-title">
							<h2><?php echo $dolor_sit_amet_title ?></h2>					 
						</div>
						<div class="cta-btn">
							<a data-toggle="modal" data-target="#exampleModalCenter" href="<?php echo $dolor_sit_amet_button_link ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/button-icon.png" alt=""><?php echo $dolor_sit_amet_button_text ?></a>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<!-- Dolor sit amet end -->