<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Partnership' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Partnership';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$partnership_bg = get_field('partnership_bg');     
$why_do_you_area_description = get_field('why_do_you_area_description');     
$partnership_text = get_field('partnership_text');     
$partnership_shortcode = get_field('partnership_shortcode');     
$partnership_style = get_field('partnership_style');
$partnership_style_one_bg = get_field('partnership_style_one_bg');
$partnership_style_two_bg = get_field('partnership_style_two_bg');

 
?>



<?php if ($partnership_style == 1): ?>

<!-- Partnership area start -->
<div class="Partnership-area" id="<?=$id?>">
  <div class="container">
    <div class="Partnership-outer-row" style="background-image: url(<?php echo $partnership_style_one_bg['url'] ?>);">
       <div class="row">
        <div class="col-lg-12">
          <div class="partnership-inner-content text-center">
            <h2><?php echo $partnership_text ?></h2>
          </div>
          <div class="partnership-inner-content-form">
            <?php echo do_shortcode( $partnership_shortcode); ?>
          </div>
        </div>
       </div>
    </div>
  </div>
</div>
<!-- Partnership area end -->


  <?php else: ?>


<!-- Partnership area start -->
<div class="Partnership-area" id="<?=$id?>" style="background-image: url(<?php echo $partnership_style_two_bg['url'] ?>);">
  <div class="container">
    <div class="Partnership-outer-row">
       <div class="row">
        <div class="col-lg-12">
          <div class="partnership-inner-content text-center">
            <h2><?php echo $partnership_text ?></h2>
          </div>
          <div class="partnership-inner-content-form">
            <?php echo do_shortcode( $partnership_shortcode); ?>
          </div>
        </div>
       </div>
    </div>
  </div>
</div>
<!-- Partnership area end -->
<?php endif ?>