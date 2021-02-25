<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'What-do-you' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'What-do-you';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$why_do_you_area_background = get_field('why_do_you_area_background');     
$why_do_you_area_description = get_field('why_do_you_area_description');     
$why_do_you_right_side_thumbnail = get_field('why_do_you_right_side_thumbnail');     


?>
 <!-- What-do-you start -->
 <div id="partnership" class="What-do-you-area" style="background-image: url(<?php echo $why_do_you_area_background['url'] ?>);">
   <div class="container">
     <div class="row align-items-center">
       <div class="col-lg-6">
        <div class="why-do-you-content">
          <?php echo $why_do_you_area_description ?>
        </div>
       </div>
       <div class="col-lg-6">
         <div class="why-do-you-right-side">
           <img src="<?php echo $why_do_you_right_side_thumbnail['url'] ?>" alt="">
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- What-do-you end -->