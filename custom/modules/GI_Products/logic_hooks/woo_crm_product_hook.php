<?php

// require __DIR__ . '/vendor/autoload.php';
require "custom/modules/GI_Products/wc_conn/vendor/autoload.php";


use Automattic\WooCommerce\Client;

use Automattic\WooCommerce\HttpClient\HttpClientException;



class woo_crm_product_hook
{

    public $woocommerce;

    static $already_ran = false;

    public function get_woocommerce_api_access()
    {

        $wooAccess = new Client( 
            //'https://kaplanprofessionalme.com/', // Your store URL			'https://wp.kaplanprofessional.me/', // Your store URL  			'ck_876348c46760825c61cde2f34f3ec0066e36da6a', // Your consumer key            'cs_9d85e3446b484ba1c699914d5173a3bd1af2a91d', // Your consumer secret			
            //'ck_a37d05883bb8479c91038b7f85338590adcebf95', // Your consumer key
            //'cs_f55273394cb6ae9195bd673a4c26d6c63ac240b7', // Your consumer secret
			 
            [
                'wp_api' => true, // Enable the WP REST API integration
                'version' => 'wc/v3' // WooCommerce WP REST API version
            ]
        );

        return $wooAccess;
    }

    function updateWooProductCrm($bean, $event, $arguments)
    {

        if ($bean->deleted == 1) {
            return;
        }

            

            $days_c = explode(',', str_replace("^", '', $bean->days_c));
            $level_loc_term = explode(' - ', $bean->gi_products_catalog_gi_products_1_name);

            $level_name = $bean->gi_products_catalog_gi_products_1_name;
            $term_name = $bean->gi_terms_gi_products_1_name;
            $loc_name = $bean->gi_locations_gi_products_1_name;

            $wooData = [
                'name' => $bean->name,
                'type' => 'simple',
                // 'sku' => $bean->code ? $bean->code : '',
                'regular_price' => (string)$bean->price,
                // 'sale_price'  =>  $bean->wc_sale_price_c,
                'description' => $bean->description,
                'images' => [],
                'meta_data' => [
                    [
                        'key' => 'pro_crm_id',
                        'value' => $bean->id,
                    ],
                    [
                        'key' => 'level_name',
                        'value' => $level_name,
                    ],
                    [
                        'key' => 'term_name',
                        'value' => $term_name,
                    ],
                    [
                        'key' => 'loc_name',
                        'value' => $loc_name,
                    ],
                    [
                        'key' => 'term_select',
                        'value' => $bean->gi_terms_gi_products_1gi_terms_ida,
                    ],
                    [
                        'key' => 'catalogue_select',
                        'value' => $bean->gi_products_catalog_gi_products_1gi_products_catalog_ida,
                    ],
                    [
                        'key' => 'loc_select',
                        'value' => $bean->gi_locations_gi_products_1gi_locations_ida,
                    ],
                    [
                        'key' => 'hide_instructor_c',
                        'value' => $bean->hide_instructor_c,
                    ],
                    [
                        'key' => 'provisional_c',
                        'value' => $bean->provisional_c,
                    ],
                    [
                        'key' => 'hide_add_to_cart_c',
                        'value' => $bean->hide_add_to_cart_c,
                    ],
                    [
                        'key' => 'web_hidden_c',
                        'value' => $bean->web_hidden,
                    ],
                    [
                        'key' => 'batch_id',
                        'value' => $bean->batch_c,
                    ],
                    [
                        'key' => 'session_no',
                        'value' => $bean->number_of_sessions_c,
                    ],
                    [
                        'key' => 'days_c',
                        'value' => $days_c,
                    ],
                    [
                        'key' => 'date_start_c',
                        'value' => $bean->date_start_c,
                    ],
                    [
                        'key' => 'date_end_c',
                        'value' => $bean->date_end_c,
                    ],
                   
                ]
            ];

            // if ($bean->product_image) {
            //     $wooData['images'][] =  array( 'src' => $bean->product_image);
            // }

            // if ($bean->part_number) {
            //     $wooData['sku'] =  $bean->part_number;
            // }

            // print_r($bean);

            $wooAccess = $this->get_woocommerce_api_access();
            // $result_woo = null;
            $i = true;
            try {
                if ($bean->wc_product_id_c && $i) {
                    $result_woo = $wooAccess->put('products/' . $bean->wc_product_id_c, $wooData);
                    $i = false;
                } elseif($i) {
                    $result_woo = $wooAccess->post('products', $wooData);
                    $i = false;
                }
                // $search= array_merge(array('per_page' => 100, 'page' => $page), $filter);
                // $page_data = $this->woocommerce->get($endPoint,$search);
            } catch (HttpClientException $e) {
                if ($e) {
                    $results['error'] = $e->getMessage();
                    $bean->db->query("UPDATE {$bean->table_name}_cstm SET woo_error_c = '{$results['error']}' WHERE id_c ='{$bean->id}'");
                }
                //die("Can't get Data: $e");
            }

            if($result_woo){
                // $bean->wc_product_c = $result_woo->id;
                // $bean->save();
                $bean->db->query("UPDATE {$bean->table_name}_cstm SET wc_product_id_c = '{$result_woo->id}', product_url_c = '{$result_woo->permalink}', woo_error_c = ''  WHERE id_c ='{$bean->id}'");
            }

            
            // $bean->wc_product_id_c =  $result->id;
            // $bean->product_url_c =  $result->permalink;

            // $bean->save();
            // wc_product_id_c

            //Custom Logic
        // }
    }


    public function deleteWooProductCrm($bean, $event, $arguments)
    {
        if ($bean->deleted == 1) {
            $wc_pro_id =  $bean->wc_product_id_c;
            $wooAccess = $this->get_woocommerce_api_access();
            $wooAccess->delete('products/' . $wc_pro_id, ['force' => true]);
        }
    }
}
