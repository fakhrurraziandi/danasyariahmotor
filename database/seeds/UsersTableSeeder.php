<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Fakhrurrazi',
                'email' => 'fakhrurrazi.andi@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$r5Jr3ITIo.pEV30tYnV3jOeNnKG3DYAfCMhKnZF8BRsSHXgljgLYS',
                'remember_token' => NULL,
                'no_handphone_1' => '082361399969',
                'no_handphone_2' => NULL,
                'jenis_identitas' => 'KTP',
                'no_identitas' => '111222333444555',
                'alamat' => 'Jl. Al Hikmah No 12, Komplek Grand Minimalis, Aceh Besar',
                'tempat_lahir' => 'Banda Aceh',
                'tanggal_lahir' => '1990-08-04',
                'city_id' => 3273,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Rina Shintia Devi',
                'email' => 'rina.shintia@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xujPBfqEOjXIAaTZ27X4z.B/5mO/tQ9E4/Gp78MOzxa4tGL131d02',
                'remember_token' => NULL,
                'no_handphone_1' => '081998991010',
                'no_handphone_2' => '081998991010',
                'jenis_identitas' => 'KTP',
                'no_identitas' => '0987654321',
                'alamat' => 'Jl. Ikan Terbang Blok A20 No.2, Pondok Aren',
                'tempat_lahir' => 'Banda Aceh',
                'tanggal_lahir' => '1991-04-08',
                'city_id' => 1171,
                'created_at' => '2019-04-30 18:27:07',
                'updated_at' => '2019-04-30 18:27:07',
            ),
        ));
        
        
    }
}