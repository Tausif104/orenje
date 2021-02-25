<?php 

add_action('wp_ajax_disinfection_zip_code_availability', 'ajax_disinfection_zip_code_availability');
add_action('wp_ajax_nopriv_disinfection_zip_code_availability', 'ajax_disinfection_zip_code_availability');

function ajax_disinfection_zip_code_availability() {
    $res = [
        'status' => 'success',
        'post' => $_POST,
        'zip_code_available' => ''
    ];

    if( isset( $_POST['zip_code']) and !empty($_POST['zip_code']) ) {
        $zip_code = sanitize_text_field( trim($_POST['zip_code']) );
        $zip_codes = get_field('disinfection_zip_codes', 'option');
        if( $zip_codes ) {
            $zip_codes = explode(',', trim($zip_codes));            
            $zip_codes = array_map(function($a){ return trim($a); }, $zip_codes);

            $res['zip_code_available'] = in_array($zip_code, $zip_codes);
        }        
    }

    echo json_encode($res);
    exit;
}

add_action('wp_ajax_disinfection_update_total_price', 'ajax_disinfection_update_total_price');
add_action('wp_ajax_nopriv_disinfection_update_total_price', 'ajax_disinfection_update_total_price');

function ajax_disinfection_update_total_price() {
    $res = [
        'status' => 'success',
        'post' => $_POST,
        'products' => []
    ];

    $form = $_POST['formdata'];
    $products = get_disinfection_products();

    if( $products and is_array($products) ) foreach($products as $key=>$product) {
        if( $product->acf['production_rate'] > 0 ) {
            $total_price = ( $form['sqft'] / $product->acf['production_rate'] ) * $product->acf['price'];
            if( $total_price < $product->acf['minimum_charge'] ) {
                $total_price = $product->acf['minimum_charge'];
            }
            $product->total_price = $total_price;
        }
        else $product->total_price = 0;
        $product->total_price = price_format($product->total_price);
        $res['products'][ $product->ID ] = $product;
    }

    echo json_encode($res);
    exit;
}

add_action('wp_ajax_apply_disinfection_offer', 'ajax_apply_disinfection_offer');
add_action('wp_ajax_nopriv_apply_disinfection_offer', 'ajax_apply_disinfection_offer');

function ajax_apply_disinfection_offer() {
    $res = [
        'status' => 'success',
        // 'post' => $_POST,
        'products' => []
    ];

    $form = $_POST['formdata'];
    $offer = get_disinfection_offer( $form['selected_offer_id'] );
    $res['offer'] = $offer;    
    $res['offer_price_applied'] = 0;

    if( $offer ) {
        if( isset($offer->data['rules'][0]) ) {
            $rule = $offer->data['rules'][0];
            if( $rule['rule_type'] == 'If total price is grater than' ) {
                if( $form['total_price'] > $rule['rule_value'] ) {
                    if( $rule['then'] == 'Discount in percentage' ) {
                        $res['total_price'] = ( $form['total_price'] / 100 ) * $rule['offer_rate'];
                        $res['offer_price_applied'] = 1;
                    }
                    else if( $rule['then'] == 'Discount fixed amount of' ) {
                        $res['total_price'] = $form['total_price'] - $rule['offer_rate'];
                        $res['offer_price_applied'] = 1;
                    }
                    else if( $rule['then'] == 'New offer price is equal to' ) {
                        $res['total_price'] = $rule['offer_rate'];
                        $res['offer_price_applied'] = 1;
                    }
                }  
            }
        }
    } 

    echo json_encode($res);
    exit;
}

add_action('wp_ajax_apply_disinfection_cardinfo', 'ajax_apply_disinfection_cardinfo');
add_action('wp_ajax_nopriv_apply_disinfection_cardinfo', 'ajax_apply_disinfection_cardinfo');

function ajax_apply_disinfection_cardinfo() {
    $res = [
        'status' => 'success',
        // 'post' => $_POST,
        'products' => []
    ];

    $form = $_POST['formdata'];
    $offer = get_disinfection_offer( $form['selected_offer_id'] );
    $res['offer'] = $offer;    
    $res['offer_price_applied'] = 0;

    if( $offer ) {
        if( isset($offer->data['rules'][0]) ) {
            $rule = $offer->data['rules'][0];
            if( $rule['rule_type'] == 'If total price is grater than' ) {
                if( $form['total_price'] > $rule['rule_value'] ) {
                    if( $rule['then'] == 'Discount in percentage' ) {
                        $res['total_price'] = ( $form['total_price'] / 100 ) * $rule['offer_rate'];
                        $res['offer_price_applied'] = 1;
                    }
                    else if( $rule['then'] == 'Discount fixed amount of' ) {
                        $res['total_price'] = $form['total_price'] - $rule['offer_rate'];
                        $res['offer_price_applied'] = 1;
                    }
                    else if( $rule['then'] == 'New offer price is equal to' ) {
                        $res['total_price'] = $rule['offer_rate'];
                        $res['offer_price_applied'] = 1;
                    }
                }  
            }
        }
    } 

    echo json_encode($res);
    exit;
}