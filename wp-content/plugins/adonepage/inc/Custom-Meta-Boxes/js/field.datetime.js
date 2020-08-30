
/**
 * Date & Time Fields
 */

adonepagecmb.addCallbackForClonedField( ['adonepagecmb_Date_Field', 'adonepagecmb_Time_Field', 'adonepagecmb_Date_Timestamp_Field', 'adonepagecmb_Datetime_Timestamp_Field' ], function( newT ) {

	// Reinitialize all the datepickers
	newT.find( '.adonepagecmb_datepicker' ).each(function () {
		jQuery(this).attr( 'id', '' ).removeClass( 'hasDatepicker' ).removeData( 'datepicker' ).unbind().datepicker();
	});

	// Reinitialize all the timepickers.
	newT.find('.adonepagecmb_timepicker' ).each(function () {
		jQuery(this).timePicker({
			startTime: "00:00",
			endTime: "23:30",
			show24Hours: false,
			separator: ':',
			step: 30
		});
	});

} );

adonepagecmb.addCallbackForInit( function() {

	// Datepicker
	jQuery('.adonepagecmb_datepicker').each(function () {
		jQuery(this).datepicker();
	});
	
	// Wrap date picker in class to narrow the scope of jQuery UI CSS and prevent conflicts
	jQuery("#ui-datepicker-div").wrap('<div class="adonepagecmb_element" />');

	// Timepicker
	jQuery('.adonepagecmb_timepicker').each(function () {
		jQuery(this).timePicker({
			startTime: "00:00",
			endTime: "23:30",
			show24Hours: false,
			separator: ':',
			step: 30
		});
	} );

});