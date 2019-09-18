<?php

use Illuminate\Database\Seeder;

class StatusBpkbTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status_bpkb')->delete();
        
        \DB::table('status_bpkb')->insert([
            [
                'name' => 'Sendiri/Pasangan/1 KK'
            ],
            [
                'name' => 'Lainnya'
            ],
        ]);
        
        

    }
}