<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'sellers-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sellers';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$sellers_logo = get_field('sellers_logo');
$sellers_section_title = get_field('sellers_section_title');
$sellers_section_description = get_field('sellers_section_description');
$sellers_background_image = get_field('sellers_background_image');
$seller_form_shortcode = get_field('seller_form_shortcode');
?>


<!-- html markup here --> 
<section id="Seller"  class="sellers-section signup-section" style='background-image:url(<?php echo $sellers_background_image; ?>);'>
    <div class="container">
        <div class="row">
           

            <div class="col-xl-6  col-lg-6 order-md-1  order-lg-2 order-xl-2 my-auto">
                <div class="sellers-right-section">
                    <img src="<?php echo $sellers_logo; ?>" alt="">
                    <h3><?php echo $sellers_section_title; ?></h3>
                    <p><?php echo $sellers_section_description; ?></p>
                </div>
            </div>

             <div class="col-xl-6 col-lg-6 order-md-2 order-lg-1 order-xl-1">
                <div class="register-area">
                    <h2>Create an Account</h2>
                    <div class="registration-form">
                        <?php echo $seller_form_shortcode; ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- html markup here --> 