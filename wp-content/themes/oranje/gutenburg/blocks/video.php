<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'video-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'video';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$video_image = get_field('video_image');  
$video_play_link = get_field('video_play_link');  
?>

<!-- video area start -->
<div class="video-area" id="<?=$id?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="video-area-inner-content">
                    <div class="video-area-inner-inner-wrapper position-relative">

                        <img class="video-area-inner-inner-images" src="<?php echo get_template_directory_uri(); ?>/assets/img/video-circle.png" alt=""> 
                        <img src="<?php echo $video_image['url'] ?>" alt="">
                        <div class="ideo-area-btn d-flex align-items-center">
                           <div class="ideo-area-btn-inner-content">
                                <a class="video-btn-mfp  mfp-iframe"  href="<?php echo $video_play_link ?>">
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
