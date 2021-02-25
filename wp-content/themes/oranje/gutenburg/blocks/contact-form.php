<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$contact_section_title = get_field('contact_section_title');    
$contact_section_description = get_field('contact_section_description');    
$contact_form_inner_title = get_field('contact_form_inner_title');    
$contact_info_title = get_field('contact_info_title');    
$contact_info_items = get_field('contact_info_items');    
?>

<!-- start contact area  -->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap">
                    <div class="section-title2">
                        <h2><?php echo $contact_section_title; ?></h2>
                        <p><?php echo $contact_section_description; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form-inner">
                    <h3><?php echo $contact_form_inner_title; ?></h3>
                    <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact Form"]' ); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-info-wrap">
                    <h3><?php echo $contact_info_title; ?></h3>
                    <ul>
                        <?php foreach($contact_info_items as $single_info) : ?>
                        <li><?php echo $single_info['info_item_icon']; ?><?php echo $single_info['info_item_text']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact area  -->