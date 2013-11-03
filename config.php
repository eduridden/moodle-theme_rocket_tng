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
 * @package   theme_essential
 * @copyright 2013 Julian Ridden
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$THEME->name = 'rocket_tng';

/////////////////////////////////
// The only thing you need to change in this file when copying it to
// create a new theme is the name above. You also need to change the name
// in version.php and lang/en/theme_rocket_tng.php as well.
//////////////////////////////////
//
$THEME->doctype = 'html5';
$THEME->yuicssmodules = array();
$THEME->parents = array('clean','bootstrapbase');
$THEME->sheets = array('slides', 'lightbox', 'font-awesome.min', 'rocket_tng');
$THEME->supportscssoptimisation = false;
$THEME->enable_dock = false;
$THEME->yuicssmodules = array();

$THEME->editor_sheets = array();

$THEME->plugins_exclude_sheets = array(
    'block' => array(
        'html',
    ),
    'gradereport' => array(
        'grader',
    ),
);

$THEME->layouts = array(
    'base' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'standard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'course' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre'
    ),
    'coursecategory' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'incourse' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
         'options' => array('nonavbar'=>true),
    ),
    'admin' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'admin' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'mydashboard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    'mypublic' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
        'options' => array('nonavbar'=>true,'noheader'=>true),
    ),
    'popup' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'noblocks'=>true, 'nonavbar'=>true),
    ),
    'frametop' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true),
    ),
    'maintenance' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true),
    ),
    'embedded' => array(
        'theme' => 'canvas',
        'file' => 'embedded.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true),
    ),
    
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>false, 'noblocks'=>true),
    ),
    'report' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
);

$THEME->javascripts = array(
);

$THEME->javascripts_footer = array(
    'dockmod'
);

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->csspostprocess = 'theme_essential_process_css';

$useragent = '';
if (!empty($_SERVER['HTTP_USER_AGENT'])) {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
}

if (core_useragent::is_ie() && !core_useragent::check_ie_version('9.0')) {
    $THEME->javascripts[] = 'html5shiv';
}




