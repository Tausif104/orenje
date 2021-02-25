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
					</div>
					<!-- step 1 -->
					<div class="tab">
						<h4>Collect info we need to provide pricing</h4>
						<div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label for="name">Your Name</label>
									<input type="text" id="name" class="form-control" placeholder="Name" oninput="this.className = '' " name="name">
								</div>
								<div class="form-group">
									<label for="zipcode">Zip Code</label>
									<input type="number" id="zipcode" class="form-control" placeholder="Zip Code" oninput="this.className = '' " name="zipcode">
								</div>
								<div class="form-group">
									<label for="industry">Industry</label>
									<input type="text" id="industry" class="form-control" placeholder="Industry Name" oninput="this.className = '' " name="industry">
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label for="email">Email Address*</label>
									<input type="email" id="email" class="form-control" placeholder="Email Address" oninput="this.className = '' " name="email" required>
								</div>
								<div class="form-group">
									<label for="sqf">Square Footage</label>
									<input type="text" id="sqf" class="form-control" placeholder="Square Footage (sq.)" oninput="this.className = '' " name="sqf" >
								</div>
								<div class="form-group">
									<h4>Employees</h4>
									<select name="" id="">
										<option value="20-people" default>20 People</option>
										<option value="30-people" default>30 People</option>
										<option value="40-people" default>40 People</option>
										<option value="50-people" default>50 People</option>
										<option value="60-people" default>60 People</option>
									</select>
								</div>
							</div>
							<div class="col-xl-10">
								<div class="total-floor">
									<h4>Total Floor</h4>
									<div class="row">
										<div class="col-xl-6">
											<div class="form-group">
												<label for="surface">Hard Surface Floor</label>
												<input type="range" class="form-control-range" id="surface" name="surface">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<label for="carpet">Carpet</label>
												<input type="range" class="form-control-range" id="carpet" name="carpet">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 my-auto text-center">
								100%
							</div>
						</div>
					</div>
                    <!-- step 2 -->
					<div class="tab">
						<div class="row">
							<div class="col-xl-12">
								<h4>Three pricing options are displayed</h4>
							</div>
							<!-- pricing box -->
							<div class="col-xl-4">
								<div class="pricing-box">
									<div class="pricing-box-header">
										<h3><span></span> Gold</h3>
										<p class="price">Price/Service <span>$50</span></p>
										<div class="pricing-desc">
											<p>Three pricing options are displayed Three pricing options are displayed options are</p>
										</div>
										<select name="" id="">
											<option value="">1x/ Month</option>
											<option value="">2x/ Month</option>
											<option value="">3x/ Month</option>
											<option value="">4x/ Month</option>
											<option value="">5x/ Month</option>
										</select>
										<p class="total-price">Total <span>$100</span></p>
									</div>
								</div>
							</div>
							<!-- pricing box -->
							<div class="col-xl-4">
								<div class="pricing-box">
									<div class="pricing-box-header">
										<h3><span></span> Silver</h3>
										<p class="price">Price/Service <span>$75</span></p>
										<div class="pricing-desc">
											<p>Three pricing options are displayed Three pricing options are displayed options are</p>
										</div>
										<select name="" id="">
											<option value="">1x/ Month</option>
											<option value="">2x/ Month</option>
											<option value="">3x/ Month</option>
											<option value="">4x/ Month</option>
											<option value="">5x/ Month</option>
										</select>
										<p class="total-price">Total <span>$100</span></p>
									</div>
								</div>
							</div>
							<!-- pricing box -->
							<div class="col-xl-4">
								<div class="pricing-box">
									<div class="pricing-box-header">
										<h3><span></span> Bronze</h3>
										<p class="price">Price/Service <span>$100</span></p>
										<div class="pricing-desc">
											<p>Three pricing options are displayed Three pricing options are displayed options are</p>
										</div>
										<select name="" id="">
											<option value="">1x/ Month</option>
											<option value="">2x/ Month</option>
											<option value="">3x/ Month</option>
											<option value="">4x/ Month</option>
											<option value="">5x/ Month</option>
										</select>
										<p class="total-price">Total <span>$100</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <!-- step 3 -->
					<div class="tab">
						<div class="row">
							<div class="col-xl-12">
								<div class="calendar-wrapper">
									<h4>Calendar to select their start date</h4>
									<div id="calendar"></div>
								</div>
							</div>
						</div>
					</div>
                    <!-- step 4 -->
					<div class="tab">
						<div class="special-offers-wrapper">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="calendar-wrapper">
                                        <h4>Special Offers</h4>
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- offer -->
                                <div class="col-xl-6">
                                    <div class="single-special-offer">
                                        <div class="active-cart-badge">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>Cart Now!</span>
                                        </div>
                                        <div class="single-special-offer-inner">
                                            <h5>$25 OFF CARPET CLEANING</h5>
                                            <p>total INVOICE FOR CARPET CLEANING MUST BE EQUAL TO OF HIGHER THANT $100</p>
                                            <div class="offer-price">
                                                <h6 class="price">Save $15.00</h6>
                                                <p>Offer good through 11/11/2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="single-special-offer">
                                        <div class="active-cart-badge">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>Cart Now!</span>
                                        </div>
                                        <div class="single-special-offer-inner">
                                            <h5>$25 OFF CARPET CLEANING</h5>
                                            <p>total INVOICE FOR CARPET CLEANING MUST BE EQUAL TO OF HIGHER THANT $100</p>
                                            <div class="offer-price">
                                                <h6 class="price">Save $15.00</h6>
                                                <p>Offer good through 11/11/2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
                    <!-- step 5 -->
					<div class="tab">
                        <div class="credit-cart-info">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h4>Enter credit card information</h4>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="company">Company name</label>
                                        <input type="text" id="company" class="form-control" placeholder="Diven Technology" oninput="this.className = '' " name="company">
                                    </div>
                                    <div class="form-group">
                                        <label for="cardnum">Card Number</label>
                                        <input type="number" id="cardnum" class="form-control" placeholder="Card Number" oninput="this.className = '' " name="cardnum">
                                    </div>
                                    <div class="form-group">
                                        <label for="nameoncard">Name on card</label>
                                        <input type="number" id="nameoncard" class="form-control" placeholder="Name on Card" oninput="this.className = '' " name="nameoncard">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City" oninput="this.className = '' " name="city">
                                    </div>
                                    <div class="form-group">
                                        <label for="zipcode">Zip Code</label>
                                        <input type="number" id="zipcode" class="form-control" placeholder="Zip Code" oninput="this.className = '' " name="zipcode">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="checkmeout">
                                        <label class="form-check-label" for="checkmeout">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="serviceaddr">Service Address</label>
                                        <input type="text" id="serviceaddr" class="form-control" placeholder="Write here Service Location" oninput="this.className = '' " name="serviceaddr">
                                    </div>
                                    <div class="form-group">
                                        <label for="expiredate">Expiration Date</label>
                                        <input type="date" id="expiredate" class="form-control" placeholder="Write here Service Location" oninput="this.className = '' " name="expiredate">
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
                                        <input type="text" id="state" class="form-control" placeholder="country" oninput="this.className = '' " name="state">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="diffaddr">
                                        <label class="form-check-label" for="diffaddr">Billing address is different than service address</label>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City" oninput="this.className = '' " name="city">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" id="state" class="form-control" placeholder="State" oninput="this.className = '' " name="state">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="zipcode">Zipcode</label>
                                        <input type="number" id="zipcode" class="form-control" placeholder="Zipcode" oninput="this.className = '' " name="zipcode">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" id="country" class="form-control" placeholder="Country" oninput="this.className = '' " name="country">
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div style="overflow:auto;">
						<div class="text-center">
							<button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous Step</button>
							<button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next Step</button>
						</div>
					</div>
				</form>
			</div>
			<!-- modal content -->
		</div>
	</div>
</div>
