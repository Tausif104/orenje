<?php 

add_shortcode('view_invoice', 'sc_view_invoice'); 

function sc_view_invoice() {

    if( isset($_GET['ref']) and !empty($_GET['ref'])) {
        global $wpdb;
        $tbl_order = $wpdb->prefix . 'orders';
        $ref_id = trim( sanitize_text_field($_GET['ref']) );

        $order = $wpdb->get_row("SELECT * FROM {$tbl_order} WHERE order_reference_id = '". $ref_id ."'", OBJECT);

        if($order and property_exists($order, 'order_id')) {
            $order->selected_product = unserialize($order->selected_product);
            $order->offer = unserialize($order->offer);
            $order->cardinfo = unserialize($order->cardinfo);

            ob_start();
            require_once( get_template_directory() . '/template-parts/invoice.php' );
            return ob_get_clean();
        }
        
    }
    
    
    ob_start();
    require_once( get_template_directory() . '/template-parts/invoice_form.php' );
    return ob_get_clean();

}