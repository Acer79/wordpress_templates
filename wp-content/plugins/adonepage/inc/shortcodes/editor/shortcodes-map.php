<?php
/* FUNCTION SHORTCODES MAP */
?>

     <p class="title"><?php _e('Tag','adonepage'); ?></p>
     
     <select id="adonepage-map-type" name="adonepage-map-type" class="">
     
         <option value="satellite">Satellite</option>
         <option value="terrain">Terrain</option>
         <option value="hybrid">Hybrid</option>
         <option value="roadmap">ROADMAP</option>
         
     </select>    

     <p class="title"><?php _e('Latitude','adonepage'); ?></p>
     
     <input type="text" class="adonepage-map-latitude" name="adonepage-map-latitude" id="adonepage-map-latitude" value="">

     <p class="title"><?php _e('Longitude','adonepage'); ?></p>
     
     <input type="text" class="adonepage-map-longitude" name="adonepage-map-longitude" id="adonepage-map-longitude" value="">
     
     <p class="title"><?php _e('Zoom','adonepage'); ?></p>
     
     <select id="adonepage-map-zoom" name="adonepage-map-zoom" class="">
     
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
     	 <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         <option value="13">13</option>
         <option value="14">14</option>
         <option value="15">15</option>
     	 <option value="16">16</option>
         <option value="17">17</option>  
         <option value="18">18</option>
         <option value="19">19</option>
     	 <option value="20">20</option>
         <option value="21">21</option>                
                  
     </select>        

     <p class="position"><?php _e('Map Width (ex: 400px or 100%)', 'adonepage'); ?></p>

   	 <input type="text" class="adonepage-map-width" name="adonepage-map-width" id="adonepage-map-width" value="">
     
     <p class="position"><?php _e('Map Height (ex: 400px)', 'adonepage'); ?></p>

   	 <input type="text" class="adonepage-map-height" name="adonepage-map-height" id="adonepage-map-height" value="">     
     
     <p class="position"><?php _e('Message', 'adonepage'); ?></p>

   	 <input type="text" class="adonepage-map-message" name="adonepage-map-message" id="adonepage-map-message" value="">
     
     <p class="position"><?php _e('API KEY', 'adonepage'); ?></p>

   	 <input type="text" class="adonepage-map-key" name="adonepage-map-key" id="adonepage-map-key" value="">
     
<?php 

/* END */

?>