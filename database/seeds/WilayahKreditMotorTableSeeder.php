<?php

use Illuminate\Database\Seeder;

class WilayahKreditMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wilayah_kredit_motor')->delete();
        
        \DB::table('wilayah_kredit_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bandung',
                'created_at' => '2019-04-30 14:18:29',
                'updated_at' => '2019-04-30 14:18:29',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Garut',
                'created_at' => '2019-04-30 14:18:35',
                'updated_at' => '2019-04-30 14:18:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sumedang',
                'created_at' => '2019-04-30 14:18:39',
                'updated_at' => '2019-04-30 14:18:39',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sukabumi',
                'created_at' => '2019-04-30 14:18:49',
                'updated_at' => '2019-04-30 14:18:49',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cianjur',
                'created_at' => '2019-04-30 14:18:55',
                'updated_at' => '2019-04-30 14:18:55',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Kawarang',
                'created_at' => '2019-04-30 14:19:00',
                'updated_at' => '2019-04-30 14:19:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Cikampek',
                'created_at' => '2019-04-30 14:19:13',
                'updated_at' => '2019-04-30 14:19:13',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Purwasuka',
                'created_at' => '2019-04-30 14:19:18',
                'updated_at' => '2019-04-30 14:19:18',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Subang',
                'created_at' => '2019-04-30 14:19:26',
                'updated_at' => '2019-04-30 14:19:26',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Pos/Satelit',
                'created_at' => '2019-04-30 14:19:32',
                'updated_at' => '2019-04-30 14:19:32',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Tasikmalaya',
                'created_at' => '2019-04-30 14:19:44',
                'updated_at' => '2019-04-30 14:19:44',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Banjar',
                'created_at' => '2019-04-30 14:19:49',
                'updated_at' => '2019-04-30 14:19:49',
            ),
        ));
        
        
    }
}