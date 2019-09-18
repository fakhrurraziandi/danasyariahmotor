<?php

use Illuminate\Database\Seeder;

class ManagerPembiayaanDanaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('manager_pembiayaan_dana')->delete();
        
        \DB::table('manager_pembiayaan_dana')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Soni - Jawa Barat',
                'email' => 'manager.pembiayaandana@gmail.com',
                'password' => 'untukapa',
                'phone_number' => '082127972625',
                'photo_profile' => NULL,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 09:31:25',
                'updated_at' => '2019-05-13 20:55:34',
            ),
        ));
        
        
    }
}