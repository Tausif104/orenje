<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'google-map-area-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'google-map-area';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$extra_class = get_field('extra_class');    
$google_map_image = get_field('google_map_image');    

?>

<!-- google map area start -->
<div class="google-map-inner-area <?php echo $extra_class; ?>" style="background-image:url(<?php echo $google_map_image; ?>);"></div>
<!-- google map area end -->