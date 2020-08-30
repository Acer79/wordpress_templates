<?php
/* FUNCTION SHORTCODES ICON */
?> 
   <p class="title"><?php _e('Select Icon','adonepage'); ?></p>
   <?php  
   	require('icons-list.php');
   
	// Stamp the list of icons by specific type (fontawesome, icomoon, etc)
	function adop_icon_list ($icons_array, $type, $display = 'block') {
		
		echo '<ul id="adonepage" class="'.$type.'-icon-list adtheme-icon" style="display:'.$display.';">';
		
		foreach ( $icons_array[$type] as $icon ) {

			echo '<li>
			<input name="name" type="radio" value="' . $icon . '" id="' . $icon . '">
			<label for="' . $icon . '"><i class="' . $icon . '"></i></label>
			</li>';

		} 

		echo '</ul>';
		
	}
     ?>
     
     <div class="adonepage-icon-select">
     
     <?php adop_icon_list($adtheme_icons_list, 'moon', 'block'); ?>
     
     </div>
     
     
     
     <p class="title"><?php _e('Icon Size (ex: 20px)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-icon-size" name="adonepage-icon-size" id="adonepage-icon-size" value="">
     
	 <p class="title"><?php _e('Icon Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-icon-color" name="adonepage-icon-color"/> 

	 <p class="title"><?php _e('Icon Color Over','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-icon-color-over" name="adonepage-icon-color-over"/> 

     <p class="title"><?php _e('Margin (ex 2px or 2px 2px 2px 2px)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-icon-margin" name="adonepage-icon-margin" id="adonepage-icon-margin" value="">

     <p class="title"><?php _e('Padding (ex 2px or 2px 2px 2px 2px)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-icon-padding" name="adonepage-icon-padding" id="adonepage-icon-padding" value="">
     
     <p class="title"><?php _e('Float','adonepage'); ?></p>
     
     <select id="adonepage-icon-float" name="adonepage-icon-float" class="">
     
         <option value="left">left</option>
         <option value="right">right</option>
         <option value="none">none</option>
         
     </select>  
   		  
<?php 

/* END */

?>