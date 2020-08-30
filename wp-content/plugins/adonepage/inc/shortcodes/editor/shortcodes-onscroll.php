<?php
/* FUNCTION SHORTCODES ONSCROLL */
?>

     <p class="title"><?php _e('Type','adonepage'); ?></p>
     
     <select id="adonepage-onscroll-type" name="adonepage-onscroll-type" class="">
     
         <option value="image_text">Image (Left) - Text (Right)</option>
         <option value="text_image">Text (Left) - Image (Right)</option>
         <option value="custom">Custom</option>
         
     </select>    

	<div id="adonepage-onscroll-type-image_text">

     <p class="title"><?php _e('Title','adonepage'); ?></p>
     
     <input type="text" class="adonepage-onscroll-title" name="adonepage-onscroll-title" id="adonepage-onscroll-title" value="">

     <p class="title"><?php _e('Text','adonepage'); ?></p>
     
     <input type="text" class="adonepage-onscroll-text" name="adonepage-onscroll-text" id="adonepage-onscroll-text" value="">
     
     <p class="title"><?php _e('Url Image','adonepage'); ?></p>

     <input type="text" class="adonepage-onscroll-url-image" name="adonepage-onscroll-url-image" id="adonepage-onscroll-url-image" value="">
   		
    </div>
     
<?php 

/* END */

?>