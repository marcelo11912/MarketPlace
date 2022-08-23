<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Marcelo',
                'email' => 'marcelo15052000@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$7P1y1w5zfiQupRZGxBYCeezdCbn4tmgUIPGwfaxRZ2kLYyW17a90e',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-03 02:14:52',
                'updated_at' => '2022-02-17 00:45:44',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => NULL,
                'name' => 'Marcelo',
                'email' => 'aarana2869@utm.edu.ec',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ivC6HsIZKKEyfevfCQPbIuZfdg7kvIXLD8LHYUJ353Fd7/3n3WPLe',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-08 02:12:57',
                'updated_at' => '2022-02-08 02:12:57',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'name' => 'Marcelo',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YsGQU1V5e9TBri7QTm21ieLUfCPxzL3bpi2ogd6D3Qj4szm/oHO3G',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-16 02:12:25',
                'updated_at' => '2022-02-16 02:13:18',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'name' => 'Marcelo',
                'email' => 'admin@email.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xkn3sdNGcaV4nZh5/jvLkeDhES.mAj35HsOAIe2lmzxB7ErETbQDS',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-21 23:28:03',
                'updated_at' => '2022-02-21 23:29:19',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 3,
                'name' => 'Ventas',
                'email' => 'ventas@email.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xkn3sdNGcaV4nZh5/jvLkeDhES.mAj35HsOAIe2lmzxB7ErETbQDS',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-21 23:28:03',
                'updated_at' => '2022-02-21 23:29:19',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 2,
                'name' => 'Cliente',
                'email' => 'cliente@email.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xkn3sdNGcaV4nZh5/jvLkeDhES.mAj35HsOAIe2lmzxB7ErETbQDS',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-21 23:28:03',
                'updated_at' => '2022-02-21 23:29:19',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 2,
                'name' => 'Cliente2',
                'email' => 'cliente2@email.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xkn3sdNGcaV4nZh5/jvLkeDhES.mAj35HsOAIe2lmzxB7ErETbQDS',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-21 23:28:03',
                'updated_at' => '2022-02-21 23:29:19',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 3,
                'name' => 'Ventas2',
                'email' => 'ventas2@email.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xkn3sdNGcaV4nZh5/jvLkeDhES.mAj35HsOAIe2lmzxB7ErETbQDS',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-02-21 23:28:03',
                'updated_at' => '2022-02-21 23:29:19',
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 3,
                'name' => 'Marcelo',
                'email' => 'arana286911912@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ukb3190JlUeP5lsCGFteKeixh0bT44ydgj.LvwxvxZhWE60CfIeAu',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2022-04-07 03:07:44',
                'updated_at' => '2022-04-07 03:08:41',
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 1,
                'name' => 'marcelo',
                'email' => 'marcelo@admin.com',
                'avatar' => 'users\\April2022\\BUWDm9DnBVmBtBzVI3uc.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$L0CY/VuwOAk2HYKRIQI/KObJPonqB20JKg8rSeJu4CK6rpz46wxHe',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2022-04-25 22:16:56',
                'updated_at' => '2022-04-25 22:32:34',
            ),
        ));
        
        
    }
}