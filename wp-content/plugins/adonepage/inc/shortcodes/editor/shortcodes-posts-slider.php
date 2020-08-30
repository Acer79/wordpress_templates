<?php

/* SHORTCODES FUNCTION POSTS SLIDER */

?>

<p class="position"><?php _e('Select Category (Multiple category is allowed)', 'adonepage'); ?></p>
       <select id="adonepage-category-posts-slider" multiple="multiple">
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

<p class="position"><?php _e('Number Post Load (Default 8): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-number-posts-slider" name="adonepage-number-posts-slider" id="adonepage-number-posts-slider" value="">

<p class="title"><?php _e('Main Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-posts-slider-color" name="adonepage-posts-slider-color"/> 

<p class="position"><?php _e('Number Text Excerpt: ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-posts-slider-excerpt" name="adonepage-posts-slider-excerpt" id="adonepage-posts-slider-excerpt" value="">

<?php /* END */ ?>