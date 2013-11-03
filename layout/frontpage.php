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
$display_slider = (empty($PAGE->theme->settings->displayslider) ||$PAGE->theme->settings->displayslider < 1) ? 0 : 1;
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

$haslogo = (!empty($PAGE->theme->settings->logo));

$hasbanner = (!empty($PAGE->theme->settings->banner));



$hasfootnote = (!empty($PAGE->theme->settings->footnote));
$navbar_inverse = '';
if (!empty($PAGE->theme->settings->invert)) {
    $navbar_inverse = 'navbar-inverse';
}

if (!empty($PAGE->theme->settings->bannertagline)) {
    $bannertagline = '<span>'.$PAGE->theme->settings->bannertagline.'</span>';
} else {
    $bannertagline = 'you can easily Remove or add This  tagline';
}



$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));



$first_link_url1 = (!empty($PAGE->theme->settings->first_link_url1));

$first_link_text1 = (!empty($PAGE->theme->settings->first_link_text1));

$first_link_url2 = (!empty($PAGE->theme->settings->first_link_url2));

$first_link_text2 = (!empty($PAGE->theme->settings->first_link_text2));

$first_link_url3 = (!empty($PAGE->theme->settings->first_link_url3));

$first_link_text3 = (!empty($PAGE->theme->settings->first_link_text3));

$first_link_url4 = (!empty($PAGE->theme->settings->first_link_url4));

$first_link_text4 = (!empty($PAGE->theme->settings->first_link_text4));

$first_link_url5 = (!empty($PAGE->theme->settings->first_link_url5));

$first_link_text5 = (!empty($PAGE->theme->settings->first_link_text5));

$first_link_url6 = (!empty($PAGE->theme->settings->first_link_url6));

$first_link_text6 = (!empty($PAGE->theme->settings->first_link_text6));

$first_link_url7 = (!empty($PAGE->theme->settings->first_link_url7));

$first_link_text7 = (!empty($PAGE->theme->settings->first_link_text7));

$first_link_url8 = (!empty($PAGE->theme->settings->first_link_url8));

$first_link_text8 = (!empty($PAGE->theme->settings->first_link_text8));

$first_link_url9 = (!empty($PAGE->theme->settings->first_link_url9));

$first_link_text9 = (!empty($PAGE->theme->settings->first_link_text9));

$first_link_url10 = (!empty($PAGE->theme->settings->first_link_url10));

$first_link_text10 = (!empty($PAGE->theme->settings->first_link_text10));

$first_link_url11 = (!empty($PAGE->theme->settings->first_link_url11));

$first_link_text11 = (!empty($PAGE->theme->settings->first_link_text11));












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
if ($display_slider) {
    $bodyclasses[] = 'image-slider';
}
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


<!-- BANNER -->
				
<div class="slider-box-wrapper">

			<?php  if ($display_slider) { ?>
			
		<div class="slider-box sli"  style="width:23%;">
    <ul class="rslides" id="slider3" style="overflow:hidden;">
	    <li>
	    <ul>
<?php 
	if($first_link_text1 && $first_link_url1){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url1;?> "><?php echo $PAGE->theme->settings->first_link_text1; ?></a></li>
		<?php
		
	}
?>

	    
	    
	    <?php 
	if($first_link_text2 && $first_link_url2){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url2;?> "><?php echo $PAGE->theme->settings->first_link_text2; ?></a></li>
		<?php
		
	}
?>
	   <?php 
	if($first_link_text3 && $first_link_url3){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url3;?> "><?php echo $PAGE->theme->settings->first_link_text3; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text4 && $first_link_url4){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url4;?> "><?php echo $PAGE->theme->settings->first_link_text4; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text5 && $first_link_url5){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url5;?> "><?php echo $PAGE->theme->settings->first_link_text5; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text6 && $first_link_url6){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url6;?> "><?php echo $PAGE->theme->settings->first_link_text6; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text7 && $first_link_url7){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url7;?> "><?php echo $PAGE->theme->settings->first_link_text7; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text8 && $first_link_url8){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url8;?> "><?php echo $PAGE->theme->settings->first_link_text8; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text9 && $first_link_url9){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url9;?> "><?php echo $PAGE->theme->settings->first_link_text9; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text10 && $first_link_url10){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url10;?> "><?php echo $PAGE->theme->settings->first_link_text10; ?></a></li>
		<?php
		
	}
?>
	    <?php 
	if($first_link_text11 && $first_link_url11){
	?>
	
	
		<li><a href="<?php echo $PAGE->theme->settings->first_link_url11;?> "><?php echo $PAGE->theme->settings->first_link_text11; ?></a></li>
		<?php
		
	}
?>
	    </ul>
	    </li>

	    		    

    </ul>
    
    
    
     
    
    

         </div>	
			
			
				 <div class="slider-box"  style="width:77%;">
				 <div class="callbacks_container">
    <ul class="rslides" id="slider4">
	    <li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/rocket_tng/pix/slider/01.png" alt=""/></a>
	    
	    		    </li>
	    <li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/rocket_tng/pix/slider/02.png" alt=""/></a>
	    	
	    		    </li>
	    		   
    </ul>
    </div>
    </div>



	

			   <?php }else{?>
				
		   <?php }?>
		   
	   
	<div class="cl"></div>	   
		   
</div>





<div class="cl"></div>



<!-- END OF BANNER -->







</div>
</div>

<div class="home">
<div  class="container-fluid">
<div class="fl"><img src="<?php echo $CFG->wwwroot;?>/theme/rocket_tng/pix/ico.png" alt=""/><a href="<?php echo $CFG->wwwroot; ?>">Home</a></div>
<div class="fr">

         <form id="searchbox_demo" action="http://www.google.com/cse">
 <div class="search">

  <input name="q" type="text" size="40" value="" />
  <input type="submit" name="sa" value="" class="submit" />
  </div>
</form> 

</div>


</div>

</div>



<div  class="container-fluid">
<div id="page-content" class="row-fluid">


 
 <?php  if ($bannertagline) { ?>
				<div class="tagline"><?php echo $bannertagline; ?></div>
		   <?php }else{?>
				<div class="tagline">&nbsp;</div>
		   <?php }?>  

 <div class="cl"></div>
 

<!-- 

<div class="welcome">
<h1>Welcome to <span>our school</span></h1>
<div class="con">
<div class="fl"><img src="http://192.168.1.153/mth/moodle25/draftfile.php/5/user/draft/553306298/img2.png" height="191" width="191" /></div>
<div class="fr">
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. Amet..", comes from a line in section 1.10.32.</p>
</div>
<div class="cl"></div>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,</p>
</div>
</div>


 -->
<!--
<div class="inner">

<div class="fl round">27
mar</div>

<div class="fr">Lorem ipsum dolor sit amet, consectetuer.</div>

<div class="cl"></div>


<div class="inner">

<div class="fl round">27
mar</div>

<div class="fr">Lorem ipsum dolor sit amet, consectetuer.</div>

<div class="cl"></div>



<div class="inner">

<div class="fl round">27
mar</div>

<div class="fr">Lorem ipsum dolor sit amet, consectetuer.</div>

<div class="cl"></div>



</div>
-->
<!-- <div class="myblock">
<div class="header"><img src="http://192.168.1.153/mth/moodle25/draftfile.php/5/user/draft/920386844/tw1.png" height="17" width="21" /> Twitter Feed</div>
<div class="con">
<ul>
<li>
<div class="fl"><img src="http://192.168.1.153/mth/moodle25/draftfile.php/5/user/draft/920386844/img.png" height="45" width="43" /></div>
<div class="fr"><a href="#">mypsd </a> Twitter plus Moodleplus <a href="#">@upthemes </a> = win. 1 hour ago</div>
<div class="cl"></div>
</li>
<li>
<div class="fl"><img src="http://192.168.1.153/mth/moodle25/draftfile.php/5/user/draft/920386844/img1.png" height="43" width="43" /></div>
<div class="fr"><a href="#">upthemes </a> Check out Day 321 - Tweet tweet - <a href="#">http://ceducation.com/day/321/</a></div>
<div class="cl"></div>
</li>
</ul>
</div>
<div class="cl"></div>
</div> -->


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
