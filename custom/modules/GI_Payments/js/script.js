SUGAR.util.doWhen("typeof $ != 'undefined'", function() {
	
	// Hide/Show the credit note based on the Payment type
	checkType();
	
	// Amount
	addToValidateMoreThan('EditView', 'amount', 'decimal', true, '', 1);
	
	$('form#EditView #type').change(function() {
		checkType();
	});
	
	function checkType() {
		
		// 'Credit Note' field
		field_1 = '#gi_credit_notes_gi_payments_1_name';
		btn_1 = '#btn_gi_credit_notes_gi_payments_1_name';
		btn_clr_1 = '#btn_clr_gi_credit_notes_gi_payments_1_name';
		
		// 'Reference No' field
		//field_2 = '#reference_no_c';
		
		// Show fields (based on 'type')
		switch ($('form#EditView #type').val()) {
			case 'Receipt':
			case 'Installment':
			case 'Promise':
				$(field_1).hide();
				$(btn_1).hide();
				$(btn_clr_1).hide();
				//$(field_2).hide();
				var _form = document.getElementById('EditView');
				removeFromValidate('EditView', 'gi_credit_notes_gi_payments_1_name');
				SUGAR.clearRelateField(_form, 'gi_credit_notes_gi_payments_1_name', 'gi_credit_notes_gi_payments_1gi_credit_notes_ida');
				break;
			
			case 'Refund':
			case 'Credit_Note_Allocation':
				$(field_1).show();
				$(btn_1).show();
				$(btn_clr_1).show();
				//$(field_2).show();
				addToValidate('EditView', 'gi_credit_notes_gi_payments_1_name', 'relate', true,'Credit Notes' );
				addToValidateBinaryDependency('EditView', 'gi_credit_notes_gi_payments_1_name', 'alpha', true,'No match for field: Credit Notes', 'gi_credit_notes_gi_payments_1gi_credit_notes_ida' );
				break;
		}
	}
	
});
