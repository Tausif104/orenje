<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Who-are-we-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Who-are-we';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$who_we_are_title = get_field('who_we_are_title'); 
$who_are_team_image = get_field('who_are_team_image'); 

?>

 <!-- Who are we area start -->
 <div class="who-are-area">
 	<div class="container">
 		<div class="row">

 			<div class="col-lg-12"> 				
 				<div class="site-title text-center">
					<h2><?php echo $who_we_are_title ?></h2>					 
				</div>
				<div class="who-are-area-images">
					<img src="<?php echo $who_are_team_image['url'] ?>" alt="">
				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- Who are we area end -->