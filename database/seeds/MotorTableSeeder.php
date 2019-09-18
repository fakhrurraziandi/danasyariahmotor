<?php

use Illuminate\Database\Seeder;

class MotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('motor')->delete();
        
        \DB::table('motor')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Yamaha YZF-R15',
                'slug' => 'yamaha-yzf-r15',
                'pabrikan_motor_id' => 1,
                'type_motor_id' => 3,
                'jenis_transmisi_id' => 2,
                'kapasitas_mesin_id' => 5,
                'tahun' => 2019,
                'harga' => 15000000,
                'created_at' => '2019-04-12 18:27:35',
                'updated_at' => '2019-04-13 08:37:48',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Yamaha Vixion',
                'slug' => 'yamaha-vixion',
                'pabrikan_motor_id' => 1,
                'type_motor_id' => 2,
                'jenis_transmisi_id' => 2,
                'kapasitas_mesin_id' => 5,
                'tahun' => 2019,
                'harga' => 15000000,
                'created_at' => '2019-04-12 18:39:58',
                'updated_at' => '2019-04-13 08:41:20',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Yamaha N-Max',
                'slug' => 'yamaha-n-max',
                'pabrikan_motor_id' => 1,
                'type_motor_id' => 4,
                'jenis_transmisi_id' => 1,
                'kapasitas_mesin_id' => 6,
                'tahun' => 2019,
                'harga' => 15000000,
                'created_at' => '2019-04-12 18:41:35',
                'updated_at' => '2019-04-13 08:41:27',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'Yamaha Lexi',
                'slug' => 'yamaha-lexi',
                'pabrikan_motor_id' => 1,
                'type_motor_id' => 4,
                'jenis_transmisi_id' => 1,
                'kapasitas_mesin_id' => 3,
                'tahun' => 2019,
                'harga' => 15000000,
                'created_at' => '2019-04-12 18:42:05',
                'updated_at' => '2019-04-13 08:41:33',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'Yamaha FreeGo',
                'slug' => 'yamaha-freego',
                'pabrikan_motor_id' => 1,
                'type_motor_id' => 4,
                'jenis_transmisi_id' => 1,
                'kapasitas_mesin_id' => 3,
                'tahun' => 2019,
                'harga' => 14000000,
                'created_at' => '2019-04-12 18:42:35',
                'updated_at' => '2019-04-13 08:41:40',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'Yamaha Fino',
                'slug' => 'yamaha-fino',
                'pabrikan_motor_id' => 1,
                'type_motor_id' => 4,
                'jenis_transmisi_id' => 1,
                'kapasitas_mesin_id' => 3,
                'tahun' => 2019,
                'harga' => 12000000,
                'created_at' => '2019-04-12 18:42:58',
                'updated_at' => '2019-04-13 08:41:46',
            ),
        ));
        
        
    }
}