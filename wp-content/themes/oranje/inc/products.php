<?php 

function get_products() {

    $args = array(
        'numberposts' => -1,
        'post_type'   => 'product',
        'post_staus' => 'publish',
        'orderby'    => 'menu_order',
        'sort_order' => 'asc'
      );

    $products = get_posts($args);

    if($products and is_array($products) ) array_map(function ($product) {
        if($product and property_exists($product, 'ID') ) {
            $product->acf = get_fields($product->ID);

            $product->regular_price = isset( $product->acf['price'] ) ? $product->acf['price']['regular_price'] : 0;
            $product->special_price = isset( $product->acf['price'] ) ? $product->acf['price']['special_price'] : 0;

            return $product;
        }
    }, $products);

    return $products;   
}


function get_zipcodes() {
    $zip_codes = get_field('zip_codes', 'option');
    $zip_codes = explode(',', $zip_codes);
    if( is_array($zip_codes) and count($zip_codes) > 0 ) $zip_codes = array_map(function($code){ return trim($code); }, $zip_codes);
    return $zip_codes;
}


function get_industries() {
    $args = array(
        'numberposts' => 1,
        'post_type'   => 'product',
        'post_staus' => 'publish'
      );
    $products = get_posts($args);
    if( isset($products[0]) ) {
        return get_field('industries', $products[0]->ID);
    }
    return false;
}


function get_offers() {
    $offers = get_posts([
        'post_type' => 'offer',
        'numberposts' => -1,
        'post_staus' => 'publish'
    ]);

    if( $offers ) foreach ($offers as $key => $value) {
        $offers[$key]->offers = get_fields($value->ID);
    }  
    return $offers;
}

function price_format($v) {
    return number_format($v, 2, '.', '');
}
