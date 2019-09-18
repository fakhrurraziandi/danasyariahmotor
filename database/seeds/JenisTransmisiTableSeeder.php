<?php

use Illuminate\Database\Seeder;

class JenisTransmisiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_transmisi')->delete();
        
        \DB::table('jenis_transmisi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Automatic',
                'slug' => 'automatic',
                'created_at' => '2019-04-07 12:15:14',
                'updated_at' => '2019-04-07 12:15:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Manual',
                'slug' => 'manual',
                'created_at' => '2019-04-07 12:15:18',
                'updated_at' => '2019-04-07 12:15:18',
            ),
        ));
        
        
    }
}