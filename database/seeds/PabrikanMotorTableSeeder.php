<?php

use Illuminate\Database\Seeder;

class PabrikanMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pabrikan_motor')->delete();
        
        \DB::table('pabrikan_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Yamaha',
                'slug' => 'yamaha',
                'logo' => 'logo-yamaha.jpg',
                'created_at' => '2019-04-02 19:00:42',
                'updated_at' => '2019-04-03 09:26:09',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Honda',
                'slug' => 'honda',
                'logo' => 'honda.png',
                'created_at' => '2019-05-13 19:21:47',
                'updated_at' => '2019-05-13 19:21:47',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Suzuki',
                'slug' => 'suzuki',
                'logo' => 'suzuki.png',
                'created_at' => '2019-05-13 19:22:51',
                'updated_at' => '2019-05-13 19:22:51',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Kawasaki',
                'slug' => 'kawasaki',
                'logo' => 'kawasaki.png',
                'created_at' => '2019-05-13 19:23:43',
                'updated_at' => '2019-05-13 19:23:43',
            ),
        ));
        
        
    }
}