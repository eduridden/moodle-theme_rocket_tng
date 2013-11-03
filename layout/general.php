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
 
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hasheader = (empty($PAGE->layout_options['noheader']));

$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

// If there can be a sidepost region on this page and we are editing, always
// show it so blocks can be dragged into it.
if ($PAGE->user_is_editing()) {
    if ($PAGE->blocks->is_known_region('side-pre')) {
        $showsidepre = true;
    }
    if ($PAGE->blocks->is_known_region('side-post')) {
        $showsidepost = true;
    }
}
$hascustomfontsize = (!empty($PAGE->theme->settings->customfontsize));
if ($hascustomfontsize) {
    $fontsize=13;
	//$PAGE->requires->js_init_call('M.theme_rocket_tng.slider.init',array($fontsize), false, rocket_tng_get_js_module());
}
$hasdatetime=(!empty($PAGE->theme->settings->datetime));
$haslogo = (!empty($PAGE->theme->settings->logo));

$hasfootnote = (!empty($PAGE->theme->settings->footnote));
$navbar_inverse = '';
if (!empty($PAGE->theme->settings->invert)) {
    $navbar_inverse = 'navbar-inverse';
}
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';

if (empty($PAGE->layout_options['nocourseheaderfooter'])) {
    $courseheader = $OUTPUT->course_header();
    $coursecontentheader = $OUTPUT->course_content_header();
    if (empty($PAGE->layout_options['nocoursefooter'])) {
        $coursecontentfooter = $OUTPUT->course_content_footer();
        $coursefooter = $OUTPUT->course_footer();
    }
}

$layout = 'pre-and-post';
if ($showsidepre && !$showsidepost) {
    if (!right_to_left()) {
        $layout = 'side-pre-only';
    } else {
        $layout = 'side-post-only';
    }
} else if ($showsidepost && !$showsidepre) {
    if (!right_to_left()) {
        $layout = 'side-post-only';
    } else {
        $layout = 'side-pre-only';
    }
} else if (!$showsidepost && !$showsidepre) {
    $layout = 'content-only';
}
$bodyclasses[] = $layout;

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">

<?php echo $OUTPUT->standard_top_of_body_html() ?>


<div id="page">

<div class="header-con">
<div class="container-fluid">
<?php if ($hasheader) { ?>
<header id="page-header" class="clearfix">







<div class="fr">  
  <?php
	if(!isloggedin() or isguestuser()){
?>

<form method="post" id="cf_login" class="loginform" action="<?php echo $CFG->wwwroot.'/login/index.php' ?>">
	

	<div class="usename_input inlinetag">
		<input type="text" name="username" value="user name" id="cs_login_username" />
	</div>
	
	
	<div class="password_input inlinetag">
		<input type="password" name="password" value="password" id="login_passwords" />
	</div>
	
	<div class="submit_input inlinetag">
		<input type="submit" class="submit" value="submit" />
	</div>
	
	<div class="forgotPassword">
		<?php
			if(!empty($CFG->registerauth)){
				 $authplugin = get_auth_plugin($CFG->registerauth);
				 if($authplugin->can_signup()){
					//echo html_writer::link($CFG->wwwroot.'/login/signup.php', 'Sign Up');	//TODO   this should come through the language file 	
					?>
						<a href="<?php echo $CFG->wwwroot.'/login/signup.php' ?>">Create an account</a>
					<?php
					
					?>
								<a href=" <?php echo $CFG->wwwroot.'/login/signup.php' ?>"> &nbsp;&nbsp;&nbsp; </a>

					<?php
				 }
			}
			?>
			
			<a href=" <?php echo $CFG->wwwroot.'/login/forgot_password.php' ?>">Forgot Your Password</a>
	</div>
</form>
<?php 
	echo $OUTPUT->lang_menu();
}else{
	?>
	<div class="loginatas">
		<?php echo $OUTPUT->login_info();?>
	</div>
<?php
	echo $OUTPUT->lang_menu();
}
?>
  
 <div class="cl"></div>
 
  </div>
  
          <?php
    if (!$haslogo) { ?>
        <h1 class="logo"><?php echo $PAGE->heading ?></h1>
        <?php
    } else { ?>
         <a class="logo" href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>"></a>
        <?php
    } ?>
  
  

</header>


<?php } ?>

<div class="cl"></div>




  


   
<!--     <?php if (!empty($courseheader)) { ?>
        <div id="course-header"><?php echo $courseheader; ?></div>
    <?php } ?>--> 




<header role="banner" class="navbar navbar-fixed-top">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid" style="padding-left:0;">
        <div class="fr">
          <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->shortname; ?></a>
            <a class="btn btn-navbar" data-toggle="workaround-collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
            <?php if ($hascustommenu) {
                echo $custommenu;
            } ?>
            <ul class="nav pull-right">
            <li><?php echo $PAGE->headingmenu ?></li>
            </ul>
            </div>
            </div>
  
            
            
            
        </div>
    </nav>
</header>
<div class="cl"></div>



</div>
</div>


<div class="home" style="margin-bottom:20px;padding-bottom: 0;">
<div  class="container-fluid">
<?php if ($hasnavbar) { ?>
        <nav class="breadcrumb-button"><?php echo $PAGE->button; ?></nav>
        <?php echo $OUTPUT->navbar(); ?>
    <?php } ?>   

</div>
</div>




<div  class="container-fluid">
<div id="page-content" class="row-fluid">
  
  
    
     



<?php if ($layout === 'pre-and-post') { ?>
    <div id="region-bs-main-and-pre" class="span9">
    <div class="row-fluid">
    <section id="region-main" class="span8 pull-right">
<?php } else if ($layout === 'side-post-only') { ?>
    <section id="region-main" class="span9">
<?php } else if ($layout === 'side-pre-only') { ?>
    <section id="region-main" class="span9 pull-right">
<?php } else if ($layout === 'content-only') { ?>
    <section id="region-main" class="span12">
<?php } ?>


    <?php echo $coursecontentheader; ?>
    <?php echo $OUTPUT->main_content() ?>
    <?php echo $coursecontentfooter; ?>
    </section>


<?php if ($layout !== 'content-only') {
          if ($layout === 'pre-and-post') { ?>
            <aside class="span4 desktop-first-column">
    <?php } else if ($layout === 'side-pre-only') { ?>
            <aside class="span3 desktop-first-column">
    <?php } ?>
          <div id="region-pre" class="block-region">
          <div class="region-content">
          <?php
                if (!right_to_left()) {
                    echo $OUTPUT->blocks_for_region('side-pre');
                } else if ($hassidepost) {
                    echo $OUTPUT->blocks_for_region('side-post');
                }
          ?>
          </div>
          </div>
          </aside>
    <?php if ($layout === 'pre-and-post') {
          ?></div></div><?php // Close row-fluid and span9.
   }

    if ($layout === 'side-post-only' OR $layout === 'pre-and-post') { ?>
        <aside class="span3">
        <div id="region-post" class="block-region">
        <div class="region-content">
        <?php if (!right_to_left()) {
                  echo $OUTPUT->blocks_for_region('side-post');
              } else {
                  echo $OUTPUT->blocks_for_region('side-pre');
              } ?>
        </div>
        </div>
        </aside>
    <?php } ?>
<?php } ?>
<div class="cl"></div>

</div>
</div>


<div class="sitelink">
<div class="container-fluid">
<ul>
<li>
<h1>Information</h1>
<ul>
<li><a href="#">Contrary to </a></li>
<li><a href="#">Popular belief</a></li>
<li><a href="#">Lorem Ipsum</a></li>
<li><a href="#">Is not simply </a></li>
<li><a href="#">Random text</a></li>
<li><a href="#">It has roots</a></li>
</ul>
</li>


<li>
<h1>My account</h1>
<ul>
<li><a href="#">The standard </a></li>
<li><a href="#">Chunk of Lorem </a></li>
<li><a href="#">Ipsum used since </a></li>
<li><a href="#">The 1500s is </a></li>
<li><a href="#">Reproduced below </a></li>
<li><a href="#">For those interested</a></li>
<li><a href="#">Referral program</a></li>
</ul>


</li>


<li>
<h1>Follow us</h1>
<ul>
<li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/rocket_tng/pix/tw.png" alt=""/> - Twitter</a></li>
<li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/rocket_tng/pix/fb.png" alt=""/> - Facebook</a></li>
<li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/rocket_tng/pix/g.png" alt=""/> - RSS</a></li>
</ul>


</li>



<li>
<h1>Contact us</h1>
<ul>
<li>8901 Marmora Road, Glasgow, D04 89GR</li>
<li>Tel 1-800-234-5678</li>
</ul>


</li>
</ul>
</div>
</div>



<footer id="page-footer">
<div class="container-fluid">




    <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>

    <?php
        echo $OUTPUT->login_info();
		?>

    <?php
if ($hasfootnote) { ?>
   <div class="footnote text-center">
   <?php echo $PAGE->theme->settings->footnote; ?>
   </div>
    <?php
} ?>

    <?php echo $OUTPUT->standard_footer_html(); ?>

    
  
    <div class="cl"></div>
 </div>   
    
    
    
    
    
</footer>






</div>




<?php echo $OUTPUT->standard_end_of_body_html();
// -----code for back to top----------------------
if (!empty($PAGE->theme->settings->backtotop)) {
?>
<div id="back-to-top" style="display: none;"> 
    <a class="arrow" href="#" title="<?php echo get_string('backtotop', 'theme_rocket_tng')?>">&nbsp;</a> 
</div>
<?php }?>


</body>
</html>
