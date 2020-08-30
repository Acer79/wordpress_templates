<?php
/*
File: inc/shortcodes-carousel.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_carousel( $attr ) {
	$id = rand(1,1000);
	$lazyload = $attr['lazy']; // true / false
	if(empty($lazyload)) { $lazyload = 'on'; }
	$navigation = $attr['nav'];	// true / false	
	$item_show = $attr['item_show'];
	if(empty($item_show) || $item_show == '') { $item_show = '4'; }		
	$number = $attr['number'];
	if(empty($number) || $number == '') { $number = '-1'; }
	
	$style = $attr['style'];
	$autoplay = $attr['autoplay'];
	$paginationSpeed = $attr['ps'];
	if(empty($paginationSpeed) || $paginationSpeed == '') { $paginationSpeed = '1000'; }
	$goToFirstSpeed = $attr['gtfs'];
	if(empty($goToFirstSpeed) || $goToFirstSpeed == '') { $goToFirstSpeed = '2000'; }
	$transitionStyle = $attr['transition'];
	if(empty($transitionStyle) || $transitionStyle == '') { $transitionStyle = 'fade'; }
	
		
	
	$source = $attr['source'];
	if($source == 'posts') {
		$category = $attr['cat'];
		if($category == 'all') { $category = ''; }
	}
	$excerpt = $attr['excerpt'];
	if(empty($excerpt)) { $excerpt = '200'; }	
	//$color = $attr['color'];
		  
	// OPEN CONTAINER		
	$query = 'posts_per_page='.$number.'&post_status=publish';
		
		
	if($source == 'posts') {
		$query .= '&post_type=post&category_name='.$category.'';
	}
	if($source == 'clients') {
		$query .= '&post_type=adclients_post';
	}
	if($source == 'team') {
		$query .= '&post_type=adteam_post';
	}
	if($source == 'partners') {
		$query .= '&post_type=adpartners_post';
	}							

/*
$return = '<script type="text/javascript">
			jQuery(document).ready(function($){
				var owl = $("#adop-carousel-'.$id.'");
				  owl.owlCarousel({
					items : '.$item_show.',
					lazyLoad : '.$lazyload.',
					navigation : '.$navigation.',
					stopOnHover : true,
					';
					
					if(!empty($autoplay) || $autoplay != '') { 
						$return .= 'autoPlay: ' . $autoplay .',
						';
					}
					
			$return	.= 'paginationSpeed : '. $paginationSpeed.', 
					goToFirstSpeed : '. $goToFirstSpeed .', 
					transitionStyle: \''.$transitionStyle .'\'
				});
			});
			</script>';*/
$return = '<script type="text/javascript">
			jQuery(document).ready(function($){
				$("#adop-carousel-'.$id.'").owlCarousel({
					items : '.$item_show.',
					lazyLoad : '.$lazyload.',
					navigation : '.$navigation.',
					stopOnHover : true,';
					if(!empty($autoplay) || $autoplay != '') { 
						$return .= 'autoPlay: ' . $autoplay .',
						';
					}					
			$return	.= 'paginationSpeed : '. $paginationSpeed.', 
					goToFirstSpeed : '. $goToFirstSpeed .'		
					});
			}); 
			</script>';			
$return	.= '<div id="adonepage-carousel">
        <div id="adop-carousel-'.$id.'" class="owl-carousel'.$id.' adtheme-icon">';
	
		$separator = ' ';
		
		$loop = new WP_Query($query);
		if($loop) { 
		while ( $loop->have_posts() ) : $loop->the_post();
		$link = get_permalink(); 
		$categories = get_the_category();
		
		
		/* LOAD METABOXES */
	
		if($style == 'style-team-1' || $style == 'style-team-2') {
			$facebook 	= get_post_meta( get_the_id(), 'facebook-team', true );
			$twitter 	= get_post_meta( get_the_id(), 'twitter-team', true );
			$googleplus = get_post_meta( get_the_id(), 'googleplus-team', true );
			$google 	= get_post_meta( get_the_id(), 'google-team', true );
			$vimeo 		= get_post_meta( get_the_id(), 'vimeo-team', true );
			$feed 		= get_post_meta( get_the_id(), 'feed-team', true );
			$youtube 	= get_post_meta( get_the_id(), 'youtube-team', true );
			$flickr		= get_post_meta( get_the_id(), 'flickr-team', true );
			$linkedin	= get_post_meta( get_the_id(), 'linkedin-team', true );
			$tumblr 	= get_post_meta( get_the_id(), 'tumblr-team', true );
			$mail 		= get_post_meta( get_the_id(), 'mail-team', true );
			$github 	= get_post_meta( get_the_id(), 'github-team', true );
			$pinterest 	= get_post_meta( get_the_id(), 'pinterest-team', true );
			$skype 		= get_post_meta( get_the_id(), 'skype-team', true );												
			$picassa 	= get_post_meta( get_the_id(), 'picassa-team', true );
			$dribbble	= get_post_meta( get_the_id(), 'dribbble-team', true );
			$yahoo 		= get_post_meta( get_the_id(), 'yahoo-team', true );		
		}
		
		if($style == 'style-partners') {
			$url_partner = get_post_meta( get_the_id(), 'url-partner', true );		
		}
		
		
		/* END LOAD METABOXES */
		
	
		if($style == 'style-team-1') {
	
    
		
$return .=	'<div class="item team style-team-1">';				
					if(has_post_thumbnail()){ 
								$id_post = get_the_id();					
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_600' );	 					 
						 } else {               
                         		$single_image[0] = adtheme_shortcodes_URL .'/assets/img/no-img.png';                 
                     } 
					if($lazyload == 'true') {
                     	$return .=	'<img class="lazyOwl" data-src="'.$single_image[0].'" alt="Lazy Owl Image">';
                     } else { 
                     	$return .=	'<img class="no-lazyOwl" src="'.$single_image[0].'" alt="'.get_the_title().'">';
                     }
           			$return .=	'<div class="label">
                    			<h1><a href="'.$link.'">'.get_the_title().'</a></h1>
                                <span class="text">'.substr(get_the_excerpt(), 0, $excerpt).'</span>';
                                if(!empty($facebook) || $facebook != '') {
									$return .=	'<a href="'.$facebook.'" class="icon-facebook2"></a>';
								}  
                                if(!empty($twitter) || $twitter != '') { 
									$return .=	'<a href="'.$twitter.'" class="icon-twitter"></a>';
								} 
                                if(!empty($googleplus) || $googleplus != '') {
									$return .=	'<a href="'.$googleplus.'" class="icon-googleplus2"></a>';
								} 
                                if(!empty($google) || $google != '') {
									$return .=	'<a href="'.$google.'" class="icon-google"></a>';
								}
                                if(!empty($vimeo) || $vimeo != '') {
									$return .=	'<a href="'.$vimeo.'" class="icon-vimeo2"></a>';
								}
                                if(!empty($feed) || $feed != '') {
									$return .=	'<a href="'.$feed.'" class="icon-feed3"></a>';
								}
                                if(!empty($youtube) || $youtube != '') {
									$return .=	'<a href="'.$youtube.'" class="icon-youtube"></a>';
								}
                                if(!empty($flickr) || $flickr != '') {
									$return .=	'<a href="'.$flickr.'" class="icon-flickr4"></a>';
								}
                                if(!empty($linkedin) || $linkedin != '') {
									$return .=	'<a href="'.$linkedin.'" class="icon-linkedin"></a>';
								}
                                if(!empty($tumblr) || $tumblr != '') {
									$return .=	'<a href="'.$tumblr.'" class="icon-tumblr"></a>';
								}
                                if(!empty($mail) || $mail != '') {
									$return .=	'<a href="mailto'.$mail.'" class="icon-mail3"></a>';
								}
                                if(!empty($github) || $github != '') {
									$return .=	'<a href="'.$github.'" class="icon-github"></a>';
								}
                                if(!empty($pinterest) || $pinterest != '') {
									$return .=	'<a href="'.$pinterest.'" class="icon-pinterest2"></a>';
								}
                                if(!empty($skype) || $skype != '') {
									$return .=	'<a href="'.$skype.'" class="icon-skype"></a>';
								}
                                if(!empty($picassa) || $picassa != '') {
									$return .=	'<a href="'.$picassa.'" class="icon-picassa2"></a>';
								}
                                if(!empty($dribbble) || $dribbble != '') {
									$return .=	'<a href="'.$dribbble.'" class="icon-dribbble2"></a>';
								}
                                if(!empty($yahoo) || $yahoo != '') {
									$return .=	'<a href="'.$yahoo.'" class="icon-yahoo"></a>';
								}                                                                                                                                                                                                                                                                                                                                                                                                                                                                
            $return .=  '</div>            
           </div>';             
            
     
		} // END STYLE TEAM 1
		
		
		
		if($style == 'style-team-2') { // STYLE TEAM 2
		
		$return .=	'<div class="item team style-team-2">';				
					if(has_post_thumbnail()){ 
								$id_post = get_the_id();					
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_600' );	 					 
						 } else {               
                         		$single_image[0] = adtheme_shortcodes_URL .'/assets/img/no-img.png';               
                     } 
					 if($lazyload == 'true') {
                     	$return .=	'<img class="lazyOwl" data-src="'.$single_image[0].'" alt="Lazy Owl Image">';
                     } else {
                     	$return .=	'<img class="no-lazyOwl" src="'.$single_image[0].'" alt="'.get_the_title().'">';
                     }
           			$return .=	'<div class="label">
                    			<h1><a href="'.$link.'">'.get_the_title().'</a></h1>
                                <span class="text">'.substr(get_the_excerpt(), 0, $excerpt).'</span>';
                                if(!empty($facebook) || $facebook != '') {
									$return .=	'<a href="'.$facebook.'" class="icon-facebook2"></a>';
								}  
                                if(!empty($twitter) || $twitter != '') { 
									$return .=	'<a href="'.$twitter.'" class="icon-twitter"></a>';
								} 
                                if(!empty($googleplus) || $googleplus != '') {
									$return .=	'<a href="'.$googleplus.'" class="icon-googleplus2"></a>';
								} 
                                if(!empty($google) || $google != '') {
									$return .=	'<a href="'.$google.'" class="icon-google"></a>';
								}
                                if(!empty($vimeo) || $vimeo != '') {
									$return .=	'<a href="'.$vimeo.'" class="icon-vimeo2"></a>';
								}
                                if(!empty($feed) || $feed != '') {
									$return .=	'<a href="'.$feed.'" class="icon-feed3"></a>';
								}
                                if(!empty($youtube) || $youtube != '') {
									$return .=	'<a href="'.$youtube.'" class="icon-youtube"></a>';
								}
                                if(!empty($flickr) || $flickr != '') {
									$return .=	'<a href="'.$flickr.'" class="icon-flickr4"></a>';
								}
                                if(!empty($linkedin) || $linkedin != '') {
									$return .=	'<a href="'.$linkedin.'" class="icon-linkedin"></a>';
								}
                                if(!empty($tumblr) || $tumblr != '') {
									$return .=	'<a href="'.$tumblr.'" class="icon-tumblr"></a>';
								}
                                if(!empty($mail) || $mail != '') {
									$return .=	'<a href="mailto'.$mail.'" class="icon-mail3"></a>';
								}
                                if(!empty($github) || $github != '') {
									$return .=	'<a href="'.$github.'" class="icon-github"></a>';
								}
                                if(!empty($pinterest) || $pinterest != '') {
									$return .=	'<a href="'.$pinterest.'" class="icon-pinterest2"></a>';
								}
                                if(!empty($skype) || $skype != '') {
									$return .=	'<a href="'.$skype.'" class="icon-skype"></a>';
								}
                                if(!empty($picassa) || $picassa != '') {
									$return .=	'<a href="'.$picassa.'" class="icon-picassa2"></a>';
								}
                                if(!empty($dribbble) || $dribbble != '') {
									$return .=	'<a href="'.$dribbble.'" class="icon-dribbble2"></a>';
								}
                                if(!empty($yahoo) || $yahoo != '') {
									$return .=	'<a href="'.$yahoo.'" class="icon-yahoo"></a>';
								}                                                                                                                                                                                                                                                                                                                                                                                                                                                                
            $return .=  '</div>            
           </div>';             
	
		} // END STYLE TEAM 2
	
		
		if($style == 'style-partners') { // STYLE PARTNERS 
		
		
			$return .=  '<div class="item partners style-partners">';				
					if(has_post_thumbnail()){ 
								$id_post = get_the_id();					
								$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'adtheme_shortcodes_size_200' );	 					 
						 } else {               
                         		$single_image[0] = adtheme_shortcodes_URL .'/assets/img/no-img.png';               
                     } 
					 if(!empty($url_partner)) {
                    	$return .= '<a href="'.$url_partner.'">';
                     }
                     if($lazyload == 'true') {
                     	$return .= '<img class="lazyOwl" data-src="'.$single_image[0].'" alt="Lazy Owl Image">';
                    } else {
                     	$return .= '<img class="no-lazyOwl" src="'.$single_image[0].'" alt="'.get_the_title().'">';
                    }    
            		if(!empty($url_partner)) {
                    	$return .= '</a>';
                    }   
          $return .= '</div>'; 		
			} // END STYLE PARTNERS 

	endwhile;
    }            
$return .= '</div>	
<div class="adclear"></div>		
</div>';

return $return;
    }  
add_shortcode("adop_carousel", "adop_carousel");

function adop_twitter_carousel( $attr ) {
	
	/*    $twitter_username 		= $attr['username'];		
		$consumer_key 			= $attr['consumer_key'];
		$consumer_secret		= $attr['consumer_secret'];
		$access_token 			= $attr['access_token']; 
		$access_token_secret 	= $attr['access_token_secret'];
		*/	
		
		
		$lazyload = $attr['lazy']; // true / false
		if(empty($lazyload)) { $lazyload = 'on'; }
		$navigation = $attr['nav'];	// true / false	
		$item_show = $attr['item_show'];		
		$number = $attr['number'];
		if(empty($number) || $number == '') { $number = '-1'; }
	
		//$style = $attr['style'];
		$autoplay = $attr['autoplay'];
		$paginationSpeed = $attr['ps'];
		if(empty($paginationSpeed) || $paginationSpeed == '') { $paginationSpeed = '1000'; }
		$goToFirstSpeed = $attr['gtfs'];
		if(empty($goToFirstSpeed) || $goToFirstSpeed == '') { $goToFirstSpeed = '2000'; }
		$transitionStyle = $attr['transition'];
		if(empty($transitionStyle) || $transitionStyle == '') { $transitionStyle = 'fade'; }
	
		$number = '5';	
		//function getConnectionWithAccessToken($consumer_key, $consumer_secret, $access_token, $access_token_secret) {
  		
		$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
		
		//$connection = getConnectionWithAccessToken($consumer_key, $consumer_secret, $access_token, $access_token_secret);
		//$account = $connection->get($twitter_username);
		echo '<pre>';
		print_r($connection);
		echo '</pre>';
		$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_username."&count=" . $number) or die('Couldn\'t retrieve tweets! Wrong username?');
		
		if(!empty($tweets->errors)){
				if($tweets->errors[0]->message == 'Invalid or expired token'){
					echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!' . $after_widget;
				}else{
					echo '<strong>'.$tweets->errors[0]->message.'</strong>' . $after_widget;
				}
				return;
			}
			$tweets_data = array();
			for($i = 0;$i <= count($tweets); $i++){
				if(!empty($tweets[$i])){
					$tweets_data[$i]['created_at'] = $tweets[$i]->created_at;
					$tweets_data[$i]['text'] = $tweets[$i]->text;			
					$tweets_data[$i]['status_id'] = $tweets[$i]->id_str;			
				}	
			}	
?>
<script type="text/javascript">
jQuery(document).ready(function($){

      var owl = $("#adop-twitter-carousel");

      owl.owlCarousel({

        items : <?php echo $item_show; ?>,
        lazyLoad : <?php echo $lazyload; ?>,
        navigation : <?php echo $navigation; ?>,
		stopOnHover : true,
		<?php if(!empty($autoplay) || $autoplay != '') { ?>
		autoPlay : <?php echo $autoplay; ?>,
		<?php } ?>
		paginationSpeed : <?php echo $paginationSpeed; ?>,
		goToFirstSpeed : <?php echo $goToFirstSpeed; ?>,
		transitionStyle: "<?php echo $transitionStyle; ?>"
		
      });

});
</script>

      <div id="adonepage-carousel">
        <div id="adop-twitter-carousel" class="owl-carousel">
        <?php 
		foreach( $tweets_data as $each_tweet ){ 
            echo '<div class="item twitter-item">';
            echo '<p><span class="hash"><i class="icon-twitter ac2"></i>' . convert_links($each_tweet['text']) . '</span></p>';

			echo '<a class="small" target="_blank" href="http://twitter.com/'.$twitter_username.'/statuses/'.$each_tweet['status_id'].'">'.relative_time($each_tweet['created_at']).'</a>';           
            echo '</div>';
        } 
		?>
        </div>
      </div>




<?php




	
		

    }  
add_shortcode("adop_twitter_carousel", "adop_twitter_carousel");