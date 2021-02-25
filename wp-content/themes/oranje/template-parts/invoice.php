
<section class="invoice-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="text-align: right; padding-bottom:40px;"><h4>INVOICE: <?=$order->order_reference_id?></h4></div>

                <div class="row">
                    <div class="col-lg-6"><h5 class="order-date"><b>Order Date:</b> <?=date("M d, Y", strtotime($order->created))?></h5></div>
                    <div class="col-lg-6" style="text-align: right;"><h5 class="order-date"><b>Booking Start Date:</b> <?=date("M d, Y", strtotime($order->booking_start_date))?></h5></div>
                </div>
                
                <div class="order-address-wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-order-address">   
                                <h4>Customer Details</h4>
                                <p>Name: <?=$order->name?></p>
                                <p>Company Name: <?=$order->cardinfo['company_name']?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-order-address" style="text-align: right;">
                                <h4>Service Address</h4>
                                <p><?=$order->cardinfo['service_address']?></p>
                                <p>Zipcode: <?=$order->zipcode?></p>
                                <p>City: <?=$order->cardinfo['city']?></p>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product-info-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><h5 class="product-title">
                                Product
                            </h5></th>
                            <th scope="col"><h5 class="product-title">Service / Hour</h5></th>
                            <th scope="col"><h5 class="product-title">Total Hours</h5></th>
                            <th scope="col"><h5 class="product-title">Price</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <?=$order->selected_product['post_title']?>
                                </td>
                                <td></td>
                                <td></td>
                                <td> $<?=price_format($order->selected_product['regular_price'])?> </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    Carpet: (<?=$order->carpet?>%) <?=$order->selected_product['price_rules']['carpet']['area']?>SF
                                </td>                                
                                <td></td>
                                <td><?=price_format($order->selected_product['price_rules']['carpet']['total_hours'])?></td>
                                <td></td>
                            </tr>                            
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> Carpet production Rate
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['carpet']['production_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> Industry Type: <?=$order->industry?>
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['carpet']['industry_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> Density: <?=$order->sqf / $order->peoples?>
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['carpet']['density_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            <tr>
                                <th scope="row">6</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> <?=$order->selected_product['selected_frequency_text']?>
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['carpet']['frequency_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            
                            <tr>
                                <th scope="row">7</th>
                                <td>
                                    Hard Floor: (<?=$order->hard_surface?>%) <?=$order->selected_product['price_rules']['hard_floor']['area']?>SF
                                </td>
                                <td></td>
                                <td><?=price_format($order->selected_product['price_rules']['hard_floor']['total_hours'])?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> Hard Floor production Rate
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['hard_floor']['production_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            <tr>
                                <th scope="row">9</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> Industry Type: <?=$order->industry?>
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['hard_floor']['industry_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            <tr>
                                <th scope="row">10</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> Density: <?=$order->sqf / $order->peoples?>
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['hard_floor']['density_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>                         
                            <tr>
                                <th scope="row">11</th>
                                <td>
                                    <span style="width:30px;display: inline-block;"></span> <?=$order->selected_product['selected_frequency_text']?>
                                </td>                                
                                <td><?=price_format($order->selected_product['price_rules']['hard_floor']['frequency_rate'])?></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th scope="row">12</th>
                                <td>
                                    Total hours per service
                                </td>                                
                                <td></td>
                                <td><?=price_format($order->selected_product['price_rules']['total_service_hours'])?></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <th scope="row">13</th>
                                <td>
                                    <?=$order->selected_product['selected_frequency_text']?>
                                </td>
                                <td><?=price_format( $order->selected_product['selected_frequency_val'] )?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">14</th>
                                <td></td>                                
                                <td></td>
                                <td><h6>Subtotal:</h6></td>
                                <td> $<?=price_format( $order->selected_product['total_price'] )?> </td>                                
                            </tr>
                            <?php if( property_exists($order, 'offer') and isset($order->offer['total_discount']) ) : ?>
                                <tr>
                                    <th scope="row">15</th>
                                    <td><h6> <?=$order->offer['post_title']?> </h6></td>
                                    <td></td>
                                    <td><h6>Discount:</h6></td>
                                    <td> -$<?=price_format( $order->offer['total_discount'] )?> </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th scope="row"></th>
                                <td></td>                                
                                <td></td>
                                <td><h6>Total:</h6></td>
                                <td> $<?=price_format( $order->final_price )?> </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if($order->cardinfo['has_different_billing_address'] == 'true' or $order->cardinfo['has_different_billing_address'] === true) : ?>
            <div class="col-lg-12">
                <div class="customer-details">
                    <h4>Billing Address</h4>                    
                    <p>City: <?=$order->cardinfo['different_billing_address']['city']?></p>
                    <p>State: <?=$order->cardinfo['different_billing_address']['state']?></p>
                    <p>Zipcode: <?=$order->cardinfo['different_billing_address']['zipcode']?></p>
                    <p>Country: <?=$order->cardinfo['different_billing_address']['country']?></p>                    
                </div>
            </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>