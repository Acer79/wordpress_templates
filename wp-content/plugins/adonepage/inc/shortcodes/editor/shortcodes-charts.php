<?php

/* SHORTCODES FUNCTION CHARTS */

?>

<p class="title"><?php _e('Type Charts','adonepage'); ?></p>
     
     <select id="adonepage-chart-type" name="adonepage-chart-type" class="">
     
         <option value="pie_chart">Pie Chart (Circle)</option>
         <option value="progress_bar">Progress Bar</option>
         
     </select>    

<p class="title"><?php _e('Bar Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-chart-bar-color" name="adonepage-chart-bar-color"/> 

<p class="title"><?php _e('Track Color','adonepage'); ?></p>

  	 <input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="adonepage-chart-track-color" name="adonepage-chart-track-color"/> 

<p class="title"><?php _e('Percent','adonepage'); ?></p>
     
     <select id="adonepage-chart-percent" name="adonepage-chart-percent" class="">
     
     	 <?php for ($perc = 1; $perc <= 100; ++$perc) { ?>
				<option value="<?php echo $perc; ?>"><?php echo $perc; ?>%</option>
         <?php } ?>
         
     </select>   
     
<div id="pie_chart">     

<p class="position"><?php _e('Width (ex 300): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-pie-chart-width" name="adonepage-chart-width" id="adonepage-pie-chart-width" value="">

</div>

<div id="progress_bar" style="display:none">     

<p class="position"><?php _e('Width (ex 300 or leave empty for 100%): ', 'adonepage'); ?></p>

   		<input type="text" class="adonepage-bar-chart-width" name="adonepage-bar-chart-width" id="adonepage-bar-chart-width" value="">

<p class="title"><?php _e('Style','adonepage'); ?></p>
     
     <select id="adonepage-bar-chart-style" name="adonepage-bar-chart-style" class="">
     
         <option value="style1">Style 1</option>
         <option value="style2">Style 2</option>
         
     </select>   


</div>

<?php /* END */ ?>