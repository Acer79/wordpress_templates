/**
 * ColorPickers
 */

adonepagecmb.addCallbackForInit( function() {

	// Colorpicker
	jQuery('input:text.adonepagecmb_colorpicker').wpColorPicker();

} );

adonepagecmb.addCallbackForClonedField( 'adonepagecmb_Color_Picker', function( newT ) {

	// Reinitialize colorpickers
    newT.find('.wp-color-result').remove();
	newT.find('input:text.adonepagecmb_colorpicker').wpColorPicker();

} );