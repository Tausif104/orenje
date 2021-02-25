<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'owners-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'owners';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$owner_background_image = get_field('owner_background_image');
$owner_section_logo = get_field('owner_section_logo');
$owner_section_title = get_field('owner_section_title');
$owner_section_description = get_field('owner_section_description');
$owner_section_shortcode = get_field('owner_section_shortcode')
?>


<!-- html markup here --> 
<section id="Owners" class="owner-section signup-section" style='background-image:url(<?php echo $owner_background_image; ?>);'>
    <div class="container">
        <div class="row">
            <div class="col-xl-6  col-lg-6 my-auto">
                <div class="sellers-right-section">
                    <img src="<?php echo $owner_section_logo; ?>" alt="">
                    <h3><?php echo $owner_section_title; ?></h3>
                    <p><?php echo $owner_section_description; ?></p>
                </div>
            </div>
            <div class="col-xl-6  col-lg-6 ">
                <div class="register-area">
                    <h2>Create an Account</h2>
                    <div class="registration-form">
                        <?php echo $owner_section_shortcode; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- html markup here --> 