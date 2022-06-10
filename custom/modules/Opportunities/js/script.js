SUGAR.util.doWhen("typeof $ != 'undefined'", function() {
	
	// Hide/Show the 'Reason of Loss' based on the 'Sales Stage'
	checkStage();
	
	$('form#EditView #sales_stage').change(function() {
		checkStage();
	});
	
	function checkStage() {
		
		// 'Reason of Loss' field
		field_2 = 'form#EditView select#reason_of_loss_c';
		
		// Show fields (based on 'Sales Stage')
		switch ($('form#EditView select#sales_stage').val()) {
			case 'Closed Lost':
				$(field_2).show();
				addToValidate('EditView', 'reason_of_loss_c', 'enum', true,'Reason of Loss' );
				break;
			default:
				$(field_2).hide();
				addToValidate('EditView', 'reason_of_loss_c', 'enum', false,'Reason of Loss' );
				break;
		}
	}
	
});