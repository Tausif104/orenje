<?php 

function cleaning_form_shortcode( $atts, $content = null ) {

	$atts = shortcode_atts( array(
        'form_cat' => '',
        'bg' => ''
	), $atts, 'cleaning-form' );

    $text = get_field('title');

    $products 		= get_products();
    $zip_codes 		= get_zipcodes(); 
    $industries 	= get_industries(); 
    $offers 		= get_offers();

	ob_start(); ?>
        <!-- Modal -->
        <div class="modal fade custom-modal-style" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-multistep-form modal-body">
                        <div class="form-heading">
                            <h1><?=get_field('cleaning_form_title', 'option')?></h1>
                        </div>
                        <form id="regForm" action="">
                            <!-- Circles which indicates the steps of the form: -->
                            <div class="formo-steps">
                                <span class="step">Step<span>1</span></span>
                                <span class="step">Step<span>2</span></span>
                                <span class="step">Step<span>3</span></span>
                                <span class="step">Step<span>4</span></span>
                                <span class="step">Step<span>5</span></span>
                                <span class="step">Step<span>6</span></span>
                                <span style="opacity: 0;" class="step">Step<span>7</span></span>
                            </div>
                            <!-- step 1 -->
                            <div class="tab cleaning-tab" id="form-step-0">
                                <h4>Collect info we need to provide pricing</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Name" oninput="this.className = '' " name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="zip_code">Zip Code</label>
                                            <input type="number" id="zip_code" class="form-control" placeholder="Zip Code" oninput="this.className = '' " name="zip_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="industry">Industry</label>
                                            <select name="industry" id="industry" class="form-control" oninput="this.className = '' ">										
                                                <?php if($industries) foreach($industries as $key=>$industry) : ?>
                                                    <option value="<?=$industry['name']?>"><?=$industry['name']?></option>
                                                <?php endforeach; ?>
                                            </select>									
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="email">Email Address*</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email Address" oninput="this.className = '' " name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sqf">Square Footage</label>
                                            <input type="number" id="sqf" class="form-control" placeholder="Square Footage (sq.)" oninput="this.className = '' " name="sqf" >
                                        </div>
                                        <div class="form-group">
                                            <h4 class='label'>Employees</h4>
                                            <select name="peoples">
                                                <option value="50" default>50 Peoples</option>
                                                <option value="100" default>100 Peoples</option>
                                                <option value="150" default>150 Peoples</option>
                                                <option value="200" default>200 Peoples</option>
                                                <option value="250" default>250 Peoples</option>
                                                <option value="350" default>350 Peoples</option>
                                                <option value="500" default>500 Peoples</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mt-3">
                                        <h4 class="label">Total Floor</h4>
                                        <div class="total-floor">
                                            <div class="row">
                                                
                                                <div class="col-xl-6 my-auto">
                                                    <div class="form-group">
                                                        <label for="surface">Hard Surface Floor</label>												
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-6 my-auto">
                                                    <div class="form-group carpet-wrap">
                                                        <label for="carpet">Carpet</label>												
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="range-slider-wrap">
                                                <span class="value-left"><span id="range-min-val">50</span>%</span>
                                                <input type="text" name="hard_surface" class="range-slider"
                                                            data-slider-min="0"
                                                            data-slider-max="100"
                                                            data-slider-step="1"
                                                            data-slider-value="50"
                                                            data-slider-tooltip="hide"
                                                        >
                                                <span class="value-right"><span id="range-max-val">50</span>%</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- step 2 -->
                            <div class="tab cleaning-tab">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="tab-title">
                                            <h4>Three pricing options are displayed</h4>
                                        </div>
                                    </div>
                                    <?php 
                                    
                                    if($products) foreach($products as $key=>$product) :
                                    ?>
                                    <!-- pricing box -->
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="pricing-box">
                                            <div class="pricing-box-header">
                                                <h3>
                                                    <input id="radio_product_id_<?=$product->ID?>" type="radio" name="product_id" value="<?=$product->ID?>">
                                                    <label for="radio_product_id_<?=$product->ID?>"><?=$product->post_title?></label>
                                                    
                                                </h3>
                                                <p class="price">Price/Service <span>$<?=$product->regular_price?></span></p>
                                                <div class="pricing-desc">
                                                    <?=apply_filters('the_content', $product->post_content)?>
                                                </div>
                                                <?php if(isset($product->acf['frequency']) and is_array($product->acf['frequency']) and count($product->acf['frequency']) > 0) : ?>
                                                <select name="frequency[<?=$product->ID?>]" data-frequency="change" id="frequency_select_<?=$product->ID?>" >
                                                    <?php foreach($product->acf['frequency'] as $key=>$frequency): ?>
                                                        <option value="<?=$frequency['option']['value']?>"><?=$frequency['option']['label']?></option>
                                                    <?php endforeach; ?>
                                                </select>										
                                                <?php endif; ?>
                                                <p class="total-price" id="total-price-<?=$product->ID?>">Total <span>$0</span></p>
                                                <input type="hidden" value="0" name="total_price[<?=$product->ID?>]" id="total_price_val_<?=$product->ID?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                                                
                                </div>
                            </div>
                            <!-- step 3 -->
                            <div class="tab cleaning-tab">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="calendar-wrapper">
                                            <div class="tab-title">
                                                <h4>Calendar to select their start date</h4>
                                            </div>
                                            <!-- <div id="calendar"></div> -->
                                            <div id="inline-datepicker"></div>
                                            <input type="hidden" value="" name="booking_start_date" id="booking_start_date">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- step 4 -->
                            <div class="tab cleaning-tab">
                                <div class="special-offers-wrapper">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tab-title">
                                                <h4>Special Offers</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <input type="hidden" value="" name="selected_offer" id="selected_offer">
                                        <?php 
                                        if($offers and is_array($offers) and count($offers) > 0 ) foreach ($offers as $key => $offer) :
                                            $exp_time = strtotime($offer->offers['expired_date']);
                                            if( $exp_time < time() ) continue;
                                        ?>
                                        <!-- offer -->								
                                        <div class="col-xl-5 col-lg-6 col-md-6">
                                            <div class="single-special-offer single-special-offer-apply" data-offerid="<?=$offer->ID?>">
                                                <div class="active-cart-badge">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>Cart Now!</span>
                                                </div>
                                                <div class="single-special-offer-inner">
                                                    <h5><?=$offer->post_title?></h5>
                                                    <p><?=$offer->offers['details']?></p>
                                                    <div class="offer-price">
                                                        <h6 class="price">Save $<?=price_format($offer->offers['rules'][0]['offer_rate'])?></h6>
                                                        <p>Offer good through <?=date("d/m/Y", strtotime($offer->offers['expired_date']) )?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- step 5 -->
                            <div class="tab cleaning-tab">
                                <div class="credit-cart-info">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tab-title">
                                                <h4>Enter credit card information</h4>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="company_name">Company name</label>
                                                <input type="text" id="company_name" class="form-control" placeholder="Diven Technology" oninput="this.className = '' " name="company_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="card_number">Card Number</label>
                                                <input type="text" id="card_number" class="form-control" placeholder="•••• •••• •••• ••••" oninput="this.className = '' " name="card_number">
                                            </div>
                                            <div class="form-group">
                                                <label for="name_on_card">Name on card</label>
                                                <input type="text" id="name_on_card" class="form-control" placeholder="Name on Card" oninput="this.className = '' " name="name_on_card">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" id="city" class="form-control" placeholder="City" oninput="this.className = '' " name="city">
                                            </div>
                                            <div class="form-group">
                                                <label for="zipcode">Zip Code</label>
                                                <input type="number" id="zipcode" class="form-control" placeholder="Zip Code" oninput="this.className = '' " name="zipcode">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <label for="serviceaddr">Service Address</label>
                                                <input type="text" id="service_address" class="form-control" placeholder="Write here Service Location" oninput="this.className = '' " name="service_address">
                                            </div>
                                            <div class="form-group">
                                                <label for="expire_date">Card Expiration Date</label>
                                                <input type="tel" id="card_expire_date" class="form-control" placeholder="mm / yyyy" oninput="this.className = '' " name="card_expire_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="street">Street address</label>
                                                <input type="text" id="street" class="form-control" placeholder="Street address" oninput="this.className = '' " name="street">
                                            </div>
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" id="state" class="form-control" placeholder="State" oninput="this.className = '' " name="state">
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select id="country" name="country" class="form-control" oninput="this.className = '' ">
                                                    <?php require get_template_directory() . '/template-parts/countries.php'; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="check_me_out" name="check_me_out">
                                                <label class="form-check-label" for="check_me_out">Check me out</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="has_different_billing_address" name="has_different_billing_address">
                                                <label class="form-check-label" for="has_different_billing_address">Billing address is different than service address</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="city-2">City</label>
                                                <input disabled type="text" id="city-2" class="form-control" placeholder="City" oninput="this.className = '' " name="different_billing_address[city]">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="state-2">State</label>
                                                <input disabled type="text" id="state-2" class="form-control" placeholder="State" oninput="this.className = '' " name="different_billing_address[state]">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="zipcode-2">Zipcode</label>
                                                <input disabled type="number" id="zipcode-2" class="form-control" placeholder="Zipcode" oninput="this.className = '' " name="different_billing_address[zipcode]">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="country-2">Country</label>
                                                <select disabled id="country-2" name="different_billing_address[country]" class="form-control" oninput="this.className = '' ">
                                                    <?php require get_template_directory() . '/template-parts/countries.php'; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- step 6 -->
                            <div class="tab cleaning-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- verify-data-category  -->
                                        <div class="verify-data-category-wrap">
                                            <div class="tab-title">
                                                <h4>Customer Details <i class="fas fa-pencil-alt goto_form_step" data-showtab="0"></i></h4>
                                            </div>
                                            <div class="verify-data-wrap">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Name</h6>
                                                            <p id="view_name"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Zip Code</h6>
                                                            <p id="view_zip_code"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Industry</h6>
                                                            <p id="view_industry"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>hard surface floor</h6>
                                                            <p><span id="view_hard_surface"></span>%</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>email address*</h6>
                                                            <p id="view_email"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Square Footage</h6>
                                                            <p><span id="view_sqf">150sq.</span></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Employees</h6>
                                                            <p><span id="view_peoples">20</span> Peoples</p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>carpet</h6>
                                                            <p> <span id="view_carpet"></span>%</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- verify-data-category  -->
                                        <div class="verify-data-category-wrap">
                                            <div class="tab-title">
                                                <h4>Package Selected <i class="fas fa-pencil-alt goto_form_step" data-showtab="1"></i></h4>
                                            </div>
                                            <div class="verify-data-wrap package">
                                                <!-- single-data  -->
                                                <div class="single-data">
                                                    <p id="view_selected_product_title"></p>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- verify-data-category  -->
                                        <div class="verify-data-category-wrap">
                                            <div class="tab-title">
                                                <h4>Start Date <i class="fas fa-pencil-alt goto_form_step" data-showtab="2"></i></h4>
                                            </div>
                                            <div class="verify-data-wrap">
                                                <!-- single-data  -->
                                                <div class="single-data">
                                                    <p id="view_booking_start_date">9 January 2021</p>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <!-- verify-data-category  -->
                                        <div class="verify-data-category-wrap">
                                            <div class="tab-title">
                                                <h4>offer Selected <i class="fas fa-pencil-alt goto_form_step" data-showtab="3"></i></h4>
                                            </div>
                                            <div class="verify-data-wrap">
                                                <div class="single-special-offer">
                                                    <div class="single-special-offer-inner">
                                                        <h5 id="view_offer_title"></h5>
                                                        <p id="view_offer_details"></p>
                                                        <div class="offer-price">
                                                            <h6 class="price" id="view_offer_price_rate">Save $<?=price_format($offer->offers['rules'][0]['offer_rate'])?></h6>
                                                            <p>Offer good through <span id="view_offer_expired_date"></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- verify-data-category  -->
                                        <div class="verify-data-category-wrap last-item">
                                            <div class="tab-title">
                                                <h4>Payment information <i class="fas fa-pencil-alt goto_form_step" data-showtab="4"></i></h4>
                                            </div>
                                            <div class="verify-data-wrap">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Company name</h6>
                                                            <p id="view_cc_company_name"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>card number</h6>
                                                            <p id="view_cc_card_number"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Name on card</h6>
                                                            <p id="view_cc_name_on_card"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>zip code</h6>
                                                            <p id="view_cc_zipcode"></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>service address</h6>
                                                            <p id="view_cc_service_address"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Expiration date</h6>
                                                            <p id="view_cc_card_expire_date"></p>
                                                        </div>
                                                        <!-- single-data  -->
                                                        <div class="single-data">
                                                            <h6>Street address</h6>
                                                            <p id="view_cc_street"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>

                            <!-- step 7 -->
                            <div class="tab cleaning-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="success-step" id="success_step_message">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="step-buttons">
                                
                                <div class="text-center">
                                    <button class="multiform-btn" type="button" id="prevBtn" data-prevnext="-1">Previous Step</button>
                                    <button class="multiform-btn" type="button" id="nextBtn" data-prevnext="1">Next Steps</button>
                                </div>
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
add_shortcode( 'cleaning-form', 'cleaning_form_shortcode' );
