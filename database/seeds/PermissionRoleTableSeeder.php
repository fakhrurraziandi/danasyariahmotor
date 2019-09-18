<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_id' => 1,
                'role_id' => 1,
                'created_at' => '2019-04-02 14:05:18',
                'updated_at' => '2019-04-02 14:05:18',
            ),
            1 => 
            array (
                'id' => 2,
                'permission_id' => 2,
                'role_id' => 1,
                'created_at' => '2019-04-02 14:05:18',
                'updated_at' => '2019-04-02 14:05:18',
            ),
            2 => 
            array (
                'id' => 3,
                'permission_id' => 3,
                'role_id' => 1,
                'created_at' => '2019-04-02 14:05:18',
                'updated_at' => '2019-04-02 14:05:18',
            ),
            3 => 
            array (
                'id' => 4,
                'permission_id' => 4,
                'role_id' => 1,
                'created_at' => '2019-04-02 14:05:18',
                'updated_at' => '2019-04-02 14:05:18',
            ),
        ));
        
        
    }
}