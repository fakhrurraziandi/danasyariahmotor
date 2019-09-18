<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 14:05:12',
                'updated_at' => '2019-04-02 14:05:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'AM Pinjaman Dana',
                'slug' => 'am-pinjaman-dana',
                'description' => 'Lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 18:09:16',
                'updated_at' => '2019-04-17 11:31:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'SPV Pinjaman Dana',
                'slug' => 'spv-pinjaman-dana',
                'description' => 'Lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 18:10:11',
                'updated_at' => '2019-04-17 11:31:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'CS Pinjaman Dana',
                'slug' => 'cs-pinjaman-dana',
                'description' => 'Lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 18:11:11',
                'updated_at' => '2019-04-17 11:31:16',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'SPV Kredit Motor',
                'slug' => 'spv-kredit-motor',
                'description' => 'Lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 18:11:39',
                'updated_at' => '2019-04-17 11:13:17',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'CS Kredit Motor',
                'slug' => 'cs-kredit-motor',
                'description' => 'Lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 18:15:11',
                'updated_at' => '2019-04-17 11:12:59',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Member',
                'slug' => 'member',
                'description' => 'Lorem ipsum dolor sit amet',
                'system' => 0,
                'redirect_path' => '/',
                'created_at' => '2019-04-02 18:15:11',
                'updated_at' => '2019-04-02 18:15:11',
            ),
        ));
        
        
    }
}