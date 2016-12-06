<?php

function zenlife_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'zen-life');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'zen-life');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'zen-life');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'zen-life');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'zen-life');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'zen-life');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'zen-life');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'zen-life');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'zen-life');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'zen-life' ),
      'description' => __( 'Controls the basic settings for the theme.', 'zen-life' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'zen-life' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'zen-life' ),
  ) ); 
  $wp_customize->add_panel( 'color_choices', array(
      'priority' => 30,
      'theme_supports' => '',
      'title' => __( 'Color Choices', 'zen-life' ),
      'description' => __( 'Controls the color settings for the theme.', 'zen-life' ),
  ) ); 
  $wp_customize->add_panel( 'typography_settings', array(
      'priority' => 40,
      'theme_supports' => '',
      'title' => __( 'Typography', 'zen-life' ),
      'description' => __( 'Controls the fonts for the theme.', 'zen-life' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// GENERAL SETTINGS PANEL ........................................ //

// Add Site Headline Text

  $wp_customize->add_section( 'custom_headline_text' , array(
    'title'      => __('Site Headline Text','zen-life'), 
    'panel'      => 'general_settings',
    'priority'   => 200    
  ) );  
  $wp_customize->add_setting(
      'zenlife_headline_text',
      array(
          'default'           => __( 'Large Headline Text', 'zen-life' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_headline_text',
            array(
                'label'          => __( 'Site Headline', 'zen-life' ),
                'section'        => 'custom_headline_text',
                'settings'       => 'zenlife_headline_text',
                'type'           => 'text'
            )
        )
   );  


// DESIGN SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','zen-life'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'zenlife_logo',
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
               'label'      => __( 'Change Logo', 'zen-life' ),
               'section'    => 'custom_logo',
               'settings'   => 'zenlife_logo',
               'context'    => 'zenlife-custom-logo' 
           )
       )
   ); 

  // Add Large Homepage Background Photo

  $wp_customize->add_section( 'custom_background' , array(
    'title'      => __('Large Homepage Photo','zen-life'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'zenlife_lg_photo',
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
               'label'      => __( 'Set Photo', 'zen-life' ),
               'section'    => 'custom_background',
               'settings'   => 'zenlife_lg_photo',
               'context'    => 'zenlife-lg-photo' 
           )
       )
   ); 



// COLOR CHOICES PANEL ........................................ //


// Text Colors

  $wp_customize->add_section( 'text_colors' , array(
    'title'      => __('Text Colors','zen-life'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'zenlife_h1_color',
      array(
          'default'         => '#333333',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_h1_color',
           array(
               'label'      => __( 'Headings Color', 'zen-life' ),
               'section'    => 'text_colors',
               'settings'   => 'zenlife_h1_color' 
           )
       )
   );

  $wp_customize->add_section( 'p_styles' , array(
    'title'      => __('Paragraph Text Styles','zen-life'), 
    'panel'      => 'color_choices',
    'priority'   => 130    
  ) );  
  $wp_customize->add_setting(
      'zenlife_p_color',
      array(
          'default'         => '#333333',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_p_color',
           array(
               'label'      => __( 'Paragraph Color', 'zen-life' ),
               'section'    => 'text_colors',
               'settings'   => 'zenlife_p_color' 
           )
       )
   );


// Accent Color

  $wp_customize->add_section( 'theme_colors' , array(
    'title'      => __('Accent Color','zen-life'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'zenlife_accent_color',
      array(
          'default'         => '#39b54a',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_accent_color',
           array(
               'label'      => __( 'Accent color for links and hover effects', 'zen-life' ),
               'section'    => 'theme_colors',
               'settings'   => 'zenlife_accent_color' 
           )
       )
   ); 


// TYPOGRAPHY PANEL ........................................ //

// Headings Font

$wp_customize->add_section( 'custom_h_fonts' , array(
    'title'      => __('Headings Font','zen-life'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) ); 

$wp_customize->add_setting(
      'zenlife_h1_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_h1_font_type',
            array(
                'label'          => __( 'Font', 'zen-life' ),
                'section'        => 'custom_h_fonts',
                'settings'       => 'zenlife_h1_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans'       => 'Open Sans',
                  'Roboto' => 'Roboto',
                  'PT Sans'    => 'PT Sans',
                  'Lato'         => 'Lato',
                  'Ubuntu' => 'Ubuntu',
                  'Lora'         => 'Lora',
                  'Raleway'      => 'Raleway',
                  'Noto Sans'   => 'Noto Sans',
                  'Playfair Display'    => 'Playfair Display',
                  'Alegreya Sans'        => 'Alegreya Sans',
                  'Cabin'        => 'Cabin',
                  'Noto Serif'        => 'Noto Serif'
                )
            )
        )       
   );


 // Paragraph Font

   $wp_customize->add_section( 'custom_p_fonts' , array(
    'title'      => __('Paragraph Font','zen-life'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  

   $wp_customize->add_setting(
      'zenlife_p_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_size',
            array(
                'label'          => __( 'Font Size', 'zen-life' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'zenlife_p_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '12'   => '12px',
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px',
                  '22'   => '22px'
                )
            )
        )       
   ); 


   $wp_customize->add_setting(
      'zenlife_p_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_type',
            array(
                'label'          => __( 'Font', 'zen-life' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'zenlife_p_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Open Sans'       => 'Open Sans',
                  'Roboto' => 'Roboto',
                  'PT Sans'    => 'PT Sans',
                  'Lato'         => 'Lato',
                  'Ubuntu' => 'Ubuntu',
                  'Lora'         => 'Lora',
                  'Raleway'      => 'Raleway',
                  'Noto Sans'   => 'Noto Sans',
                  'Playfair Display'    => 'Playfair Display',
                  'Alegreya Sans'        => 'Alegreya Sans',
                  'Cabin'        => 'Cabin',
                  'Noto Serif'        => 'Noto Serif'
                )
            )
        )       
   );

  
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','zen-life'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'zenlife_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'zen-life' ),
                'section'        => 'custom_css_field',
                'settings'       => 'zenlife_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'zenlife_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'zenlife_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function zenlife_style_header() {

   ?>

<style type="text/css">

h1,
h1 a,
h2,
h2 a,
h3,
h3 a,
h4,
h4 a,
h5,
h5 a,
h6,
h6 a {
	font-family: <?php echo get_theme_mod('zenlife_h1_font_type'); ?>;
  color: <?php echo get_theme_mod('zenlife_h1_color'); ?>;
}

p:not(.home-text-overlay) {
	font-size: <?php echo get_theme_mod('zenlife_p_font_size') . 'px'; ?>;
	color: <?php echo get_theme_mod('zenlife_p_color'); ?>;
	font-family: <?php echo get_theme_mod('zenlife_p_font_type'); ?>;
}

li {
  font-size: <?php echo get_theme_mod('zenlife_p_font_size') . 'px'; ?>;
  color: <?php echo get_theme_mod('zenlife_p_color'); ?>;
  font-family: <?php echo get_theme_mod('zenlife_p_font_type'); ?>;
}

a {
	font-family: <?php echo get_theme_mod('zenlife_p_font_type'); ?>;
}

.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
  background-color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

a,
a:visited {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

a:hover,
a:focus,
a:active {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover {
  background: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

.small-icons-bar .fa:hover {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;

}

.footer-cta button {
  background-color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

.footer-social .fa:hover,
.footer-social a:hover {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

footer a:hover {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

h1 a,
h2 a,
h3 a,
h4 a,
h5 a,
h6 a {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

h1 a:visited,
h2 a:visited,
h3 a:visited,
h4 a:visited,
h5 a:visited,
h6 a:visited {
  color: <?php echo get_theme_mod('zenlife_accent_color'); ?>;
}

  <?php if( get_theme_mod('zenlife_custom_css') != '' ) {
    echo get_theme_mod('zenlife_custom_css');
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

function zenlife_customizer_js() {
  wp_enqueue_script(
    'zenlife_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'zenlife_customizer_js' );

?>