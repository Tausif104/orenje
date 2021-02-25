<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Whyareyouchanging' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Whyareyouchanging';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$why_are_you_changing_title = get_field('why_are_you_changing_title');  
$why_are_you_changing_content = get_field('why_are_you_changing_content');  
$why_are_you_changing_video_bg = get_field('why_are_you_changing_video_bg');  
$why_are_you_changing_video_link = get_field('why_are_you_changing_video_link');  

?>


<!-- wehy area change area -->
<!-- video area start -->
<div class="video-area why-area-chnaging-area">
    <div class="container">



    	<div class="row">    		
    		<div class="col-lg-12">
    			<div class="site-title text-center">
	                 <h2><?php echo $why_are_you_changing_title ?></h2>
	                 <div class="site-title-desc">
	                 	<?php echo $why_are_you_changing_content ?>
	                 </div>
	             </div>
    		</div>
    	</div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="video-area-inner-content">
                    <div class="video-area-inner-inner-wrapper position-relative">

                        <img class="video-area-inner-inner-images" src="<?php echo get_template_directory_uri(); ?>/assets/img/home_bg_01.png" alt="">                       
                        <img src="<?php echo $why_are_you_changing_video_bg['url'] ?>" alt="">

                        <div class="ideo-area-btn d-flex align-items-center">
                            <div class="ideo-area-btn-inner-content">
                                <a class="video-btn-mfp  mfp-iframe"  href="<?php echo $why_are_you_changing_video_link ?>">
                                   <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- video area end -->


<!-- wehy area change end -->