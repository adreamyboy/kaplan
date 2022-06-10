SUGAR.util.doWhen("typeof $ != 'undefined'", function() {
	// Hide/Show the 'Reason of Loss' based on the 'Sales Stage'
	checkMode();
	$('form#EditView #delivery_mode_c').change(function() {
		checkMode();
	});
	
	function checkMode() {
		// 'Reason of Loss' field
		//field_2 = 'form#EditView textarea#shipment_details_c';
		field_3 = 'form#EditView input#date_shipped_c';
		field_3t = 'form#EditView img#date_shipped_c_trigger';
		field_4 = 'form#EditView input#date_delivered_c';
		field_4t = 'form#EditView img#date_delivered_c_trigger';
		
		// Show fields (based on 'Sales Stage')
		switch ($('form#EditView select#delivery_mode_c').val()) {
			case '':
				//$(field_2).hide();
				$(field_3).hide();
				$(field_3t).hide();
				$(field_4).hide();
				$(field_4t).hide();
				//removeFromValidate('EditView', 'shipment_details_c');
				//removeFromValidate('EditView', 'date_shipped_c');
				break;
			default:
				//$(field_2).show();
				$(field_3).show();
				$(field_3t).show();
				$(field_4).show();
				$(field_4t).show();
				//addToValidate('EditView', 'shipment_details_c', 'text', true, 'Airway Bill No');
				//addToValidate('EditView', 'date_shipped_c', 'date', true, 'Date Shipped');
				break;
		}
	}
});