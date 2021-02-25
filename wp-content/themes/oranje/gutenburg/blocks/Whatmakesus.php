<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Whatmakesus' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Whatmakesus';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$what_makes_us_background = get_field('what_makes_us_background');   
$what_makes_us_title = get_field('what_makes_us_title');   
$what_makes_us__video_button_link = get_field('what_makes_us__video_button_link');   
$what_makes_us_thumbnail = get_field('what_makes_us_thumbnail');   
$what_makes_us_list_box = get_field('what_makes_us_list_box');   

?>

<!-- What makes us area start -->
<div class="what-make-area" style="background-image: url(<?php echo $what_makes_us_background['url'] ?>);">
	<div class="what-make-area-before-image" style="background-image: url(<?php echo $what_makes_us_thumbnail['url'] ?>);"> </div>
	<div class="container">
		
		<div class="row align-items-center justify-content-center">
			<?php if (!empty($what_makes_us__video_button_link)): ?>
				<div class="col-lg-5">
					<div class="video-pop-up-button text-right">
						<a class="video-btn-mfp  mfp-iframe" href="<?php echo $what_makes_us__video_button_link ?>">  <i class="fas fa-play"></i> </a>
					</div>
				</div>
			<?php endif ?>

			<div class="col-lg-7">
				<div class="what-make-area-inner-content">
					<div class="site-title">
						<h2><?php echo $what_makes_us_title ?></h2>
					</div>
				
					<?php if (!empty($what_makes_us_list_box)): ?>
						<div class="what-we-make-list">
							<ul>
								
							<?php foreach ($what_makes_us_list_box as $key => $whatmakesuslist): ?>
								<li><i class="fas fa-check"></i><?php echo $whatmakesuslist['what_makes_us_list_box_content'] ?></li>
							<?php endforeach ;?>
								
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- What makes us area end -->