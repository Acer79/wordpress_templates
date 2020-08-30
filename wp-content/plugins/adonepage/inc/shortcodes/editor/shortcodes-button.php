<?php
/* SHORTCODE BUTTON FUNCTION */
?>

     <p class="title"><?php _e('Tag','adonepage'); ?></p>
     
     <select id="adonepage-button-type" name="adonepage-button-type" class="">
     
         <option value="circle">Circle</option>
         <option value="rectangle">Rectangle</option>
         <option value="custom">Custom</option>
         
     </select> 

	<div id="adonepage-button-custom-div" style="display:none;">
    
    <p class="title"><?php _e('Padding (ex: 10px)','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-padding" name="adonepage-button-padding" id="adonepage-button-padding" value="">
     
    <p class="title"><?php _e('Margin (ex: 10px)','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-margin" name="adonepage-button-margin" id="adonepage-button-margin" value="">   

    <p class="title"><?php _e('Border Radius (ex: 10px)','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-border-radius" name="adonepage-button-border-radius" id="adonepage-button-border-radius" value=""> 

    <p class="title"><?php _e('Button Font Size (ex: 10px)','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-font-size" name="adonepage-button-font-size" id="adonepage-button-font-size" value="">
 
	 <p class="title"><?php _e('Button Text/Image Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-button-font-color" name="adonepage-button-font-color"/> 

	 <p class="title"><?php _e('Background Button Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-button-color" name="adonepage-button-color"/> 
  
	 <p class="title"><?php _e('Background Button Color Over','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-button-color-over" name="adonepage-button-color-over"/> 
  
    <p class="title"><?php _e('Opacity (0.1 to 1)','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-opacity" name="adonepage-button-opacity" id="adonepage-button-opacity" value=""> 

     <p class="title"><?php _e('Responsive Important (This Value is valid for size field responsive)','adonepage'); ?></p>
     
     <select id="adonepage-button-responsive-important" name="adonepage-button-responsive-important" class="">
     
     	 <option value="xxl">xxl</option>
         <option value="xl">xl</option>
         <option value="l">l</option>
         <option value="xxm">xxm</option>
         <option value="xm">xm</option>
         <option value="m">m</option>
         <option value="xxs">xxs</option>
     	 <option value="xs">xs</option>
     	 <option value="s">s</option>
                 
     </select>  
    
    </div>

    <p class="title"><?php _e('Button Content','adonepage'); ?></p>
    
    <select id="adonepage-button-content" name="adonepage-button-content" class="">
     
         <option value="image">Image</option>
         <option value="text">Text</option>
                  
    </select> 	

	<div id="adonepage-button-image-div">

    <p class="title"><?php _e('Button Image','adonepage'); ?></p>
    
    <select id="adonepage-button-image" name="adonepage-button-image" class="">
     
         <option value="icon-arrow-down">Arrow Down</option>
         <option value="icon-arrow-up">Arrow Up</option>
         <option value="icon-arrow-left">Arrow Left</option>
         <option value="icon-arrow-right">Arrow Right</option>
         <option value="icon-arrow-up-left">Arrow Up Left</option>
         <option value="icon-arrow-up-right">Arrow Up Right</option>
         <option value="icon-arrow-down-right">Arrow Down Right</option>
         <option value="icon-arrow-down-left">Arrow Down Left</option>
         
         <option value="icon-arrow-down2">Arrow Down (Version 2)</option>
         <option value="icon-arrow-up2">Arrow Up (Version 2)</option>
         <option value="icon-arrow-left2">Arrow Left (Version 2)</option>
         <option value="icon-arrow-right2">Arrow Right (Version 2)</option>
         <option value="icon-arrow-up-left2">Arrow Up Left (Version 2)</option>
         <option value="icon-arrow-up-right2">Arrow Up Right (Version 2)</option>
         <option value="icon-arrow-down-right2">Arrow Down Right (Version 2)</option>
         <option value="icon-arrow-down-left2">Arrow Down Left (Version 2)</option>        
         
         <option value="icon-arrow-down3">Arrow Down (Version 3)</option>
         <option value="icon-arrow-up3">Arrow Up (Version 3)</option>
         <option value="icon-arrow-left3">Arrow Left (Version 3)</option>
         <option value="icon-arrow-right3">Arrow Right (Version 3)</option>
         <option value="icon-arrow-up-left3">Arrow Up Left (Version 3)</option>
         <option value="icon-arrow-up-right3">Arrow Up Right (Version 3)</option>
         <option value="icon-arrow-down-right3">Arrow Down Right (Version 3)</option>
         <option value="icon-arrow-down-left3">Arrow Down Left (Version 3)</option>            

         <option value="icon-checkmark">Checkmark</option>
         <option value="icon-checkmark2">Checkmark (Version 2)</option>
         <option value="icon-close">Close</option>
         <option value="icon-minus">Minus</option>
         <option value="icon-plus">Plus</option>
         <option value="icon-reply">Reply</option>
         <option value="icon-forward">Forward</option>
         <option value="icon-undo">Undo</option> 
         <option value="icon-undo2">Undo (Version 2)</option>
         <option value="icon-redo">Redo</option>
         <option value="icon-redo2">Redo (Version 2)</option>         
         <option value="icon-home">Home</option>
 		 <option value="icon-home2">Home (Version 2)</option>
         <option value="icon-home3">Home (Version 3)</option>
                           
    </select> 	

	</div>

	<div id="adonepage-button-text-div">
    
    <p class="title"><?php _e('Button Text','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-text" name="adonepage-button-text" id="adonepage-button-text" value="">
      
    </div>

    <p class="title"><?php _e('Link','adonepage'); ?></p>
     
    <input type="text" class="adonepage-button-link" name="adonepage-button-link" id="adonepage-button-link" value="">	

    <p class="title"><?php _e('Target Link','adonepage'); ?></p>
    
    <select id="adonepage-button-target" name="adonepage-button-target" class="">
     
         <option value="_self">Self</option>
         <option value="_blank">Blank</option>
                  
    </select> 
    
<?php // END ?>