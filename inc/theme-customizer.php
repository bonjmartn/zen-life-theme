<?php

function zenlifefree_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'zen-life-free');  
  $wp_customize->get_control('blogname')->label = __('Site Name', 'zen-life-free');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'zen-life-free');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'zen-life-free');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'zen-life-free');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'zen-life-free');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'zen-life-free');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'zen-life-free');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'zen-life-free' ),
      'description' => __( 'Controls the basic settings for the theme.', 'zen-life-free' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'zen-life-free' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'zen-life-free' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;

  // Remove Panels

  $wp_customize->remove_control('header_image');
  $wp_customize->remove_section('colors');


// GENERAL SETTINGS PANEL ........................................ //

// Add Site Headline Text

  $wp_customize->add_section( 'custom_headline_text' , array(
    'title'      => __('Site Headline Text','zen-life-free'), 
    'panel'      => 'general_settings',
    'priority'   => 200    
  ) );  
  $wp_customize->add_setting(
      'zenlifefree_headline_text',
      array(
          'default'           => __( 'Large Headline Text', 'zen-life-free' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_headline_text',
            array(
                'label'          => __( 'Site Headline', 'zen-life-free' ),
                'section'        => 'custom_headline_text',
                'settings'       => 'zenlifefree_headline_text',
                'type'           => 'text'
            )
        )
   );  

// DESIGN SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','zen-life-free'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'zenlifefree_logo',
      array(
          'default'         => get_template_directory_uri() . '/images/zen-life-logo.png',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'zen-life-free' ),
               'section'    => 'custom_logo',
               'settings'   => 'zenlifefree_logo',
               'context'    => 'zenlifefree-custom-logo' 
           )
       )
   ); 

  // Add Large Homepage Background Photo

  $wp_customize->add_section( 'custom_background' , array(
    'title'      => __('Large Homepage Photo','zen-life-free'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'zenlifefree_lg_photo',
      array(
          'default'         => get_template_directory_uri() . '/images/zen-life-homepage.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_background',
           array(
               'label'      => __( 'Set Photo', 'zen-life-free' ),
               'section'    => 'custom_background',
               'settings'   => 'zenlifefree_lg_photo',
               'context'    => 'zenlifefree-lg-photo' 
           )
       )
   ); 

  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','zen-life-free'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'zenlifefree_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'zen-life-free' ),
                'section'        => 'custom_css_field',
                'settings'       => 'zenlifefree_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'zenlifefree_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'zenlifefree_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function zenlifefree_style_header() {

   ?>

<style type="text/css">

  <?php if( get_theme_mod('zenlifefree_custom_css') != '' ) {
    echo get_theme_mod('zenlifefree_custom_css');
  } ?>

  </style>

<?php 

}

// Add theme support for Custom Backgrounds

$defaults = array(
  'default-color' => '#ffffff',
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function zenlifefree_customizer_js() {
  wp_enqueue_script(
    'zenlifefree_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'zenlifefree_customizer_js' );

?>