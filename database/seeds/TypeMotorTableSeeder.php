<?php

use Illuminate\Database\Seeder;

class TypeMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_motor')->delete();
        
        \DB::table('type_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bebek',
                'slug' => 'bebek',
                'created_at' => '2019-04-07 11:55:19',
                'updated_at' => '2019-04-07 11:55:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Naked',
                'slug' => 'naked',
                'created_at' => '2019-04-07 11:56:11',
                'updated_at' => '2019-04-07 11:56:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sport',
                'slug' => 'sport',
                'created_at' => '2019-04-07 11:56:15',
                'updated_at' => '2019-04-07 11:57:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Skuter',
                'slug' => 'skuter',
                'created_at' => '2019-04-07 11:56:15',
                'updated_at' => '2019-04-07 11:57:20',
            ),
        ));
        
        
    }
}