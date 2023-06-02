<?php
//creating the products rest routes
class ProductsRoutes{
    public function register_products(){
        add_action('rest_api_init', array($this, 'products_routes'));
    }
    
    //function to create the products routes
    public function products_routes(){

        register_rest_route('api/v1', '/products/', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_products'),
            'permission_callback' => function() {
                return current_user_can('read');
            }
        ));
        register_rest_route('api/v1', '/products/', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_product'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            }
        ));

        register_rest_route('api/v1', 'products/(?P<id>\d+)', array(
            'methods' => 'PUT',
            'callback' => array($this, 'update_product'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            }
        ));
        register_rest_route('api/v1', 'products/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'delete_product'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            }
        ));
    }
    
    //function to get the products
    public function get_products(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        $products = $wpdb->get_results("SELECT * FROM $table_name");
        return $products;
    }

    public function create_product($request){
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        $wpdb->insert($table_name, array(
            'name' => $request['name'],
            'price' => $request['price']
        ));
        return 'Product created';
    }

    public function update_product($request){
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        $wpdb->update($table_name, array(
            'name' => $request['name'],
            'price' => $request['price']
        ), array(
            'id' => $request['id']
        ));
        return 'Product updated';
    }

    public function delete_product($request){
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        $wpdb->delete($table_name, array(
            'id' => $request['id']
        ));
        return 'Product deleted';
    }

}