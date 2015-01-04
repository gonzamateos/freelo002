<?php
/*
 *  Author: Aleix Sabate | @aleish76    
 *  URL: aleixsabate.com | http://themeforest.net/user/aleish76
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Options Framework
\*------------------------------------*/

// Load any external files you have here

get_template_part('nhp', 'options');

// Calling options to use in functions.php

/*------------------------------------*\
  Width
\*------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 900;

/*------------------------------------*\
	Theme Support
\*------------------------------------*/


if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('gallery-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');

}

/*------------------------------------*\
	Functions
\*------------------------------------*/



// Menus
function exhibition_menus() {
  register_nav_menus(
    array(
      'header-nav' => __('Header Menu'), // Main Navigation
      'footer-nav' => __('Footer Menu'), // Footer Navigation
      'gallery-nav' => __('3D Gallery Menu') // Gallery Navigation
    )
  );
}
add_action( 'init', 'exhibition_menus' );



function exhibition_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'mytheme-opensans', "$protocol://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,600" );
  }

add_action( 'wp_enqueue_scripts', 'exhibition_fonts' );



// Enqueue ioslider scripts just in the homepage
function load_index_page() {
  if (is_home()){
      wp_register_script('iosslider', get_template_directory_uri() . '/javascripts/jquery.iosslider.min.js', array(), '1.0.0', true); // ioslider JS
      wp_enqueue_script('iosslider'); // Enqueue it!
  }
}
add_action('get_header', 'load_index_page' );


// Enqueue scripts (header.php)
function html5blank_header_scripts()
{
    if (!is_admin()) {

        // WP_HEAD
    	  wp_enqueue_script('jquery'); // Enqueue it!
        
        wp_register_script('modernizr', get_template_directory_uri() . '/javascripts/modernizr-2.0.6.min.js', array(), '2.0.6'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('gmaps', 'http://maps.google.se/maps/api/js?sensor=false', array(), '3.0'); // Google Maps
        wp_enqueue_script('gmaps'); // Enqueue it!

        // WP_FOOTER

        wp_register_script('inview', get_template_directory_uri() . '/javascripts/jquery.inview.js', array(), '1.0.0', true); // Inview JS
        wp_enqueue_script('inview'); // Enqueue it!

        wp_register_script('responsiveslides', get_template_directory_uri() . '/javascripts/responsiveslides.min.js', array(), '1.0.0', true); // Responsiveslides JS
        wp_enqueue_script('responsiveslides'); // Enqueue it!

        wp_register_script('wallgallery', get_template_directory_uri() . '/javascripts/wallgallery.js', array(), '1.0.0', true); // Wall JS
        wp_enqueue_script('wallgallery'); // Enqueue it!      

        wp_register_script('exhibitionscripts', get_template_directory_uri() . '/javascripts/script.js', array(), '1.0.0', true); // Custom Exhibition JS
        wp_enqueue_script('exhibitionscripts'); // Enqueue it!
    }
}


// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('default', get_stylesheet_uri() , array(), '1.0', 'all'); // Main Stylesheet
    wp_enqueue_style('default'); // Enqueue it!

    if (is_page_template('3d_gallery.php')){
    wp_register_style('3d_gallery', get_template_directory_uri() . '/style-tour.css', array(), '1.0', 'all');  // Conditionl 3d Gallery Stylesheet
    wp_enqueue_style('3d_gallery'); // Enqueue it!
    }

    $options = get_option('exhibition');
    wp_register_style('dynamic', get_template_directory_uri() . '/stylesheets/' . $options['color'], array(), '1.0', 'all'); // Dynamic Stylesheet
    wp_enqueue_style('dynamic'); // Enqueue it!
}



// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}


function new_excerpt_length($length) {
    return 30;
}

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


// Slider

register_post_type('slider', array( 'label' => 'Main Slider','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'supports' => array('title','editor','thumbnail',),'labels' => array (
  'name' => 'Main Slider',
  'singular_name' => 'Slider',
  'menu_name' => 'Main Slider',
  'add_new' => 'Add Slider',
  'add_new_item' => 'Add New Slider',
  'edit' => 'Edit',
  'edit_item' => 'Edit Slider',
  'new_item' => 'New Slider',
  'view' => 'View Slider',
  'view_item' => 'View Slider',
  'search_items' => 'Search Main Slider',
  'not_found' => 'No Main Slider Found',
  'not_found_in_trash' => 'No Main Slider Found in Trash',
  'parent' => 'Parent Slider',
),) );

// Main Gallery

register_post_type('main_gallery', array(   'label' => 'Gallery','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 27,'supports' => array('title','editor','thumbnail', 'custom-fields'),'labels' => array (
  'name' => 'Gallery',
  'singular_name' => 'Gallery Image',
  'menu_name' => 'Gallery',
  'add_new' => 'Add Gallery Image',
  'add_new_item' => 'Add New Gallery Image',
  'edit' => 'Edit',
  'edit_item' => 'Edit Gallery Image',
  'new_item' => 'New Gallery Image',
  'view' => 'View Gallery Image',
  'view_item' => 'View Gallery Image',
  'search_items' => 'Search Gallery',
  'not_found' => 'No Gallery Found',
  'not_found_in_trash' => 'No Gallery Found in Trash',
  'parent' => 'Parent Gallery Image',
),) );

// Sponsors

register_post_type('3d_gallery', array( 'label' => '3D Gallery','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 29,'supports' => array('title','editor','thumbnail',),'labels' => array (
  'name' => '3D Gallery',
  'singular_name' => '3D image',
  'menu_name' => '3D Gallery',
  'add_new' => 'Add 3D image',
  'add_new_item' => 'Add New 3D image',
  'edit' => 'Edit',
  'edit_item' => 'Edit 3D image',
  'new_item' => 'New 3D image',
  'view' => 'View 3D image',
  'view_item' => 'View 3D image',
  'search_items' => 'Search 3D Gallery',
  'not_found' => 'No 3D Gallery Found',
  'not_found_in_trash' => 'No 3D Gallery Found in Trash',
  'parent' => 'Parent 3D image',
),) );

// 3D Gallery

register_post_type('sponsors', array(   'label' => 'Sponsors','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'menu_position' => 28,'supports' => array('title','editor','thumbnail',),'labels' => array (
  'name' => 'Sponsors',
  'singular_name' => 'Sponsor',
  'menu_name' => 'Sponsors',
  'add_new' => 'Add Sponsor',
  'add_new_item' => 'Add New Sponsor',
  'edit' => 'Edit',
  'edit_item' => 'Edit Sponsor',
  'new_item' => 'New Sponsor',
  'view' => 'View Sponsor',
  'view_item' => 'View Sponsor',
  'search_items' => 'Search Sponsors',
  'not_found' => 'No Sponsors Found',
  'not_found_in_trash' => 'No Sponsors Found in Trash',
  'parent' => 'Parent Sponsor',
),) );




/*------------------------------------*\
    Actions + Filters
\*------------------------------------*/


// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet


// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('excerpt_length', 'new_excerpt_length');



?>