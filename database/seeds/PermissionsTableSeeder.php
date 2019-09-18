<?php

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
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'resource' => 'System',
                'system' => 0,
                'created_at' => '2019-04-02 14:04:30',
                'updated_at' => '2019-04-02 14:04:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Permissions',
                'slug' => 'permissions',
                'resource' => 'System',
                'system' => 0,
                'created_at' => '2019-04-02 14:04:40',
                'updated_at' => '2019-04-02 14:04:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Roles',
                'slug' => 'roles',
                'resource' => 'System',
                'system' => 0,
                'created_at' => '2019-04-02 14:04:45',
                'updated_at' => '2019-04-02 14:04:45',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Users',
                'slug' => 'users',
                'resource' => 'System',
                'system' => 0,
                'created_at' => '2019-04-02 14:04:51',
                'updated_at' => '2019-04-02 14:04:55',
            ),
        ));
        
        
    }
}