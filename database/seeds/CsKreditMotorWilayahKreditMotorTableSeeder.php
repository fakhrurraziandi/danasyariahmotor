<?php

use Illuminate\Database\Seeder;

class CsKreditMotorWilayahKreditMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cs_kredit_motor_wilayah_kredit_motor')->delete();
        
        \DB::table('cs_kredit_motor_wilayah_kredit_motor')->insert(array (
            0 => 
            array (
                'id' => 5,
                'cs_kredit_motor_id' => 5,
                'wilayah_kredit_motor_id' => 1,
                'created_at' => '2019-04-30 15:17:16',
                'updated_at' => '2019-04-30 15:17:16',
            ),
            1 => 
            array (
                'id' => 6,
                'cs_kredit_motor_id' => 5,
                'wilayah_kredit_motor_id' => 2,
                'created_at' => '2019-04-30 15:17:16',
                'updated_at' => '2019-04-30 15:17:16',
            ),
            2 => 
            array (
                'id' => 7,
                'cs_kredit_motor_id' => 5,
                'wilayah_kredit_motor_id' => 3,
                'created_at' => '2019-04-30 15:17:16',
                'updated_at' => '2019-04-30 15:17:16',
            ),
            3 => 
            array (
                'id' => 8,
                'cs_kredit_motor_id' => 6,
                'wilayah_kredit_motor_id' => 4,
                'created_at' => '2019-04-30 15:24:46',
                'updated_at' => '2019-04-30 15:24:46',
            ),
            4 => 
            array (
                'id' => 9,
                'cs_kredit_motor_id' => 6,
                'wilayah_kredit_motor_id' => 5,
                'created_at' => '2019-04-30 15:24:46',
                'updated_at' => '2019-04-30 15:24:46',
            ),
            5 => 
            array (
                'id' => 10,
                'cs_kredit_motor_id' => 6,
                'wilayah_kredit_motor_id' => 6,
                'created_at' => '2019-04-30 15:24:46',
                'updated_at' => '2019-04-30 15:24:46',
            ),
        ));
        
        
    }
}