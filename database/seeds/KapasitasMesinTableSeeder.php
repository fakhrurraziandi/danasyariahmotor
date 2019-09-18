<?php

use Illuminate\Database\Seeder;

class KapasitasMesinTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kapasitas_mesin')->delete();
        
        \DB::table('kapasitas_mesin')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cc' => 110,
                'created_at' => '2019-04-07 12:10:34',
                'updated_at' => '2019-04-07 12:10:34',
            ),
            1 => 
            array (
                'id' => 2,
                'cc' => 115,
                'created_at' => '2019-04-07 12:10:40',
                'updated_at' => '2019-04-07 12:10:40',
            ),
            2 => 
            array (
                'id' => 3,
                'cc' => 125,
                'created_at' => '2019-04-07 12:10:47',
                'updated_at' => '2019-04-07 12:10:47',
            ),
            3 => 
            array (
                'id' => 4,
                'cc' => 135,
                'created_at' => '2019-04-07 12:10:53',
                'updated_at' => '2019-04-07 12:10:53',
            ),
            4 => 
            array (
                'id' => 5,
                'cc' => 150,
                'created_at' => '2019-04-07 12:10:59',
                'updated_at' => '2019-04-07 12:10:59',
            ),
            5 => 
            array (
                'id' => 6,
                'cc' => 155,
                'created_at' => '2019-04-07 12:11:04',
                'updated_at' => '2019-04-07 12:11:04',
            ),
        ));
        
        
    }
}