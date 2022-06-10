<?php

// require __DIR__ . '/vendor/autoload.php';
require "custom/modules/GI_Products/wc_conn/vendor/autoload.php";


use Automattic\WooCommerce\Client;

use Automattic\WooCommerce\HttpClient\HttpClientException;



class woo_crm_users_hook
{

    public $woocommerce;

    static $already_ran = false;

    public function get_woocommerce_api_access()
    {

        $wooAccess = new Client( 
            'https://kaplanprofessionalme.com/', // Your store URL
            //'ck_a37d05883bb8479c91038b7f85338590adcebf95', // Your consumer key
            //'cs_f55273394cb6ae9195bd673a4c26d6c63ac240b7', // Your consumer secret
			'ck_e1fadf696a3e2fe7a76e80e7871081af83cb4bce', // Your consumer key
            'cs_19e4ef6d6a7fa97597eee048c3c8880706dfb3da', // Your consumer secret
            [
                'wp_api' => true, // Enable the WP REST API integration
                'version' => 'wc/v3' // WooCommerce WP REST API version
            ]
        );

        return $wooAccess;
    }

    function updateWooUsersCrm($bean, $event, $arguments)
    {

        if ($bean->deleted == 1) {
            return;
        }

        $wooData = [
            'email' => $bean->email1,
            'first_name' => $bean->first_name,
            'last_name' => $bean->last_name,
            'username' => $bean->username_c,
            'password' =>  $bean->password_c,
            'is_rest_custom' => 'yes',
            'billing' => [
                // 'postcode' => $bean->primary_address_postalcode,
                'email' => $bean->email1,
                'phone' => $bean->phone_mobile
            ],
            'meta_data' => [
                [
                    'key' => 'crm_user_id',
                    'value' => $bean->id,
                ],
            ]
        ];


        $wooAccess = $this->get_woocommerce_api_access();
        // $result_woo = null;
        $i = true;
        try {
            if ($bean->wc_user_id_c && $i) {
                $result_woo = $wooAccess->put('customers/' . $bean->wc_user_id_c, $wooData);
                $i = false;
            } elseif($i) {
                $result_woo = $wooAccess->post('customers', $wooData);
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
            $bean->db->query("UPDATE {$bean->table_name}_cstm SET wc_user_id_c = '{$result_woo->id}', woo_error_c = ''  WHERE id_c ='{$bean->id}'");
        }
        


    }

    public function deleteWooUsersCrm($bean, $event, $arguments)
    {
        if ($bean->deleted == 1) {
            $wc_user_id =  $bean->wc_user_id_c;
            $wooAccess = $this->get_woocommerce_api_access();
            $wooAccess->delete('customers/' . $wc_user_id, ['force' => true]);
        }
    }


}
