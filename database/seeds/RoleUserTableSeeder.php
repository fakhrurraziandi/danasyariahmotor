<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => '2019-04-02 14:09:08',
                'updated_at' => '2019-04-02 14:09:08',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 7,
                'user_id' => 2,
                'created_at' => '2019-04-15 02:52:28',
                'updated_at' => '2019-04-15 02:52:28',
            ),
            2 => 
            array (
                'id' => 7,
                'role_id' => 6,
                'user_id' => 3,
                'created_at' => '2019-04-17 15:16:40',
                'updated_at' => '2019-04-17 15:16:40',
            ),
            3 => 
            array (
                'id' => 8,
                'role_id' => 5,
                'user_id' => 4,
                'created_at' => '2019-04-17 15:17:06',
                'updated_at' => '2019-04-17 15:17:06',
            ),
        ));
        
        
    }
}