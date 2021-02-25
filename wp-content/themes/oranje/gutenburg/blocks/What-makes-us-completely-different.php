<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'What-makes-us-completely-different-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'What-makes-us-completely-different';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$what_makes__us_completely_different_title = get_field('what_makes__us_completely_different_title'); 
$what_makes__us_completely_different_description = get_field('what_makes__us_completely_different_description'); 

?>
<!-- What makes us completely different area -->
<div class="What-makes-us-completely-different">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<div class="What-makes-us-completely-different-left">
					<?php echo $what_makes__us_completely_different_title ?>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="What-makes-us-completely-different-right">
					<?php echo $what_makes__us_completely_different_description ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- What makes us completely different area end -->