<?php 


add_action('admin_menu', 'register_custom_submenu_page');

function register_custom_submenu_page() {
    // add_menu_page('My Custom Page', 'My Custom Page', 'manage_options', 'my-top-level-slug');
    add_submenu_page( 'edit.php?post_type=product', 'Orders', 'Orders', 'manage_options', 'orders', 'admin_orders_page');
}


function admin_orders_page() {
    require_once( get_template_directory() . '/template-parts/admin_order_datatable.php' );
}