<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'why-do-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'why-do';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$why_do_thumbnail = get_field('why_do_thumbnail');    
$why_do_title = get_field('why_do_title');    
$why_do_description = get_field('why_do_description');    
$why_do_after_thumbnail = get_field('why_do_after_thumbnail');    
?>

 <!-- why do area start -->
 <div class="why-do-area">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6">
                 <div class="why-do-left">
                     <img src="<?php echo $why_do_thumbnail['url'] ?>" alt="">
                 </div>
             </div>
             <div class="col-lg-6">
                  <div class="why-do-right">
                      <div class="site-title">
                          <h2><?php echo $why_do_title ?></h2>
                      </div>
                      <div class="why-do-right-desc">
                          <?php echo $why_do_description ?>
                      </div>

                  </div>
             </div>
         </div>
     </div>
     <div class="why-do-thumbnail-after">
         <img src="<?php echo $why_do_after_thumbnail['url'] ?>" alt="">
     </div>
 </div>
 <!-- why do area end -->