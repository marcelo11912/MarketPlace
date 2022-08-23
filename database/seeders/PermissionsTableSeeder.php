<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2022-02-16 02:10:35',
                'updated_at' => '2022-02-16 02:10:35',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2022-02-16 02:10:36',
                'updated_at' => '2022-02-16 02:10:36',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2022-02-16 02:10:37',
                'updated_at' => '2022-02-16 02:10:37',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2022-02-16 02:10:38',
                'updated_at' => '2022-02-16 02:10:38',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2022-02-16 02:10:38',
                'updated_at' => '2022-02-16 02:10:38',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2022-02-16 02:10:38',
                'updated_at' => '2022-02-16 02:10:38',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_orders',
                'table_name' => 'orders',
                'created_at' => '2022-02-16 02:27:47',
                'updated_at' => '2022-02-16 02:27:47',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_orders',
                'table_name' => 'orders',
                'created_at' => '2022-02-16 02:27:47',
                'updated_at' => '2022-02-16 02:27:47',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_orders',
                'table_name' => 'orders',
                'created_at' => '2022-02-16 02:27:47',
                'updated_at' => '2022-02-16 02:27:47',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_orders',
                'table_name' => 'orders',
                'created_at' => '2022-02-16 02:27:47',
                'updated_at' => '2022-02-16 02:27:47',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_orders',
                'table_name' => 'orders',
                'created_at' => '2022-02-16 02:27:47',
                'updated_at' => '2022-02-16 02:27:47',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_shops',
                'table_name' => 'shops',
                'created_at' => '2022-02-23 02:24:28',
                'updated_at' => '2022-02-23 02:24:28',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_shops',
                'table_name' => 'shops',
                'created_at' => '2022-02-23 02:24:28',
                'updated_at' => '2022-02-23 02:24:28',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_shops',
                'table_name' => 'shops',
                'created_at' => '2022-02-23 02:24:28',
                'updated_at' => '2022-02-23 02:24:28',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_shops',
                'table_name' => 'shops',
                'created_at' => '2022-02-23 02:24:28',
                'updated_at' => '2022-02-23 02:24:28',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_shops',
                'table_name' => 'shops',
                'created_at' => '2022-02-23 02:24:28',
                'updated_at' => '2022-02-23 02:24:28',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'browse_productos',
                'table_name' => 'productos',
                'created_at' => '2022-03-04 02:44:05',
                'updated_at' => '2022-03-04 02:44:05',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'read_productos',
                'table_name' => 'productos',
                'created_at' => '2022-03-04 02:44:05',
                'updated_at' => '2022-03-04 02:44:05',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'edit_productos',
                'table_name' => 'productos',
                'created_at' => '2022-03-04 02:44:05',
                'updated_at' => '2022-03-04 02:44:05',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'add_productos',
                'table_name' => 'productos',
                'created_at' => '2022-03-04 02:44:05',
                'updated_at' => '2022-03-04 02:44:05',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'delete_productos',
                'table_name' => 'productos',
                'created_at' => '2022-03-04 02:44:05',
                'updated_at' => '2022-03-04 02:44:05',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'browse_posts',
                'table_name' => 'posts',
                'created_at' => '2022-03-17 04:59:43',
                'updated_at' => '2022-03-17 04:59:43',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'read_posts',
                'table_name' => 'posts',
                'created_at' => '2022-03-17 04:59:43',
                'updated_at' => '2022-03-17 04:59:43',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'edit_posts',
                'table_name' => 'posts',
                'created_at' => '2022-03-17 04:59:43',
                'updated_at' => '2022-03-17 04:59:43',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'add_posts',
                'table_name' => 'posts',
                'created_at' => '2022-03-17 04:59:43',
                'updated_at' => '2022-03-17 04:59:43',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'delete_posts',
                'table_name' => 'posts',
                'created_at' => '2022-03-17 04:59:43',
                'updated_at' => '2022-03-17 04:59:43',
            ),
            50 => 
            array (
                'id' => 51,
                'key' => 'browse_pages',
                'table_name' => 'pages',
                'created_at' => '2022-03-17 04:59:45',
                'updated_at' => '2022-03-17 04:59:45',
            ),
            51 => 
            array (
                'id' => 52,
                'key' => 'read_pages',
                'table_name' => 'pages',
                'created_at' => '2022-03-17 04:59:45',
                'updated_at' => '2022-03-17 04:59:45',
            ),
            52 => 
            array (
                'id' => 53,
                'key' => 'edit_pages',
                'table_name' => 'pages',
                'created_at' => '2022-03-17 04:59:45',
                'updated_at' => '2022-03-17 04:59:45',
            ),
            53 => 
            array (
                'id' => 54,
                'key' => 'add_pages',
                'table_name' => 'pages',
                'created_at' => '2022-03-17 04:59:45',
                'updated_at' => '2022-03-17 04:59:45',
            ),
            54 => 
            array (
                'id' => 55,
                'key' => 'delete_pages',
                'table_name' => 'pages',
                'created_at' => '2022-03-17 04:59:45',
                'updated_at' => '2022-03-17 04:59:45',
            ),
            55 => 
            array (
                'id' => 56,
                'key' => 'browse_coupons',
                'table_name' => 'coupons',
                'created_at' => '2022-04-02 03:17:26',
                'updated_at' => '2022-04-02 03:17:26',
            ),
            56 => 
            array (
                'id' => 57,
                'key' => 'read_coupons',
                'table_name' => 'coupons',
                'created_at' => '2022-04-02 03:17:26',
                'updated_at' => '2022-04-02 03:17:26',
            ),
            57 => 
            array (
                'id' => 58,
                'key' => 'edit_coupons',
                'table_name' => 'coupons',
                'created_at' => '2022-04-02 03:17:26',
                'updated_at' => '2022-04-02 03:17:26',
            ),
            58 => 
            array (
                'id' => 59,
                'key' => 'add_coupons',
                'table_name' => 'coupons',
                'created_at' => '2022-04-02 03:17:26',
                'updated_at' => '2022-04-02 03:17:26',
            ),
            59 => 
            array (
                'id' => 60,
                'key' => 'delete_coupons',
                'table_name' => 'coupons',
                'created_at' => '2022-04-02 03:17:26',
                'updated_at' => '2022-04-02 03:17:26',
            ),
            60 => 
            array (
                'id' => 61,
                'key' => 'browse_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2022-04-05 03:16:52',
                'updated_at' => '2022-04-05 03:16:52',
            ),
            61 => 
            array (
                'id' => 62,
                'key' => 'read_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2022-04-05 03:16:52',
                'updated_at' => '2022-04-05 03:16:52',
            ),
            62 => 
            array (
                'id' => 63,
                'key' => 'edit_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2022-04-05 03:16:52',
                'updated_at' => '2022-04-05 03:16:52',
            ),
            63 => 
            array (
                'id' => 64,
                'key' => 'add_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2022-04-05 03:16:52',
                'updated_at' => '2022-04-05 03:16:52',
            ),
            64 => 
            array (
                'id' => 65,
                'key' => 'delete_sub_orders',
                'table_name' => 'sub_orders',
                'created_at' => '2022-04-05 03:16:52',
                'updated_at' => '2022-04-05 03:16:52',
            ),
        ));
        
        
    }
}