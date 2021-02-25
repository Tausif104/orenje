<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Just-a-video-area-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Just-a-video-area';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.  
$just_a_video_area_background_image = get_field('just_a_video_area_background_image');  
$just_a_video_area_thumbnail = get_field('just_a_video_area_thumbnail');  
$just_a_video_area_video_link = get_field('just_a_video_area_video_link'); 
?>


<!-- wehy area change area -->
<!-- video area start -->
<div class="video-area Just-a-video-area" style="background-image: url(<?php echo $just_a_video_area_background_image['url'] ?>);">
    <div class="container">    	 
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="video-area-inner-content">
                    <div class="video-area-inner-inner-wrapper position-relative">                        
                        <img src="<?php echo $just_a_video_area_thumbnail['url'] ?>" alt="">
                        <div class="ideo-area-btn d-flex align-items-center">
                            <div class="ideo-area-btn-inner-content">
                                <a class="video-btn-mfp  mfp-iframe"  href="<?php echo $just_a_video_area_video_link ?>">
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