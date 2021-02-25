<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Our-values' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Our-values';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$our_value_common_title = get_field('our_value_common_title');     
$our_value_area_content = get_field('our_value_area_content');     


?>
<!-- Our values area start -->
 <div id="values" class="Our-values-area">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
         <div class="site-title">
           <h2><?php echo $our_value_common_title ?></h2>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col-lg-12">
         <div class="our-value-area-inner-content text-center">
           <?php echo $our_value_area_content ?>
         </div>
       </div>
     </div>
   </div>
 </div>
<!-- Our values.Our-values area end -->