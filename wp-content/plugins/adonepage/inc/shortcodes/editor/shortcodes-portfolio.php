<?php

/* SHORTCODES FUNCTION PORTFOLIO */

?>

<p class="position"><?php _e('Select Category (Multiple category is allowed)', 'adonepage'); ?></p>
       <select id="adonepage-category" multiple="multiple">
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

   		<input type="text" class="adonepage-number" name="adonepage-number" id="adonepage-number" value="">

<p class="title"><?php _e('Background Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-portfolio-color" name="adonepage-portfolio-color"/> 
  
<p class="title"><?php _e('Font Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-portfolio-font-color" name="adonepage-portfolio-font-color"/> 
  
<p class="title"><?php _e('Item Padding','adonepage'); ?></p>
     
    <input type="text" class="adonepage-portfolio-item-padding" name="adonepage-portfolio-item-padding" id="adonepage-portfolio-item-padding" value="">


<p class="position"><?php _e('Show Filter: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-show-filter" name="adonepage-portfolio-show-filter" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>   

<p class="position"><?php _e('Filter Position: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-filter-position" name="adonepage-portfolio-filter-position" class="">
           <option class="left" value="left"><?php _e('Left', 'adonepage'); ?></option>
           <option class="right" value="right"><?php _e('Right', 'adonepage'); ?></option>
           <option class="center" value="center"><?php _e('Center', 'adonepage'); ?></option>
         </select>   

<p class="position"><?php _e('Columns: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-columns" name="adonepage-portfolio-columns" class="">
           <option class="2" value="col_1_2"><?php _e('2', 'adonepage'); ?></option>
           <option class="3" value="col_1_3"><?php _e('3', 'adonepage'); ?></option>
           <option class="4" value="col_1_4"><?php _e('4', 'adonepage'); ?></option>
           <option class="5" value="col_1_5"><?php _e('5', 'adonepage'); ?></option>
           <option class="6" value="col_1_6"><?php _e('6', 'adonepage'); ?></option>          
         </select>  
       
<p class="position"><?php _e('Link Post/URL: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-custom-link-post-url" name="adonepage-portfolio-custom-link-post-url" class="">
           <option class="post" value="post"><?php _e('Post', 'adonepage'); ?></option>
           <option class="url" value="url"><?php _e('URL', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>   
         
<p class="position"><?php _e('Link Target: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-custom-link-target" name="adonepage-portfolio-custom-link-target" class="">
           <option class="_blank" value="_blank"><?php _e('Blank', 'adonepage'); ?></option>
           <option class="self" value="self"><?php _e('Self', 'adonepage'); ?></option>
         </select>         

<p class="position"><?php _e('Title: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-custom-title" name="adonepage-portfolio-custom-title" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>   

<p class="position"><?php _e('Category: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-custom-category" name="adonepage-portfolio-custom-category" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>   

<p class="position"><?php _e('Date: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-custom-date" name="adonepage-portfolio-custom-date" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select> 

<p class="position"><?php _e('Text: ', 'adonepage'); ?></p>

         <select id="adonepage-portfolio-custom-text" name="adonepage-portfolio-custom-text" class="">
           <option class="yes" value="yes"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="no" value="no"><?php _e('No', 'adonepage'); ?></option>
         </select>        

<p class="position"><?php _e('Number Text Excerpt: ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-portfolio-custom-excerpt" name="adonepage-portfolio-custom-excerpt" id="adonepage-portfolio-custom-excerpt" value="">

<?php /* END */ ?>