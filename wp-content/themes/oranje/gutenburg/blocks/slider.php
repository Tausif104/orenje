<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$slider_list = get_field('slider_list'); 
$facebook_link = get_field('facebook_link'); 
$twitter_link = get_field('twitter_link'); 
$instagram_link = get_field('instagram_link'); 
?>

<!-- slider area start -->
<div class="site-slider-area-wrapper position-relative">

    <div class="social-list-wrapper">
        <div class="social-list-inner-content">
            <ul>
                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-share.png" alt="Social share"></li>
                <li><a href="<?php echo $facebook_link ?>" target="_blank">facebook</a></li> 
                <li><a href="<?php echo $twitter_link ?>" target="_blank">twitter</a></li> 
                <li><a href="<?php echo $instagram_link ?>" target="_blank">instagram</a></li> 
            </ul>
        </div>
    </div>
    <div class="site-slider-area-wrapper-slider">
        <?php if (!empty($slider_list)): ?>
            <?php foreach ($slider_list as $key => $sliderlist): ?>
                <div class="siter-slider-list d-flex align-items-center" style="background-image: url(<?php echo $sliderlist['slider_item_background_image']['url'] ?>);">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="slider-inner-content text-center">
                                    <div class="slider-long-title">
                                        <h1><?php echo $sliderlist['slider_big_title'] ?></h1>
                                    </div>
                                    <div class="slider-small-title">
                                        <h3 class="text-uppercase"><?php echo $sliderlist['slider_small_title'] ?></h3>
                                    </div>
                                    <div class="slider-button site-btn">

                                        <div class="cta-btn">
                                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/button-icon.png" alt=""><?php echo $sliderlist['slider_button_text'] ?></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
                </div>
            <?php endforeach ;?>
        <?php endif; ?>
    </div>

    <div class="scrooll-down-btn">
        <a href="#" class="scroll-downbtn">
            <i class="#" class="down"><i class="fas fa-caret-down"></i></i>
        </a>
    </div>
    <div class="site-slider-area-wrapper-after-shape" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/Hero.png);"></div>
    
</div>
<!-- slider area end -->