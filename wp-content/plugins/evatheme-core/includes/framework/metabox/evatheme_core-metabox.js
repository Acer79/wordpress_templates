( function( $ ) {

    'use strict';

	$( document ).on( 'ready', function() {

		// Date picker
		var $date = $( '.evatheme_core-date-meta' );
		if ( $.datepicker && $date.length ) {
			$date.datepicker( {
				dateFormat: 'yy-mm-dd'
			} );
		}

		// Button Group
		var $buttonGroups = $( '.evatheme_core-mb-btn-group' );
		if ( $buttonGroups.length ) {
			
			$buttonGroups.each( function() {

				var $this        = $( this );
				var $button      = $this.find( 'button' );
				var $hiddenInput = $this.find( '.evatheme_core-mb-hidden' );

				$button.on('click touchend', function() {
					$button.removeClass( 'active' );
					var $this = $( this );
					$this.addClass( 'active' );
					$hiddenInput.val( $this.data( 'value' ) );
				} );

			} );


		}

		// Tabs
		$( 'div#evatheme_core-metabox ul.wp-tab-bar a' ).on('click touchend', function() {
			var lis = $( '#evatheme_core-metabox ul.wp-tab-bar li' ),
				data = $( this ).data( 'tab' ),
				tabs = $( '#evatheme_core-metabox div.wp-tab-panel' );
			$( lis ).removeClass( 'wp-tab-active' );
			$( tabs ).hide();
			$( data ).show();
			$( this ).parent( 'li' ).addClass( 'wp-tab-active' );
			return false;
		} );

		// Color picker
		$( 'div#evatheme_core-metabox .evatheme_core-mb-color-field' ).wpColorPicker();

		// Reset
		$( 'div#evatheme_core-metabox div.evatheme_core-mb-reset a.evatheme_core-reset-btn' ).on('click touchend', function() {
			var $confirm = $( 'div.evatheme_core-mb-reset div.evatheme_core-reset-checkbox' ),
				$txt     = $confirm.is( ':visible' ) ? evatheme_coreMB.cancel : evatheme_coreMB.cancel;
			$( this ).text( $txt );
			$( 'div.evatheme_core-mb-reset div.evatheme_core-reset-checkbox input' ).attr( 'checked', false);
			$confirm.toggle();
		} );

		// Show hide title options
		var titleMainSettings   = $( '#evatheme_core_disable_header_margin_tr, #evatheme_core_post_subheading_tr,#evatheme_core_post_title_style_tr' ),
			titleStyleField     = $( 'div#evatheme_core-metabox select#evatheme_core_post_title_style' ),
			titleStyleFieldVal  = titleStyleField.val(),
			pageTitleBgSettings = $( '#evatheme_core_post_title_background_color_tr, #evatheme_core_post_title_background_redux_tr,#evatheme_core_post_title_height_tr,#evatheme_core_post_title_background_overlay_tr,#evatheme_core_post_title_background_overlay_opacity_tr' ),
			solidColorElements  = $( '#evatheme_core_post_title_background_color_tr' );

		// Show hide title style settings
		if ( titleStyleFieldVal === 'background-image' ) {
			pageTitleBgSettings.show();
		} else if ( titleStyleFieldVal === 'solid-color' ) {
			solidColorElements.show();
		}

		titleStyleField.change(function () {
			pageTitleBgSettings.hide();
			if ( $(this).val() == 'background-image' ) {
				pageTitleBgSettings.show();
			}
			else if ( $(this).val() === 'solid-color' ) {
				solidColorElements.show();
			}
		} );

		// Show hide Overlay options
		var overlayField = $( 'div#evatheme_core-metabox select#evatheme_core_overlay_header' ),
			overlayFieldDependents = $( '#evatheme_core_overlay_header_style_tr, #evatheme_core_overlay_header_font_size_tr,#evatheme_core_overlay_header_logo_tr,#evatheme_core_overlay_header_logo_retina_tr,#evatheme_core_overlay_header_logo_retina_height_tr,#evatheme_core_overlay_header_dropdown_style_tr' );
		if ( overlayField.val() === 'on' ) {
			overlayFieldDependents.show();
		} else {
			overlayFieldDependents.hide();
		}
		overlayField.change(function () {
			if ( $(this).val() === 'on' ) {
				overlayFieldDependents.show();
			} else {
				overlayFieldDependents.hide();
			}
		} );

		// Media uploader
		var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;

		$( 'div#evatheme_core-metabox .evatheme_core-mb-uploader' ).on('click touchend', function( event ) {
			event.preventDefault();
			var button     = $( this );
			var field      = button.prev();
			var current_id = field.val();
			evatheme_coreMediaSelector( field, current_id );
		} );

		$( 'div#evatheme_core-metabox .add_media' ).on('click touchend', function() {
			_custom_media = false;
		} );

		
		// Uploading files
		var image_gallery_frame;
		var $image_gallery_ids   = $( '#image_gallery' );
		var $evatheme_core_gallery_images = $( '#evatheme_core_gallery_images_container ul.evatheme_core_gallery_images' );
		
		jQuery( '.add_evatheme_core_gallery_images' ).on('click touchend', 'a', function( event ) {
			var $el = $( this );
			var attachment_ids = $image_gallery_ids.val();
			event.preventDefault();
			
			// If the media frame already exists, reopen it.
			if ( image_gallery_frame ) {
				image_gallery_frame.open();
				return;
			}
			
			// Create the media frame.
			image_gallery_frame = wp.media.frames.downloadable_file = wp.media( {

				// Set the title of the modal.
				title    : evatheme_core_metabox.title,
				button   : {
					text : evatheme_core_metabox.button,
				},
				multiple: true

			} );
			
			// When an image is selected, run a callback.
			image_gallery_frame.on( 'select', function() {
				var selection = image_gallery_frame.state().get('selection');
				selection.map( function( attachment ) {
					attachment = attachment.toJSON();
					if ( attachment.id ) {
						attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;
						 $evatheme_core_gallery_images.append('\
							<li class="image" data-attachment_id="' + attachment.id + '">\
								<div class="attachment-preview">\
									<div class="thumbnail">\
										<img src="' + attachment.url + '" />\
									</div>\
								   <a href="#" class="evatheme_core-gmb-remove" title="'+ evatheme_core_metabox.remove +'"><div class="media-modal-icon"></div></a>\
								</div>\
							</li>');
					}
				} );
				$image_gallery_ids.val( attachment_ids );
			
			} );
			
			// Finally, open the modal.
			image_gallery_frame.open();

		} );

		// Image ordering
		$evatheme_core_gallery_images.sortable( {
			items                : 'li.image',
			cursor               : 'move',
			scrollSensitivity    : 40,
			forcePlaceholderSize : true,
			forceHelperSize      : false,
			helper               : 'clone',
			opacity              : 0.65,
			placeholder          : 'wc-metabox-sortable-placeholder',
			start                : function( event,ui ) {
				ui.item.css( 'background-color', '#f6f6f6' );
			},
			stop                 : function( event,ui ) {
				ui.item.removeAttr( 'style' );
			},
			update               : function( event, ui ) {
				var attachment_ids = '';
				$( '#evatheme_core_gallery_images_container ul li.image' ).css( 'cursor', 'default' ).each( function() {
					var attachment_id = jQuery(this).attr( 'data-attachment_id' );
					attachment_ids = attachment_ids + attachment_id + ',';
				} );
				$image_gallery_ids.val( attachment_ids );
			}
		} );

		// Remove images
		$( '#evatheme_core_gallery_images_container' ).on('click touchend', 'a.evatheme_core-gmb-remove', function() {
			$( this ).closest( 'li.image' ).remove();
			var attachment_ids = '';
			$( '#evatheme_core_gallery_images_container ul li.image' ).css( 'cursor', 'default' ).each( function() {
				var attachment_id = jQuery( this ).attr( 'data-attachment_id' );
				attachment_ids = attachment_ids + attachment_id + ',';
			} );
			$image_gallery_ids.val( attachment_ids );
			return false;
		} );
		
		/* Type Layout */
		if (jQuery('.metabox_type_layout').size() > 0) {
			jQuery("body").on("click touchend",".metabox_type_layout>a",function(e){e.preventDefault();
				var $c=$(this);
				$c.addClass('active').siblings('.active').removeClass('active');
				$c.siblings('input').val($c.data('value')).trigger('change');
			});
		}

	} );

} ) ( jQuery );

// Media selector function
function evatheme_coreMediaSelector( field, current_id ) {

    'use strict';
 	
 	// Define uploading vars
    var file_frame;
 
    /**
     * If an instance of file_frame already exists, then we can open it
     * rather than creating a new instance.
     */
    if ( undefined !== file_frame ) {
		file_frame.open();
		return;
    }

    /**
     * If we're this far, then an instance does not exist, so we need to
     * create our own.
     *
     */
    file_frame = wp.media.frames.file_frame = wp.media( {
    	id            : 'evatheme_core_metabox_select',
    	frame         : 'post',
     	state         : 'insert',
     	filterable    : 'uploaded', // Whether the library is filterable, and if so what filters should be shown. 
        multiple      : false,      // Whether multi-select is enabled.
        syncSelection : false,      // Whether the Attachments selection should be persisted from the last state.
        autoSelect    : true        // Whether an uploaded attachment should be automatically added to the selection.
    } );
 
    /**
     * Update field with selected ID
     *
     */
    file_frame.on( 'insert', function() {

    	// Get selection
    	var selection = file_frame.state().get( 'selection' ).first().toJSON();

    	// Update field value
    	field.val( selection.id );

    } );
 
    // Now display the actual file_frame
    file_frame.open();
 
}