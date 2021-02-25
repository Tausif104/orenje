<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'We-are-a-people-company-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'We-are-a-people-company';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$we_are_a_people_company_background = get_field('we_are_a_people_company_background');       
$we_are_a_people_company__before_thumb = get_field('we_are_a_people_company__before_thumb');       
$we_are_a_people_company_after_thumb = get_field('we_are_a_people_company_after_thumb');       
$we_are_a_people_company_title = get_field('we_are_a_people_company_title');       
$we_are_a_people_company_button_link = get_field('we_are_a_people_company_button_link');       


?>
<!-- we-care-so-much area start -->
 <div class="we-care-so-much-area who-we-area-really-video We-are-a-people-company" style="background-image: url(<?php echo $we_are_a_people_company_background['url'] ?>)"> 
 <div class="thumb-before">
 	<img src="<?php echo $we_are_a_people_company__before_thumb['url'] ?>" alt="">
 </div> 
	<div class="we-care-so-much-items d-flex align-items-center">
	    <div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-12">
					<div class="we-care-so-much-inner-content text-center">
						<?php if (!empty($we_are_a_people_company_button_link)): ?>
							<a href="<?php echo $we_are_a_people_company_button_link ?>" class="video-btn mfp-iframe"><i class="fas fa-caret-right"></i></a>
						<?php endif ;?>
						<div class="we-care-so-much-inner-content-wrapper">
							<h3><?php echo $we_are_a_people_company_title; ?></h3>
						</div>
						
						
					</div>
				</div>
			</div>
	    </div>
	</div> 	
	 <div class="thumb-after">
	 	<img src="<?php echo $we_are_a_people_company_after_thumb['url'] ?>" alt="">
	 </div> 

 </div>
<!-- we-care-so-much area end -->