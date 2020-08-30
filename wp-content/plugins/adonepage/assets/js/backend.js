/* 
File: assets/js/backend.js
Description: JS Script for Backend
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/

jQuery(document).ready(function($){

		$(function() {
	
			$( "#tabs" ).tabs();
	
		});


		$('.field-item .open').click(function(e){
			e.preventDefault();
			//jQuery(this).parent('.field-item').addClass('visible');
			$(this).parents('.field-item').find('.adonepagecmb_metabox').show();
			return false;
		});

		$('.field-item .close').click(function(e){
			e.preventDefault();
			//jQuery(this).parent('.field-item').addClass('visible');
			$(this).parents('.field-item').find('.adonepagecmb_metabox').hide();
			return false;
		});

 	    var type_bg = $("#first-bg-type-active .field-item input[type='radio']:checked").val();
			//alert(value);
		//var type_bg = $('#first-bg-type-active-adonepagecmb-field-0 .select2-chosen').val();
			//alert(type_bg);
			if(type_bg == 'color') {
				//alert(type_bg);
				// COLOR
				$('#first-bg-color-title').css('display','block');
				$('#first-bg-color').css('display','block');
				
				// IMAGE 
				$('#first-bg-image-title').css('display','none');
				$('#first-bg-image').css('display','none');
				
				// VIDEO
				$('#first-bg-video-title').css('display','none');
				$('#first-bg-video').css('display','none');
				$('#first-bg-video-audio').css('display','none');
				
				// SLIDER
				$('#first-bg-slider-title').css('display','none');
				$('#first-bg-slider-spinner').css('display','none');				
				$('#first-bg-slider-spinner-color').css('display','none');
				$('#first-bg-slider-spinner-bg-color').css('display','none');
				$('#first-slider-autoplay').css('display','none');
				$('#first-slider-speed').css('display','none');
				$('#slider-group').css('display','none');
												
			}
					if(type_bg == 'image') {
						
						// COLOR
						$('#first-bg-color-title').css('display','none');
						$('#first-bg-color').css('display','none');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','block');
						$('#first-bg-image').css('display','block');
						
						// VIDEO
						$('#first-bg-video-title').css('display','none');
						$('#first-bg-video').css('display','none');
						$('#first-bg-video-audio').css('display','none');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','none');
						$('#first-bg-slider-spinner').css('display','none');				
						$('#first-bg-slider-spinner-color').css('display','none');
						$('#first-bg-slider-spinner-bg-color').css('display','none');
						$('#first-slider-autoplay').css('display','none');
						$('#first-slider-speed').css('display','none');
						$('#slider-group').css('display','none');
														
					}	
					if(type_bg == 'video') {
						
						// COLOR
						$('#first-bg-color-title').css('display','none');
						$('#first-bg-color').css('display','none');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','none');
						$('#first-bg-image').css('display','none');
						
						// VIDEO
						$('#first-bg-video-title').css('display','block');
						$('#first-bg-video').css('display','block');
						$('#first-bg-video-audio').css('display','block');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','none');
						$('#first-bg-slider-spinner').css('display','none');				
						$('#first-bg-slider-spinner-color').css('display','none');
						$('#first-bg-slider-spinner-bg-color').css('display','none');
						$('#first-slider-autoplay').css('display','none');
						$('#first-slider-speed').css('display','none');
						$('#slider-group').css('display','none');
														
					}
					if(type_bg == 'slider') {
						
						// COLOR
						$('#first-bg-color-title').css('display','none');
						$('#first-bg-color').css('display','none');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','none');
						$('#first-bg-image').css('display','none');
						
						// VIDEO
						$('#first-bg-video-title').css('display','none');
						$('#first-bg-video').css('display','none');
						$('#first-bg-video-audio').css('display','none');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','block');
						$('#first-bg-slider-spinner').css('display','block');				
						$('#first-bg-slider-spinner-color').css('display','block');
						$('#first-bg-slider-spinner-bg-color').css('display','block');
						$('#first-slider-autoplay').css('display','block');
						$('#first-slider-speed').css('display','block');
						$('#slider-group').css('display','block');
														
					}				
			
			$("#first-bg-type-active .field-item input[type='radio']:checked").live('click', function(event) {
				
					type_bg = $("#first-bg-type-active .field-item input[type='radio']:checked").val();
					if(type_bg == 'color') {
						
						// COLOR
						$('#first-bg-color-title').css('display','block');
						$('#first-bg-color').css('display','block');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','none');
						$('#first-bg-image').css('display','none');
						
						// VIDEO
						$('#first-bg-video-title').css('display','none');
						$('#first-bg-video').css('display','none');
						$('#first-bg-video-audio').css('display','none');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','none');
						$('#first-bg-slider-spinner').css('display','none');				
						$('#first-bg-slider-spinner-color').css('display','none');
						$('#first-bg-slider-spinner-bg-color').css('display','none');
						$('#first-slider-autoplay').css('display','none');
						$('#first-slider-speed').css('display','none');
						$('#slider-group').css('display','none');
														
					}
					if(type_bg == 'image') {
						
						// COLOR
						$('#first-bg-color-title').css('display','none');
						$('#first-bg-color').css('display','none');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','block');
						$('#first-bg-image').css('display','block');
						
						// VIDEO
						$('#first-bg-video-title').css('display','none');
						$('#first-bg-video').css('display','none');
						$('#first-bg-video-audio').css('display','none');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','none');
						$('#first-bg-slider-spinner').css('display','none');				
						$('#first-bg-slider-spinner-color').css('display','none');
						$('#first-bg-slider-spinner-bg-color').css('display','none');
						$('#first-slider-autoplay').css('display','none');
						$('#first-slider-speed').css('display','none');
						$('#slider-group').css('display','none');
														
					}	
					if(type_bg == 'video') {
						
						// COLOR
						$('#first-bg-color-title').css('display','none');
						$('#first-bg-color').css('display','none');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','none');
						$('#first-bg-image').css('display','none');
						
						// VIDEO
						$('#first-bg-video-title').css('display','block');
						$('#first-bg-video').css('display','block');
						$('#first-bg-video-audio').css('display','block');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','none');
						$('#first-bg-slider-spinner').css('display','none');				
						$('#first-bg-slider-spinner-color').css('display','none');
						$('#first-bg-slider-spinner-bg-color').css('display','none');
						$('#first-slider-autoplay').css('display','none');
						$('#first-slider-speed').css('display','none');
						$('#slider-group').css('display','none');
														
					}
					if(type_bg == 'slider') {
						
						// COLOR
						$('#first-bg-color-title').css('display','none');
						$('#first-bg-color').css('display','none');
						
						// IMAGE 
						$('#first-bg-image-title').css('display','none');
						$('#first-bg-image').css('display','none');
						
						// VIDEO
						$('#first-bg-video-title').css('display','none');
						$('#first-bg-video').css('display','none');
						$('#first-bg-video-audio').css('display','none');
						
						// SLIDER
						$('#first-bg-slider-title').css('display','block');
						$('#first-bg-slider-spinner').css('display','block');				
						$('#first-bg-slider-spinner-color').css('display','block');
						$('#first-bg-slider-spinner-bg-color').css('display','block');
						$('#first-slider-autoplay').css('display','block');
						$('#first-slider-speed').css('display','block');
						$('#slider-group').css('display','block');
														
					}																							
			});
				
});