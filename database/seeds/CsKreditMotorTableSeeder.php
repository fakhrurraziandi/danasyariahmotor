<?php

use Illuminate\Database\Seeder;

class CsKreditMotorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cs_kredit_motor')->delete();
        
        \DB::table('cs_kredit_motor')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'CS 1 Kredit Motor',
                'email' => 'cs1.kreditmotor@gmail.com',
                'password' => '$2y$10$15pD9/37H2zqwprZ765JgOEegMkMrU2AltnrsGJCN5GrV67..lfhq',
                'phone_number' => '81998991010',
                'photo_profile' => NULL,
                'spv_kredit_motor_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-04-30 14:34:55',
                'updated_at' => '2019-05-03 07:33:11',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'CS 2 Kredit Motor',
                'email' => 'cs2.kreditmotor@gmail.com',
                'password' => '$2y$10$Zn7g3A7rnvsL7rnHZB1ev.1vIOHk8ZRUgxMDOpnmoto9kjDY1QZWq',
                'phone_number' => '081998991010',
                'photo_profile' => NULL,
                'spv_kredit_motor_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-04-30 15:24:00',
                'updated_at' => '2019-05-03 07:33:17',
            ),
        ));
        
        
    }
}