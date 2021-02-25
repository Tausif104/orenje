<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'multistep-form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'multistep-form';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('title');

$products 		= get_products();
$zip_codes 		= get_zipcodes(); 
$industries 	= get_industries(); 
$offers 		= get_offers();
// pr($offers);
?>


<!-- Modal -->
<div class="modal fade custom-modal-style" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<!-- modal content -->
			<div class="modal-multistep-form modal-body">
                <div class="form-heading">
                    <h1>Schedule your <span>first cleaning now</span></h1>
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
					<div class="tab" id="form-step-0">
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
					<div class="tab">
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
					<div class="tab">
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
					<div class="tab">
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
					<div class="tab">
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
											<option value="Afganistan">Afghanistan</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antigua & Barbuda">Antigua & Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
											<option value="Aruba">Aruba</option>
											<option value="Australia">Australia</option>
											<option value="Austria">Austria</option>
											<option value="Azerbaijan">Azerbaijan</option>
											<option value="Bahamas">Bahamas</option>
											<option value="Bahrain">Bahrain</option>
											<option value="Bangladesh">Bangladesh</option>
											<option value="Barbados">Barbados</option>
											<option value="Belarus">Belarus</option>
											<option value="Belgium">Belgium</option>
											<option value="Belize">Belize</option>
											<option value="Benin">Benin</option>
											<option value="Bermuda">Bermuda</option>
											<option value="Bhutan">Bhutan</option>
											<option value="Bolivia">Bolivia</option>
											<option value="Bonaire">Bonaire</option>
											<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
											<option value="Botswana">Botswana</option>
											<option value="Brazil">Brazil</option>
											<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
											<option value="Brunei">Brunei</option>
											<option value="Bulgaria">Bulgaria</option>
											<option value="Burkina Faso">Burkina Faso</option>
											<option value="Burundi">Burundi</option>
											<option value="Cambodia">Cambodia</option>
											<option value="Cameroon">Cameroon</option>
											<option value="Canada">Canada</option>
											<option value="Canary Islands">Canary Islands</option>
											<option value="Cape Verde">Cape Verde</option>
											<option value="Cayman Islands">Cayman Islands</option>
											<option value="Central African Republic">Central African Republic</option>
											<option value="Chad">Chad</option>
											<option value="Channel Islands">Channel Islands</option>
											<option value="Chile">Chile</option>
											<option value="China">China</option>
											<option value="Christmas Island">Christmas Island</option>
											<option value="Cocos Island">Cocos Island</option>
											<option value="Colombia">Colombia</option>
											<option value="Comoros">Comoros</option>
											<option value="Congo">Congo</option>
											<option value="Cook Islands">Cook Islands</option>
											<option value="Costa Rica">Costa Rica</option>
											<option value="Cote DIvoire">Cote DIvoire</option>
											<option value="Croatia">Croatia</option>
											<option value="Cuba">Cuba</option>
											<option value="Curaco">Curacao</option>
											<option value="Cyprus">Cyprus</option>
											<option value="Czech Republic">Czech Republic</option>
											<option value="Denmark">Denmark</option>
											<option value="Djibouti">Djibouti</option>
											<option value="Dominica">Dominica</option>
											<option value="Dominican Republic">Dominican Republic</option>
											<option value="East Timor">East Timor</option>
											<option value="Ecuador">Ecuador</option>
											<option value="Egypt">Egypt</option>
											<option value="El Salvador">El Salvador</option>
											<option value="Equatorial Guinea">Equatorial Guinea</option>
											<option value="Eritrea">Eritrea</option>
											<option value="Estonia">Estonia</option>
											<option value="Ethiopia">Ethiopia</option>
											<option value="Falkland Islands">Falkland Islands</option>
											<option value="Faroe Islands">Faroe Islands</option>
											<option value="Fiji">Fiji</option>
											<option value="Finland">Finland</option>
											<option value="France">France</option>
											<option value="French Guiana">French Guiana</option>
											<option value="French Polynesia">French Polynesia</option>
											<option value="French Southern Ter">French Southern Ter</option>
											<option value="Gabon">Gabon</option>
											<option value="Gambia">Gambia</option>
											<option value="Georgia">Georgia</option>
											<option value="Germany">Germany</option>
											<option value="Ghana">Ghana</option>
											<option value="Gibraltar">Gibraltar</option>
											<option value="Great Britain">Great Britain</option>
											<option value="Greece">Greece</option>
											<option value="Greenland">Greenland</option>
											<option value="Grenada">Grenada</option>
											<option value="Guadeloupe">Guadeloupe</option>
											<option value="Guam">Guam</option>
											<option value="Guatemala">Guatemala</option>
											<option value="Guinea">Guinea</option>
											<option value="Guyana">Guyana</option>
											<option value="Haiti">Haiti</option>
											<option value="Hawaii">Hawaii</option>
											<option value="Honduras">Honduras</option>
											<option value="Hong Kong">Hong Kong</option>
											<option value="Hungary">Hungary</option>
											<option value="Iceland">Iceland</option>
											<option value="Indonesia">Indonesia</option>
											<option value="India">India</option>
											<option value="Iran">Iran</option>
											<option value="Iraq">Iraq</option>
											<option value="Ireland">Ireland</option>
											<option value="Isle of Man">Isle of Man</option>
											<option value="Israel">Israel</option>
											<option value="Italy">Italy</option>
											<option value="Jamaica">Jamaica</option>
											<option value="Japan">Japan</option>
											<option value="Jordan">Jordan</option>
											<option value="Kazakhstan">Kazakhstan</option>
											<option value="Kenya">Kenya</option>
											<option value="Kiribati">Kiribati</option>
											<option value="Korea North">Korea North</option>
											<option value="Korea Sout">Korea South</option>
											<option value="Kuwait">Kuwait</option>
											<option value="Kyrgyzstan">Kyrgyzstan</option>
											<option value="Laos">Laos</option>
											<option value="Latvia">Latvia</option>
											<option value="Lebanon">Lebanon</option>
											<option value="Lesotho">Lesotho</option>
											<option value="Liberia">Liberia</option>
											<option value="Libya">Libya</option>
											<option value="Liechtenstein">Liechtenstein</option>
											<option value="Lithuania">Lithuania</option>
											<option value="Luxembourg">Luxembourg</option>
											<option value="Macau">Macau</option>
											<option value="Macedonia">Macedonia</option>
											<option value="Madagascar">Madagascar</option>
											<option value="Malaysia">Malaysia</option>
											<option value="Malawi">Malawi</option>
											<option value="Maldives">Maldives</option>
											<option value="Mali">Mali</option>
											<option value="Malta">Malta</option>
											<option value="Marshall Islands">Marshall Islands</option>
											<option value="Martinique">Martinique</option>
											<option value="Mauritania">Mauritania</option>
											<option value="Mauritius">Mauritius</option>
											<option value="Mayotte">Mayotte</option>
											<option value="Mexico">Mexico</option>
											<option value="Midway Islands">Midway Islands</option>
											<option value="Moldova">Moldova</option>
											<option value="Monaco">Monaco</option>
											<option value="Mongolia">Mongolia</option>
											<option value="Montserrat">Montserrat</option>
											<option value="Morocco">Morocco</option>
											<option value="Mozambique">Mozambique</option>
											<option value="Myanmar">Myanmar</option>
											<option value="Nambia">Nambia</option>
											<option value="Nauru">Nauru</option>
											<option value="Nepal">Nepal</option>
											<option value="Netherland Antilles">Netherland Antilles</option>
											<option value="Netherlands">Netherlands (Holland, Europe)</option>
											<option value="Nevis">Nevis</option>
											<option value="New Caledonia">New Caledonia</option>
											<option value="New Zealand">New Zealand</option>
											<option value="Nicaragua">Nicaragua</option>
											<option value="Niger">Niger</option>
											<option value="Nigeria">Nigeria</option>
											<option value="Niue">Niue</option>
											<option value="Norfolk Island">Norfolk Island</option>
											<option value="Norway">Norway</option>
											<option value="Oman">Oman</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Palau Island">Palau Island</option>
											<option value="Palestine">Palestine</option>
											<option value="Panama">Panama</option>
											<option value="Papua New Guinea">Papua New Guinea</option>
											<option value="Paraguay">Paraguay</option>
											<option value="Peru">Peru</option>
											<option value="Phillipines">Philippines</option>
											<option value="Pitcairn Island">Pitcairn Island</option>
											<option value="Poland">Poland</option>
											<option value="Portugal">Portugal</option>
											<option value="Puerto Rico">Puerto Rico</option>
											<option value="Qatar">Qatar</option>
											<option value="Republic of Montenegro">Republic of Montenegro</option>
											<option value="Republic of Serbia">Republic of Serbia</option>
											<option value="Reunion">Reunion</option>
											<option value="Romania">Romania</option>
											<option value="Russia">Russia</option>
											<option value="Rwanda">Rwanda</option>
											<option value="St Barthelemy">St Barthelemy</option>
											<option value="St Eustatius">St Eustatius</option>
											<option value="St Helena">St Helena</option>
											<option value="St Kitts-Nevis">St Kitts-Nevis</option>
											<option value="St Lucia">St Lucia</option>
											<option value="St Maarten">St Maarten</option>
											<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
											<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
											<option value="Saipan">Saipan</option>
											<option value="Samoa">Samoa</option>
											<option value="Samoa American">Samoa American</option>
											<option value="San Marino">San Marino</option>
											<option value="Sao Tome & Principe">Sao Tome & Principe</option>
											<option value="Saudi Arabia">Saudi Arabia</option>
											<option value="Senegal">Senegal</option>
											<option value="Seychelles">Seychelles</option>
											<option value="Sierra Leone">Sierra Leone</option>
											<option value="Singapore">Singapore</option>
											<option value="Slovakia">Slovakia</option>
											<option value="Slovenia">Slovenia</option>
											<option value="Solomon Islands">Solomon Islands</option>
											<option value="Somalia">Somalia</option>
											<option value="South Africa">South Africa</option>
											<option value="Spain">Spain</option>
											<option value="Sri Lanka">Sri Lanka</option>
											<option value="Sudan">Sudan</option>
											<option value="Suriname">Suriname</option>
											<option value="Swaziland">Swaziland</option>
											<option value="Sweden">Sweden</option>
											<option value="Switzerland">Switzerland</option>
											<option value="Syria">Syria</option>
											<option value="Tahiti">Tahiti</option>
											<option value="Taiwan">Taiwan</option>
											<option value="Tajikistan">Tajikistan</option>
											<option value="Tanzania">Tanzania</option>
											<option value="Thailand">Thailand</option>
											<option value="Togo">Togo</option>
											<option value="Tokelau">Tokelau</option>
											<option value="Tonga">Tonga</option>
											<option value="Trinidad & Tobago">Trinidad & Tobago</option>
											<option value="Tunisia">Tunisia</option>
											<option value="Turkey">Turkey</option>
											<option value="Turkmenistan">Turkmenistan</option>
											<option value="Turks & Caicos Is">Turks & Caicos Is</option>
											<option value="Tuvalu">Tuvalu</option>
											<option value="Uganda">Uganda</option>
											<option value="United Kingdom">United Kingdom</option>
											<option value="Ukraine">Ukraine</option>
											<option value="United Arab Erimates">United Arab Emirates</option>
											<option value="United States of America">United States of America</option>
											<option value="Uraguay">Uruguay</option>
											<option value="Uzbekistan">Uzbekistan</option>
											<option value="Vanuatu">Vanuatu</option>
											<option value="Vatican City State">Vatican City State</option>
											<option value="Venezuela">Venezuela</option>
											<option value="Vietnam">Vietnam</option>
											<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
											<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
											<option value="Wake Island">Wake Island</option>
											<option value="Wallis & Futana Is">Wallis & Futana Is</option>
											<option value="Yemen">Yemen</option>
											<option value="Zaire">Zaire</option>
											<option value="Zambia">Zambia</option>
											<option value="Zimbabwe">Zimbabwe</option>
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
											<option value="Afganistan">Afghanistan</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antigua & Barbuda">Antigua & Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
											<option value="Aruba">Aruba</option>
											<option value="Australia">Australia</option>
											<option value="Austria">Austria</option>
											<option value="Azerbaijan">Azerbaijan</option>
											<option value="Bahamas">Bahamas</option>
											<option value="Bahrain">Bahrain</option>
											<option value="Bangladesh">Bangladesh</option>
											<option value="Barbados">Barbados</option>
											<option value="Belarus">Belarus</option>
											<option value="Belgium">Belgium</option>
											<option value="Belize">Belize</option>
											<option value="Benin">Benin</option>
											<option value="Bermuda">Bermuda</option>
											<option value="Bhutan">Bhutan</option>
											<option value="Bolivia">Bolivia</option>
											<option value="Bonaire">Bonaire</option>
											<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
											<option value="Botswana">Botswana</option>
											<option value="Brazil">Brazil</option>
											<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
											<option value="Brunei">Brunei</option>
											<option value="Bulgaria">Bulgaria</option>
											<option value="Burkina Faso">Burkina Faso</option>
											<option value="Burundi">Burundi</option>
											<option value="Cambodia">Cambodia</option>
											<option value="Cameroon">Cameroon</option>
											<option value="Canada">Canada</option>
											<option value="Canary Islands">Canary Islands</option>
											<option value="Cape Verde">Cape Verde</option>
											<option value="Cayman Islands">Cayman Islands</option>
											<option value="Central African Republic">Central African Republic</option>
											<option value="Chad">Chad</option>
											<option value="Channel Islands">Channel Islands</option>
											<option value="Chile">Chile</option>
											<option value="China">China</option>
											<option value="Christmas Island">Christmas Island</option>
											<option value="Cocos Island">Cocos Island</option>
											<option value="Colombia">Colombia</option>
											<option value="Comoros">Comoros</option>
											<option value="Congo">Congo</option>
											<option value="Cook Islands">Cook Islands</option>
											<option value="Costa Rica">Costa Rica</option>
											<option value="Cote DIvoire">Cote DIvoire</option>
											<option value="Croatia">Croatia</option>
											<option value="Cuba">Cuba</option>
											<option value="Curaco">Curacao</option>
											<option value="Cyprus">Cyprus</option>
											<option value="Czech Republic">Czech Republic</option>
											<option value="Denmark">Denmark</option>
											<option value="Djibouti">Djibouti</option>
											<option value="Dominica">Dominica</option>
											<option value="Dominican Republic">Dominican Republic</option>
											<option value="East Timor">East Timor</option>
											<option value="Ecuador">Ecuador</option>
											<option value="Egypt">Egypt</option>
											<option value="El Salvador">El Salvador</option>
											<option value="Equatorial Guinea">Equatorial Guinea</option>
											<option value="Eritrea">Eritrea</option>
											<option value="Estonia">Estonia</option>
											<option value="Ethiopia">Ethiopia</option>
											<option value="Falkland Islands">Falkland Islands</option>
											<option value="Faroe Islands">Faroe Islands</option>
											<option value="Fiji">Fiji</option>
											<option value="Finland">Finland</option>
											<option value="France">France</option>
											<option value="French Guiana">French Guiana</option>
											<option value="French Polynesia">French Polynesia</option>
											<option value="French Southern Ter">French Southern Ter</option>
											<option value="Gabon">Gabon</option>
											<option value="Gambia">Gambia</option>
											<option value="Georgia">Georgia</option>
											<option value="Germany">Germany</option>
											<option value="Ghana">Ghana</option>
											<option value="Gibraltar">Gibraltar</option>
											<option value="Great Britain">Great Britain</option>
											<option value="Greece">Greece</option>
											<option value="Greenland">Greenland</option>
											<option value="Grenada">Grenada</option>
											<option value="Guadeloupe">Guadeloupe</option>
											<option value="Guam">Guam</option>
											<option value="Guatemala">Guatemala</option>
											<option value="Guinea">Guinea</option>
											<option value="Guyana">Guyana</option>
											<option value="Haiti">Haiti</option>
											<option value="Hawaii">Hawaii</option>
											<option value="Honduras">Honduras</option>
											<option value="Hong Kong">Hong Kong</option>
											<option value="Hungary">Hungary</option>
											<option value="Iceland">Iceland</option>
											<option value="Indonesia">Indonesia</option>
											<option value="India">India</option>
											<option value="Iran">Iran</option>
											<option value="Iraq">Iraq</option>
											<option value="Ireland">Ireland</option>
											<option value="Isle of Man">Isle of Man</option>
											<option value="Israel">Israel</option>
											<option value="Italy">Italy</option>
											<option value="Jamaica">Jamaica</option>
											<option value="Japan">Japan</option>
											<option value="Jordan">Jordan</option>
											<option value="Kazakhstan">Kazakhstan</option>
											<option value="Kenya">Kenya</option>
											<option value="Kiribati">Kiribati</option>
											<option value="Korea North">Korea North</option>
											<option value="Korea Sout">Korea South</option>
											<option value="Kuwait">Kuwait</option>
											<option value="Kyrgyzstan">Kyrgyzstan</option>
											<option value="Laos">Laos</option>
											<option value="Latvia">Latvia</option>
											<option value="Lebanon">Lebanon</option>
											<option value="Lesotho">Lesotho</option>
											<option value="Liberia">Liberia</option>
											<option value="Libya">Libya</option>
											<option value="Liechtenstein">Liechtenstein</option>
											<option value="Lithuania">Lithuania</option>
											<option value="Luxembourg">Luxembourg</option>
											<option value="Macau">Macau</option>
											<option value="Macedonia">Macedonia</option>
											<option value="Madagascar">Madagascar</option>
											<option value="Malaysia">Malaysia</option>
											<option value="Malawi">Malawi</option>
											<option value="Maldives">Maldives</option>
											<option value="Mali">Mali</option>
											<option value="Malta">Malta</option>
											<option value="Marshall Islands">Marshall Islands</option>
											<option value="Martinique">Martinique</option>
											<option value="Mauritania">Mauritania</option>
											<option value="Mauritius">Mauritius</option>
											<option value="Mayotte">Mayotte</option>
											<option value="Mexico">Mexico</option>
											<option value="Midway Islands">Midway Islands</option>
											<option value="Moldova">Moldova</option>
											<option value="Monaco">Monaco</option>
											<option value="Mongolia">Mongolia</option>
											<option value="Montserrat">Montserrat</option>
											<option value="Morocco">Morocco</option>
											<option value="Mozambique">Mozambique</option>
											<option value="Myanmar">Myanmar</option>
											<option value="Nambia">Nambia</option>
											<option value="Nauru">Nauru</option>
											<option value="Nepal">Nepal</option>
											<option value="Netherland Antilles">Netherland Antilles</option>
											<option value="Netherlands">Netherlands (Holland, Europe)</option>
											<option value="Nevis">Nevis</option>
											<option value="New Caledonia">New Caledonia</option>
											<option value="New Zealand">New Zealand</option>
											<option value="Nicaragua">Nicaragua</option>
											<option value="Niger">Niger</option>
											<option value="Nigeria">Nigeria</option>
											<option value="Niue">Niue</option>
											<option value="Norfolk Island">Norfolk Island</option>
											<option value="Norway">Norway</option>
											<option value="Oman">Oman</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Palau Island">Palau Island</option>
											<option value="Palestine">Palestine</option>
											<option value="Panama">Panama</option>
											<option value="Papua New Guinea">Papua New Guinea</option>
											<option value="Paraguay">Paraguay</option>
											<option value="Peru">Peru</option>
											<option value="Phillipines">Philippines</option>
											<option value="Pitcairn Island">Pitcairn Island</option>
											<option value="Poland">Poland</option>
											<option value="Portugal">Portugal</option>
											<option value="Puerto Rico">Puerto Rico</option>
											<option value="Qatar">Qatar</option>
											<option value="Republic of Montenegro">Republic of Montenegro</option>
											<option value="Republic of Serbia">Republic of Serbia</option>
											<option value="Reunion">Reunion</option>
											<option value="Romania">Romania</option>
											<option value="Russia">Russia</option>
											<option value="Rwanda">Rwanda</option>
											<option value="St Barthelemy">St Barthelemy</option>
											<option value="St Eustatius">St Eustatius</option>
											<option value="St Helena">St Helena</option>
											<option value="St Kitts-Nevis">St Kitts-Nevis</option>
											<option value="St Lucia">St Lucia</option>
											<option value="St Maarten">St Maarten</option>
											<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
											<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
											<option value="Saipan">Saipan</option>
											<option value="Samoa">Samoa</option>
											<option value="Samoa American">Samoa American</option>
											<option value="San Marino">San Marino</option>
											<option value="Sao Tome & Principe">Sao Tome & Principe</option>
											<option value="Saudi Arabia">Saudi Arabia</option>
											<option value="Senegal">Senegal</option>
											<option value="Seychelles">Seychelles</option>
											<option value="Sierra Leone">Sierra Leone</option>
											<option value="Singapore">Singapore</option>
											<option value="Slovakia">Slovakia</option>
											<option value="Slovenia">Slovenia</option>
											<option value="Solomon Islands">Solomon Islands</option>
											<option value="Somalia">Somalia</option>
											<option value="South Africa">South Africa</option>
											<option value="Spain">Spain</option>
											<option value="Sri Lanka">Sri Lanka</option>
											<option value="Sudan">Sudan</option>
											<option value="Suriname">Suriname</option>
											<option value="Swaziland">Swaziland</option>
											<option value="Sweden">Sweden</option>
											<option value="Switzerland">Switzerland</option>
											<option value="Syria">Syria</option>
											<option value="Tahiti">Tahiti</option>
											<option value="Taiwan">Taiwan</option>
											<option value="Tajikistan">Tajikistan</option>
											<option value="Tanzania">Tanzania</option>
											<option value="Thailand">Thailand</option>
											<option value="Togo">Togo</option>
											<option value="Tokelau">Tokelau</option>
											<option value="Tonga">Tonga</option>
											<option value="Trinidad & Tobago">Trinidad & Tobago</option>
											<option value="Tunisia">Tunisia</option>
											<option value="Turkey">Turkey</option>
											<option value="Turkmenistan">Turkmenistan</option>
											<option value="Turks & Caicos Is">Turks & Caicos Is</option>
											<option value="Tuvalu">Tuvalu</option>
											<option value="Uganda">Uganda</option>
											<option value="United Kingdom">United Kingdom</option>
											<option value="Ukraine">Ukraine</option>
											<option value="United Arab Erimates">United Arab Emirates</option>
											<option value="United States of America">United States of America</option>
											<option value="Uraguay">Uruguay</option>
											<option value="Uzbekistan">Uzbekistan</option>
											<option value="Vanuatu">Vanuatu</option>
											<option value="Vatican City State">Vatican City State</option>
											<option value="Venezuela">Venezuela</option>
											<option value="Vietnam">Vietnam</option>
											<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
											<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
											<option value="Wake Island">Wake Island</option>
											<option value="Wallis & Futana Is">Wallis & Futana Is</option>
											<option value="Yemen">Yemen</option>
											<option value="Zaire">Zaire</option>
											<option value="Zambia">Zambia</option>
											<option value="Zimbabwe">Zimbabwe</option>
											</select>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>

					<!-- step 6 -->
					<div class="tab">
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
										<h4>Start Date <i class="fas fa-pencil-alt"></i></h4>
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
										<h4>offer Selected <i class="fas fa-pencil-alt"></i></h4>
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
										<h4>Payment information <i class="fas fa-pencil-alt"></i></h4>
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
					<div class="tab">
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

