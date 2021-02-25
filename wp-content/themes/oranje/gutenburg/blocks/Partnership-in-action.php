<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Partnership-in-action-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Partnership-in-action';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$partnership_in_action_title = get_field('partnership_in_action_title');    
$partnership_in_action_header = get_field('partnership_in_action_header');    
$partnership_in_action__long_description = get_field('partnership_in_action__long_description');    
?>
<!-- Partnership in action start -->
<div class="Partnership-in-action">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="site-title">
					<h2><?php echo $partnership_in_action_title ?></h2>					 
				</div>

				<div class="Partnership-in-action-inner-content">
					<div class="Partnership-in-action-inner-content-header">
						<?php echo $partnership_in_action_header ?>
					</div>
					<div class="Partnership-in-action-inner-content-long">
						<?php echo $partnership_in_action__long_description ?>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>
<!-- Partnership in action end -->