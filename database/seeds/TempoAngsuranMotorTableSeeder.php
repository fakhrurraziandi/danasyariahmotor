<?php

use Illuminate\Database\Seeder;

class TempoAngsuranMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tempo_angsuran_motor')->delete();
        
        \DB::table('tempo_angsuran_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tempo' => 11,
                'created_at' => '2019-04-03 14:18:19',
                'updated_at' => '2019-04-03 14:18:19',
            ),
            1 => 
            array (
                'id' => 2,
                'tempo' => 17,
                'created_at' => '2019-04-03 14:19:12',
                'updated_at' => '2019-04-03 14:19:12',
            ),
            2 => 
            array (
                'id' => 3,
                'tempo' => 23,
                'created_at' => '2019-04-03 14:19:20',
                'updated_at' => '2019-04-03 14:19:20',
            ),
            3 => 
            array (
                'id' => 4,
                'tempo' => 29,
                'created_at' => '2019-04-03 14:19:24',
                'updated_at' => '2019-04-03 14:19:24',
            ),
            4 => 
            array (
                'id' => 5,
                'tempo' => 35,
                'created_at' => '2019-04-03 14:19:30',
                'updated_at' => '2019-04-03 14:21:37',
            ),
        ));
        
        
    }
}