<?php
/*
File: inc/shortcodes.php
Description: Plugin shortcodes
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adonepage_button( $page = null, $target = null ) {



  echo '<a href="#" class="button" title="ADTHEME SHORTCODES" id="adonepage-generator-button"><span class="adonepage-button-portfolio"></span>ADD ADTHEME SHORTCODES</a>';	


 }

add_action( 'media_buttons', 'adonepage_button', 100 );

function adonepage_generator() {

	?>

	<div id="adonepage-generator-overlay" class="adonepage-overlay-bg" style="display:none"></div>

  <div id="adonepage-generator-wrap" style="display:none">

   <div id="adonepage-generator">

       <a href="#" id="adonepage-generator-close"><span class="adonepage-close">x</span></a>
       
     <p class="position2"><?php _e('Choose Shortcodes','adonepage'); ?></p>
     
     <select id="adonepage-shortcode-type" name="adonepage-shortcode-type" class="">
     
         <option value="ad-typography">Typography</option>
         <option value="ad-button-shortcodes">Button</option>
         <option value="ad-portfolio">Portfolio</option>
         <option value="ad-gallery">Gallery</option>
         <option value="ad-carousel">Carousel</option>
         <option value="ad-map">Map</option>
         <option value="ad-columns">Column</option>
         <option value="ad-onscroll">On Scroll</option>
         <option value="ad-social">Social</option>
		 <option value="ad-lists">Lists</option>
         <option value="ad-effects">Effects</option>
         <option value="ad-charts">Charts</option>
         <option value="ad-countdown">Countdown</option>
         <option value="ad-box">Box</option>
         <option value="ad-icon">Add Icon</option>
         <option value="ad-woocommerce">Woocommerce</option>
                       
     </select>
     
     <div id="ad-typograghy-div">
	 
	 <?php require('shortcodes-typography.php'); ?>    
     
     </div>  

     <div id="ad-button-div" style="display:none;">
	 
	 <?php require('shortcodes-button.php'); ?>    
     
     </div> 

     <div id="ad-portfolio-div" style="display:none;">
	 
	 <?php require('shortcodes-portfolio.php'); ?>    
     
     </div> 

     <div id="ad-gallery-div" style="display:none;">
	 
	 <?php require('shortcodes-gallery.php'); ?>    
     
     </div>

     <div id="ad-carousel-div" style="display:none;">
	 
	 <?php require('shortcodes-carousel.php'); ?>    
     
     </div>

     <div id="ad-map-div" style="display:none;">
	 
	 <?php require('shortcodes-map.php'); ?>    
     
     </div>

     <div id="ad-columns-div" style="display:none;">
	 
	 <?php require('shortcodes-columns.php'); ?>    
     
     </div>

     <div id="ad-social-div" style="display:none;">
	 
	 <?php require('shortcodes-social.php'); ?>    
     
     </div>

     <div id="ad-onscroll-div" style="display:none;">
	 
	 <?php require('shortcodes-onscroll.php'); ?>    
     
     </div>

     <div id="ad-icon-div" style="display:none;">
	 
	 <?php require('shortcodes-icon.php'); ?>    
     
     </div>

     <div id="ad-lists-div" style="display:none;">
	 
	 <?php require('shortcodes-lists.php'); ?>    
     
     </div>
     
     <div id="ad-effects-div" style="display:none;">
	 
	 <?php require('shortcodes-effects.php'); ?>    
     
     </div>      

     <div id="ad-carousel-div" style="display:none;">
	 
	 <?php require('shortcodes-carousel.php'); ?>    
     
     </div> 

     <div id="ad-charts-div" style="display:none;">
	 
	 <?php require('shortcodes-charts.php'); ?>    
     
     </div> 
     
     <div id="ad-countdown-div" style="display:none;">
	 
	 <?php require('shortcodes-countdown.php'); ?>    
     
     </div>     

     <div id="ad-box-div" style="display:none;">
	 
	 <?php require('shortcodes-box.php'); ?>    
     
     </div>

     <div id="ad-woocommerce-div" style="display:none;">
	 
	 <?php require('shortcodes-woocommerce.php'); ?>    
     
     </div>
               
        <br />      
       <input name="adonepage-generator-insert" type="submit" class="button button-primary button-large" id="adonepage-generator-insert" value="Insert Shortcodes">
       
       </div>

   </div>
   
	<?php

}

add_action( 'admin_footer', 'adonepage_generator' );