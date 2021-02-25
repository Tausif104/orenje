<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$realtors_section_background_image = get_field('realtors_section_background_image');
$realtors_section_logo = get_field('realtors_section_logo');
$realtors_section_title = get_field('realtors_section_title');
$realtors_section_description = get_field('realtors_section_description');
$register_form = get_field('register_form');
?>


<!-- html markup here --> 
<section id="Realtors" class="realtors-section signup-section" style="background-image:url(<?php echo $realtors_section_background_image; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 my-auto">
                <div class="realtors-left-section">
                    <img src="<?php echo $realtors_section_logo; ?>" alt="">
                    <h3><?php echo $realtors_section_title; ?></h3>
                    <p><?php echo $realtors_section_description; ?></p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="register-area">
                    <h2>Create an Account</h2>
                    <div class="registration-form">
                        <?php echo $register_form; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- html markup here --> 