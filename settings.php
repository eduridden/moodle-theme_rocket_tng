<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This is built using the Clean template to allow for new theme's using
 * Moodle's new Bootstrap theme engine
 *
 *
 * @package   theme_rocket_tng
 * @copyright 2013 Julian Ridden
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
require_once('mycform.php');

if ($ADMIN->fulltree) {


    // menu's position setting

	//if the number of menu would be increase then the query would be change
    //TODO  in the condition array another condition would be apply
    // this else if code should be in short form

     
   // Logo file setting.
    $name = 'theme_rocket_tng/logo';
    $title = get_string('logo','theme_rocket_tng');
    $description = get_string('logodesc', 'theme_rocket_tng');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
    
    
	
	
	

/*
    // font size reference
    $name = 'theme_rocket_tng/fontsizereference';
    $title = get_string('fontsizereference','theme_rocket_tng');
    $description = get_string('fontsizereferencedesc', 'theme_rocket_tng');
    $default = '13';
    $choices = array(11=>'11px', 12=>'12px', 13=>'13px', 14=>'14px', 15=>'15px', 16=>'16px');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
    
    // font size change ability to user
    $name = 'theme_rocket_tng/customfontsize';
    $title = get_string('customfontsize','theme_rocket_tng');
    $description = get_string('customfontsizedesc', 'theme_rocket_tng');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
*/
    
    // back to top button
    $name = 'theme_rocket_tng/backtotop';
    $title = get_string('backtotop','theme_rocket_tng');
    $description = get_string('backtotopdesc', 'theme_rocket_tng');
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $settings->add($setting);
    
    
 /*
   // Display date and time
    $name = 'theme_rocket_tng/datetime';
    $title = get_string('datetime','theme_rocket_tng');
    $description = get_string('datetimedesc', 'theme_rocket_tng');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
*/
    
    
    // Custom CSS file.
    $name = 'theme_rocket_tng/customcss';
    $title = get_string('customcss', 'theme_rocket_tng');
    $description = get_string('customcssdesc', 'theme_rocket_tng');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_rocket_tng/footnote';
    $title = get_string('footnote', 'theme_rocket_tng');
    $description = get_string('footnotedesc', 'theme_rocket_tng');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
    
    
    
    
    $name = 'theme_rocket_tng/displayslider';
    $title = get_string('displayslider','theme_rocket_tng');
    $description = get_string('displaysliderdesc', 'theme_rocket_tng');
    $default = 1;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
   
   
   
   // Tag line setting
	$name = 'theme_rocket_tng/bannertagline';
	$title = get_string('bannertagline','theme_rocket_tng');
	$description = get_string('bannertaglinedesc', 'theme_rocket_tng');
	$setting = new admin_setting_configtext($name, $title, $description, '');
	$settings->add($setting);


   
   
   
   
   
   
   
   
  
 
   // banner links
    
    $name = 'theme_rocket_tng/first_link_text1';
	$title = get_string('first_link_text1','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Lorem Ipsum is simply ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url1';
	$title = get_string('first_link_url1','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 
 
 
 // banner links
    
    $name = 'theme_rocket_tng/first_link_text2';
	$title = get_string('first_link_text2','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Dummy text of the';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url2';
	$title = get_string('first_link_url2','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 
 // banner links
    
    $name = 'theme_rocket_tng/first_link_text3';
	$title = get_string('first_link_text3','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Printing and typesetting industry. ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url3';
	$title = get_string('first_link_url3','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 
 // banner links
    
    $name = 'theme_rocket_tng/first_link_text4';
	$title = get_string('first_link_text4','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Lorem Ipsum has been the industry';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url4';
	$title = get_string('first_link_url4','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 

 // banner links
    
    $name = 'theme_rocket_tng/first_link_text5';
	$title = get_string('first_link_text5','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Standard dummy text ever since the ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url5';
	$title = get_string('first_link_url5','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

 // banner links
    
    $name = 'theme_rocket_tng/first_link_text6';
	$title = get_string('first_link_text6','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'When an unknown ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url6';
	$title = get_string('first_link_url6','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);


 // banner links
    
    $name = 'theme_rocket_tng/first_link_text7';
	$title = get_string('first_link_text7','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Printer took a galley of type and ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url7';
	$title = get_string('first_link_url7','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 

  // banner links
    
    $name = 'theme_rocket_tng/first_link_text8';
	$title = get_string('first_link_text8','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Scrambled it to make a ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url8';
	$title = get_string('first_link_url8','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 

     // banner links
    
    $name = 'theme_rocket_tng/first_link_text9';
	$title = get_string('first_link_text9','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Type specimen book. It has survived ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url9';
	$title = get_string('first_link_url9','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 
   // banner links
    
    $name = 'theme_rocket_tng/first_link_text10';
	$title = get_string('first_link_text10','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'Not only five centuries, ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url10';
	$title = get_string('first_link_url10','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 
 // banner links
    
    $name = 'theme_rocket_tng/first_link_text11';
	$title = get_string('first_link_text11','theme_rocket_tng');
	$description = get_string('first_link_textdesc1', 'theme_rocket_tng');
	$default = 'But also the leap into electronic ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
	
	
	    // banner links
    
    $name = 'theme_rocket_tng/first_link_url11';
	$title = get_string('first_link_url11','theme_rocket_tng');
	$description = get_string('first_link_urldesc1', 'theme_rocket_tng');
	$default = 'http://docs.moodle.org/25/en/Main_page ';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);
 
      
}

?>