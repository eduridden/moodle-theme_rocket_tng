<?php
require_once($CFG->libdir.'/formslib.php');

//****************************change in css**********************************************************
/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string
 */
function rocket_tng_user_settings($css, $theme) {    
    
    
    
        // Set the font reference size
    if (empty($theme->settings->fontsizereference)) {
        $fontsizereference = '13'; // default
    } else {
        $fontsizereference = $theme->settings->fontsizereference;
    }
    $css = rocket_tng_set_fontsizereference($css, $fontsizereference);


	
    return $css;
   
}

/**
 * Sets the region width variable in CSS
 *
 * @param string $css
 * @param mixed $regionwidth
 * @return string
 */
 
function rocket_tng_set_fontsizereference($css, $fontsizereference) {
	global $PAGE;
	//var_dump($PAGE->theme->settings);
	

	if (!empty($PAGE->theme->settings->customfontsize) && isset($_COOKIE['yuifont'])){
		$fontsizereference=$_COOKIE['yuifont'];
	}
    $tag = '[[setting:fontsizereference]]';
    $css = str_replace($tag, $fontsizereference.'px', $css);
    $css =  rocket_tng_mk_height_asbar($fontsizereference, $css);
	return $css;
}

function rocket_tng_mk_height_asbar($asbheight, $css){
	$tag = '[[setting:asbheight]]';
	
	// +1 can be tricky it is used tackle height of asweombar 
	// when redirect to other page, in that time 
	//$height = 30 + ($asbheight - 13) + 1 ; 
	$height = 30 + ($asbheight - 13) ;
	$css = str_replace($tag, $height.'px', $css);
	return $css;
}

function rocket_tng_get_js_module() {
    global $PAGE;
    return array(
        'name' => 'theme_rocket_tng',
        'fullpath' => '/theme/rocket_tng/yui/slider.js',
        'requires' => array('base', 'node', 'slider', 'dd-drag','cookie'),
    );
}

function rocket_tng_initialise_awesomebar(moodle_page $page) {
    $page->requires->yui_module('moodle-theme_rocket_tng-awesomebar', 'M.theme_rocket_tng.initAwesomeBar');
}
function rocket_tng_process_css($css, $theme) {

 
    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = rocket_tng_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = rocket_tng_set_customcss($css, $customcss);
	
	  // Set the font reference size
    if (empty($theme->settings->fontsizereference)) {
        $fontsizereference = '13'; // default
    } else {
        $fontsizereference = $theme->settings->fontsizereference;
    }
    $css = rocket_tng_set_fontsizereference($css, $fontsizereference);
    
    return $css;
}

function rocket_tng_set_logo($css, $logo) {
    global $OUTPUT;
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function theme_rocket_tng_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'logo') {
        $theme = theme_config::load('rocket_tng');
        return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

function rocket_tng_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}