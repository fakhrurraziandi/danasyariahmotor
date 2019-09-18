<?php

use Illuminate\Database\Seeder;

class KategoriSpesifikasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kategori_spesifikasi')->delete();
        
        \DB::table('kategori_spesifikasi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mesin',
                'created_at' => '2019-06-14 14:31:19',
                'updated_at' => '2019-06-14 14:31:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dimension',
                'created_at' => '2019-06-14 14:31:26',
                'updated_at' => '2019-06-14 14:31:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kapasitas',
                'created_at' => '2019-06-14 14:31:35',
                'updated_at' => '2019-06-14 14:31:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Rangka',
                'created_at' => '2019-06-14 14:31:39',
                'updated_at' => '2019-06-14 14:31:39',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Kelistrikan',
                'created_at' => '2019-06-14 14:31:43',
                'updated_at' => '2019-06-14 14:31:43',
            ),
        ));
        
        
    }
}