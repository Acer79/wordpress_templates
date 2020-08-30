<?php
/*
File: inc/shortcodes-map.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_map($atts, $content = null)
{
    extract(
		shortcode_atts(
			array(
				"id" => 'myMap', 
				"type" => 'road', 
				"latitude" => '36.394757', 
				"longitude" => '-105.600586', 
				"zoom" => '9', 
				"message" => 'This is the message...', 
				"width" => '300px', 
				"height" => '300px',
				"key" => ''), 
				$atts)
	);
    
	if($key == '') :
		echo '<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>'; 
    else:
		echo '<script src="http://maps.google.com/maps/api/js?key='.$key.'" type="text/javascript"></script>'; 		
	endif;
	
	
	$mapType = '';
    if($type == "satellite")
        $mapType = "SATELLITE";
    else if($type == "terrain")
        $mapType = "TERRAIN"; 
    else if($type == "hybrid")
        $mapType = "HYBRID";
    else
        $mapType = "ROADMAP"; 
         
    echo '<!-- Google Map -->
        <script type="text/javascript"> 
		jQuery(document).ready(function($){
        $(document).ready(function() {
          function initializeGoogleMap() {
     
              var myLatlng = new google.maps.LatLng('.$latitude.','.$longitude.');
              var myOptions = {
                center: myLatlng, 
                zoom: '.$zoom.',
                mapTypeId: google.maps.MapTypeId.'.$mapType.'
              };
              var map = new google.maps.Map(document.getElementById("'.$id.'"), myOptions);
     
              var contentString = "'.$message.'";
              var infowindow = new google.maps.InfoWindow({
                  content: contentString
              });
               
              var marker = new google.maps.Marker({
                  position: myLatlng
              });
               
              google.maps.event.addListener(marker, "click", function() {
                  infowindow.open(map,marker);
              });
               
              marker.setMap(map);
             
          }
          initializeGoogleMap();
     
         });
		});
        </script>';
     
        return '<div class="map-container" style="height:'.$height.';"><div id="'.$id.'" style="width:'.$width.'; height:'.$height.';" class="googleMap"></div></div>';
} 

add_shortcode("adop_map", "adop_map");

?>