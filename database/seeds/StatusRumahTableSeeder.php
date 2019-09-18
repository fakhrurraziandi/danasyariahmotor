<?php

use Illuminate\Database\Seeder;

class StatusRumahTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status_rumah')->delete();
        
        \DB::table('status_rumah')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Milik Sendiri/Pasangan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lainnya',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}