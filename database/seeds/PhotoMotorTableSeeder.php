<?php

use Illuminate\Database\Seeder;

class PhotoMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photo_motor')->delete();
        
        \DB::table('photo_motor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'motor_id' => 10,
                'photo' => '49nPcUTqcZtazUpwFUiF.png',
                'deleted_at' => NULL,
                'created_at' => '2019-04-13 07:30:35',
                'updated_at' => '2019-04-13 07:30:35',
            ),
            1 => 
            array (
                'id' => 2,
                'motor_id' => 10,
                'photo' => 'Yamaha_Fino_125_2070_76316_large_mobile.jpg',
                'deleted_at' => NULL,
                'created_at' => '2019-04-13 07:30:47',
                'updated_at' => '2019-04-13 07:30:47',
            ),
            2 => 
            array (
                'id' => 3,
                'motor_id' => 9,
                'photo' => 'yamaha_yamaha-freego-125-sepeda-motor_full25.jpg',
                'deleted_at' => NULL,
                'created_at' => '2019-04-13 07:42:22',
                'updated_at' => '2019-04-13 07:42:22',
            ),
            3 => 
            array (
                'id' => 4,
                'motor_id' => 9,
                'photo' => '5bece304cf0b7.jpg',
                'deleted_at' => NULL,
                'created_at' => '2019-04-13 07:42:30',
                'updated_at' => '2019-04-13 07:42:30',
            ),
            4 => 
            array (
                'id' => 5,
                'motor_id' => 8,
                'photo' => 'yamaha_yamaha-lexi-125-vva-sepeda-motor_full12.jpg',
                'deleted_at' => NULL,
                'created_at' => '2019-04-13 07:43:22',
                'updated_at' => '2019-04-13 07:43:22',
            ),
            5 => 
            array (
                'id' => 6,
                'motor_id' => 8,
                'photo' => 'yamaha_yamaha-lexi-s-abs-sepeda-motor--vin-2019--otr-jawa-timur-_full02.jpg',
                'deleted_at' => NULL,
                'created_at' => '2019-04-13 07:43:32',
                'updated_at' => '2019-04-13 07:43:32',
            ),
        ));
        
        
    }
}