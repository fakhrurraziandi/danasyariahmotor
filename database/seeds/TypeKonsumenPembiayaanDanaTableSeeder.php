<?php

use Illuminate\Database\Seeder;

class TypeKonsumenPembiayaanDanaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_konsumen_pembiayaan_dana')->delete();
        
        \DB::table('type_konsumen_pembiayaan_dana')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'RO/AO',
                'created_at' => '2019-05-02 12:42:32',
                'updated_at' => '2019-05-02 12:42:32',
            ),
            1 => 
            array (
                'id' => 2,
            'name' => 'RO/AO (Lunas > 3 tahun)',
                'created_at' => '2019-05-02 12:42:56',
                'updated_at' => '2019-05-02 12:42:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'NEW CUSTOMER',
                'created_at' => '2019-05-02 12:44:02',
                'updated_at' => '2019-05-02 12:44:02',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'TELESALES',
                'created_at' => '2019-05-02 12:44:08',
                'updated_at' => '2019-05-02 12:44:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'TOP UP',
                'created_at' => '2019-05-02 12:44:13',
                'updated_at' => '2019-05-02 12:44:13',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'TOP UP TELSALES',
                'created_at' => '2019-05-02 12:44:21',
                'updated_at' => '2019-05-02 12:44:21',
            ),
        ));
        
        
    }
}