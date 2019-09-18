<?php

use Illuminate\Database\Seeder;

class WarnaMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('warna_motor')->delete();
        
        \DB::table('warna_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Abu-abu',
                'slug' => 'abu-abu',
                'deleted_at' => NULL,
                'created_at' => '2019-04-07 12:03:12',
                'updated_at' => '2019-04-07 12:03:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Biru',
                'slug' => 'biru',
                'deleted_at' => NULL,
                'created_at' => '2019-04-07 12:03:21',
                'updated_at' => '2019-04-07 12:03:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Coklat',
                'slug' => 'coklat',
                'deleted_at' => NULL,
                'created_at' => '2019-04-07 12:03:26',
                'updated_at' => '2019-04-07 12:03:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dark Smoke',
                'slug' => 'dark-smoke',
                'deleted_at' => NULL,
                'created_at' => '2019-04-07 12:03:34',
                'updated_at' => '2019-04-07 12:03:34',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Gold',
                'slug' => 'gold',
                'deleted_at' => NULL,
                'created_at' => '2019-04-07 12:03:39',
                'updated_at' => '2019-04-07 12:03:39',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Gun Metal',
                'slug' => 'gun-metal',
                'deleted_at' => NULL,
                'created_at' => '2019-04-07 12:03:46',
                'updated_at' => '2019-04-07 12:03:46',
            ),
        ));
        
        
    }
}