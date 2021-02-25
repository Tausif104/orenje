<?php 


add_action('admin_menu', 'disinfection_menu');

function disinfection_menu() {
    add_menu_page( 'Disinfection Page', 'Disinfection', 'manage_options', 'disinfection.php', 'disinfection_menu_fn');
    // add_submenu_page() if you want subpages, but not necessary
}

function disinfection_menu_fn () {
    echo 'Hi';
}

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Product', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Products', 'text_domain' ),
		'add_new_item'          => __( 'Add New Product', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Product', 'text_domain' ),
		'edit_item'             => __( 'Edit Product', 'text_domain' ),
		'update_item'           => __( 'Update Product', 'text_domain' ),
		'view_item'             => __( 'View Product', 'text_domain' ),
		'view_items'            => __( 'View Products', 'text_domain' ),
		'search_items'          => __( 'Search Product', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Product', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'custom-fields'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => 'disinfection.php',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'disinfection_product', $args );

}
add_action( 'init', 'custom_post_type', 0 );


// Register Custom Post Type
function custom_post_type_offer() {

	$labels = array(
		'name'                  => _x( 'Offers', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Offer', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Offer', 'text_domain' ),
		'name_admin_bar'        => __( 'Offer', 'text_domain' ),
		'archives'              => __( 'Offer Archives', 'text_domain' ),
		'attributes'            => __( 'Offer Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Offer:', 'text_domain' ),
		'all_items'             => __( 'All Offers', 'text_domain' ),
		'add_new_item'          => __( 'Add New Offer', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Offer', 'text_domain' ),
		'edit_item'             => __( 'Edit Offer', 'text_domain' ),
		'update_item'           => __( 'Update Offer', 'text_domain' ),
		'view_item'             => __( 'View Offer', 'text_domain' ),
		'view_items'            => __( 'View Offers', 'text_domain' ),
		'search_items'          => __( 'Search Offer', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Offer', 'text_domain' ),
		'items_list'            => __( 'Offers list', 'text_domain' ),
		'items_list_navigation' => __( 'Offers list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Offers list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Offer', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => 'disinfection.php',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'disinfection_offer', $args );

}
add_action( 'init', 'custom_post_type_offer', 0 );


// Register Custom Post Type
function custom_post_type_coupon () {

	$labels = array(
		'name'                  => _x( 'Coupons', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Coupon', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Coupon', 'text_domain' ),
		'name_admin_bar'        => __( 'Coupon', 'text_domain' ),
		'archives'              => __( 'Coupon Archives', 'text_domain' ),
		'attributes'            => __( 'Coupon Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Coupon:', 'text_domain' ),
		'all_items'             => __( 'All Coupons', 'text_domain' ),
		'add_new_item'          => __( 'Add New Coupon', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Coupon', 'text_domain' ),
		'edit_item'             => __( 'Edit Coupon', 'text_domain' ),
		'update_item'           => __( 'Update Coupon', 'text_domain' ),
		'view_item'             => __( 'View Coupon', 'text_domain' ),
		'view_items'            => __( 'View Coupons', 'text_domain' ),
		'search_items'          => __( 'Search Coupon', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Coupon', 'text_domain' ),
		'items_list'            => __( 'Coupons list', 'text_domain' ),
		'items_list_navigation' => __( 'Coupons list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Coupons list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Coupon', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => 'disinfection.php',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'disinfection_coupon', $args );

}
add_action( 'init', 'custom_post_type_coupon', 0 );




add_action('admin_menu', 'register_disinfection_order_submenu_page');
function register_disinfection_order_submenu_page() {
    // add_menu_page('My Custom Page', 'My Custom Page', 'manage_options', 'my-top-level-slug');
    add_submenu_page( 'disinfection.php', 'Orders', 'Orders', 'manage_options', 'disinfection_orders', 'admin_disinfection_orders_page');
}
function admin_disinfection_orders_page() {
    require_once( get_template_directory() . '/template-parts/disinfection/admin_order_datatable.php' );
}



function get_disinfection_products() {
	$args = array(
        'numberposts' => -1,
        'post_type'   => 'disinfection_product',
        'post_staus' => 'publish',
        'orderby'    => 'menu_order',
        'sort_order' => 'asc'
      );

    $products = get_posts($args);

    if($products and is_array($products) ) array_map(function ($product) {
        if($product and property_exists($product, 'ID') ) {
            $product->acf = get_fields($product->ID);

            $product->price = isset( $product->acf['price'] ) ? $product->acf['price'] : 0;
            $product->final_price = 0;

            return $product;
        }
    }, $products);

    return $products; 
}

function get_disinfection_offers() {
    $offers = get_posts([
        'post_type' => 'disinfection_offer',
        'numberposts' => -1,
        'post_staus' => 'publish'
    ]);

    if( $offers ) foreach ($offers as $key => $value) {
        $offers[$key]->data = get_fields($value->ID);
    }  
    return $offers;
}

function get_disinfection_offer( $offer_id ) {
    $offer = get_post($offer_id);    
	if( $offer ) {
		$offer->data = get_fields($offer_id);      
		return $offer;
	}
    return false;
}