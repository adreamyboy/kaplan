<?php

$dictionary['GI_Products']['fields']['total_active'] = array(
	'name' => 'total_active',
	'vname' => 'LBL_TOTAL_ACTIVE',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Active\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_suspended'] = array(
	'name' => 'total_suspended',
	'vname' => 'LBL_TOTAL_SUSPENDED',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Suspended\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_complete'] = array(
	'name' => 'total_complete',
	'vname' => 'LBL_TOTAL_COMPLETE',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Complete\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_not_interested'] = array(
	'name' => 'total_not_interested',
	'vname' => 'LBL_TOTAL_NOT_INTERESTED',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Not_Interested\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_cancelled'] = array(
	'name' => 'total_cancelled',
	'vname' => 'LBL_TOTAL_CANCELLED',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Cancelled\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_intersted_cold'] = array(
	'name' => 'total_intersted_cold',
	'vname' => 'LBL_TOTAL_INTERESTED_COLD',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Cold\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_interested_warm'] = array(
	'name' => 'total_interested_warm',
	'vname' => 'LBL_TOTAL_INTERESTED_WARM',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Warm\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_interested_hot'] = array(
	'name' => 'total_interested_hot',
	'vname' => 'LBL_TOTAL_INTERESTED_HOT',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Hot\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_revenues'] = array(
	'name' => 'total_revenues',
	'vname' => 'LBL_TOTAL_REVENUES',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'currency',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				SUM(li.total_price_net)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c IN (\'Active\' , \'Suspended\', \'Complete\') 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_discounts'] = array(
	'name' => 'total_discounts',
	'vname' => 'LBL_TOTAL_DISCOUNTS',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'currency',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				SUM(li.total_discount)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c IN (\'Active\' , \'Suspended\', \'Complete\') 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

