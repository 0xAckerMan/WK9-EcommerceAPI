<?php
/**
 * @package EcommerceAPI
 */

/*
plugin name: EcommerceAPI
plugin URI: https://...
description: Week 9 assessment. A plugin to create an API for Ecommerce website using WordPress.
version: 1.0.0
author: Joel Kores
author URI: https://...
license: GPLv2 or later
Text Domain: EcommerceAPI
*/

//chacking security
defined('ABSPATH') or die('You have beeen hacked!');

require_once (plugin_dir_path(__FILE__) . 'products_routes.php');

//class to create the products table
class EcommerceAPI{
    public function activate(){
        $this->create_products_table();
    }
    
    //function to create the products table
    public function create_products_table(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            price varchar(255) NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

$ecommerceAPI = new EcommerceAPI();
register_activation_hook(__FILE__, array($ecommerceAPI, 'activate'));

// rest init
add_action('rest_api_init', 'register_routes');

function register_routes(){
    $productsRoutes = new ProductsRoutes();
    $productsRoutes->register_products();
}
