<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'administrator@danasyariahmotor.com',
                'password' => '$2y$10$Y/18kL6Mcjo8cUSQpOi6IOed83gioBJ7UEBv2rlDLuVMrMvcjWTi6',
                'is_super' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-04-19 06:58:24',
                'updated_at' => '2019-04-19 06:58:24',
            ),
        ));
        
        
    }
}