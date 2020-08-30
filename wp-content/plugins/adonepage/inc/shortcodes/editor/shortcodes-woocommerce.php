<?php

/* SHORTCODES FUNCTION WOOCOMMERCE */

?>

<p class="title"><?php _e('Woocommerce Shortcodes Type','adonepage'); ?></p>
     
     <select id="adonepage-woocommerce-type-shortcodes" name="adonepage-woocommerce-type-shortcodes" class="">
    	
         <option value="carousel">Carousel</option>
         <option value="last-product">Last Product</option>
         
     </select> 


<p class="position"><?php _e('Select Category (Multiple category is allowed)', 'adonepage'); ?></p>
       <select id="adonepage-woocommerce-category-posts-carousel" multiple="multiple">
       <option value="all"><?php _e('All','adonepage'); ?></option>
	   <?php 
  			$woocommerce_categories = get_categories('taxonomy=product_cat');
  			foreach ($woocommerce_categories as $category) {
			$option = '<option value="'.$category->cat_name.'">';
			$option .= $category->cat_name;
			$option .= ' ('.$category->category_count.')';
			$option .= '</option>';
			echo $option;
  			}
 		?>
        </select>  
            

<div id="woocommerce-carousel">

    <p class="position"><?php _e('Main Color: ', 'adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-woocommerce-color" name="adonepage-woocommerce-color"/> 

    <p class="position"><?php _e('Lazy Load Effects: ', 'adonepage'); ?></p>
    
             <select id="adonepage-woocommerce-carousel-lazy" name="adonepage-woocommerce-carousel-lazy" class="">
               <option class="true" value="true"><?php _e('Yes', 'adonepage'); ?></option>
               <option class="false" value="false"><?php _e('No', 'adonepage'); ?></option>
             </select> 
             
    <p class="position"><?php _e('Navigation Button: ', 'adonepage'); ?></p>
    
             <select id="adonepage-woocommerce-carousel-nav" name="adonepage-woocommerce-carousel-nav" class="">
               <option class="true" value="true"><?php _e('Show', 'adonepage'); ?></option>
               <option class="false" value="false"><?php _e('Hidden', 'adonepage'); ?></option>
             </select> 
    
    <p class="position"><?php _e('Item Show: ', 'adonepage'); ?></p>
    
            <input type="text" class="adonepage-woocommerce-carousel-item-show" name="adonepage-woocommerce-carousel-item-show" id="adonepage-woocommerce-carousel-item-show" value="">        
    
    <p class="position"><?php _e('Number Post Load (Default 8): ', 'adonepage'); ?></p>
    
            <input type="text" class="adonepage-woocommerce-carousel-number" name="adonepage-woocommerce-carousel-number" id="adonepage-woocommerce-carousel-number" value="">
    
    <p class="position"><?php _e('Autoplay, ex 3000 (leave empty for no autoplay): ', 'adonepage'); ?></p>
    
            <input type="text" class="adonepage-woocommerce-carousel-autoplay" name="adonepage-woocommerce-carousel-autoplay" id="adonepage-woocommerce-carousel-autoplay" value="">
    
    <p class="position"><?php _e('Pagination Speed, ex 1000 (leave empty for default): ', 'adonepage'); ?></p>
    
            <input type="text" class="adonepage-woocommerce-carousel-paginationSpeed" name="adonepage-woocommerce-carousel-paginationSpeed" id="adonepage-woocommerce-carousel-paginationSpeed" value="">
    
    <p class="position"><?php _e('Go To First Speed, ex 2000 (leave empty for default): ', 'adonepage'); ?></p>
    
            <input type="text" class="adonepage-woocommerce-carousel-goToFirstSpeed" name="adonepage-woocommerce-carousel-goToFirstSpeed" id="adonepage-woocommerce-carousel-goToFirstSpeed" value="">
    
    <p class="position"><?php _e('TransitionStyle: ', 'adonepage'); ?></p>
    
             <select id="adonepage-woocommerce-carousel-transitionstyle" name="adonepage-woocommerce-carousel-transitionstyle" class="">
               <option class="fade" value="fade"><?php _e('Fade', 'adonepage'); ?></option>
               <option class="backSlide" value="backSlide"><?php _e('BackSlide', 'adonepage'); ?></option>
               <option class="goDown" value="goDown"><?php _e('GoDown', 'adonepage'); ?></option>
               <option class="scaleUp" value="scaleUp"><?php _e('ScaleUp', 'adonepage'); ?></option>
             </select> 
 
</div> 

<div id="woocommerce-last-product" style="display:none;">

    <p class="position"><?php _e('Main Color: ', 'adonepage'); ?></p>

  	<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-woocommerce-last-product-color" name="adonepage-woocommerce-last-product-color"/> 

    <p class="position"><?php _e('Number Product: ', 'adonepage'); ?></p>
    
    <input type="text" class="adonepage-woocommerce-last-product-number" name="adonepage-woocommerce-last-product-number" id="adonepage-woocommerce-last-product-number" value="">        


    <p class="position"><?php _e('Column: ', 'adonepage'); ?></p>
    
             <select id="adonepage-woocommerce-last-product-column" name="adonepage-woocommerce-last-product-column" class="">          
               <option class="2" value="2">2</option>
               <option class="3" value="3">3</option>
               <option class="4" value="4">4</option>  
               <option class="5" value="1">5</option>
             </select>
             
    <p class="position"><?php _e('Infinite Scroll: ', 'adonepage'); ?></p>
    
             <select id="adonepage-woocommerce-last-product-infinite-scroll" name="adonepage-woocommerce-last-product-infinite-scroll" class="">          
               <option class="on" value="on">ON</option>
               <option class="off" value="off">OFF</option>
             </select>
             
    <p class="position"><?php _e('description: ', 'adonepage'); ?></p>
    
             <select id="adonepage-woocommerce-last-product-description" name="adonepage-woocommerce-last-product-description" class="">          
               <option class="on" value="on">ON</option>
               <option class="off" value="off">OFF</option>
             </select>             
</div>

         
<?php /* END */ ?>