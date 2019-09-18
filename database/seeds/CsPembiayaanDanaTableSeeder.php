<?php

use Illuminate\Database\Seeder;

class CsPembiayaanDanaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cs_pembiayaan_dana')->delete();
        
        \DB::table('cs_pembiayaan_dana')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'FItri',
                'email' => 'cs.fitiri@danasyariahmotor.com',
                'password' => '$2y$10$DE.UbCPRCsXwWeCSgJlXleun2msc1b9M6fky7HietEJPqyXqiMNhi',
                'phone_number' => '08122015550',
                'photo_profile' => 'Profile Picture-02.jpg',
                'remember_token' => NULL,
                'created_at' => '2019-05-13 21:16:52',
                'updated_at' => '2019-05-13 22:21:50',
            ),
        ));
        
        
    }
}