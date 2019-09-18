<?php

use Illuminate\Database\Seeder;

class ContentVariableTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('content_variable')->delete();
        
        \DB::table('content_variable')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'alamat',
                'value_text' => NULL,
                'value_html' => '<p>Kantor Repsentative&nbsp;</p>

<p>CV. Surya Motor<br />
Ibu Inggit Garnasih No. 109&nbsp;<br />
Bandung Jawa Barat 40252</p>',
                'type' => 'html',
                'created_at' => '2019-05-13 18:56:56',
                'updated_at' => '2019-05-13 19:14:08',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'facebook_url',
                'value_text' => 'https://www.facebook.com/danasyariahmotor/',
                'value_html' => NULL,
                'type' => 'text',
                'created_at' => '2019-05-13 19:03:58',
                'updated_at' => '2019-05-13 19:03:58',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'instagram_url',
                'value_text' => 'https://www.instagram.com/danasyariahmotor/',
                'value_html' => NULL,
                'type' => 'text',
                'created_at' => '2019-05-13 19:04:12',
                'updated_at' => '2019-05-13 19:04:12',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'phone_number',
                'value_text' => '08122015550',
                'value_html' => NULL,
                'type' => 'text',
                'created_at' => '2019-05-13 19:12:40',
                'updated_at' => '2019-05-13 19:12:40',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'whatsapp_number',
                'value_text' => '08122015550',
                'value_html' => NULL,
                'type' => 'text',
                'created_at' => '2019-05-13 19:12:58',
                'updated_at' => '2019-05-13 19:12:58',
            ),
        ));
        
        
    }
}