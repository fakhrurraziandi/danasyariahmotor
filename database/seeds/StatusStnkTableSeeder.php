<?php

use Illuminate\Database\Seeder;

class StatusStnkTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status_stnk')->delete();

        \DB::table('status_stnk')->insert([
            [
                'name' => 'STNK ada',
            ],
            [
                'name' => 'STNK Mati 1 Tahun',
            ],
            [
                'name' => 'STNK Mati 2 Tahun',
            ],
            [
                'name' => 'STNK Mati 3 Tahun',
            ],
            [
                'name' => 'STNK Mati 4 Tahun',
            ],
        ]);
        
        
    }
}