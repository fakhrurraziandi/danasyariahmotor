<?php

use Illuminate\Database\Seeder;

class AngsuranMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('angsuran_motor')->delete();
        
        \DB::table('angsuran_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'motor_id' => 10,
                'dp' => 1900000,
                'discount_dp' => 10,
                'created_at' => '2019-04-14 17:54:13',
                'updated_at' => '2019-05-09 19:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'motor_id' => 10,
                'dp' => 2100000,
                'discount_dp' => 10,
                'created_at' => '2019-04-14 17:54:38',
                'updated_at' => '2019-05-09 19:16:07',
            ),
            2 => 
            array (
                'id' => 3,
                'motor_id' => 9,
                'dp' => 1900000,
                'discount_dp' => NULL,
                'created_at' => '2019-04-14 17:55:42',
                'updated_at' => '2019-04-14 17:55:42',
            ),
            3 => 
            array (
                'id' => 4,
                'motor_id' => 9,
                'dp' => 2100000,
                'discount_dp' => NULL,
                'created_at' => '2019-04-14 17:56:06',
                'updated_at' => '2019-04-14 17:56:06',
            ),
        ));
        
        
    }
}