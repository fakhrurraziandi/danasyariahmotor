<?php

use Illuminate\Database\Seeder;

class MotorWarnaMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('motor_warna_motor')->delete();
        
        \DB::table('motor_warna_motor')->insert(array (
            0 => 
            array (
                'id' => 3,
                'motor_id' => 5,
                'warna_motor_id' => 1,
                'created_at' => '2019-04-12 20:04:18',
                'updated_at' => '2019-04-12 20:04:18',
            ),
            1 => 
            array (
                'id' => 4,
                'motor_id' => 5,
                'warna_motor_id' => 2,
                'created_at' => '2019-04-12 20:04:18',
                'updated_at' => '2019-04-12 20:04:18',
            ),
            2 => 
            array (
                'id' => 5,
                'motor_id' => 10,
                'warna_motor_id' => 1,
                'created_at' => '2019-04-12 20:04:24',
                'updated_at' => '2019-04-12 20:04:24',
            ),
            3 => 
            array (
                'id' => 6,
                'motor_id' => 10,
                'warna_motor_id' => 2,
                'created_at' => '2019-04-12 20:04:24',
                'updated_at' => '2019-04-12 20:04:24',
            ),
            4 => 
            array (
                'id' => 9,
                'motor_id' => 9,
                'warna_motor_id' => 1,
                'created_at' => '2019-04-12 20:04:32',
                'updated_at' => '2019-04-12 20:04:32',
            ),
            5 => 
            array (
                'id' => 10,
                'motor_id' => 8,
                'warna_motor_id' => 2,
                'created_at' => '2019-04-12 20:04:37',
                'updated_at' => '2019-04-12 20:04:37',
            ),
            6 => 
            array (
                'id' => 11,
                'motor_id' => 7,
                'warna_motor_id' => 2,
                'created_at' => '2019-04-12 20:04:41',
                'updated_at' => '2019-04-12 20:04:41',
            ),
            7 => 
            array (
                'id' => 12,
                'motor_id' => 7,
                'warna_motor_id' => 3,
                'created_at' => '2019-04-12 20:04:41',
                'updated_at' => '2019-04-12 20:04:41',
            ),
            8 => 
            array (
                'id' => 13,
                'motor_id' => 6,
                'warna_motor_id' => 2,
                'created_at' => '2019-04-12 20:04:47',
                'updated_at' => '2019-04-12 20:04:47',
            ),
            9 => 
            array (
                'id' => 14,
                'motor_id' => 6,
                'warna_motor_id' => 4,
                'created_at' => '2019-04-12 20:04:47',
                'updated_at' => '2019-04-12 20:04:47',
            ),
        ));
        
        
    }
}