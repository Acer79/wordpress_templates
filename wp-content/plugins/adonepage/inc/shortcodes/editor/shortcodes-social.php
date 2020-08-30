<?php
/* FUNCTION SHORTCODES SOCIAL */
?>

     <p class="title"><?php _e('Type','adonepage'); ?></p>
     
     <select id="adonepage-social-type" name="adonepage-social-type" class="">
     
         <option value="link">link</option>
         <option value="share">share</option>
         
     </select>    
     
     <p class="position"><?php _e('Color: ', 'adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-social-color" name="adonepage-social-color"/> 
     
     <p class="position"><?php _e('Font Size (ex 12px): ', 'adonepage'); ?></p>
    
     <input type="text" class="adonepage-social-size" name="adonepage-social-size" id="adonepage-social-size" value="">        

     <p class="position"><?php _e('Margin (ex 12px or 12px 0 12px 0): ', 'adonepage'); ?></p>
    
     <input type="text" class="adonepage-social-margin" name="adonepage-social-margin" id="adonepage-social-margin" value="">        
       
     
     <div id="adonepage-social-link-div">

     <p class="title"><?php _e('Facebook Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-facebook" name="adonepage-social-link-facebook" id="adonepage-social-link-facebook" value="">
     
     <p class="title"><?php _e('Twitter Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-twitter" name="adonepage-social-link-twitter" id="adonepage-social-link-twitter" value="">

     <p class="title"><?php _e('Linkedin Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-linkedin" name="adonepage-social-link-linkedin" id="adonepage-social-link-linkedin" value="">

     <p class="title"><?php _e('Google Plus Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-gplus" name="adonepage-social-link-gplus" id="adonepage-social-link-gplus" value="">

     <p class="title"><?php _e('Pinterest Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-pinterest" name="adonepage-social-link-pinterest" id="adonepage-social-link-pinterest" value="">

     <p class="title"><?php _e('Youtube Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-youtube" name="adonepage-social-link-youtube" id="adonepage-social-link-youtube" value="">
  
     <p class="title"><?php _e('Flickr Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-flickr" name="adonepage-social-link-flickr" id="adonepage-social-link-flickr" value="">
  
     <p class="title"><?php _e('Tumblr Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-tumblr" name="adonepage-social-link-tumblr" id="adonepage-social-link-tumblr" value="">

     <p class="title"><?php _e('Rss Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-rss" name="adonepage-social-link-rss" id="adonepage-social-link-rss" value="">
   
     <p class="title"><?php _e('Vimeo Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-vimeo" name="adonepage-social-link-vimeo" id="adonepage-social-link-vimeo" value="">

     <p class="title"><?php _e('Contact Link (Leave empty if you want disable)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-social-link-contact" name="adonepage-social-link-contact" id="adonepage-social-link-contact" value="">
                           
     </div>
     

     <div id="adonepage-social-share-div" style="display:none">

	<p class="position"><?php _e('Facebook', 'adonepage'); ?></p>

         <select id="adonepage-social-share-facebook" name="adonepage-social-share-facebook" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>  

	<p class="position"><?php _e('Twitter', 'adonepage'); ?></p>

         <select id="adonepage-social-share-twitter" name="adonepage-social-share-twitter" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>  

	<p class="position"><?php _e('Google Plus', 'adonepage'); ?></p>

         <select id="adonepage-social-share-gplus" name="adonepage-social-share-gplus" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select> 

	<p class="position"><?php _e('Linkedin', 'adonepage'); ?></p>

         <select id="adonepage-social-share-linkedin" name="adonepage-social-share-linkedin" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select> 

	<p class="position"><?php _e('Pinterest', 'adonepage'); ?></p>

         <select id="adonepage-social-share-pinterest" name="adonepage-social-share-pinterest" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select> 

	 </div> 
     
<?php 

/* END */

?>