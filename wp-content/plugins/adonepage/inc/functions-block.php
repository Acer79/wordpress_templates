<?php

function adonepage_block($ad_onepage_id, $group_data) {	
		$first_block_name 					= get_post_meta( $ad_onepage_id, 'first-block-name', true ); //
		$first_block_name_active_menu 		= get_post_meta( $ad_onepage_id, 'first-block-name-active-menu', true );
		$first_bg_type_active 				= get_post_meta( $ad_onepage_id, 'first-bg-type-active', true );	
		$first_bg_video 					= get_post_meta( $ad_onepage_id, 'first-bg-video', true );
		$first_bg_video_audio 				= get_post_meta( $ad_onepage_id, 'first-bg-video-audio', true );
		$first_content_block 				= get_post_meta( $ad_onepage_id, 'first-content-block', true );
		$slider_group 						= get_post_meta( $ad_onepage_id, 'slider-group', false );	
		$slider_spinner						= get_post_meta( $ad_onepage_id, 'first-bg-slider-spinner', true );	
		$slider_effects						= get_post_meta( $ad_onepage_id, 'first-slider-effects', true );
		$slider_autoplay					= get_post_meta( $ad_onepage_id, 'first-slider-autoplay', true );
		$slider_speed						= get_post_meta( $ad_onepage_id, 'first-slider-speed', true );				
		if(empty($slider_speed)) { $slider_speed = '1000'; }
		$first_bg_type_active 				= get_post_meta( $ad_onepage_id, 'first-bg-type-active', true );
		?>
		
		<div class="slide 
        <?php if($first_bg_type_active == 'image') { ?>
        adonepage-parallax
        <?php } ?>
        " id="slide1" data-slide="1">
		<div class="content-wrapper">
        <div class="wrapper" <?php if(empty($first_content_block)) { echo 'style="z-index:2!important"'; } ?>>
        <div class="slide1-content-text" >
        <?php
		if(!empty($first_content_block)) { 
			echo do_shortcode($first_content_block); 
		}
		?>
        </div>
		</div>
        <?php if($first_bg_type_active != 'slider') { ?>
        <div class="block-pattern-1"></div>
        <?php } ?>
		
		<?php 
		
		// TYPE SLIDER //
		
		
        if($first_bg_type_active == 'slider') { 
        
        
		
		?>
        <a href="" id="arrow_left"><img src="<?php echo adonepage_URL . 'assets/img/white_left.png'; ?>" ></a>
		<a href="" id="arrow_right"><img src="<?php echo adonepage_URL . 'assets/img/white_right.png'; ?>" ></a>
		
		<div id="cycle-loader">
        <?php 
		if($slider_spinner == 'plane') {
        	echo '<span class="spinner-plane"></span>';
        } 
		
		if($slider_spinner == 'bounce') {
        	echo '<div class="spinner-bounce">
					<div class="double-bounce1"></div>
      				<div class="double-bounce2"></div>
			  	 </div>';
        } 		
		
		if($slider_spinner == 'wave') {
			
		echo '<div class="spinner-wave">
				  <div class="rect1"></div>
				  <div class="rect2"></div>
				  <div class="rect3"></div>
				  <div class="rect4"></div>
				  <div class="rect5"></div>
   		 	 </div>';	
			
		}

		if($slider_spinner == 'cubes') {
			
		echo '<div class="spinner-cubes">
				  <div class="cube1"></div>
				  <div class="cube2"></div>
   		 	 </div>';	
			
		}

		if($slider_spinner == 'pulse') {
			
		echo '<div class="spinner-pulse"></div>';	
			
		}
		
		if($slider_spinner == 'dots') {
			
		echo '<div class="spinner-dots">
				  <div class="dot1"></div>
				  <div class="dot2"></div>
    		 </div>';	
			
		}	
		

		if($slider_spinner == 'three-bounce') {
			
		echo '<div class="spinner-three-bounce">
				  <div class="bounce1"></div>
				  <div class="bounce2"></div>
				  <div class="bounce3"></div>
    		 </div>';	
			
		}

		if($slider_spinner == 'circle') {
			
		echo '<div class="spinner-circle">
				<div class="spinner-container container1">
				  <div class="circle1"></div>
				  <div class="circle2"></div>
				  <div class="circle3"></div>
				  <div class="circle4"></div>
				</div>
				<div class="spinner-container container2">
				  <div class="circle1"></div>
				  <div class="circle2"></div>
				  <div class="circle3"></div>
				  <div class="circle4"></div>
				</div>
				<div class="spinner-container container3">
				  <div class="circle1"></div>
				  <div class="circle2"></div>
				  <div class="circle3"></div>
				  <div class="circle4"></div>
				</div>
    		 </div>';	
			
		}
		
		?>
        </div>
        
        <div id="maximage">
		
        <?php
        foreach ( $slider_group as $single_slider_group ) :
			$single_slider_image = $single_slider_group['first-bg-slider-image'];
			$single_slider_content_area = $single_slider_group['first-bg-slider-content-area'];				
			$image_src = wp_get_attachment_image_src($single_slider_image, 'adonepage-background-block'); 
    		echo '<div>';
			echo '<img src="'.$image_src[0].'" alt="">';
			echo '<div class="slide-content"><div class="slide-content-text">';
			if(!empty($single_slider_content_area)) {
				echo do_shortcode($single_slider_content_area);
			}
			echo '</div></div>';
			echo '</div>';	
								
		endforeach;
		?>        
		</div>
        <div class="block-pattern-1"></div>	
		<script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function($){
				$('#maximage').maximage({
					cycleOptions: {
						speed: <?php echo $slider_speed; ?>, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
						<?php if($slider_autoplay == 'no') { ?> 
						timeout: 0,
						<?php } ?>
						prev: '#arrow_left',
						next: '#arrow_right',
						pause: 1,						
						before : function(last, current) {
							jQuery('.slide-content').fadeOut().animate({
								top : '190px'
								}, {
								queue : false,
								easing : 'easeOutQuad',
								duration : 550
								});
							jQuery('.slide-content').fadeOut().animate({
								top : '-190px'
								});
							},
						after : function(last, current) {
							jQuery('.slide-content').fadeIn().animate({
								top : '0'
								}, {
								queue : false,
								easing : 'easeOutQuad',
								duration : 450
								});
							} 
					},
					onFirstImageLoaded: function(){
						jQuery('#maximage').fadeIn('fast');
						jQuery('.slide-content').fadeIn().animate({
							top : '0'
						}); 						
					},			
					onImagesLoaded: function(){
						jQuery('#cycle-loader').hide();
					}
				});
	
				// Helper function to Fill and Center the HTML5 Video
				jQuery('video,object').maximage('maxcover');
				
			});
			
		</script>
                    
        <?php }
		
		
		// END FIRST SLIDE SLIDER
		
		
		// TYPE VIDEO
		if($first_bg_type_active == 'video') { 
		$video_url  = $first_bg_video;
		$video_audio  = $first_bg_video_audio;	
		if(empty($video_audio)) { $video_audio = 'false'; }	
		?>
		<div class="background-video">
        	<script>
			jQuery(document).ready(function($){
      			$(".player").mb_YTPlayer();
    		});
			</script>
            <div id="P1" class="player" style="display:block; margin: auto; background: rgba(0,0,0,0.5)" data-property="{videoURL:'<?php echo $video_url; ?>',containment:'.background-video',startAt:0,mute:<?php echo $video_audio; ?>,autoPlay:true,loop:true,opacity:1,showYTLogo:false}"></div>
        </div>
		<?php } ?>
        </div>
        </div>
        


		<?php
		/***************************** GROUP SLIDE **************************/

		$slide_count=2;	
        foreach ( $group_data as $single_field ) :		
		?>
		<div class="slide 
        <?php if($single_field['bg-type-active'] == 'image') { ?>
        adonepage-parallax
        <?php } ?>
        " id="slide<?php echo $slide_count; ?>" data-slide="<?php echo $slide_count; ?>">
		<div class="content-wrapper">
        <div class="wrapper">
        <?php 
		
		if(!empty($single_field['block-name-active'])) { 
		
			if($single_field['block-name-active'] == 'yes') {

				if(!empty($single_field['block-name'])) { 
					if($single_field['block-name-effects'] == 'none') {
						echo '<h1 class="title-block">'.$single_field['block-name'].'</h1>'; 
					} else {
						echo '<h1 data-position="'.$single_field['block-name-effects'].'" class="title-block notViewed animBlock floatr">'.$single_field['block-name'].'</h1>'; 
					}
					
				}
				
			}
		
		}
		?>
        <?php 
		if(!empty($single_field['content-block'])) { 
			echo do_shortcode($single_field['content-block']); 
		}
		?>
        </div>
        
        <div class="block-pattern-<?php echo $slide_count; ?>"></div>
		<?php
		
		// TYPE VIDEO
		if($single_field['bg-type-active'] == 'video') { 
		$num_video = rand(2,10000);
		$video_url  = $single_field['bg-video'];
		$video_audio  = $single_field['bg-video-audio'];	
		if(empty($video_audio)) { $video_audio = 'false'; }	
		?>
		<div class="background-video">
        	<script>
			jQuery(document).ready(function($){
      			$(".player.num_video<?php echo $num_video; ?>").mb_YTPlayer();
    		});
			</script>
            <div id="P1" class="player num_video<?php echo $num_video; ?>" style="display:block; margin: auto; background: rgba(0,0,0,0.5)" data-property="{videoURL:'<?php echo $video_url; ?>',containment:'.background-video',startAt:0,mute:<?php echo $video_audio; ?>,autoPlay:true,loop:true,opacity:1,showYTLogo:false}"></div>
        </div>
		<?php } ?>
        </div>
        </div>
<?php
		$slide_count++;
		endforeach;
?>

<?php } ?>