"use strict";

window.jQuery = window.$ = jQuery;

jQuery(document).ready(function($) {
	"use strict";
	
	evatheme_core_metro_update();

});


jQuery(window).resize(function() {

	evatheme_core_metro_update();
	setTimeout("evatheme_core_metro_update()", 50);

});


jQuery(window).load(function() {

	evatheme_core_metro_update();

});


function evatheme_core_metro_update() {
	
	var gallery_metro_tag = jQuery('.gallery_metro');
	if (gallery_metro_tag.length) {
		jQuery('.metro_item').each(function() {
			var metro_item_w = jQuery(this).width();

			if (jQuery(this).hasClass('metro_height2')) {
				var metro_item_h = metro_item_w*2;
			} else if (jQuery(this).hasClass('metro_width2_height2')) {
				var metro_item_h = metro_item_w*1;
			} else if (jQuery(this).hasClass('metro_width2')) {
				var metro_item_h = metro_item_w/2;
			} else {
				var metro_item_h = Math.ceil(metro_item_w*1);
			}

			jQuery(this).find('.gallery_img_bg').css({'height': metro_item_h + 'px'});
		});
	}
}