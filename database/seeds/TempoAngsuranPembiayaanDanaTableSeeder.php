<?php

use Illuminate\Database\Seeder;

class TempoAngsuranPembiayaanDanaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tempo_angsuran_pembiayaan_dana')->delete();
        
        \DB::table('tempo_angsuran_pembiayaan_dana')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tempo' => 6,
                'created_at' => '2019-05-02 12:35:21',
                'updated_at' => '2019-05-02 12:35:21',
            ),
            1 => 
            array (
                'id' => 2,
                'tempo' => 10,
                'created_at' => '2019-05-02 12:35:26',
                'updated_at' => '2019-05-02 12:35:26',
            ),
            2 => 
            array (
                'id' => 3,
                'tempo' => 12,
                'created_at' => '2019-05-02 12:35:29',
                'updated_at' => '2019-05-02 12:35:29',
            ),
            3 => 
            array (
                'id' => 4,
                'tempo' => 16,
                'created_at' => '2019-05-02 12:35:48',
                'updated_at' => '2019-05-02 12:35:48',
            ),
            4 => 
            array (
                'id' => 5,
                'tempo' => 18,
                'created_at' => '2019-05-02 12:35:51',
                'updated_at' => '2019-05-02 12:35:51',
            ),
            5 => 
            array (
                'id' => 6,
                'tempo' => 22,
                'created_at' => '2019-05-02 12:35:53',
                'updated_at' => '2019-05-02 12:35:53',
            ),
            6 => 
            array (
                'id' => 7,
                'tempo' => 28,
                'created_at' => '2019-05-02 12:36:03',
                'updated_at' => '2019-05-02 12:36:03',
            ),
            7 => 
            array (
                'id' => 8,
                'tempo' => 30,
                'created_at' => '2019-05-02 12:36:06',
                'updated_at' => '2019-05-02 12:36:06',
            ),
            8 => 
            array (
                'id' => 9,
                'tempo' => 34,
                'created_at' => '2019-05-02 12:36:18',
                'updated_at' => '2019-05-02 12:36:18',
            ),
            9 => 
            array (
                'id' => 10,
                'tempo' => 36,
                'created_at' => '2019-05-02 12:36:21',
                'updated_at' => '2019-05-02 12:36:21',
            ),
        ));
        
        
    }
}