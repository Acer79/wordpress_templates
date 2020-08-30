<?php

/* SHORTCODES FUNCTION GALLERY */

?>

<p class="position"><?php _e('Select Category (Multiple category is allowed)', 'adonepage'); ?></p>
       <select id="adonepage-gallery-category" multiple="multiple">
       <option value="all"><?php _e('All','adonepage'); ?></option>
	   <?php 
  			$categories = get_categories('taxonomy=adgallery_post_cat'); 
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

   		<input type="text" class="adonepage-gallery-number" name="adonepage-gallery-number" id="adonepage-gallery-number" value="">

<p class="title"><?php _e('Background Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-gallery-color" name="adonepage-gallery-color"/> 
  
<p class="title"><?php _e('Font Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-gallery-font-color" name="adonepage-gallery-font-color"/> 
  
<p class="title"><?php _e('Item Padding','adonepage'); ?></p>
     
    <input type="text" class="adonepage-gallery-item-padding" name="adonepage-gallery-item-padding" id="adonepage-gallery-item-padding" value="">


<p class="position"><?php _e('Show Filter: ', 'adonepage'); ?></p>

         <select id="adonepage-gallery-show-filter" name="adonepage-gallery-show-filter" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>   

<p class="position"><?php _e('Filter Position: ', 'adonepage'); ?></p>

         <select id="adonepage-gallery-filter-position" name="adonepage-gallery-filter-position" class="">
           <option class="left" value="left"><?php _e('Left', 'adonepage'); ?></option>
           <option class="right" value="right"><?php _e('Right', 'adonepage'); ?></option>
           <option class="center" value="center"><?php _e('Center', 'adonepage'); ?></option>
         </select>   

<p class="position"><?php _e('Columns: ', 'adonepage'); ?></p>

         <select id="adonepage-gallery-columns" name="adonepage-gallery-columns" class="">
           <option class="2" value="col_1_2"><?php _e('2', 'adonepage'); ?></option>
           <option class="3" value="col_1_3"><?php _e('3', 'adonepage'); ?></option>
           <option class="4" value="col_1_4"><?php _e('4', 'adonepage'); ?></option>
           <option class="5" value="col_1_5"><?php _e('5', 'adonepage'); ?></option>
           <option class="6" value="col_1_6"><?php _e('6', 'adonepage'); ?></option>          
         </select>  
       
<?php /* END */ ?>