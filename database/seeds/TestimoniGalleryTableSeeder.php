<?php

use Illuminate\Database\Seeder;

class TestimoniGalleryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimoni_gallery')->delete();
        
        \DB::table('testimoni_gallery')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Dion Bagas',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-08-44.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 6,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-10 08:40:46',
                'updated_at' => '2019-05-13 23:18:48',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'Agus Septian',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-08-41.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 6,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:15:36',
                'updated_at' => '2019-05-13 23:15:36',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'Sutrisno',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-08-43.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 6,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:18:05',
                'updated_at' => '2019-05-13 23:18:05',
            ),
            3 => 
            array (
                'id' => 10,
                'name' => 'Indah',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-09-03.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 187,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:19:30',
                'updated_at' => '2019-05-14 12:34:10',
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'Saiful R',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-09-05.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 187,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:20:49',
                'updated_at' => '2019-05-13 23:20:49',
            ),
            5 => 
            array (
                'id' => 12,
                'name' => 'Diah Astuti Rahma',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-09-06.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 38,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:21:46',
                'updated_at' => '2019-05-13 23:22:11',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'Fachruzy',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-09-07.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 44,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:22:46',
                'updated_at' => '2019-05-13 23:23:54',
            ),
            7 => 
            array (
                'id' => 14,
                'name' => 'Suhendi',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'photo_2019-05-14_06-09-09.jpg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 50,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-13 23:23:16',
                'updated_at' => '2019-05-13 23:23:16',
            ),
            8 => 
            array (
                'id' => 15,
                'name' => 'Ferdian',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 1.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 50,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:30:03',
                'updated_at' => '2019-05-14 12:30:03',
            ),
            9 => 
            array (
                'id' => 16,
                'name' => 'Bagas',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 2.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 50,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:30:36',
                'updated_at' => '2019-05-14 12:30:36',
            ),
            10 => 
            array (
                'id' => 17,
                'name' => 'Bachtiar',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 3.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 44,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:31:32',
                'updated_at' => '2019-05-14 12:31:32',
            ),
            11 => 
            array (
                'id' => 18,
                'name' => 'Toto',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 4.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 44,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:32:19',
                'updated_at' => '2019-05-14 12:32:19',
            ),
            12 => 
            array (
                'id' => 19,
                'name' => 'Sopian',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 5.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 38,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:32:45',
                'updated_at' => '2019-05-14 12:32:45',
            ),
            13 => 
            array (
                'id' => 20,
                'name' => 'Yedi',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 6.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 38,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:33:09',
                'updated_at' => '2019-05-14 12:33:09',
            ),
            14 => 
            array (
                'id' => 21,
                'name' => 'Cahyo',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 7.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 187,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:35:08',
                'updated_at' => '2019-05-14 12:35:08',
            ),
            15 => 
            array (
                'id' => 22,
                'name' => 'Septian',
                'message' => 'Bagus Pelayanan nya',
                'photo' => 'Garut 8.jpeg',
                'type' => 'pembiayaan_dana',
                'wilayah_pembiayaan_dana_id' => 140,
                'wilayah_kredit_motor_id' => NULL,
                'created_at' => '2019-05-14 12:35:41',
                'updated_at' => '2019-05-14 12:35:41',
            ),
        ));
        
        
    }
}