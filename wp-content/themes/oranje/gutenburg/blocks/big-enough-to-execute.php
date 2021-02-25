<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'big-enough-to-execute' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'big-enough-to-execute';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$logos = get_field('logos');
$big_images = get_field('big_images');
$big_enough_to_execute_common_title = get_field('big_enough_to_execute_common_title');
?>

 <!-- cta area start -->
<div class="<?=$className?> Bigenoughtoexecute-area" id="<?=$id?>">
	<div class="piramid-style-common-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-title text-center">
                        <h2><?php echo $big_enough_to_execute_common_title['big_enough_to_execute_title'] ?></h2> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php         
        if( $logos and is_array($logos) and count($logos) > 0 ) {            

            $static = '';
            $triangle = '';

            while( $logos ) {
                $total_logos = count($logos);
                if( $total_logos <= 16 ) {
                    
                    $n = 7;
                    for ($i = $n; $i > 0; $i-=2) 
                    { 
                        for ($j = 0; $j < $i; $j++ ) 
                        {                              
                            // printing stars 
                            $logo = array_pop($logos);
                            $triangle = sprintf('<div class="single-piramid-image">
                                <img src="%s" alt="">
                                </div>', $logo['logo']['url']) . $triangle;
                        } 
                        $triangle = "<div class='emmpty-space'></div>". $triangle; 
                        if(!$logos) break;
                    } 
                }
                else {
                    $logo = array_pop($logos);
                    $static .= sprintf('<img src="%s">', $logo['logo']['url']);
                }
            }
            echo sprintf('<div class="piramid-image-style" style="width: %d; text-align:center; margin: 0 auto;" >%s</div>', '100%', $triangle) . $static;           
        }


        $big_images_html = ''; 
        if( $big_images and is_array($big_images) and count($big_images) > 0 ) {    
            foreach($big_images as $key=>$image) {
                $big_images_html .= sprintf('<div class="col-lg-6"><div class="big-img-single"><img src="%s"></div></div>', $image['image']['url']);
            }
        }

        echo sprintf( '<div class="big-images-area"><div class="container"><div class="row">%s</div></div></div>', $big_images_html );
    
    ?>


</div>
 <!-- cta area end -->