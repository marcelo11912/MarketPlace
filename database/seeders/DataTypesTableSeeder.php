<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-02-16 02:10:31',
                'updated_at' => '2022-02-16 02:10:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-02-16 02:10:32',
                'updated_at' => '2022-02-16 02:10:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-02-16 02:10:32',
                'updated_at' => '2022-02-16 02:10:32',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'orders',
                'slug' => 'orders',
                'display_name_singular' => 'Order',
                'display_name_plural' => 'Orders',
                'icon' => 'voyager-buy',
                'model_name' => 'App\\Models\\Order',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-02-16 02:27:46',
                'updated_at' => '2022-02-16 02:35:30',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'shops',
                'slug' => 'shops',
                'display_name_singular' => 'Shop',
                'display_name_plural' => 'Shops',
                'icon' => 'voyager-shop',
                'model_name' => 'App\\Models\\Shop',
                'policy_name' => 'App\\Policies\\ShopPolicy',
                'controller' => 'App\\Http\\Controllers\\Admin\\ShopController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-02-23 02:24:28',
                'updated_at' => '2022-03-04 02:44:41',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'productos',
                'slug' => 'productos',
                'display_name_singular' => 'Producto',
                'display_name_plural' => 'Productos',
                'icon' => 'voyager-rocket',
                'model_name' => 'App\\Models\\Producto',
                'policy_name' => 'App\\Policies\\ProductoPolicy',
                'controller' => 'App\\Http\\Controllers\\Admin\\ProductoController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-03-04 02:44:05',
                'updated_at' => '2022-03-09 00:44:19',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'categories',
                'slug' => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural' => 'Categories',
                'icon' => 'voyager-categories',
                'model_name' => 'TCG\\Voyager\\Models\\Category',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-17 04:59:40',
                'updated_at' => '2022-03-17 04:59:40',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'posts',
                'slug' => 'posts',
                'display_name_singular' => 'Post',
                'display_name_plural' => 'Posts',
                'icon' => 'voyager-news',
                'model_name' => 'TCG\\Voyager\\Models\\Post',
                'policy_name' => 'TCG\\Voyager\\Policies\\PostPolicy',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'pages',
                'slug' => 'pages',
                'display_name_singular' => 'Page',
                'display_name_plural' => 'Pages',
                'icon' => 'voyager-file-text',
                'model_name' => 'TCG\\Voyager\\Models\\Page',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-17 04:59:44',
                'updated_at' => '2022-03-17 04:59:44',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'coupons',
                'slug' => 'coupons',
                'display_name_singular' => 'Coupon',
                'display_name_plural' => 'Coupons',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Coupon',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-04-02 03:17:26',
                'updated_at' => '2022-04-02 03:20:57',
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'sub_orders',
                'slug' => 'sub-orders',
                'display_name_singular' => 'Sub Order',
                'display_name_plural' => 'Sub Orders',
                'icon' => 'voyager-bag',
                'model_name' => 'App\\Models\\SubOrder',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2022-04-05 03:16:52',
                'updated_at' => '2022-04-05 03:16:52',
            ),
        ));
        
        
    }
}