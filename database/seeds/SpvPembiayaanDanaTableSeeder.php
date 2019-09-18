<?php

use Illuminate\Database\Seeder;

class SpvPembiayaanDanaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spv_pembiayaan_dana')->delete();
        
        \DB::table('spv_pembiayaan_dana')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Doni Lesmana',
                'email' => 'mh_doni@gmail.com',
                'password' => '$2y$10$vhRFR/e2TwL.nGlRwSlrlem4dRLdZ8feeggY4clJQpIOBRr/hgoDy',
                'phone_number' => '081321105602',
                'photo_profile' => NULL,
                'manager_pembiayaan_dana_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-04-30 17:32:24',
                'updated_at' => '2019-05-13 20:57:53',
            ),
        ));
        
        
    }
}