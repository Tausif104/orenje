<?php 

add_action('wp_ajax_order_status_update', 'ajax_order_status_update');
function ajax_order_status_update() {
    $res = [
        'status' => '',
        'post' => $_POST
    ];

    if( isset($_POST['refid'], $_POST['status_name']) and $_POST['refid'] != '' and $_POST['status_name'] != '' ) {
        global $wpdb;
        $tbl = $wpdb->prefix . 'orders';

        $wpdb->update($tbl, ['status'=>$_POST['status_name'] ], ['order_reference_id'=>$_POST['refid']]);

        $status_list = get_field('order_status', 'option');

        $list = '';
        $bg_color = '#dddddd';
        $text_color = '#000000';
        if($status_list and is_array($status_list) and count($status_list) ) foreach ($status_list as $key => $value) {
            
            if( strtolower($value['status_name']) == strtolower( $_POST['status_name'] ) ) {
                $bg_color = $value['bg_color'];
                $text_color = $value['text_color'];
                continue;
            }
            $list .= sprintf('<a href="#" class="update_order_status" data-refid="%s" data-status="%s">%s</a>', $_POST['refid'], $value['status_name'], $value['status_name']);
        }

        ob_start(); ?>        
        <button style="background-color: <?=$bg_color?>; color: <?=$text_color?>" class="dropbtn"><?=$_POST['status_name']?></button>
        <div class="dropdown-content">
            <?=$list?>
        </div>        
        <?php             
        $res[ 'html_block' ] = ob_get_clean();

        $res['status'] = 'success';
    }

    echo json_encode($res);
    exit;
}


add_action('wp_ajax_get_order_cardinfo', 'ajax_get_order_cardinfo');

function ajax_get_order_cardinfo() {
    $result  = [
        ''
    ];
    $order_reference_id = $_GET['order_reference_id'];

    global $wpdb;;
    $tbl = $wpdb->prefix . 'orders';
    
    $row = $wpdb->get_row( "SELECT * FROM $tbl WHERE order_reference_id='{$order_reference_id}'" );

    $card_info = @unserialize( $row->cardinfo );
    if( $card_info !== false ) {
        echo '<div class="row order_cardinfo">';
        foreach ($card_info as $key => $value) {
            if($key == 'different_billing_address') {
                $ba = @unserialize( $value );
                if( $ba !== false ) {
                    $out = '';
                    foreach ($ba as $key2 => $value2) {
                        $out .= ucfirst( str_replace('_', ' ', $key2) ) . ': <br>' . $value2 . '<br><br>';
                    }
                    echo sprintf('<div class="col-6 odd">%s</div><div class="col-6 even">%s</div>', ucfirst( str_replace('_', ' ', $key) ), $out);
                }                
            }
            else {
                echo sprintf('<div class="col-6 odd">%s</div><div class="col-6 even">%s</div>', ucfirst( str_replace('_', ' ', $key) ), $value);
            }
            
        }
        echo '</div>';

    }

    exit;
}



add_action('wp_ajax_get_orders_data', 'ajax_get_orders_data');
add_action('wp_ajax_nopriv_get_orders_data', 'ajax_get_orders_data');

function ajax_get_orders_data () {
    global $wpdb;
    // DB table to use
    $table = $wpdb->prefix . 'orders';

    $primaryKey = 'order_id';


    $columns = array(
        array( 'db' => 'order_reference_id', 'dt' => 0 ),
        array( 'db' => 'selected_product',  'dt' => 1, 'formatter' => function($d, $row) {
            $d = @unserialize($d);
            if( $d !== false ) {
                $d = (object) $d;
                ob_start(); ?>
                <h5><?=$d->post_title?></h5>
                $<?=price_format($d->acf['price']['regular_price'])?><br>
                <?=$d->selected_frequency_text?><br>

                <?php 
                return ob_get_clean();
            }
            return '';
        } ),
        array( 'db' => 'name',   'dt' => 2,  'formatter' => function($d, $row) {            
            return 
                'Name: ' . $d . '<br>' .
                'Email: ' . $row['email'] . '<br>' .
                'Zipcode: ' . $row['zipcode'];
        } ),
        array( 'db' => 'email',     'dt' => 3 ),
        array( 'db' => 'zipcode',     'dt' => 4 ),
        array( 'db' => 'sqf',     'dt' => 5, 'formatter' => function($d, $row) {            
            return $d.'SQFT<br>' . 
                'Hard Surface: ' . $row['hard_surface'] . '%<br>' .
                'Carpet: ' . $row['carpet'] . '%<br>';
        } ),
        array( 'db' => 'hard_surface',     'dt' => 6 ),
        array( 'db' => 'carpet',     'dt' => 7 ),

        array( 'db' => 'peoples',     'dt' => 8, 'formatter' => function($d, $row) {
            return 
                'Industry: ' . $row['industry'] . '<br>' .
                'People: ' . $d . '<br>' .
                'Density: ' . $row['sqf'] / $d . '<br>';
        } ),
        array( 'db' => 'industry',     'dt' => 9 ),        
        array( 'db' => 'offer',     'dt' => 10, 'formatter' => function($d, $row) {
            $d = @unserialize($d);
            if( $d !== false ) {
                $d = (object) $d;
                ob_start();                 
                echo $d->post_title . '<br>';                
                if( property_exists($d, 'total_discount') ) {
                    echo 'Discount: ' . $d->total_discount . '<br>';                
                    // echo 'Discount: ' . price_format( $d->total_price ) . '<br>';
                }                
                return ob_get_clean();
            }
        } ),
        array( 'db' => 'cardinfo',     'dt' => 11, 'formatter' => function($d, $row) {
            $d = @unserialize($d);
            if( $d !== false ) {
                $d = (object) $d;
                ob_start();                 
                echo 'Company Name: ' . $d->company_name . '<br>';                
                echo 'Card Number: ' . $d->card_number . '<br>';                
                echo 'Name on Card: ' . $d->name_on_card . '<br>';                
                $query_string = add_query_arg( array(
                    'action' => 'get_order_cardinfo',
                    'order_reference_id' => $row['order_reference_id'],
                    'width' => 800,
                    'height' => 600,
                ), 'admin-ajax.php');
                echo '<a href="#" class="get_order_cardinfo" data-querystring="'.$query_string.'">View More</a>';                
                
                
                return ob_get_clean();
            }
        } ),
        array( 'db' => 'final_price',     'dt' => 12, 'formatter' => function($d, $row) {
            return price_format( $d );
        } ),
        array(
            'db'        => 'booking_start_date',
            'dt'        => 13,
            'formatter' => function( $d, $row ) {
                return 
                    'Booking Start: ' . date( 'd/m/Y', strtotime($d) ) . '<br>' .
                    'Order Place: ' . date( 'd/m/Y H:i:s', strtotime($row['created']));
            }
        ),
        array( 'db' => 'status',     'dt' => 14, 'formatter' => function($d, $row) {
            $status_list = get_field('order_status', 'option');

            $list = '';
            $bg_color = '#dddddd';
            $text_color = '#000000';
            if($status_list and is_array($status_list) and count($status_list) ) foreach ($status_list as $key => $value) {
                
                if( strtolower($value['status_name']) == strtolower($d) ) {
                    $bg_color = $value['bg_color'];
                    $text_color = $value['text_color'];
                    continue;
                }
                $list .= sprintf('<a href="#" class="update_order_status" data-refid="%s" data-status="%s">%s</a>', $row['order_reference_id'], $value['status_name'], $value['status_name']);
            }

            ob_start(); ?>
            <div class="dropdown">
                <button style="background-color: <?=$bg_color?>; color: <?=$text_color?>" class="dropbtn"><?=$d?></button>
                <div class="dropdown-content">
                    <?=$list?>
                </div>
            </div>            
            <?php             
            return ob_get_clean();
        } ),
        array( 'db' => 'created',     'dt' => 15 )
    );

    // SQL server connection information
    $sql_details = array(
        'user' => $wpdb->dbuser,
        'pass' => $wpdb->dbpassword,
        'db'   => $wpdb->dbname,
        'host' => $wpdb->dbhost
    );


    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );

    exit;
}






add_action('wp_ajax_process_book_form_calculation', 'ajax_process_book_form_calculation');
add_action('wp_ajax_nopriv_process_book_form_calculation', 'ajax_process_book_form_calculation');

function ajax_process_book_form_calculation() {
    $post = $_POST;

    $result = [
        'status' => '',
        'data' => $post
    ];

    if( $post['form_step'] == 0 ) {
        $step_data                  = $post['formdata'][0];
        $step_data['name']          = sanitize_text_field( $step_data['name'] );
        $step_data['zip_code']      = sanitize_text_field( $step_data['zip_code'] );
        $step_data['industry']      = sanitize_text_field( $step_data['industry'] );
        $step_data['email']         = sanitize_text_field( $step_data['email'] );
        $step_data['sqf']           = sanitize_text_field( $step_data['sqf'] );
        $step_data['peoples']       = sanitize_text_field( $step_data['peoples'] );
        $step_data['hard_surface']  = sanitize_text_field( $step_data['hard_surface'] );
        $step_data['carpet']        = sanitize_text_field( $step_data['carpet'] );
        $post['formdata'][0]        = $step_data;
        
        $zip_codes                  = get_zipcodes('max_square_feet_support', 'option');
        $max_square_feet_support    = get_field('max_square_feet_support', 'option');

        if( ! in_array($step_data['zip_code'], $zip_codes) ) {
            $result['status'] = 'failed';
            $result['error'] = 'zip_code_not_found';
        }
        else if( $step_data['sqf'] > $max_square_feet_support ) {
            $result['status'] = 'failed';
            $result['error'] = 'max_square_feet_exceeded';
        }
        else {
            $result['status'] = 'success';
                        
            // calculate price of 2nd form
            $products = get_products();     
            
            $price_rules = [
                'carpet' => [
                    'area' => 0,
                    'production_rate' => 0,
                    'industry_rate' => 0,
                    'density_rate' => 0,
                    'frequency_rate' => 0,
                    'total_hours' => 0
                ],
                'hard_floor' => [
                    'area' => 0,
                    'production_rate' => 0,
                    'industry_rate' => 0,
                    'density_rate' => 0,
                    'frequency_rate' => 0,
                    'total_hours' => 0
                ],
                'total_service_hours' => 0
            ];
            
            if( $products ) foreach ($products as $key => $product) {
                $price_rules['carpet']['area'] = $carpet         = ($step_data['sqf'] / 100) * $step_data['carpet'];
                $total_hours_for_carpet = 0;
                if( isset($product->acf['production_rate']['carpet']) and ($product->acf['production_rate']['carpet'] > 0) ) {
                    
                    $price_rules['carpet']['production_rate'] = $carpet_production_rate = $carpet / $product->acf['production_rate']['carpet'];
                    
                    $industry_rate = 0;
                    foreach ($product->acf['industries'] as $value) {
                        if( $step_data['industry'] == $value['name'] ) {
                            $carpet_production_plus_minus = $value['production_rate'];
                            if( $carpet_production_plus_minus != 0 ) {
                                $price_rules['carpet']['industry_rate'] = $industry_rate = ( $carpet_production_rate / 100 ) * $carpet_production_plus_minus;
                            }
                        }
                    }

                    $density_rate = 0;
                    $density = $step_data['sqf'] / $step_data['peoples'];                    
                    foreach ($product->acf['density'] as $value) {
                        if( ($density >= $value['from']) and ($density <= $value['to']) ) {
                            $density_production_plus_minus = $value['production_rate'];
                            if( $density_production_plus_minus != 0 ) {
                                $price_rules['carpet']['density_rate'] = $density_rate = ( $carpet_production_rate / 100 ) * $density_production_plus_minus;
                            }
                        }
                    }
                    
                    $price_rules['carpet']['total_hours'] = $total_hours_for_carpet = $carpet_production_rate + $industry_rate + $density_rate;
                } 
                

                $price_rules['hard_floor']['area'] = $hard_floor         = $step_data['sqf'] - $carpet;
                $total_hours_for_hard_floor = 0;
                if( isset($product->acf['production_rate']['hard_floor']) and ($product->acf['production_rate']['hard_floor'] > 0) ) {
                    
                    $price_rules['hard_floor']['production_rate'] = $hard_floor_production_rate = $hard_floor / $product->acf['production_rate']['hard_floor'];
                    
                    $industry_rate = 0;
                    foreach ($product->acf['industries'] as $value) {
                        if( $step_data['industry'] == $value['name'] ) {
                            $hard_floor_production_plus_minus = $value['production_rate'];
                            if( $hard_floor_production_plus_minus != 0 ) {
                                $price_rules['hard_floor']['industry_rate'] = $industry_rate = ( $hard_floor_production_rate / 100 ) * $hard_floor_production_plus_minus;
                            }
                            
                        }
                    }

                    $density_rate = 0;
                    $density = $step_data['sqf'] / $step_data['peoples'];                    
                    foreach ($product->acf['density'] as $value) {
                        if( ($density >= $value['from']) and ($density <= $value['to']) ) {
                            $density_production_plus_minus = $value['production_rate'];
                            if( $density_production_plus_minus != 0 ) {
                                $price_rules['hard_floor']['density_rate'] = $density_rate = ( $hard_floor_production_rate / 100 ) * $density_production_plus_minus;
                            }
                            
                        }
                    }
                    
                    $price_rules['hard_floor']['total_hours'] = $total_hours_for_hard_floor = $hard_floor_production_rate + $industry_rate + $density_rate;
                } 
                
                $price_rules['total_service_hours'] = $total_hours_for_carpet + $total_hours_for_hard_floor;
                $products[$key]->price_rules = $price_rules;
            }

            $result['products'] = $products;            
            
        }
    }
    else if( $post['form_step'] == 3 ) {
        // apply offers
        $formdata              = $post['formdata'][0];

        if( isset($formdata['selected_offer_id']) ) {
            $offer = get_post( $formdata['selected_offer_id'] );
            $offer->acf = get_fields( $offer->ID );

            if( isset($offer->acf['rules'][0]) and is_array($offer->acf['rules'][0]) and count($offer->acf['rules'][0]) > 0 ) {
                $r = $offer->acf['rules'] = $offer->acf['rules'][0];

                if( $r['rule_type'] === "If total price is grater than" ) {
                    if( $formdata['selected_product']['total_price'] > $r['rule_value'] ) {
                        if( $r['then'] === "Discount fixed amount of" ) {
                            $offer->total_discount  = price_format( $r['offer_rate'] );
                            $offer->total_price     = price_format( $formdata['selected_product']['total_price'] - $r['offer_rate'] );
                        }
                        else if($r['then'] === "Discount in percentage") {
                            $offer->total_discount  = price_format(   ($formdata['selected_product']['total_price']/100) * $r['offer_rate'] );
                            $offer->total_price     = price_format( $formdata['selected_product']['total_price'] - $offer->total_discount );
                        }
                    }
                }
            }
            
        }
        
        $result['status']      = 'success';
        $result['offer']       = $offer;        
    }
    else if( $post['form_step'] == 5 ) {
        // after preview. submit form data to order table.
        global $wpdb;
        $tbl_order = $wpdb->prefix . 'orders';

        $formdata              = $post['formdata'][0];

        $final_price = 0;
        if( isset($formdata['offer'], $formdata['offer']['total_price']) ) {
            $final_price = $formdata['offer']['total_price'];
        }
        else {
            $final_price = $formdata['selected_product']['total_price'];
        }

        $inData = [
            'product_id' => $formdata['selected_product']['ID'],
            'selected_product' => serialize( $formdata['selected_product'] ),
            'name' => $formdata['name'],
            'email' => $formdata['email'],
            'zipcode' => $formdata['zip_code'],
            'sqf' => $formdata['sqf'],
            'peoples' => $formdata['peoples'],
            'industry' => $formdata['industry'],            
            'hard_surface' => $formdata['hard_surface'],
            'carpet' => $formdata['carpet'],            
            'booking_start_date' => $formdata['booking_start_date'],
            'offer' => isset( $formdata['offer'] ) ? serialize($formdata['offer']) : "",
            'cardinfo' => serialize($formdata['cardinfo']),
            'final_price' => $final_price,
            'status' => 'pending', 
        ];

        $result['inData'] = $inData;

        $wpdb->insert($tbl_order, $inData, ['%d', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%d', '%s', '%s', '%s', '%f', '%s']);

        $order_id = $wpdb->insert_id;
        if( $order_id ) {

            $ref_id = $order_id; 
            
            // $ref_id = strtoupper( dechex($order_id) .'-'. dechex(time()) );
            $ref_id = strtoupper( dechex($order_id) .'-'. dechex(date('d')) . dechex(date('m')) . dechex(date('Y')) );
            // $ref_id = dechex($order_id);
            $wpdb->update($tbl_order, ['order_reference_id' => $ref_id], ['order_id'=>$order_id]);
                        
            $result['order_success_message'] = '
                <img src="%s/assets/img/check.png" alt="">
                <p>Booking Ref. %s</p>
                <h3>You successfully created your booking</h3>
                <h5>To print your booking <a href="%s">click here</a></h5>
            ';

            $result['order_success_message'] = sprintf($result['order_success_message'], 
                get_template_directory_uri(),
                $ref_id,
                home_url('invoice?ref=' . $ref_id)
            );

            $result['order_reference_id'] = $ref_id; 
            $result['status'] = 'success';
            $result['order_id'] = $order_id;
        }          
        else {
            $result['status'] = 'failed';

            $result['order_failed_message'] = sprintf('
                    <img src="%s/assets/img/cross.png" alt="">                    
                    <h3>Form submission error.</h3>
                    <h5>Please share with us the issue. <a href="%s">click here</a></h5>
                ', 
                get_template_directory_uri(),                
                home_url('contact')
            );
        }
        
    }

    echo json_encode($result);
    exit;
}