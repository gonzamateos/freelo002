<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'nhp-opts'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');









/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = true;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$args['google_api_key'] = '***';

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
$args['intro_text'] = __('<p>Exhibition Theme Options</p>', 'nhp-opts');

//Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/aleish76',
										'title' => 'Folow me on Twitter', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
										);
$args['share_icons']['dribble'] = array(
										'link' => 'http://dribbble.com/aleish76',
										'title' => 'Find me on Dribble', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_334_dribbble.png'
										);
$args['share_icons']['email_me'] = array(
										'link' => 'mailto:aleix.sabate@gmail.com',
										'title' => 'Send me an Email', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/aleix.png'
										);

//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'exhibition';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Theme Options', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'nhp_theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 32;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		


$sections = array();

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_023_cogwheels.png',
				'title' => __('General Settings', 'nhp-opts'),
				'desc' => __('<p class="description">General settings for Exhibition</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'logo',
						'type' => 'upload',
						'title' => __('Logo', 'nhp-opts'), 
						'sub_desc' => __('This appears at the top and at the bottom of the page', 'nhp-opts'),
						),
					array(
						'id' => 'favicon',
						'type' => 'upload',
						'title' => __('Favicon', 'nhp-opts'), 
						'sub_desc' => __('This has to be a 16x16px .png or .ico file', 'nhp-opts'),
						),
					array(
						'id' => 'ga',
						'type' => 'text',
						'title' => __('Google Analytics Code', 'nhp-opts'), 
						'sub_desc' => __('Paste in here you GA code (ie. UA-XXXXXXXX-XX)', 'nhp-opts'),
						),
					array(
						'id' => 'color',
						'type' => 'select',
						'title' => __('Color Scheme', 'nhp-opts'), 
						'sub_desc' => __('Select the color.', 'nhp-opts'),
						'options' => array('default' => 'Red', 'orange.css' => 'Orange','blue.css' => 'Blue','purple.css' => 'Purple', 'green.css' => 'Green','yellow.css' => 'Yellow','black.css' => 'Black'),
						),
					array(
						'id' => '27',
						'type' => 'info',
						'desc' => __('<p class="description">Custom Titles</p>', 'nhp-opts')
						),
					array(
						'id' => 'o_title',
						'type' => 'text',
						'title' => __('Overview Title', 'nhp-opts'), 
						'sub_desc' => __('Custom title for overview section', 'nhp-opts'),
						'std' => 'Overview.'
						),
					array(
						'id' => 'g_title',
						'type' => 'text',
						'title' => __('Gallery', 'nhp-opts'), 
						'sub_desc' => __('Custom title for gallery section', 'nhp-opts'),
						'std' => 'Gallery.'
						),
					array(
						'id' => 'v_title',
						'type' => 'text',
						'title' => __('Venue Title', 'nhp-opts'), 
						'sub_desc' => __('Custom title for venue section', 'nhp-opts'),
						'std' => 'Venue.'
						),
					array(
						'id' => 's_title',
						'type' => 'text',
						'title' => __('Sponsors Title', 'nhp-opts'), 
						'sub_desc' => __('Custom title for sponsors section', 'nhp-opts'),
						'std' => 'Sponsors.'
						),
					array(
						'id' => '23',
						'type' => 'info',
						'desc' => __('<p class="description">Social Networks Links</p>', 'nhp-opts')
						),
					array(
						'id' => 'twitter',
						'type' => 'text',
						'title' => __('Twitter Link', 'nhp-opts'), 
						'sub_desc' => __('Paste in here your Twitter Url', 'nhp-opts'),
						),
					array(
						'id' => 'facebook',
						'type' => 'text',
						'title' => __('Facebook Link', 'nhp-opts'), 
						'sub_desc' => __('Paste in here your Facebook Url', 'nhp-opts'),
						),
					array(
						'id' => 'google',
						'type' => 'text',
						'title' => __('Google+ Link', 'nhp-opts'), 
						'sub_desc' => __('Paste in here your Google+ Url', 'nhp-opts'),
						),
					array(
						'id' => 'linkedin',
						'type' => 'text',
						'title' => __('Linkedin Link', 'nhp-opts'), 
						'sub_desc' => __('Paste in here your Linkedin Url', 'nhp-opts'),
						),
					array(
						'id' => 'contact',
						'type' => 'text',
						'title' => __('Your email', 'nhp-opts'), 
						'sub_desc' => __('Paste in here your email address', 'nhp-opts'),
						),
					
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_241_flash.png',
				'title' => __('Main Top Content', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'main_info',
						'type' => 'editor',
						'title' => __('Main Information', 'nhp-opts'), 
						'sub_desc' => __('Top main information under the logo', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						)
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_051_eye_open.png',
				'title' => __('Overview', 'nhp-opts'),
				'desc' => __('<p class="description">Main information & Images</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'overview',
						'type' => 'editor',
						'title' => __('Quienes Somos?', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'mision',
						'type' => 'editor',
						'title' => __('Nuestra Mision', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'vision',
						'type' => 'editor',
						'title' => __('Nuestra Vision', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
                                    	array(
						'id' => 'galeria',
						'type' => 'editor',
						'title' => __('Acerca de la Galeria', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'artistas',
						'type' => 'editor',
						'title' => __('Los Artistas', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'clientes',
						'type' => 'editor',
						'title' => __('Nestros Clientes', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
                                    /*
					array(
						'id' => 'gestion',
						'type' => 'editor',
						'title' => __('Gestion Cultural', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),*/
					array(
						'id' => 'proyartbol',
						'type' => 'editor',
						'title' => __('Proyecto ArTbol', 'nhp-opts'), 
						'sub_desc' => __('Main information above the images', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'image1',
						'type' => 'upload',
						'title' => __('Image 1', 'nhp-opts'), 
						),
					array(
						'id' => 'image2',
						'type' => 'upload',
						'title' => __('Image 2', 'nhp-opts'), 
						),
					array(
						'id' => 'image3',
						'type' => 'upload',
						'title' => __('Image 3', 'nhp-opts'), 
						),
					array(
						'id' => 'image4',
						'type' => 'upload',
						'title' => __('Image 4', 'nhp-opts'), 
						),
					array(
						'id' => 'image5',
						'type' => 'upload',
						'title' => __('Image 5', 'nhp-opts'), 
						),
					array(
						'id' => 'image6',
						'type' => 'upload',
						'title' => __('Image 6', 'nhp-opts'), 
						)																
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_242_google_maps.png',
				'title' => __('Venue', 'nhp-opts'),
				'desc' => __('<p class="description">Address Information and Map Setup</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'venue',
						'type' => 'editor',
						'title' => __('Venue Information', 'nhp-opts'), 
						'sub_desc' => __('Address, Post Code...', 'nhp-opts'),
						'desc' => __('Remember to select the tab "text" for HTML', 'nhp-opts'),
						'std' => ''
						),
					array(
						'id' => 'address',
						'type' => 'text',
						'title' => __('Venue Address', 'nhp-opts'),
						'sub_desc' => __('To make sure you input a correct address please use: <a href="http://www.doogal.co.uk/LatLong.php">http://www.doogal.co.uk/LatLong.php</a>', 'nhp-opts'),
						),		
					array(
						'id' => 'latitude',
						'type' => 'text',
						'title' => __('Venue Address Latitude', 'nhp-opts'),
						'sub_desc' => __('You can get the latitude of the venue here: <a href="http://www.doogal.co.uk/LatLong.php">http://www.doogal.co.uk/LatLong.php</a>', 'nhp-opts'),
						),	
					array(
						'id' => 'longitud',
						'type' => 'text',
						'title' => __('Venue Address Longitude', 'nhp-opts'),
						'sub_desc' => __('You can get the longitude of the venue here: <a href="http://www.doogal.co.uk/LatLong.php">http://www.doogal.co.uk/LatLong.php</a>', 'nhp-opts'),
						),							
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_159_picture.png',
				'title' => __('3D Gallery', 'nhp-opts'),
				'desc' => __('<p class="description">3d Gallery Settings and Options</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => '3d_text',
						'type' => 'text',
						'title' => __('Call to action text', 'nhp-opts'),
						'sub_desc' => __('Use a catchy phrase to get more conversions :)', 'nhp-opts'),
						),	
					array(
						'id' => '3d_button_text',
						'type' => 'text',
						'title' => __('Button Text', 'nhp-opts'),
						'sub_desc' => __('This text will go inside the button', 'nhp-opts'),
						),			
					array(
						'id' => '3d_link',
						'type' => 'text',
						'title' => __('Link URL', 'nhp-opts'),
						'sub_desc' => __('Paste the url of the page', 'nhp-opts'),
						),	
					array(
						'id' => '3d_image',
						'type' => 'upload',
						'title' => __('Background Image', 'nhp-opts'), 
						'sub_desc' => __('Upload the background image of your choice', 'nhp-opts'),
						),						
					)
				);
				
				
	$tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}
	
	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'nhp-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'nhp-opts').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'nhp-opts').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'nhp-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'nhp-opts'),
					'content' => $theme_info
					);
	
	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>