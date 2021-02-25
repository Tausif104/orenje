<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'do-you-want-partnership-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'do-you-want-partnership';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$do_you_want_a_partnership_title = get_field('do_you_want_a_partnership_title');  
$do_you_want_a_partnership_button_text = get_field('do_you_want_a_partnership_button_text');  
$do_you_want_a_partnership_button_link = get_field('do_you_want_a_partnership_button_link');  
$do_you_want_a_partnership_after_thumbnail = get_field('do_you_want_a_partnership_after_thumbnail');  

?>


 <!-- cta area start -->
<div class="cta-area do-you-want-partnership do-you-want-partnership-two">	 
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cta-area-inner-content text-center">
					<h3><?php echo $do_you_want_a_partnership_title ?></h3>
					<?php if (!empty($do_you_want_a_partnership_button_text)): ?>
						<div class="cta-btn">
							<a class="donyouwantbtn" href="<?php echo $do_you_want_a_partnership_button_link ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-white.png" alt=""><?php echo $do_you_want_a_partnership_button_text ?></a>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
	<div class="cta-area-after-thumbnail">
		<img src="<?php echo $do_you_want_a_partnership_after_thumbnail['url'] ?>" alt="">
	</div>
</div>
 <!-- cta area end -->