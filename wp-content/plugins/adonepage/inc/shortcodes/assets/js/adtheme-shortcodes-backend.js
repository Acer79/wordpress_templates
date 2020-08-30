/* 
File: adtheme-shortcodes-backend.js
Description: JS Script for Backend
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/



jQuery(document).ready(function($){

// Custom popup box

	 $("#adonepage-generator-button").live('click', function(event) {

	  $("#adonepage-generator-wrap, #adonepage-generator-overlay").show();

	 });

	 

	 $("#adonepage-generator-close").live('click', function(event) {

	  $("#adonepage-generator-wrap, #adonepage-generator-overlay").hide();

	 });

	 	 

	 // Insert shortcode

	 $('#adonepage-generator-insert').live('click', function(event) {

		var type = $('#adonepage-shortcode-type').val();
		
		
		// SHORTOCODE CASE: TYPOGRAPHY
		if(type == 'ad-typography') {		
	
			// TYPOGRAPHY
			var tag 				= $('#adonepage-typography-tag').val(); 
			var font_size 			= $('#adonepage-custom-font-size').val();
			var font_weight 		= $('#adonepage-custom-font-weight').val(); 
			var font_color 			= $('#adonepage-custom-font-color').val();
			var font_style 			= $('#adonepage-custom-font-style').val(); 
			var font_border_size	= $('#adonepage-custom-font-border-size').val();
			var font_border_color	= $('#adonepage-custom-font-border-color').val();
			var font_border_type	= $('#adonepage-custom-font-border-type').val();
			var font_padding		= $('#adonepage-custom-font-padding').val();
			var font_bg_color		= $('#adonepage-custom-font-bg-color').val();
			var font_opacity		= $('#adonepage-custom-font-opacity').val();
			var line_height			= $('#adonepage-custom-line-height').val();
			var resp_important		= $('#adonepage-custom-font-responsive-important').val();		
			var typography_text 	= $('#adonepage-typography-text').val();		
			var line_color			= $('#adonepage-line-color').val();		
			var line_height	 		= $('#adonepage-line-height').val();		
			var line_width 			= $('#adonepage-line-width').val();		
			var line_align 			= $('#adonepage-line-align').val();		
			var line_margin_top 	= $('#adonepage-line-margin-top').val();		
			var line_margin_bottom 	= $('#adonepage-line-margin-bottom').val();	
			var line_type 			= $('#adonepage-line-type').val();	
		    var empty_line_height	= $('#adonepage-empty-line-height').val();
			
			if(tag == 'custom') {
			var shortcode = '[adop_typography_custom fz="' + font_size + '" fw="' + font_weight + '" fc="' + font_color + '" fs="' + font_style + '" text="' + typography_text + '" bs="' + font_border_size + '" bc="' + font_border_color + '" bt="' + font_border_type + '" pad="' + font_padding + '" bg="' + font_bg_color + '" op="' + font_opacity + '" lh="' + line_height + ' ri="' + resp_important + '"]';
			} else if (tag == 'line') {				
			var shortcode = '[adop_line color="' + line_color + '" height="' + line_height + '" width="' + line_width + '" align="' + line_align + '" margin_top="' + line_margin_top + '" margin_bottom="' + line_margin_bottom + '" type="' + line_type + '"]';			
			} else if (tag == 'empty-line') {				
			var shortcode = '[adop_empty_line height="' + empty_line_height + '"]';			
			}else {
			var shortcode = '[adop_typography tag="'+ tag + '" text="' + typography_text + '"]';
			}
		
		}
		
		// SHORTOCODE CASE: BUTTON
		if(type == 'ad-button-shortcodes') {
			
			var type_button			= $('#adonepage-button-type').val(); 
			var button_padding		= $('#adonepage-button-padding').val();
			var button_margin 		= $('#adonepage-button-margin').val(); 
			var button_b_radius		= $('#adonepage-button-border-radius').val();
			var button_font_size	= $('#adonepage-button-font-size').val();
			var button_font_color	= $('#adonepage-button-font-color').val();			
			var button_color		= $('#adonepage-button-color').val(); 
			var button_color_over	= $('#adonepage-button-color-over').val();		
			var button_opacity 		= $('#adonepage-button-opacity').val();
			var button_responsive 	= $('#adonepage-button-responsive-important').val();
			var button_content		= $('#adonepage-button-content').val(); 
			var button_image		= $('#adonepage-button-image').val();		
			var button_text 		= $('#adonepage-button-text').val();			
			var button_link			= $('#adonepage-button-link').val();			
			var button_target		= $('#adonepage-button-target').val();

			if(button_content == 'image') {
				var	content = button_image;
			} else {
				var	content = button_text;
			}
			

			if(type_button == 'custom') {
			var shortcode = '[adop_button_custom bp="' + button_padding + '" bm="' + button_margin + '" bbr="' + button_b_radius + '" bfs="' + button_font_size + '" bfc="' + button_font_color + '" bc="' + button_color + '" bco="' + button_color_over + '" bop="' + button_opacity + '" bct="' + button_content + '" bcontent="' + content + '" bl="' + button_link	 + '" bt="' + button_target + '" ri="' + button_responsive + '"]';
			} else {
			var shortcode = '[adop_button type="'+ type_button + '" bct="' + button_content + '" bcontent="' + content + '" bl="' + button_link	 + '" bt="' + button_target + '"]';
			}



		}

		// SHORTOCODE CASE: PORTFOLIO
		if(type == 'ad-portfolio') {
		
			var p_category				= $('#adonepage-category').val(); 
			var p_number				= $('#adonepage-number').val();	
			var p_color					= $('#adonepage-portfolio-color').val();
			var p_font_color			= $('#adonepage-portfolio-font-color').val();
			var p_item_padding			= $('#adonepage-portfolio-item-padding').val();
			var p_show_filter			= $('#adonepage-portfolio-show-filter').val();
			var p_filter_position		= $('#adonepage-portfolio-filter-position').val();
			var p_columns				= $('#adonepage-portfolio-columns').val();
			var p_custom_link_post_url	= $('#adonepage-portfolio-custom-link-post-url').val();
			var p_custom_link_target	= $('#adonepage-portfolio-custom-link-target').val();
			var p_custom_title			= $('#adonepage-portfolio-custom-title').val();
			var p_custom_category		= $('#adonepage-portfolio-custom-category').val();
			var p_custom_date			= $('#adonepage-portfolio-custom-date').val();
			var p_custom_text			= $('#adonepage-portfolio-custom-text').val();
			var p_custom_excerpt		= $('#adonepage-portfolio-custom-excerpt').val();
		
		var shortcode = '[adop_portfolio category="' + p_category + '" n="' + p_number + '" bg="' + p_color + '" co="' + p_font_color + 
		'" pa="' + p_item_padding + '" sf="' + p_show_filter + '" fp="' + p_filter_position + 
		'" col="' + p_columns + '" lpurl="' + p_custom_link_post_url + '" lt="' + p_custom_link_target + 
		'" title="' + p_custom_title + '" ca="' + p_custom_category + '" date="' + p_custom_date + 
		'" text="' + p_custom_text + '" excerpt="' + p_custom_excerpt + '"]';
		
		
		}

		// SHORTOCODE CASE: GALLERY
		if(type == 'ad-gallery') {
		
			var g_category				= $('#adonepage-gallery-category').val(); 
			var g_number				= $('#adonepage-gallery-number').val();	
			var g_color					= $('#adonepage-gallery-color').val();
			var g_font_color			= $('#adonepage-gallery-font-color').val();
			var g_item_padding			= $('#adonepage-gallery-item-padding').val();
			var g_show_filter			= $('#adonepage-gallery-show-filter').val();
			var g_filter_position		= $('#adonepage-gallery-filter-position').val();
			var g_columns				= $('#adonepage-gallery-columns').val();
		
		var shortcode = '[adop_gallery category="' + g_category + '" n="' + g_number + '" bg="' + g_color + '" co="' + g_font_color + 
		'" pa="' + g_item_padding + '" sf="' + g_show_filter + '" fp="' + g_filter_position + 
		'" col="' + g_columns + '"]';
		
		
		}

		// SHORTOCODE CASE: MAP
		if(type == 'ad-map') {
		
			var map_type			= $('#adonepage-map-type').val(); 
			var map_latitude		= $('#adonepage-map-latitude').val();	
			var map_longitude		= $('#adonepage-map-longitude').val();
			var map_zoom			= $('#adonepage-map-zoom').val();
			var map_width			= $('#adonepage-map-width').val();
			var map_height			= $('#adonepage-map-height').val();
			var map_message			= $('#adonepage-map-message').val();
			var map_key				= $('#adonepage-map-key').val();
		
		var shortcode = '[adop_map id="' + map_type + '" zoom="' + map_zoom + '" latitude="' + map_latitude + '" longitude="' + map_longitude + 
		'" width="' + map_width + '" height="' + map_height + '" message="' + map_message + '" key="' + map_key + '"]';
		
		}

		// SHORTOCODE CASE: COLUMNS
		if(type == 'ad-columns') {
		
			var columns_numbers 	= $('#adonepage-columns').val(); 
			
			if(columns_numbers == 'col_2') {
				var shortcode = '[ad_one_half]Your content goes here.....[/ad_one_half]' +
								'[ad_one_half_last]Your content goes here.....[/ad_one_half_last]';
			}
		
			if(columns_numbers == 'col_3') {
				var shortcode = '[ad_one_third]Your content goes here.....[/ad_one_third]' + 
    						    '[ad_one_third]Your content goes here.....[/ad_one_third]' +
								'[ad_one_third_last]Your content goes here.....[/ad_one_third_last]';
			}		
		
			if(columns_numbers == 'col_4') {
				var shortcode = '[ad_one_fourth]Your content goes here.....[/ad_one_fourth]' + 
    						    '[ad_one_fourth]Your content goes here.....[/ad_one_fourth]' +
								'[ad_one_fourth]Your content goes here.....[/ad_one_fourth]' +
								'[ad_one_fourth_last]Your content goes here.....[/ad_one_fourth_last]';
			}		
		
			if(columns_numbers == 'col_5') {
				var shortcode = '[ad_one_fifth]Your content goes here.....[/ad_one_fifth]' + 
    						    '[ad_one_fifth]Your content goes here.....[/ad_one_fifth]' +
								'[ad_one_fifth]Your content goes here.....[/ad_one_fifth]' +
								'[ad_one_fifth]Your content goes here.....[/ad_one_fifth]' +
								'[ad_one_fifth_last]Your content goes here.....[/ad_one_fifth_last]';
			}

			if(columns_numbers == 'col_6') {
				var shortcode = '[ad_one_sixth]Your content goes here.....[/ad_one_sixth]' + 
    						    '[ad_one_sixth]Your content goes here.....[/ad_one_sixth]' +
								'[ad_one_sixth]Your content goes here.....[/ad_one_sixth]' +
								'[ad_one_sixth]Your content goes here.....[/ad_one_sixth]' +
								'[ad_one_sixth]Your content goes here.....[/ad_one_sixth]' +
								'[ad_one_sixth_last]Your content goes here.....[/ad_one_sixth_last]';
			}			

			if(columns_numbers == 'col_13_23') {
				var shortcode = '[ad_one_third]Your content goes here.....[/ad_one_third]' + 
    						    '[ad_two_third_last]Your content goes here.....[/ad_two_third_last]';
			}			

			if(columns_numbers == 'col_23_13') {
				var shortcode = '[ad_two_third]Your content goes here.....[/ad_two_third]' + 
    						    '[ad_one_third_last]Your content goes here.....[/ad_one_third_last]';
			}

			if(columns_numbers == 'col_14_34') {
				var shortcode = '[ad_one_fourth]Your content goes here.....[/ad_one_fourth]' + 
    						    '[ad_three_fourth_last]Your content goes here.....[/ad_three_fourth_last]';
			}

			if(columns_numbers == 'col_34_14') {
				var shortcode = '[ad_three_fourth]Your content goes here.....[/ad_three_fourth]' + 
    						    '[ad_one_fourth_last]Your content goes here.....[/ad_one_fourth_last]';
			}

			if(columns_numbers == 'col_15_45') {
				var shortcode = '[ad_one_fifth]Your content goes here.....[/ad_one_fifth]' + 
    						    '[ad_four_fifth_last]Your content goes here.....[/ad_four_fifth_last]';
			}

			if(columns_numbers == 'col_45_15') {
				var shortcode = '[ad_four_fifth]Your content goes here.....[/ad_four_fifth]' + 
    						    '[ad_one_fifth_last]Your content goes here.....[/ad_one_fifth_last]';
			}

			if(columns_numbers == 'col_16_56') {
				var shortcode = '[ad_one_sixth]Your content goes here.....[/ad_one_sixth]' + 
    						    '[ad_five_sixth_last]Your content goes here.....[/ad_five_sixth_last]';
			}

			if(columns_numbers == 'col_56_16') {
				var shortcode = '[ad_five_sixth]Your content goes here.....[/ad_five_sixth]' + 
    						    '[ad_one_sixth_last]Your content goes here.....[/ad_one_sixth_last]';
			}
								
		}
		
		// SHORTOCODE CASE: SOCIAL
		if(type == 'ad-social') {
		
			var social_type 	= $('#adonepage-social-type').val(); 
			
				var social_color 			= $('#adonepage-social-color').val();
				var social_size 			= $('#adonepage-social-size').val();
				var social_margin 			= $('#adonepage-social-margin').val();
							
			if(social_type == 'link') {
								
				var social_link_fb 			= $('#adonepage-social-link-facebook').val();
				var social_link_twitter 	= $('#adonepage-social-link-twitter').val();
				var social_link_linkedin 	= $('#adonepage-social-link-linkedin').val();
				var social_link_gplus 		= $('#adonepage-social-link-gplus').val();
				var social_link_pinterest 	= $('#adonepage-social-link-pinterest').val();
				var social_link_youtube 	= $('#adonepage-social-link-youtube').val();
				var social_link_flickr 		= $('#adonepage-social-link-flickr').val();
				var social_link_tumblr 		= $('#adonepage-social-link-tumblr').val();
				var social_link_rss 		= $('#adonepage-social-link-rss').val();
				var social_link_vimeo		= $('#adonepage-social-link-vimeo').val();
				var social_link_contact		= $('#adonepage-social-link-contact').val();
				
				var shortcode = '[adop_social_link color="' + social_color + '" size="' + social_size + '" margin="' + social_margin + '" fb="' + social_link_fb + '" tw="' + social_link_twitter + 
				
				'" in="' + social_link_linkedin + '" gplus="' + social_link_gplus + '" pi="' + social_link_pinterest + 
				'" yt="' + social_link_youtube + '" fl="' + social_link_flickr + '" tu="' + social_link_tumblr + 
				'" rss="' + social_link_rss + '" vi="' + social_link_vimeo + '" co="' + social_link_contact + '"]';
			
			}
			
			if(social_type == 'share') {				
				var social_share_fb 		= $('#adonepage-social-share-facebook').val();
				var social_share_twitter 	= $('#adonepage-social-share-twitter').val();
				var social_share_linkedin 	= $('#adonepage-social-share-linkedin').val();
				var social_share_gplus 		= $('#adonepage-social-share-gplus').val();
				var social_share_pinterest 	= $('#adonepage-social-share-pinterest').val();
				
				var shortcode = '[adop_social_share color="' + social_color + '" size="' + social_size + '" margin="' + social_margin + '" fb="' + social_share_fb + '" tw="' + social_share_twitter +				
				'" in="' + social_share_linkedin + '" gplus="' + social_share_gplus + '" pi="' + social_share_pinterest + '"]';
				
			}

		}


		// SHORTOCODE CASE: ONSCROLL
		if(type == 'ad-onscroll') {		
	
			var onscroll_type		= $('#adonepage-onscroll-type').val(); 
			var onscroll_title 		= $('#adonepage-onscroll-title').val();
			var onscroll_text 		= $('#adonepage-onscroll-text').val(); 
			var onscroll_url_image 	= $('#adonepage-onscroll-url-image').val();		
		
		    if(onscroll_type == 'custom') {
				
				var shortcode = '[adop_onscroll_single_left]Your content goes here.....[/adop_onscroll_single_left]' + 
    						    '[adop_onscroll_single_right]Your content goes here.....[/adop_onscroll_single_right]';
				
			} else {
						
				var shortcode = '[adop_onscroll_single type="'+ onscroll_type + '" title="' + onscroll_title + '" text="' + onscroll_text + '" image="' + onscroll_url_image + '"]';
				
			}
		}

		// SHORTOCODE CASE: LISTS
		if(type == 'ad-lists') {		
	
			var lists_type = $('.adonepage-icon-list-select input:checked').val();	
			var lists_color = $('#adonepage-lists-color').val();	
			var shortcode = '[list_check]' +
								'[li_field type="' + lists_type + '" color="' + lists_color + '"]Your content goes here.....[/li_field]' + 
    						    '[li_field type="' + lists_type + '" color="' + lists_color + '"]Your content goes here.....[/li_field]' + 
								'[li_field type="' + lists_type + '" color="' + lists_color + '"]Your content goes here.....[/li_field]' + 
								'[li_field type="' + lists_type + '" color="' + lists_color + '"]Your content goes here.....[/li_field]' + 
								'[/list_check]';			
			
		}

		// SHORTOCODE CASE: POSTS SLIDER
		if(type == 'ad-posts-slider') {		
		
			var category_posts_slider 	= $('#adonepage-category-posts-slider').val();
			var number_posts_slider 	= $('#adonepage-number-posts-slider').val();
			var main_color_posts_slider = $('#adonepage-posts-slider-color').val();
			var excerpt_posts_slider 	= $('#adonepage-posts-slider-excerpt').val();
			
			var shortcode = '[adtheme_posts_slider cat="' + category_posts_slider + '" num="' + number_posts_slider + '" color="' + main_color_posts_slider + '" excerpt="' + excerpt_posts_slider + '"]';			
			
		}

		// SHORTOCODE CASE: QT ROTATOR
		if(type == 'ad-qtrotator') {		
		
			var content_source_qtrotator 	= $('#adonepage-content-source-qtrotator').val();
			var category_posts_qtrotator 	= $('#adonepage-category-posts-qtrotator').val();
			var number_qtrotator 			= $('#adonepage-number-qtrotator').val();
			var color_qtrotator 			= $('#adonepage-qtrotator-color').val();
			var excerpt_qtrotator 			= $('#adonepage-qtrotator-excerpt').val();
			
			if(content_source_qtrotator == 'posts') {
				var shortcode = '[adtheme_qtrotator source="' + content_source_qtrotator + '" cat="' + category_posts_slider + '" num="' + number_qtrotator + '" color="' + color_qtrotator + '" excerpt="' + excerpt_qtrotator + '"]';			
			} else {
				var shortcode = '[adtheme_qtrotator source="' + content_source_qtrotator + '" num="' + number_qtrotator + '" color="' + color_qtrotator + '" excerpt="' + excerpt_qtrotator + '"]';			
			}			
		}

		// SHORTOCODE CASE: EFFECTS
		if(type == 'ad-effects') {		
		
			var effects_type 				= $('#adonepage-effects-type').val();
			var animated_effects 			= $('#adonepage-animated-effects').val();
			var align 						= $('#adonepage-effects-align').val();
			
			if(effects_type == 'left') {
				var shortcode = '[adop_effects_left effects="' + animated_effects + '" align="' + align + '"]Your content goes here.....[/adop_effects_left]';			
			}
			if(effects_type == 'right') {
				var shortcode = '[adop_effects_right effects="' + animated_effects + '" align="' + align + '"]Your content goes here.....[/adop_effects_right]';			
			}
			if(effects_type == 'none') {
				var shortcode = '[adop_effects_none effects="' + animated_effects + '" align="' + align + '"]Your content goes here.....[/adop_effects_none]';			
			}						
		}

		// SHORTOCODE CASE: CAROUSEL
		if(type == 'ad-carousel') {		
		
			var source 				= $('#adonepage-content-source-carousel').val();
			var cat 				= $('#adonepage-category-posts-carousel').val();
			var style 				= $('#adonepage-carousel-style').val();
			var excerpt 			= $('#adonepage-carousel-custom-excerpt').val();
			var lazy 				= $('#adonepage-carousel-lazy').val();
			var nav 				= $('#adonepage-carousel-nav').val();			
			var item_show 			= $('#adonepage-carousel-item-show').val();
			var number 				= $('#adonepage-carousel-number').val();
			var autoplay 			= $('#adonepage-carousel-autoplay').val();
			var paginationSpeed 	= $('#adonepage-carousel-paginationSpeed').val();			
			var goToFirstSpeed 		= $('#adonepage-carousel-goToFirstSpeed').val();
			var transitionstyle 	= $('#adonepage-carousel-transitionstyle').val();
						
			if(source == 'posts') {
				var shortcode = '[adop_carousel source="' + source + '" cat="' + cat + '" style="' + style + '" excerpt="' + excerpt + '" lazy="' + lazy + '" nav="' + nav + '" item_show="' + item_show + '" number="' + number + '" autoplay="' + autoplay + '" ps="' + paginationSpeed + '" gtfs="' + goToFirstSpeed + '" transition="' + transitionstyle + '"]';			
			} else {
				var shortcode = '[adop_carousel source="' + source + '" style="' + style + '" excerpt="' + excerpt + '" lazy="' + lazy + '" nav="' + nav + '" item_show="' + item_show + '" number="' + number + '" autoplay="' + autoplay + '" ps="' + paginationSpeed + '" gtfs="' + goToFirstSpeed + '" transition="' + transitionstyle + '"]';					
			}
			
		}

		// SHORTOCODE CASE: CHARTS
		if(type == 'ad-charts') {		
		
			var chart_type 		= $('#adonepage-chart-type').val();
			var bar_color 		= $('#adonepage-chart-bar-color').val();
			var track_color 	= $('#adonepage-chart-track-color').val();
			var percent 		= $('#adonepage-chart-percent').val();
			var pie_width 		= $('#adonepage-pie-chart-width').val();
			var bar_width 		= $('#adonepage-bar-chart-width').val();			
			var bar_style 		= $('#adonepage-bar-chart-style').val();
						
			if(chart_type == 'pie_chart') {
				var shortcode = '[adop_pie_charts percent="' + percent + '" bar_color="' + bar_color + '" track_color="' + track_color + '" width="' + pie_width + '"]';			
			} else {
				var shortcode = '[adop_bar_charts percent="' + percent + '" bar_color="' + bar_color + '" track_color="' + track_color + '" width="' + bar_width + '" style="' + bar_style + '"]';			
			}
			
		}
		
		// SHORTOCODE CASE: COUNTDOWN
		if(type == 'ad-countdown') {		
		
			var year 		= $('#adonepage-countdown-year').val();
			var month 		= $('#adonepage-countdown-month').val();
			var day 		= $('#adonepage-countdown-day').val();			

			var shortcode = '[adop_countdown year="' + year + '" month="' + month + '" day="' + day + '"]';			

			
		}		

		// SHORTOCODE CASE: BOX
		if(type == 'ad-box') {		
		
			var bgc 		= $('#adonepage-box-bgc').val();
			var bgo 		= $('#adonepage-box-bgo').val();
			var width 		= $('#adonepage-box-width').val();			
			var height 		= $('#adonepage-box-height').val();
			var mar 		= $('#adonepage-box-margin').val();
			var pad 		= $('#adonepage-box-padding').val();
			var bs	 		= $('#adonepage-box-bs').val();
			var bc	 		= $('#adonepage-box-bc').val();
			var bt	 		= $('#adonepage-box-bt').val();
				    
			var shortcode = '[adop_box bgc="' + bgc + '" bgo="' + bgo + '" width="' + width + '" height="' + height + '" mar="' + mar + '" pad="' + pad + '" bs="' + bs + '" bc="' + bc + '" bt="' + bt + '"]Your content goes here.....[/adop_box]';			

			
		}

		// SHORTOCODE CASE: ICON
		if(type == 'ad-icon') {		
		
			var icon 			= $('.adonepage-icon-select input:checked').val();
			var icon_size		= $('#adonepage-icon-size').val();
			var icon_color		= $('#adonepage-icon-color').val();			
			var icon_color_over = $('#adonepage-icon-color-over').val();
			var icon_margin		= $('#adonepage-icon-margin').val();
			var icon_padding	= $('#adonepage-icon-padding').val();				
			var icon_float		= $('#adonepage-icon-float').val();
			
			var shortcode = '[adop_icon icon="' + icon + '" size="' + icon_size + '" color="' + icon_color + '" color_over="' + icon_color_over + '" margin="' + icon_margin + '" padding="' + icon_padding + '" float="' + icon_float + '"]';
				
		}

		// SHORTOCODE CASE: WOOCOMMERCE
		if(type == 'ad-woocommerce') {		
		
			var woo_type			= $('#adonepage-woocommerce-type-shortcodes').val();
			var woo_cat				= $('#adonepage-woocommerce-category-posts-carousel').val();
			
			// CAROUSEL
			var woo_lazy			= $('#adonepage-woocommerce-carousel-lazy').val();			
			var woo_nav				= $('#adonepage-woocommerce-carousel-nav').val();
			var woo_item_show		= $('#adonepage-woocommerce-carousel-item-show').val();
			var woo_number			= $('#adonepage-woocommerce-carousel-number').val();
			var woo_autoplay		= $('#adonepage-woocommerce-carousel-autoplay').val();
			var woo_paginationSpeed	= $('#adonepage-woocommerce-carousel-paginationSpeed').val();
			var woo_goToFirstSpeed	= $('#adonepage-woocommerce-carousel-goToFirstSpeed').val();
			var woo_transitionstyle	= $('#adonepage-woocommerce-carousel-transitionstyle').val();
			var woo_color			= $('#adonepage-woocommerce-color').val();
			
			// LAST PRODUCT
			var woo_lp_color		= $('#adonepage-woocommerce-last-product-color').val();			
			var woo_lp_number		= $('#adonepage-woocommerce-last-product-number').val();
			var woo_lp_column		= $('#adonepage-woocommerce-last-product-column').val();			
			var woo_lp_is			= $('#adonepage-woocommerce-last-product-infinite-scroll').val();	
			var woo_lp_description	= $('#adonepage-woocommerce-last-product-description').val();	
																				
			if(woo_type == 'carousel') {
				var shortcode = '[adop_carousel_woocommerce cat="' + woo_cat + '" lazy="' + woo_lazy + '" nav="' + woo_nav + '" item_show="' + woo_item_show + '" number="' + woo_number + '" autoplay="' + woo_autoplay + '" ps="' + woo_paginationSpeed + '" gtfs="' + goToFirstSpeed + '" transition="' + woo_transitionstyle + '" color="' + woo_color + '"]';			
			}
			if(woo_type == 'last-product') {
				var shortcode = '[adop_last_product_woocommerce cat="' + woo_cat + '" color="' + woo_lp_color + '" num="' + woo_lp_number + '" col="' + woo_lp_column + '" is="' + woo_lp_is + '" description="' + woo_lp_description + '"]';			
			}			
			
		}
				
		window.send_to_editor(shortcode);

		$("#adonepage-generator-wrap, #adonepage-generator-overlay").hide();

	});


		$('#adonepage-typography-tag').live('click', function(event) {

			var adonepage_tag = $('#adonepage-typography-tag').val();

			if(adonepage_tag == 'custom') {

				$('#adonepage-tag-custom-div').css('display','block');
				$('#adonepage-tag-line-div').css('display','none');
				$('#adonepage-tag-empty-line-div').css('display','none');		
				$('#adonepage-tag-h-div').css('display','block');	

			}	
			
			if(adonepage_tag == 'line') {
				
				$('#adonepage-tag-custom-div').css('display','none');
				$('#adonepage-tag-line-div').css('display','block');
				$('#adonepage-tag-empty-line-div').css('display','none');
				$('#adonepage-tag-h-div').css('display','none');
				
			}

			if(adonepage_tag == 'empty-line') {
				
				$('#adonepage-tag-custom-div').css('display','none');
				$('#adonepage-tag-line-div').css('display','none');
				$('#adonepage-tag-empty-line-div').css('display','block');
				$('#adonepage-tag-h-div').css('display','none');
				
			}
					
			if(adonepage_tag == 'h1' || adonepage_tag == 'h2' || adonepage_tag == 'h3' || 
			   adonepage_tag == 'h4' || adonepage_tag == 'h5' || adonepage_tag == 'h6') {

				$('#adonepage-tag-custom-div').css('display','none');
				$('#adonepage-tag-line-div').css('display','none');
				$('#adonepage-tag-empty-line-div').css('display','none');	
				$('#adonepage-tag-h-div').css('display','block');			
			
			}

		});
		
		$('#adonepage-button-type').live('click', function(event) {

			var adonepage_button = $('#adonepage-button-type').val();

			if(adonepage_button == 'custom') {

				$('#adonepage-button-custom-div').css('display','block');

			}	
					
			if(adonepage_button == 'circle' || adonepage_button == 'rettangle') {

				$('#adonepage-button-custom-div').css('display','none');

			}

		});		

		$('#adonepage-social-type').live('click', function(event) {

			var social_type_value = $('#adonepage-social-type').val();

			if(social_type_value == 'link') {

				$('#adonepage-social-link-div').css('display','block');
				$('#adonepage-social-share-div').css('display','none');
				
			}	
					
			if(social_type_value == 'share') {

				$('#adonepage-social-link-div').css('display','none');
				$('#adonepage-social-share-div').css('display','block');
				
			}

		});		

		$('#adonepage-onscroll-type').live('click', function(event) {

			var adonepage_onscroll = $('#adonepage-onscroll-type').val();

			if(adonepage_onscroll == 'custom') {

				$('#adonepage-onscroll-type-image_text').css('display','none');

			} else {
				
				$('#adonepage-onscroll-type-image_text').css('display','block');	
			
			}

		});

		$('#adonepage-content-source-qtrotator').live('click', function(event) {

			var adonepage_source_qtrotator = $('#adonepage-content-source-qtrotator').val();

			if(adonepage_source_qtrotator == 'posts') {

				$('#adonepage-category-posts-qtrotator').css('display','block');

			} else {
				
				$('#adonepage-category-posts-qtrotator').css('display','none');
			
			}

		});

		$('#adonepage-carousel-style').live('click', function(event) {

			var style = $('#adonepage-carousel-style').val();

			if(style == 'style-partners') {

				$('#adonepage-style-carousel-team').css('display','none');

			} else {
				
				$('#adonepage-style-carousel-team').css('display','block');
			
			}

		});

		$('#adonepage-chart-type').live('click', function(event) {

			var type = $('#adonepage-chart-type').val();

			if(type == 'pie_chart') {

				$('#pie_chart').css('display','block');
				$('#progress_bar').css('display','none');

			} else {
				
				$('#pie_chart').css('display','none');
				$('#progress_bar').css('display','block');
			
			}

		});

		$('#adonepage-woocommerce-type-shortcodes').live('click', function(event) {

			var type = $('#adonepage-woocommerce-type-shortcodes').val();

			if(type == 'carousel') {

				$('#woocommerce-carousel').css('display','block');
				$('#woocommerce-last-product').css('display','none');

			} 
			if(type == 'last-product') {			
				
				$('#woocommerce-carousel').css('display','none');
				$('#woocommerce-last-product').css('display','block');
				
			}

		});
		
		$('#adonepage-shortcode-type').live('click', function(event) {

			var shortcodes_type = $('#adonepage-shortcode-type').val();



			if(shortcodes_type == 'ad-typography') {

				$('#ad-typograghy-div').css('display','block');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');				
				$('#ad-countdown-div').css('display','none');
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
								
			}

			if(shortcodes_type == 'ad-button-shortcodes') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','block');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');				
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');				
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
											
			}

			if(shortcodes_type == 'ad-portfolio') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','block');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
																		
			}	

			if(shortcodes_type == 'ad-gallery') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','block');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');				
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}

			if(shortcodes_type == 'ad-map') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','block');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');				
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
											
			}
			
			if(shortcodes_type == 'ad-columns') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','block');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');				
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
											
			}
			
			if(shortcodes_type == 'ad-social') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','block');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
											
			}
			
			if(shortcodes_type == 'ad-onscroll') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','block');
				$('#ad-lists-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
											
			}	
			
			if(shortcodes_type == 'ad-lists') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','block');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}	
			
			if(shortcodes_type == 'ad-posts-slider') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','block');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');				
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}

			if(shortcodes_type == 'ad-qtrotator') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','block');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}
			
			if(shortcodes_type == 'ad-effects') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','block');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
											
			}
			
			if(shortcodes_type == 'ad-carousel') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','block');
				$('#ad-charts-div').css('display','none');	
				$('#ad-countdown-div').css('display','none');			
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}
			
			if(shortcodes_type == 'ad-charts') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','block');
				$('#ad-countdown-div').css('display','none');
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}
			
			if(shortcodes_type == 'ad-countdown') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','block');
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}

			if(shortcodes_type == 'ad-box') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');
				$('#ad-box-div').css('display','block');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','none');
							
			}	

			if(shortcodes_type == 'ad-woocommerce') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','block');
				$('#ad-icon-div').css('display','none');
							
			}
			
			if(shortcodes_type == 'ad-icon') {

				$('#ad-typograghy-div').css('display','none');
				$('#ad-button-div').css('display','none');
				$('#ad-portfolio-div').css('display','none');
				$('#ad-gallery-div').css('display','none');
				$('#ad-map-div').css('display','none');
				$('#ad-columns-div').css('display','none');
				$('#ad-social-div').css('display','none');
				$('#ad-onscroll-div').css('display','none');
				$('#ad-lists-div').css('display','none');
				$('#ad-posts-slider-div').css('display','none');
				$('#ad-qtrotator-div').css('display','none');
				$('#ad-effects-div').css('display','none');
				$('#ad-carousel-div').css('display','none');
				$('#ad-charts-div').css('display','none');
				$('#ad-countdown-div').css('display','none');
				$('#ad-box-div').css('display','none');
				$('#ad-woocommerce-div').css('display','none');
				$('#ad-icon-div').css('display','block');
							
			}																																
		});

});