<?php
/* $repairedTables is a variable that gets defined in the repairDatabase.php program */
if (isset($repairedTables)) {
    /* We have to tell the repairDatabases.php that we have not yet repaired our custom table
    so that it can find custom indexes */
    if (isset($repairedTables['GI_Line_Items_cstm'])) {
        unset($repairedTables['GI_Line_Items_cstm']);
    }
    if (isset($repairedTables['GI_Payment_cstm'])) {
        unset($repairedTables['GI_Payments_cstm']);
    }
    if (isset($repairedTables['GI_Credit_Notes_cstm'])) {
        unset($repairedTables['GI_Credit_Notes_cstm']);
    }
    if (isset($repairedTables['Opportunities_cstm'])) {
        unset($repairedTables['Opportunities_cstm']);
    }
}


/* Define the index */

/************ LINE ITEMS *************/
$dictionary["GI_Line_Items_cstm"] = array(
    'table' => 'GI_Line_Items_cstm',
    'fields' => //We can added fields here, we must at least have the id_c field 
        array(
        0 => array(
            'name' => 'id_c',
            'type' => 'id'
        )
    ),
    'indices' => // our custom indexes go here
        array(
        0 => array(
            'name' => 'reference_index_idx',
            'type' => 'index',
            'fields' => array(
                0 => 'reference_c'
            )
        ),
        1 => array(
            'name' => 'reference_index_uni',
            'type' => 'unique',
            'fields' => array(
                0 => 'reference_c'
            )
        )
    )
);

/************ PAYMENTS *************/
$dictionary["GI_Payments_cstm"] = array(
    'table' => 'GI_Payments_cstm',
    'fields' => //We can added fields here, we must at least have the id_c field 
        array(
        0 => array(
            'name' => 'id_c',
            'type' => 'id'
        )
    ),
    'indices' => // our custom indexes go here
        array(
        0 => array(
            'name' => 'reference_index_idx',
            'type' => 'index',
            'fields' => array(
                0 => 'reference_c'
            )
        ),
        1 => array(
            'name' => 'reference_index_uni',
            'type' => 'unique',
            'fields' => array(
                0 => 'reference_c'
            )
        )
    )
);

/************ CREDIT NOTES *************/
$dictionary["GI_Credit_Notes_cstm"] = array(
    'table' => 'GI_Credit_Notes_cstm',
    'fields' => //We can added fields here, we must at least have the id_c field 
        array(
        0 => array(
            'name' => 'id_c',
            'type' => 'id'
        )
    ),
    'indices' => // our custom indexes go here
        array(
        0 => array(
            'name' => 'reference_index_idx',
            'type' => 'index',
            'fields' => array(
                0 => 'reference_c'
            )
        ),
        1 => array(
            'name' => 'reference_index_uni',
            'type' => 'unique',
            'fields' => array(
                0 => 'reference_c'
            )
        )
    )
);

/************ OPPORTUNITIES *************/
$dictionary["Opportunities_cstm"] = array(
    'table' => 'Opportunities_cstm',
    'fields' => //We can added fields here, we must at least have the id_c field 
        array(
        0 => array(
            'name' => 'id_c',
            'type' => 'id'
        )
    ),
    'indices' => // our custom indexes go here
        array(
        0 => array(
            'name' => 'reference_index_idx',
            'type' => 'index',
            'fields' => array(
                0 => 'reference_c'
            )
        ),
        1 => array(
            'name' => 'reference_index_uni',
            'type' => 'unique',
            'fields' => array(
                0 => 'reference_c'
            )
        )
    )
);
?>