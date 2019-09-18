<?php

use Illuminate\Database\Seeder;

class ContactMessageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_message')->delete();
        
        \DB::table('contact_message')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fakhrurrazi Andi',
                'email' => 'fakhrurrazi.andi@gmail.com',
                'phone_number' => '0821765858123',
                'message' => 'Hello Saya mau mengajukan kredit motor, tolong di pandu untuk langkah langkah nya',
                'created_at' => '2019-05-09 20:36:33',
                'updated_at' => '2019-05-09 20:36:33',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Fakhrurrazi Andi',
                'email' => 'fakhrurrazi.andi@gmail.com',
                'phone_number' => '81998991010',
                'message' => 'asdasdasd asd a sdas dasd',
                'created_at' => '2019-05-09 20:36:43',
                'updated_at' => '2019-05-09 20:36:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Fakhrurrazi Andi',
                'email' => 'fakhrurrazi.andi@gmail.com',
                'phone_number' => '081998991010',
                'message' => 'asdjaskdh lq;sad hgasuydfg oasdufa',
                'created_at' => '2019-05-09 20:37:14',
                'updated_at' => '2019-05-09 20:37:14',
            ),
        ));
        
        
    }
}