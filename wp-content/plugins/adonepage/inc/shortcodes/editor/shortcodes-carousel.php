<?php

/* SHORTCODES FUNCTION CAROUSEL */

?>

<p class="title"><?php _e('Content Source','adonepage'); ?></p>
     
     <select id="adonepage-content-source-carousel" name="adonepage-content-source-carousel" class="">
    	
         <option value="clients">Clients</option>
         <option value="partners">Partners</option>
         <option value="posts">Post</option>
         <option value="team">Team</option>
         
     </select> 

<div id="adonepage-category-posts-carousel" style="display:none;">

<p class="position"><?php _e('Select Category (Multiple category is allowed)', 'adonepage'); ?></p>
       <select id="adonepage-category-posts-carousel" multiple="multiple">
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

<p class="position"><?php _e('Style: ', 'adonepage'); ?></p>

         <select id="adonepage-carousel-style" name="adonepage-carousel-style" class="">
           <option class="style-team-1" value="style-team-1"><?php _e('Style Team 1', 'adonepage'); ?></option>
           <option class="style-team-2" value="style-team-2"><?php _e('Style Team 2', 'adonepage'); ?></option>
           <option class="style-partners" value="style-partners"><?php _e('Style Partners', 'adonepage'); ?></option>          
         </select>  
             
<div id="adonepage-style-carousel-team" style="display:none;">
		<p class="position"><?php _e('Number Text Excerpt: ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-carousel-custom-excerpt" name="adonepage-carousel-custom-excerpt" id="adonepage-carousel-custom-excerpt" value="">        
</div>

<p class="position"><?php _e('Lazy Load Effects: ', 'adonepage'); ?></p>

         <select id="adonepage-carousel-lazy" name="adonepage-carousel-lazy" class="">
           <option class="true" value="true"><?php _e('Yes', 'adonepage'); ?></option>
           <option class="false" value="false"><?php _e('No', 'adonepage'); ?></option>
         </select> 
         
<p class="position"><?php _e('Navigation Button: ', 'adonepage'); ?></p>

         <select id="adonepage-carousel-nav" name="adonepage-carousel-nav" class="">
           <option class="true" value="true"><?php _e('Show', 'adonepage'); ?></option>
           <option class="false" value="false"><?php _e('Hidden', 'adonepage'); ?></option>
         </select> 

<p class="position"><?php _e('Item Show: ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-carousel-item-show" name="adonepage-carousel-item-show" id="adonepage-carousel-item-show" value="">        

<p class="position"><?php _e('Number Post Load (Default 8): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-carousel-number" name="adonepage-carousel-number" id="adonepage-carousel-number" value="">

<p class="position"><?php _e('Autoplay, ex 3000 (leave empty for no autoplay): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-carousel-autoplay" name="adonepage-carousel-autoplay" id="adonepage-carousel-autoplay" value="">

<p class="position"><?php _e('Pagination Speed, ex 1000 (leave empty for default): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-carousel-paginationSpeed" name="adonepage-carousel-paginationSpeed" id="adonepage-carousel-paginationSpeed" value="">

<p class="position"><?php _e('Go To First Speed, ex 2000 (leave empty for default): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-carousel-goToFirstSpeed" name="adonepage-carousel-goToFirstSpeed" id="adonepage-carousel-goToFirstSpeed" value="">

<p class="position"><?php _e('TransitionStyle: ', 'adonepage'); ?></p>

         <select id="adonepage-carousel-transitionstyle" name="adonepage-carousel-transitionstyle" class="">
           <option class="fade" value="fade"><?php _e('Fade', 'adonepage'); ?></option>
           <option class="backSlide" value="backSlide"><?php _e('BackSlide', 'adonepage'); ?></option>
           <option class="goDown" value="goDown"><?php _e('GoDown', 'adonepage'); ?></option>
           <option class="scaleUp" value="scaleUp"><?php _e('ScaleUp', 'adonepage'); ?></option>
         </select> 
         
<?php /* END */ ?>