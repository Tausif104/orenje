<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'gmap-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gmap';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$map_background_image = get_field('map_background_image');
$map_section_title = get_field('map_section_title');
$map_section_location = get_field('map_section_location');
$map_section_phone = get_field('map_section_phone');
$map_section_email = get_field('map_section_email');

?>


<!-- html markup here --> 
<section id="contact"  class="map-section" style="background-image:url(<?php echo $map_background_image; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="map-information">
                    <h3><?php echo $map_section_title; ?></h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> <?php echo $map_section_location; ?></li>
                        <li><i class="fas fa-phone-alt"></i> <a href="tel:<?php echo $map_section_phone; ?>"><?php echo $map_section_phone; ?></a></li>
                        <li><i class="fas fa-envelope"></i> <a target="_blank" href="mailto:<?php echo $map_section_email; ?>"><?php echo $map_section_email; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- html markup here -->