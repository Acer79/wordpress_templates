<?php

/* SHORTCODES FUNCTION QT ROTATOR */

?>

<p class="title"><?php _e('Content Source','adonepage'); ?></p>
     
     <select id="adonepage-content-source-qtrotator" name="adonepage-content-source-qtrotator" class="">
    	
         <option value="clients">Clients</option>
         <option value="posts">Post</option>
         <option value="team">Team</option>
         
     </select> 

<div id="adonepage-category-posts-qtrotator" style="display:none;">

<p class="position"><?php _e('Select Category (Multiple category is allowed)', 'adonepage'); ?></p>
       <select id="adonepage-category-posts-qtrotator" multiple="multiple">
       <option value="all"><?php _e('All','adonepage'); ?></option>
	   <?php 
  			$categories = get_categories(); 
  			foreach ($categories as $category) {
			$option = '<option value="'.$category->slug.'">';
			$option .= $category->cat_name;
			$option .= ' ('.$category->category_count.')';
			$option .= '</option>';
			echo $option;
  			}
 		?>
       </select>

</div>

<p class="position"><?php _e('Number Post Load (Default 8): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-number-qtrotator" name="adonepage-number-qtrotator" id="adonepage-number-qtrotator" value="">

<p class="title"><?php _e('Main Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-qtrotator-color" name="adonepage-qtrotator-color"/> 

<p class="position"><?php _e('Number Text Excerpt: ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-qtrotator-excerpt" name="adonepage-qtrotator-excerpt" id="adonepage-qtrotator-excerpt" value="">

<?php /* END */ ?>