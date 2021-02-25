<?php 

function disinfection_form_shortcode( $atts, $content = null ) {

	$atts = shortcode_atts( array(
        'form_cat' => '',
        'bg' => ''
	), $atts, 'disinfection-form' );

    $products 		= get_disinfection_products();
    $offers         = get_disinfection_offers();
    

	ob_start(); ?>
        <div class="modal fade custom-modal-style" id="disinfection-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-multistep-form modal-body">
                        <div class="form-heading">                        
                            <h1><?=get_field('disinfection_form_title', 'option')?></h1>
                        </div>
                        <form id="disinfection_form">
                            <div id="disinfection_steps">
                                <!-- step 1 -->
                                <h2>Step</h2>
                                <section>
                                    <h4>Collect info we need to provide pricing</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="disinfection_name">Your Name</label>
                                                <input type="text" id="disinfection_name" class="form-control required" placeholder="Name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="disinfection_zip_code">Zip Code</label>
                                                <input type="number" id="disinfection_zip_code" class="form-control required" placeholder="Zip Code" name="zip_code">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="disinfection_email">Email Address*</label>
                                                <input type="email" id="disinfection_email" class="form-control required email" placeholder="Email Address" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="disinfection_sqft">Square Footage</label>
                                                <input type="number" id="disinfection_sqft" class="form-control required" placeholder="Square Footage (sq.)" name="sqft" >
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                            
                                <!-- step 2 -->
                                <h2>Step</h2>
                                <section>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tab-title">
                                                <h4>Three pricing options are displayed</h4>
                                            </div>
                                        </div>
                                        <?php if($products) foreach($products as $key=>$product) : ?>
                                            <!-- pricing box -->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="pricing-box">
                                                    <div class="pricing-box-header">
                                                        <h3>
                                                            <input id="disinfection_radio_product_id_<?=$product->ID?>" type="radio" class="required" name="disinfection_product_id" value="<?=$product->ID?>">
                                                            <label for="disinfection_radio_product_id_<?=$product->ID?>"><?=$product->post_title?></label>                                                        
                                                        </h3>
                                                        <p class="price">Price/Hour <span>$<?=price_format($product->price)?></span></p>
                                                        <div class="pricing-desc">
                                                            <?=apply_filters('the_content', $product->post_content)?>
                                                        </div>

                                                        <p class="total-price" id="disinfection-total-price-<?=$product->ID?>">Total <span>$0</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                                                    
                                    </div>
                                </section>

                                <!-- step 3 -->
                                <h2>Step</h2>
                                <section>
                                
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="calendar-wrapper">
                                                <div class="tab-title">
                                                    <h4>Calendar to select their start date</h4>
                                                </div>
                                                <input style="opacity:0; position:absolute;z-index:0;" type="text" value="" class="required" name="booking_start_date" id="disinfection_booking_start_date">
                                                <div id="disinfection-inline-datepicker"></div> 
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                <?php if($offers and is_array($offers) and count($offers) > 0 ): ?>
                                <!-- step 4 -->
                                <h2>Step</h2>
                                <section> 
                                    <div class="special-offers-wrapper">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="tab-title">
                                                    <h4>Special Offers</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <input style="opacity:0; position:absolute;z-index:0;" type="text" value="" name="selected_offer" id="disinfection_selected_offer">
                                            <?php 
                                            foreach ($offers as $key => $offer) :
                                                $exp_time = strtotime($offer->data['expired_date']);
                                                if( $exp_time < time() ) continue;
                                            ?>
                                            <!-- offer -->								
                                            <div class="col-xl-5 col-lg-6 col-md-6">
                                                <div class="single-special-offer disinfection-offer-apply" data-disinfection_offerid="<?=$offer->ID?>">
                                                    <div class="active-cart-badge">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <span>Cart Now!</span>
                                                    </div>
                                                    <div class="single-special-offer-inner">
                                                        <h5><?=$offer->post_title?></h5>
                                                        <p><?=$offer->data['details']?></p>
                                                        <div class="offer-price">
                                                            <h6 class="price">Save $<?=price_format($offer->data['rules'][0]['offer_rate'])?></h6>
                                                            <p>Offer good through <?=date("d/m/Y", strtotime($offer->data['expired_date']) )?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            
                                        </div>
                                    </div>
                                </section>
                                <?php endif; ?>

                                <!-- step Card info -->
                                <h2>Step</h2>
                                <section>                                     
                                    <div class="credit-cart-info">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="tab-title">
                                                    <h4>Enter credit card information</h4>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="disinfection_company_name">Company name</label>
                                                    <input type="text" id="disinfection_company_name" class="form-control" placeholder="Company name" name="company_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disinfection_card_number">Card Number *</label>
                                                    <input type="text" id="disinfection_card_number" class="form-control required" placeholder="•••• •••• •••• ••••" name="card_number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disinfection_name_on_card">Name on card *</label>
                                                    <input type="text" id="disinfection_name_on_card" class="form-control required" placeholder="Name on Card" name="name_on_card">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disinfection_city">City *</label>
                                                    <input type="text" id="disinfection_city" class="form-control required" placeholder="City" name="city">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disinfection_zipcode">Zip Code *</label>
                                                    <input type="number" id="disinfection_zipcode" class="form-control required" placeholder="Zip Code" name="zipcode">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="disinfection_address">Address *</label>
                                                    <input type="text" id="disinfection_address" class="form-control required" placeholder="Address" name="address">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disinfection_card_expire_date">Card Expiration Date *</label>
                                                    <input type="tel" id="disinfection_card_expire_date" class="form-control required" placeholder="mm / yyyy" name="card_expire_date">
                                                </div>                                                
                                                <div class="form-group">
                                                    <label for="disinfection_card_cvv">CVV *</label>
                                                    <input type="tel" id="disinfection_card_cvv" class="form-control required" placeholder="123" name="CVV">
                                                </div>                                                
                                                <div class="form-group">
                                                    <label for="disinfection_state">State *</label>
                                                    <input type="text" id="disinfection_state" class="form-control required" placeholder="State" name="state">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disinfection_country">Country *</label>
                                                    <select id="disinfection_country" name="country" class="form-control required" >
                                                        <?php require get_template_directory() . '/template-parts/countries.php'; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="disinfection_pay_by_invoice" name="pay_by_invoice">
                                                    <?php 
                                                        $pay_by_invoice = get_field('disinfection_pay_by_invoice_fee', 'option');
                                                        $pbi_amount = $pay_by_invoice['fee_type'] == 'Percentage' ? $pay_by_invoice['fee'] . '%' : price_format($pay_by_invoice['fee']);
                                                    ?>
                                                    <label class="form-check-label" for="disinfection_pay_by_invoice">Pay by invoice (Service fee: <?=$pbi_amount?>)</a></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="disinfection_consumable" name="consumable">
                                                    <label class="form-check-label" for="disinfection_consumable">I am interested in consumables ordering</a></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input required" id="disinfection_terms_of_service" name="terms_of_service">
                                                    <label class="form-check-label" for="disinfection_terms_of_service">I agree to <a href="#terms_of_service">terms of service</a></label>
                                                </div>
                                                <?php 
                                                    $terms = get_field('disinfection_terms_of_service', 'option');
                                                ?>
                                                <div id="terms_of_service" class="ts_overlay">
                                                    <div class="ts_popup">
                                                        <h2></h2>
                                                        <a class="ts_close" href="#">&times;</a>
                                                        <div class="ts_content">
                                                            <?=$terms?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                </section>


                                <!-- step 6 -->
                                <h2>Step</h2>
                                <section> 
                                    
                                </section>



                            </div>
                        </form>
                    </div>
                    <!-- modal content -->
                </div>
            </div>
        </div>
        <div class="loading-wrapper"><div class="loading"></div></div>
    <?php return ob_get_clean();
}
add_shortcode( 'disinfection-form', 'disinfection_form_shortcode' );
