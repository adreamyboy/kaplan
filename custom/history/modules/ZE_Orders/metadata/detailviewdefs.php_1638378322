<?php
$module_name = 'ZE_Orders';
$viewdefs[$module_name] =
    array(
        'DetailView' =>
        array(
            'templateMeta' =>
            array(
                'form' =>
                array(
                    'buttons' =>
                    array(
                        0 => 'EDIT',
                        1 => 'DUPLICATE',
                        2 => 'DELETE',
                        3 => 'FIND_DUPLICATES',
                    ),
                ),
                'maxColumns' => '2',
                'widths' =>
                array(
                    0 =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
                    1 =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
                ),
                'useTabs' => false,
                'tabDefs' =>
                array(
                    'DEFAULT' =>
                    array(
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_EDITVIEW_PANEL1' =>
                    array(
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                    'LBL_EDITVIEW_PANEL2' =>
                    array(
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
                'syncDetailEditViews' => true,
            ),
            'panels' =>
            array(
                'default' =>
                array(
                    0 =>
                    array(
                        0 =>
                        array(
                            'name' => 'quote_number',
                            'label' => 'LBL_QUOTE_NUMBER',
                        ),
                        1 =>
                        array(
                            'name' => 'stage',
                            'studio' => 'visible',
                            'label' => 'LBL_STAGE',
                        ),
                    ),

                    1 =>
                    array(
                        0 => 'assigned_user_name',
                    ),
                ),
                'lbl_editview_panel1' =>
                array(
                    0 =>
                    array(
                        0 =>
                        array(
                            'name' => 'billing_account',
                            'studio' => 'visible',
                            'label' => 'LBL_BILLING_ACCOUNT',
                        ),
                    ),
                    1 =>
                    array(
                        0 =>
                        array(
                            'name' => 'billing_contact',
                            'studio' => 'visible',
                            'label' => 'LBL_BILLING_CONTACT',
                        ),
                    ),
                    2 =>
                    array(
                        0 =>
                        array(
                            'name' => 'billing_address_street',
                            'label' => 'LBL_BILLING_ADDRESS_STREET',
                            'type' => 'address',
                            'displayParams' =>
                            array(
                                'key' => 'billing',
                            ),
                        ),
                        1 =>
                        array(
                            'name' => 'shipping_address_street',
                            'label' => 'LBL_SHIPPING_ADDRESS_STREET',
                            'displayParams' =>
                            array(
                                'key' => 'shipping',
                            ),
                        ),
                    ),
                ),
                'lbl_line_items' =>
                array(
                    0 =>
                    array(
                        0 =>
                        array(
                            'name' => 'currency_id',
                            'studio' => 'visible',
                            'label' => 'LBL_CURRENCY',
                        ),
                    ),
                    2 =>
                    array(
                        0 =>
                        array(
                            'name' => 'line_items',
                            'label' => 'LBL_LINE_ITEMS',
                        ),
                    ),
                    3 =>
                    array(
                        0 =>
                        array(
                            'name' => 'total_amt',
                            'label' => 'LBL_TOTAL_AMT',
                        ),
                    ),
                    4 =>
                    array(
                        0 =>
                        array(
                            'name' => 'discount_amount',
                            'label' => 'LBL_DISCOUNT_AMOUNT',
                        ),
                    ),
                    5 =>
                    array(
                        0 =>
                        array(
                            'name' => 'subtotal_amount',
                            'label' => 'LBL_SUBTOTAL_AMOUNT',
                        ),
                    ),
                    6 =>
                    array(
                        0 =>
                        array(
                            'name' => 'shipping_amount',
                            'label' => 'LBL_SHIPPING_AMOUNT',
                        ),
                    ),
                    7 =>
                    array(
                        0 =>
                        array(
                            'name' => 'shipping_tax_amt',
                            'label' => 'LBL_SHIPPING_TAX_AMT',
                        ),
                    ),
                    8 =>
                    array(
                        0 =>
                        array(
                            'name' => 'tax_amount',
                            'label' => 'LBL_TAX_AMOUNT',
                        ),
                    ),
                    9 =>
                    array(
                        0 =>
                        array(
                            'name' => 'total_amount',
                            'label' => 'LBL_TOTAL_AMOUNT',
                        ),
                    ),
                ),
            ),
        ),
    );
