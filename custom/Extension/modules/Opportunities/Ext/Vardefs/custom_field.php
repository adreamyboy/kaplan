<?php

//edit_amount
$dictionary['Opportunity']['fields']['edit_amount'] = array(
'name'       => 'edit_amount',
'id'         => 'edit_amount',
'type'       => 'varchar',
'importable' => 'true',								
'studio'     => 'visible',
//'vname'      => 'LBL_NAME_OF_INTERMEDIARY',
'len'        => '500',
'size'       => '20',
'inline_edit'=> false,
);
$dictionary['Opportunity']['fields']['payment_link_sent_date'] = array(
    'name'       => 'payment_link_sent_date',
    'id'         => 'payment_link_sent_date',
    'type'       => 'datetime',
    'importable' => 'true',								
    'studio'     => 'visible',
    'vname'      => 'LBL_PAYMENT_LINK_SENT_DATE',
    'len'        => '500',
    'size'       => '20',
    'inline_edit'=> false,
    );


?>
