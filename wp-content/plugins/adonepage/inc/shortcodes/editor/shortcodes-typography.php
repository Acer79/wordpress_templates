<?php
/* FUNCTION SHORTCODES TYPOGRAPHY */
?>

     <p class="title"><?php _e('Tag','adonepage'); ?></p>
     
     <select id="adonepage-typography-tag" name="adonepage-typography-tag" class="">
     
         <option value="h1">H1</option>
         <option value="h2">H2</option>
         <option value="h3">H3</option>
         <option value="h4">H4</option>
         <option value="h5">H5</option>
         <option value="h6">H6</option>
     	 <option value="custom">Custom</option>
         <option value="line">Line</option>
         <option value="empty-line">Empty Line</option>         
         
     </select>    
     
     <div id="adonepage-tag-custom-div" style="display:none">

     <p class="title"><?php _e('Font Size (ex 12px)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-custom-font-size" name="adonepage-custom-font-size" id="adonepage-custom-font-size" value="">
     
     <p class="title"><?php _e('Font Weight','adonepage'); ?></p>
     
     <select id="adonepage-custom-font-weight" name="adonepage-custom-font-weight" class="">
     
     	 <option value="normal">normal</option>
         <option value="100">100</option>
         <option value="200">200</option>
         <option value="300">300</option>
         <option value="400">400</option>
         <option value="500">500</option>
         <option value="600">600</option>
     	 <option value="700">700</option>
         <option value="800">800</option>
         <option value="900">900</option>
                  
     </select>        

	 <p class="title"><?php _e('Font Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-custom-font-color" name="adonepage-custom-font-color"/> 

     <p class="title"><?php _e('Font Style','adonepage'); ?></p>
     
     <select id="adonepage-custom-font-style" name="adonepage-custom-font-style" class="">
     
     	 <option value="normal">normal</option>
         <option value="italic">italic</option>
                           
     </select> 	

     <p class="title"><?php _e('Border Size (ex 2px or 2px 0 2px 0)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-custom-font-border-size" name="adonepage-custom-font-border-size" id="adonepage-custom-font-border-size" value="">
    

	 <p class="title"><?php _e('Border Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-custom-font-border-color" name="adonepage-custom-font-border-color"/> 

     <p class="title"><?php _e('Border Type','adonepage'); ?></p>
     
     <select id="adonepage-custom-font-border-type" name="adonepage-custom-font-border-type" class="">
     
     	 <option value="solid">solid</option>
         <option value="dashed">dashed</option>
         <option value="dotted">dotted</option>
         <option value="double">double</option>
         <option value="groove">groove</option>
         <option value="ridge">ridge</option>
         <option value="inset">inset</option>
     	 <option value="outset">outset</option>
                 
     </select>  

     <p class="title"><?php _e('Padding (ex 2px or 2px 0 2px 0)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-custom-font-padding" name="adonepage-custom-font-padding" id="adonepage-custom-font-padding" value="">

	 <p class="title"><?php _e('Background','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-custom-font-bg-color" name="adonepage-custom-font-bg-color"/> 

    
     <p class="title"><?php _e('Opacity (0.1 to 1)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-custom-font-opacity" name="adonepage-custom-font-opacity" id="adonepage-custom-font-opacity" value="">

     <p class="title"><?php _e('Line Height (ex: 30px - leave empty for default)','adonepage'); ?></p>
     
     <input type="text" class="adonepage-custom-line-height" name="adonepage-custom-line-height" id="adonepage-custom-line-height" value="">  

     <p class="title"><?php _e('Responsive Important (This Value is valid for size field responsive)','adonepage'); ?></p>
     
     <select id="adonepage-custom-font-responsive-important" name="adonepage-custom-font-responsive-important" class="">
     
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
     
     
     <div id="adonepage-tag-h-div" style="display:none">
     
     <p class="position"><?php _e('Text', 'adonepage'); ?></p>

   	 <input type="text" class="adonepage-typography-text" name="adonepage-typography-text" id="adonepage-typography-text" value="">
     
     </div>
     
     <div id="adonepage-tag-line-div" style="display:none">

	 <p class="title"><?php _e('Line Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-line-color" name="adonepage-line-color"/> 

     <p class="title"><?php _e('Line Height','adonepage'); ?></p>
     
     <select id="adonepage-line-height" name="adonepage-line-height" class="">
     
     	 <?php for ($perc = 1; $perc <= 100; ++$perc) { ?>
				<option value="<?php echo $perc; ?>"><?php echo $perc; ?>px</option>
         <?php } ?>
                  
     </select> 

     <p class="position"><?php _e('Line Width (ex 300 or leave empty for 100%)', 'adonepage'); ?></p>

   	 <input type="text" class="adonepage-line-width" name="adonepage-line-width" id="adonepage-line-width" value="">
          
     <p class="title"><?php _e('Align','adonepage'); ?></p>
     
     <select id="adonepage-line-align" name="adonepage-line-align" class="">
     
     	 <option value="center">Center</option>
         <option value="left">Left</option>
         <option value="right">Right</option>
                  
     </select> 

     <p class="title"><?php _e('Margin Top','adonepage'); ?></p>
     
     <select id="adonepage-line-margin-top" name="adonepage-line-margin-top" class="">
     
     	 <?php for ($perc = 0; $perc <= 100; ++$perc) { ?>
				<option value="<?php echo $perc; ?>"><?php echo $perc; ?>px</option>
         <?php } ?>
                  
     </select>

     <p class="title"><?php _e('Margin Bottom','adonepage'); ?></p>
     
     <select id="adonepage-line-margin-bottom" name="adonepage-line-margin-bottom" class="">
     
     	 <?php for ($perc = 0; $perc <= 100; ++$perc) { ?>
				<option value="<?php echo $perc; ?>"><?php echo $perc; ?>px</option>
         <?php } ?>
                  
     </select>

     <p class="title"><?php _e('Line Type','adonepage'); ?></p>
     
     <select id="adonepage-line-type" name="adonepage-line-type" class="">
     
     	 <option value="solid">solid</option>
         <option value="dashed">dashed</option>
         <option value="dotted">dotted</option>
     	 <option value="double">double</option>
         <option value="groove">groove</option>
     	 <option value="ridge">ridge</option>
         <option value="inset">inset</option>
         <option value="outset">outset</option>                         
                
     </select> 
     
     </div>
     
     <div id="adonepage-tag-empty-line-div" style="display:none">
     
          <p class="position"><?php _e('Empty Line Height (ex 50)', 'adonepage'); ?></p>

   	 	  <input type="text" class="adonepage-empty-line-height" name="adonepage-empty-line-height" id="adonepage-empty-line-height" value="">  
     
     </div>     
     
<?php 

/* END */

?>