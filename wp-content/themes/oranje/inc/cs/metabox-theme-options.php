<?php if ( ! defined( 'ABSPATH' ) ) { die; } 

function oranje_webmakerbd_metabox_options( $options ) {

  $options      = array(); 

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'oranje_webmakerbd_page_option',
  'title'     => esc_html__( 'Page Breadcum Options', 'oranje' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'oranje_webmakerbd_page_content',     

      'fields' => array(
         array(
          'id'    => 'enable_breadcum',
          'type'  => 'switcher',
          'title' => esc_html__('Enable Breadcum', 'oranje'),
          'default' => true,
          'desc' => esc_html__('Enable Custom Breadcum Area', 'oranje'),
        ),      
        array(
          'id'    => 'custom_page_title',
          'type'  => 'text',
          'title' => esc_html__('Custom Title','oranje'),        
          'desc' =>  esc_html__('Type your Custom Title : Exam: Service Content','oranje'),
          'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        ),      
        array(
          'id'    => 'overlay_perchanetage',
          'type'  => 'text',
          'title' => esc_html__('Overlay perchantage','oranje'),          
          'default' => esc_attr__( '.6', 'oranje' ),          
          'desc' =>  esc_html__('Type overlay perchantage, Floating Number only like: .3, .4, .5, .6  , Maximum is 1, ','oranje'),
           'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        ),
        array(
          'id'    => 'bradcum_overlay_color',
          'type'  => 'color_picker',
          'title' => esc_html__('Overlay Color','oranje'),
             'default' => '#222222',          
          'desc' =>  esc_html__('Select Overlay color','oranje'),
           'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        )

      ), 
    ), 
  ),

);

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'oranje_webmakerbd_slider_metabox_option',
  'title'     => esc_html__( 'Slider Metabox Options', 'oranje' ),
  'post_type' => 'slider',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'oranje_slider_metabox_content',   
      'fields' => array(

         array(
          'id'              => 'oranje_slider_btn',
          'type'            => 'group',
          'title'           => esc_html__('Slider Button', 'oranje'),
          'button_title'    => 'Add New',
          'accordion_title' => esc_html__( 'Add New Button', 'oranje' ),
          'fields'          => array(

            array(
              'id'    => 'button_text',
              'type'  => 'text',
              'title' => esc_html__('Button Text','oranje'),
              'default' =>  esc_html__('View Project','oranje'),       
              'desc' =>  esc_html__('Type Button Text','oranje'),
            ), 
            array(
              'id'    => 'button_type',
              'type'  => 'select',
              'title' => esc_html__('Button Type','oranje'),
              'default' =>  esc_html__('filled-btn','oranje'),       
              'desc' =>  esc_html__('Select Button Type','oranje'),
              'options'        => array(
                'filled-btn' => esc_html__( 'Filled Button', 'oranje' ),
                'bordared-btn' => esc_html__( 'Bordared Button', 'oranje' ),
              ),
            ),
            array(
              'id'    => 'button_link_type',
              'type'  => 'select',
              'title' => esc_html__('Button Link Type','oranje'),
              'default' =>  esc_attr__('1','oranje'),       
              'desc' =>  esc_html__('Select Button Type','oranje'),
              'options'        => array(
                '1' => esc_html__( 'Page To Link', 'oranje' ),
                '2' => esc_html__( 'External Link', 'oranje' ),
              ),
            ),
            array(
              'id'    => 'button_page_link',
              'type'  => 'select',
              'title' => esc_html__('Button Page Link','oranje'),       
              'desc' =>  esc_html__('Select internal page link','oranje'),
              'options'        => 'page',
              'dependency'   => array( 'button_link_type', '==', '1' ),
            ),
            array(
              'id'    => 'button_external_link',
              'type'  => 'text',
              'title' => esc_html__('Button External Link','oranje'),       
              'desc' =>  esc_html__('Type External Link','oranje'),
              'default' =>  esc_html__('https://static.webmakerbd.net','oranje'),
              'dependency'   => array( 'button_link_type', '==', '2' ),
            ),


          )
        ),

         array(
            'id'    => 'slider_ovelay',
            'type'  => 'switcher',
            'title' => esc_html__('Slider Ovelay','oranje'),       
            'desc' =>  esc_html__('Turn On Switcher If You Want To enable Slider Overlay.','oranje'),
            'default' =>  true,
          ),

         array(
            'id'    => 'slider_ovelay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Slider Ovelay Color','oranje'),       
            'desc' =>  esc_html__('Select Slider Ovelay Color','oranje'),
            'default' =>  esc_attr__('#222','oranje'),
            'dependency'   => array( 'slider_ovelay', '==', 'true' ),
          ),

         array(
            'id'    => 'slider_ovelay_opacity',
            'type'  => 'text',
            'title' => esc_html__('Slider Opacity','oranje'),       
            'desc' =>  esc_html__('Type Slider Opacity In Floating Number Only, Like: .4','oranje'),
            'default' =>  esc_attr__('.4','oranje'),
            'dependency'   => array( 'slider_ovelay', '==', 'true' ),
          ),
      ), 
    ), 
  ),

);

  return $options;

}
add_filter( 'cs_metabox_options', 'oranje_webmakerbd_metabox_options' );



// Framework Options

function oranje_webmakerbd_framework_options( $options ) {
$options      = array(); 

  return $options;

}
add_filter( 'cs_framework_options', 'oranje_webmakerbd_framework_options' );


// Framework Setting

function oranje_webmakerbd_framework_settings( $settings ) {

  $settings      = array(); 

  $settings           = array(
    'menu_title'      => esc_html__( 'Theme Options', 'oranje'),
    'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
    'menu_slug'       => 'oranje-theme-option',
    'ajax_save'       => true,
    'show_reset_all'  => true,
    'framework_title' => esc_html__( 'Oranje Theme Options by Webmakerbd', 'oranje'),
  );
  return $settings;

}
add_filter( 'cs_framework_settings', 'oranje_webmakerbd_framework_settings' );




// Shortcode Setting
function oranje_webmakerbd_shortcode_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_shortcode_options', 'oranje_webmakerbd_shortcode_options' );

// Customize Setting
function oranje_webmakerbd_customize_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_customize_options', 'oranje_webmakerbd_customize_options' );


