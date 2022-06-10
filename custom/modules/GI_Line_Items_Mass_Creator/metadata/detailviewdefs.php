<?php
$module_name = 'GI_Line_Items_Mass_Creator';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
          4 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=GenerateLineItemsForTargetList\', \'_self\');" type="submit" value="Run Mass-Update">',
          ),
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'create_line_item_if_exists_c',
            'label' => 'LBL_CREATE_LINE_ITEM_IF_EXISTS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'unit_price_zero_c',
            'label' => 'LBL_UNIT_PRICE_ZERO',
          ),
          1 => 
          array (
            'name' => 'discount_type_c',
            'studio' => 'visible',
            'label' => 'LBL_DISCOUNT_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'auto_discount_c',
            'label' => 'LBL_AUTO_DISCOUNT',
          ),
          1 => 
          array (
            'name' => 'discount_ratio_c',
            'label' => 'LBL_DISCOUNT_RATIO',
          ),
        ),
        3 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
      ),
      'lbl_detailview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'corporate_opportunity_c',
            'studio' => 'visible',
            'label' => 'LBL_CORPORATE_OPPORTUNITY',
          ),
          1 => '',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'campaign_c',
            'studio' => 'visible',
            'label' => 'LBL_CAMPAIGN',
          ),
          1 => 'description',
        ),
      ),
    ),
  ),
);
?>
