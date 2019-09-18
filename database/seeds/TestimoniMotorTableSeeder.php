<?php

use Illuminate\Database\Seeder;

class TestimoniMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimoni_motor')->delete();
        
        \DB::table('testimoni_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'motor_id' => 10,
                'name' => 'Fakhrurrazi Andi',
                'rate' => 5,
                'message' => 'Motor Yamaha Fino ini enak bla bla bla.',
                'created_at' => '2019-05-09 18:48:10',
                'updated_at' => '2019-05-09 18:48:10',
            ),
            1 => 
            array (
                'id' => 2,
                'motor_id' => 10,
                'name' => 'Rina Shintia Devi',
                'rate' => 4,
                'message' => 'Motor Yamaha Fino ini suka banget',
                'created_at' => '2019-05-09 18:50:20',
                'updated_at' => '2019-05-09 18:50:20',
            ),
            2 => 
            array (
                'id' => 3,
                'motor_id' => 10,
                'name' => 'Alwin Zikrillah',
                'rate' => 3,
                'message' => 'No comment bro ...',
                'created_at' => '2019-05-09 18:50:56',
                'updated_at' => '2019-05-09 18:50:56',
            ),
        ));
        
        
    }
}