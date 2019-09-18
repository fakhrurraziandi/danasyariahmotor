<?php

use Illuminate\Database\Seeder;

class SpvKreditMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spv_kredit_motor')->delete();
        
        \DB::table('spv_kredit_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Iyan',
                'email' => 'spm_iyani@gmail.com',
                'password' => '$2y$10$jP6EmTWINxlIiNB333O8dexl8RID.NRfaOMJAJDGh12g83j3rlUlS',
                'phone_number' => '081394474447',
                'photo_profile' => NULL,
                'remember_token' => NULL,
                'created_at' => '2019-04-19 07:06:20',
                'updated_at' => '2019-05-13 20:57:22',
            ),
        ));
        
        
    }
}