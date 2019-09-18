<?php

use Illuminate\Database\Seeder;

class JenisPembakaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_pembakaran')->delete();
        
        \DB::table('jenis_pembakaran')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Injeksi',
                'slug' => 'injeksi',
                'created_at' => '2019-06-14 14:08:13',
                'updated_at' => '2019-06-14 14:08:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Karburator',
                'slug' => 'karburator',
                'created_at' => '2019-06-14 14:08:20',
                'updated_at' => '2019-06-14 14:08:20',
            ),
        ));
        
        
    }
}