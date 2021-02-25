jQuery( document ).ready(function($) {

    if( $('#regForm').length > 0 ) {

        // form default values for debug
        $("#name").val("Arifin");
        $("#email").val("test@gmail.com");
        $("#zip_code").val("1000");
        $("#sqf").val("5000");

        $("#company_name").val('CreativeCloud');
        $("#card_number").val('4444 4444 4444 4444');
        $("#name_on_card").val('Arifin');
        $("#city").val('Dhaka');
        $("#zipcode").val(1212);
        $("#service_address").val('Thana Road');
        $("#card_expire_date").val('12/21');
        $("#street").val('Thana Road');
        $("#state").val('Dhaka');
                

        // Instantiate a slider
        var mySlider = $("input.range-slider").bootstrapSlider();
        mySlider.on('slide', function(val){
            $("#range-min-val").text( val.value );
            $("#range-max-val").text( (100 - val.value*1) );
        });
        

        var form_tab_elements = document.getElementsByClassName('tab cleaning-tab');
        var currentTab = 0 // Current tab is set to be the first tab (0)
        showTab(currentTab) // Display the current tab

        var formdata = [];
        var products = [];

        $( "#inline-datepicker" ).datepicker({ 
            minDate: 0, maxDate: "+12M",
            changeMonth: true, changeYear: true,
            dateFormat: 'yy-mm-dd',
            onSelect: function(date, datepicker) {
                $('#booking_start_date').val(date);
                formdata[0].booking_start_date = date;
            }
        });

        $(".step-buttons button").on("click", function() {

            var goPrevNext = $(this).attr('data-prevnext');

            if( goPrevNext == 1 && validateForm() ) {

                $(".loading-wrapper").show();

                var param = {
                    action: 'process_book_form_calculation', form_step: currentTab,                
                };

                if(currentTab == 0) {
                    formdata[0] = {
                        name: $('#regForm input[name=name]').val(),
                        zip_code: $('#regForm [name=zip_code]').val(),
                        industry: $('#regForm select[name=industry]').val(),
                        email: $('#regForm input[name=email]').val(),
                        sqf: $('#regForm input[name=sqf]').val(),
                        peoples: $('#regForm select[name=peoples]').val(),
                        hard_surface: $("#range-min-val").text(),
                        carpet: $("#range-max-val").text(),
                    };
                    param.formdata = formdata;
                }
                else if(currentTab == 5) { // after preview. submit form data to order table.                    
                    param.formdata = formdata;
                }

                $(".step-buttons button").prop("disabled",true);
                
                $.post(site.ajaxurl, param, function(response){
                    response = JSON.parse(response);
                    
                    if( response.data.form_step == 0 ) {                        
                        products = response.products;
                        if( response.status == 'failed' ) {
                            if( response.error == 'zip_code_not_found' || response.error == 'max_square_feet_exceeded' ) {
                                window.location.href = site.home_url + '/contact-us/?e=' + response.error;
                                formdata = [];
                                return;
                            }
                        }
                    }
                    else if(response.data.form_step == 5 ) { // after submit form data to order table.  
                        console.log(response);
                        if( response.status == 'success' ) {
                            $("#success_step_message").html( response.order_success_message );
                            $('.step-buttons').hide();
                        }
                        else if(response.status == 'failed') {
                            $("#success_step_message").html( response.order_failed_message );
                            $('.step-buttons').hide();
                        }
                    }
                    
                    $(".step-buttons button").removeAttr("disabled");
                    $(".loading-wrapper").hide();

                    nextPrev(1);
                    // If the valid status is true, mark the step as finished and valid:                
                    document.getElementsByClassName('step')[response.data.form_step].className += ' finish'; 

                });
                

                
            }
            else if( goPrevNext == -1 ) {
                nextPrev(-1);
            }

        });

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = form_tab_elements;            
            x[n].style.display = 'block';            
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById('prevBtn').style.display = 'none'
            } else {
                document.getElementById('prevBtn').style.display = 'inline'
            }
            if (n == x.length - 1) {
                document.getElementById('nextBtn').innerHTML = 'Submit'
            } else {
                document.getElementById('nextBtn').innerHTML = 'Next Step'
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
            stepLoaded(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = form_tab_elements;
            // Exit the function if any field in the current tab is invalid:
            // if (n == 1 && !validateForm()) return false
            
            // Hide the current tab:
            x[currentTab].style.display = 'none'
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById('regForm').submit()
                return false
            }
            // Otherwise, display the correct tab:
            showTab(currentTab)
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x,
                y,
                i,
                valid = true
            x = form_tab_elements;
            y = x[currentTab].getElementsByTagName('input')
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                if( $( y[i] ).prop('disabled') ) continue;
                if( $( y[i] ).attr('type') === 'radio' ) {
                    if( $('input[name="'+ $( y[i] ).attr('name') +'"]:checked').val() == undefined || $('input[name="'+ $( y[i] ).attr('name') +'"]:checked').val() == "")
                    {
                        valid = false;
                        y[i].className += ' invalid'
                    }
                }
                else if( $( y[i] ).attr('type') === 'email' ) {
                    if(! y[i].validity.valid ) {
                        valid = false;
                        y[i].className += ' invalid'
                    }
                }
                else if (y[i].value == '') {
                    // add an "invalid" class to the field:
                    y[i].className += ' invalid'
                    // and set the current valid status to false
                    valid = false
                }                
            } 
            return valid // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i,
                x = document.getElementsByClassName('step')
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(' active', '')
            }
            //... and adds the "active" class on the current step:
            x[n].className += ' active'
        }


        function stepLoaded(n) {
            if(n===1) {
                step_1_updateFrequencyRates();
                
            }
            else if(n===2) {
                step_2_updateSelectedTotalPrice();
                
            }
            else if(n===5) {
                formdata[0].cardinfo = {};
                formdata[0].cardinfo.company_name = $("#company_name").val();
                formdata[0].cardinfo.card_number = $("#card_number").val();
                formdata[0].cardinfo.name_on_card = $("#name_on_card").val();
                formdata[0].cardinfo.city = $("#city").val();
                formdata[0].cardinfo.zipcode = $("#zipcode").val();
                formdata[0].cardinfo.service_address = $("#service_address").val();
                formdata[0].cardinfo.card_expire_date = $("#card_expire_date").val();
                formdata[0].cardinfo.street = $("#street").val();
                formdata[0].cardinfo.state = $("#state").val();
                formdata[0].cardinfo.country = $("#country").val();
                formdata[0].cardinfo.check_me_out = $("#check_me_out").is(':checked');
                formdata[0].cardinfo.has_different_billing_address = $("#has_different_billing_address").is(':checked');
                formdata[0].cardinfo.different_billing_address = {};
                formdata[0].cardinfo.different_billing_address.city = $("#city-2").val();
                formdata[0].cardinfo.different_billing_address.state = $("#state-2").val();
                formdata[0].cardinfo.different_billing_address.zipcode = $("#zipcode-2").val();
                formdata[0].cardinfo.different_billing_address.country = $("#country-2").val();
                
                // console.log( products );
                // console.log( formdata );

                $("#view_name").text( formdata[0].name );
                $("#view_zip_code").text( formdata[0].zip_code );
                $("#view_industry").text( formdata[0].industry );
                $("#view_hard_surface").text( formdata[0].hard_surface );
                $("#view_email").text( formdata[0].email );
                $("#view_sqf").text( formdata[0].sqf );
                $("#view_carpet").text( formdata[0].carpet );
                $("#view_selected_product_title").text( formdata[0].selected_product.post_title );
                $("#view_booking_start_date").text( formdata[0].booking_start_date );
                if( 'offer' in formdata[0] && 'post_title' in formdata[0].offer ) {
                    $("#view_offer_title").text( formdata[0].offer.post_title );
                    $("#view_offer_details").text( formdata[0].offer.acf.details );
                    formdata[0].offer.acf.rules.offer_rate = parseFloat( formdata[0].offer.acf.rules.offer_rate ).toFixed(2);
                    $("#view_offer_price_rate").text( 
                        'Save $' + formdata[0].offer.acf.rules.offer_rate
                    );
                    $("#view_offer_expired_date").text( 
                        formdata[0].offer.acf.expired_date 
                    );
                }                
                $("#view_cc_company_name").text( formdata[0].cardinfo.company_name );
                $("#view_cc_card_number").text( formdata[0].cardinfo.card_number );
                $("#view_cc_name_on_card").text( formdata[0].cardinfo.name_on_card );
                $("#view_cc_zipcode").text( formdata[0].cardinfo.zipcode );
                $("#view_cc_service_address").text( formdata[0].cardinfo.service_address );
                $("#view_cc_card_expire_date").text( formdata[0].cardinfo.card_expire_date );
                $("#view_cc_street").text( formdata[0].cardinfo.street );                                
            }
            
        }

        function step_2_updateSelectedTotalPrice() {
            var selected_product_id = $('input[name="product_id"]:checked').val();
            $.each( products, function(index, product) {
                if( product.ID == selected_product_id ) {
                    formdata[0].selected_product = product;
                    return false;
                }
            } );            
        }


        function step_1_updateFrequencyRates() {
            $.each( products, function(index, product){
                var el_product_frequency = "#frequency_select_"+product.ID;
                // products[index].price_rule.
                products[index].selected_frequency_val = $(el_product_frequency).val();
                var selected_frequency_val = $(el_product_frequency).val();
                products[index].selected_frequency_text = $(el_product_frequency + " option:selected" ).text();  
                var selected_frequency_text = $(el_product_frequency + " option:selected" ).text();               
                
                $.each(product.acf.frequency, function(i, val){
                    if( val.option.value == selected_frequency_val && val.option.label == selected_frequency_text ) {              
                        if( val.production_rate != 0 ) {
                            products[index].price_rules.carpet.frequency_rate = ( product.price_rules.carpet.production_rate / 100 ) * val.production_rate;
                            products[index].price_rules.hard_floor.frequency_rate = ( product.price_rules.hard_floor.production_rate / 100 ) * val.production_rate;
                        }                                                
                        return false;
                    }
                });
                updateProductPrice(product.ID);
                var price = products[index].total_price;
                $('#total_price_val_' + product.ID).val( price );                
                $("#total-price-" + product.ID + " span" ).html( '$' + price );

            } );            
        }

        function updateProductPrice(product_id) {
            $.each(products, function(index, product){
                if( product.ID == product_id ) {
                    p = products[index].price_rules;
                    products[index].price_rules.carpet.total_hours = p.carpet.density_rate + p.carpet.frequency_rate + p.carpet.industry_rate + p.carpet.production_rate;                    
                    products[index].price_rules.hard_floor.total_hours = p.hard_floor.density_rate + p.hard_floor.frequency_rate + p.hard_floor.industry_rate + p.hard_floor.production_rate;
                    products[index].price_rules.total_service_hours = products[index].price_rules.carpet.total_hours + products[index].price_rules.hard_floor.total_hours;

                    products[index].total_price = (products[index].price_rules.total_service_hours * products[index].regular_price * products[index].selected_frequency_val).toFixed(2);            
                    return false;
                }
            });
        }


        var frequency_elm = $("[data-frequency=change]");		
		frequency_elm.on('change', function (e) {
			step_1_updateFrequencyRates();
		});


        $('.single-special-offer-apply').on('click', function () {
            
            $('.single-special-offer-apply').removeClass('active-offer');
            $(this).addClass('active-offer');

            var selected_offer_id = $(this).attr('data-offerid');
            $("#selected_offer").val( selected_offer_id );
            formdata[0].selected_offer_id = selected_offer_id
            
            $(".loading-wrapper").show();

            // console.log(formdata, products);

            var param = {
                action: 'process_book_form_calculation', form_step: currentTab,                
            };
            param.formdata = formdata;
            
            $.post(site.ajaxurl, param, function(response) {
                response = JSON.parse(response);
                // console.log(response);
                $(".loading-wrapper").hide();

                if( response.status == 'success' ) {
                    formdata[0].offer = response.offer;
                }

            });
            

            
        });


        $('#has_different_billing_address').on('click', function() {
            if( $( this ).is(':checked') ) {
                $("#city-2").removeAttr('disabled');
                $("#state-2").removeAttr('disabled');
                $("#zipcode-2").removeAttr('disabled');
                $("#country-2").removeAttr('disabled');                      
            }
            else {
                $("#city-2").prop( "disabled", true );
                $("#state-2").prop( "disabled", true );
                $("#zipcode-2").prop( "disabled", true );
                $("#country-2").prop( "disabled", true );                             
            }
            $('select').niceSelect('update');
        });


        // credit card input field formatter
        $('#card_number').payment('formatCardNumber');
        $('#card_expire_date').payment('formatCardExpiry');


        // goto any tab from preview step
        $(".goto_form_step").on('click', function(e) {
            e.preventDefault();
            form_tab_elements[ currentTab ].style.display = 'none';
            currentTab = parseInt( $(this).attr('data-showtab') );
            showTab( currentTab );
        });


    }

    // disinfection multistep from 
    if( $('#disinfection_form').length > 0 ) {
        var disinfection_data = {};
        

        var disinfection_form = $("#disinfection_form");
        disinfection_form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });       

        var disinfection_steps = $("#disinfection_steps").steps({
            headerTag: "h2",
            titleTemplate: '<span class="step">#title#<span>#index#</span></span>',
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onInit: function(event, currentIndex) {
                autofill_disinfection(currentIndex);
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {                
                // validate when try to go next
                if( newIndex > currentIndex ) {
                    disinfection_form.validate().settings.ignore = ":disabled,:hidden";

                    if( (currentIndex == 0) && (disinfection_form.valid() === true) )  {
                        save_disinfection_step_one_data();
                    }
                    else if( (currentIndex == 1) && (disinfection_form.valid() === true) )  {
                        save_disinfection_step_two_data();
                    }

                    if( $(event.target).find('.body.current #disinfection_selected_offer').length > 0 ) {
                        apply_disinfection_offer();
                    }  
                    else if( $(event.target).find('.body.current .credit-cart-info').length > 0 ) {
                        save_disinfection_cardinfo();
                    }                   
                    

                    return disinfection_form.valid();
                }
                return true;
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                autofill_disinfection(currentIndex, event);

                console.log( disinfection_data );
                if( priorIndex == 0 ) {
                    disinfection_zip_code_availability();
                }
                if( currentIndex == 2 ) {
                    disinfection_inline_calender();
                }
                
            },
            onFinishing: function (event, currentIndex)
            {
                disinfection_form.validate().settings.ignore = ":disabled";
                return disinfection_form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                console.log("Submitted and finished!");
            }
        });


        function save_disinfection_step_one_data() {
            disinfection_data.name = $("#disinfection_name").val();
            disinfection_data.email = $("#disinfection_email").val();
            disinfection_data.zip_code = $("#disinfection_zip_code").val();
            disinfection_data.sqft = $("#disinfection_sqft").val();
        }
        function save_disinfection_step_two_data() {
            disinfection_data.selected_product_id = $('input[name="disinfection_product_id"]:checked').val();
            disinfection_data.total_price = disinfection_data.products[ disinfection_data.selected_product_id ].total_price;

        }
        
        function disinfection_zip_code_availability() {
            $('.loading-wrapper').show(); 
            $.post(site.ajaxurl, {action: "disinfection_zip_code_availability", zip_code: disinfection_data.zip_code }, function(res) {
                $('.loading-wrapper').hide(); 
                res = JSON.parse(res);                
                if(res.status == 'success') {                    
                    if( res.zip_code_available != true ) {
                        window.location.href = site.home_url + '/contact-us?di=zip_code_not_found';
                    }

                    disinfection_update_product_price();
                }
            });
        }

        function disinfection_update_product_price() {
            $('.loading-wrapper').show(); 
            $.post(site.ajaxurl, {action: 'disinfection_update_total_price', formdata: disinfection_data}, function ( res ) {
                $('.loading-wrapper').hide(); 
                res = JSON.parse(res);                
                if(res.status == 'success') {                    
                    disinfection_data.products = res.products;
                    $.each( res.products, function(product_id, product) {
                        $('#disinfection-total-price-' + product_id).html( 'Total <span>$'+ product.total_price +'</span>' );
                    } );
                }
            });
        }

        function disinfection_inline_calender() {
            $( "#disinfection-inline-datepicker" ).datepicker({ 
                minDate: 0, maxDate: "+12M",
                changeMonth: true, changeYear: true,
                dateFormat: 'yy-mm-dd',
                onSelect: function(date, datepicker) {
                    $('#disinfection_booking_start_date').val(date);
                    disinfection_data.booking_start_date = date;
                }
            });
        }


        $('.disinfection-offer-apply').on('click', function () {
            $('.disinfection-offer-apply').removeClass('active-offer');
            $(this).addClass('active-offer');

            var selected_offer_id = $(this).attr('data-disinfection_offerid');
            $("#disinfection_selected_offer").val( selected_offer_id );
            disinfection_data.selected_offer_id = selected_offer_id; 
        });

        function apply_disinfection_offer() {
            $('.loading-wrapper').show(); 
            $.post(site.ajaxurl, {action: 'apply_disinfection_offer', formdata: disinfection_data}, function ( res ) {
                $('.loading-wrapper').hide(); 
                res = JSON.parse(res);                
                if(res.status == 'success') {                    
                    disinfection_data.offer = res.offer;
                    disinfection_data.offer_price_applied = res.offer_price_applied;
                    if( res.offer_price_applied == 1 ) {
                        disinfection_data.total_price = res.total_price;
                    }
                }
            });
        }

        function save_disinfection_cardinfo() {
            disinfection_data.company_name = $("#disinfection_company_name").val();
            disinfection_data.card_number = $("#disinfection_card_number").val();
            disinfection_data.name_on_card = $("#disinfection_name_on_card").val();
            disinfection_data.city = $("#disinfection_city").val();
            disinfection_data.zipcode = $("#disinfection_zipcode").val();
            disinfection_data.address = $("#disinfection_address").val();
            disinfection_data.card_expire_date = $("#disinfection_card_expire_date").val();
            disinfection_data.card_cvv = $("#disinfection_card_cvv").val();
            disinfection_data.state = $("#disinfection_state").val();
            disinfection_data.country = $("#disinfection_state").val();
            disinfection_data.pay_by_invoice = $('#disinfection_pay_by_invoice').is(":checked");
            disinfection_data.consumable = $('#disinfection_consumable').is(":checked");
            disinfection_data.terms_of_service = $('#disinfection_terms_of_service').is(":checked");
            
            $('.loading-wrapper').show(); 
            $.post(site.ajaxurl, {action: 'apply_disinfection_cardinfo', formdata: disinfection_data}, function ( res ) {
                $('.loading-wrapper').hide(); 
                res = JSON.parse(res);                
                if(res.status == 'success') {                    
                    
                }
            });
        }


        $('#disinfection_card_number').payment('formatCardNumber');
        $('#disinfection_card_expire_date').payment('formatCardExpiry');


        function autofill_disinfection($step, event) {
            if( $step == 0 ) {                
                $("#disinfection_name").val('Arifin Billah');
                $("#disinfection_email").val('billah.arifin@gmail.com');
                $("#disinfection_zip_code").val(1000);
                $("#disinfection_sqft").val(5000);            
            }

            if( $(event.target).find('.body.current .credit-cart-info').length > 0 ) {
                $("#disinfection_company_name").val('My company');
                $("#disinfection_card_number").val('4444 4444 4444 4444');
                $("#disinfection_name_on_card").val('Arifin Billah');
                $("#disinfection_city").val('Dhaka');
                $("#disinfection_zipcode").val(1000);
                $("#disinfection_address").val('Banani 11');
                $("#disinfection_card_expire_date").val('01/23');
                $("#disinfection_card_cvv").val(123);
                $("#disinfection_state").val('Dhaka');
                                
            }
        }

        


    }

});