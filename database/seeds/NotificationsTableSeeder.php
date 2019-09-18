<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notifications')->delete();
        
        \DB::table('notifications')->insert(array (
            0 => 
            array (
                'id' => '38f4041b-bc15-4761-8178-a0b8f04be912',
                'type' => 'App\\Notifications\\KreditMotor\\NewPengajuanKreditMotor',
                'notifiable_type' => 'App\\User',
                'notifiable_id' => 3,
                'data' => '{"message":"Pengajuan Kredit Motor Baru Dari User <span class=\\"text-primary\\">Fakhrurrazi<\\/span>","pengajuan_kredit_motor":{"member_id":2,"angsuran_motor_id":"3","angsuran_motor_detail_id":"11","updated_at":"2019-04-17 15:29:12","created_at":"2019-04-17 15:29:12","id":5,"cs_id":3,"member":{"id":2,"name":"Fakhrurrazi","email":"fakhrurrazi.andi@gmail.com","email_verified_at":null,"no_handphone_1":"082361399969","no_handphone_2":null,"jenis_identitas":"KTP","no_identitas":"111222333444555","alamat":"Jl. Al Hikmah No 12, Komplek Grand Minimalis, Aceh Besar","tempat_lahir":"Banda Aceh","tanggal_lahir":"1990-08-04","wilayah_id":1,"spv_pinjaman_dana_wilayah_id":null,"cs_pinjaman_dana_wilayah_id":null,"spv_kredit_motor_wilayah_id":null,"cs_kredit_motor_wilayah_id":null,"created_at":"2019-04-15 02:52:28","updated_at":"2019-04-15 02:52:28"}}}',
                'read_at' => NULL,
                'created_at' => '2019-04-17 15:29:12',
                'updated_at' => '2019-04-17 15:29:12',
            ),
            1 => 
            array (
                'id' => '86c46b50-71e0-4976-89ae-401468ece84a',
                'type' => 'App\\Notifications\\KreditMotor\\NewPengajuanKreditMotor',
                'notifiable_type' => 'App\\User',
                'notifiable_id' => 3,
                'data' => '{"message":"Pengajuan Kredit Motor Baru Dari User Fakhrurrazi","user":{"id":2,"name":"Fakhrurrazi","email":"fakhrurrazi.andi@gmail.com","email_verified_at":null,"no_handphone_1":"082361399969","no_handphone_2":null,"jenis_identitas":"KTP","no_identitas":"111222333444555","alamat":"Jl. Al Hikmah No 12, Komplek Grand Minimalis, Aceh Besar","tempat_lahir":"Banda Aceh","tanggal_lahir":"1990-08-04","wilayah_id":1,"spv_pinjaman_dana_wilayah_id":null,"cs_pinjaman_dana_wilayah_id":null,"spv_kredit_motor_wilayah_id":null,"cs_kredit_motor_wilayah_id":null,"created_at":"2019-04-15 02:52:28","updated_at":"2019-04-15 02:52:28"}}',
                'read_at' => NULL,
                'created_at' => '2019-04-17 15:23:22',
                'updated_at' => '2019-04-17 15:23:22',
            ),
            2 => 
            array (
                'id' => 'a89e6eb7-3360-4577-99b2-2579433907c4',
                'type' => 'App\\Notifications\\KreditMotor\\NewPengajuanKreditMotor',
                'notifiable_type' => 'App\\User',
                'notifiable_id' => 3,
                'data' => '{"message":"Pengajuan Kredit Motor Baru Dari User <span class=\\"text-primary\\">Fakhrurrazi<\\/span>","pengajuan_kredit_motor":{"member_id":2,"angsuran_motor_id":"4","angsuran_motor_detail_id":"17","updated_at":"2019-04-17 15:30:28","created_at":"2019-04-17 15:30:28","id":6,"cs_id":3,"member":{"id":2,"name":"Fakhrurrazi","email":"fakhrurrazi.andi@gmail.com","email_verified_at":null,"no_handphone_1":"082361399969","no_handphone_2":null,"jenis_identitas":"KTP","no_identitas":"111222333444555","alamat":"Jl. Al Hikmah No 12, Komplek Grand Minimalis, Aceh Besar","tempat_lahir":"Banda Aceh","tanggal_lahir":"1990-08-04","wilayah_id":1,"spv_pinjaman_dana_wilayah_id":null,"cs_pinjaman_dana_wilayah_id":null,"spv_kredit_motor_wilayah_id":null,"cs_kredit_motor_wilayah_id":null,"created_at":"2019-04-15 02:52:28","updated_at":"2019-04-15 02:52:28"}}}',
                'read_at' => NULL,
                'created_at' => '2019-04-17 15:30:28',
                'updated_at' => '2019-04-17 15:30:28',
            ),
            3 => 
            array (
                'id' => 'e22d0498-89d7-4d98-99c1-810e0dc69545',
                'type' => 'App\\Notifications\\KreditMotor\\NewPengajuanKreditMotor',
                'notifiable_type' => 'App\\User',
                'notifiable_id' => 3,
                'data' => '{"message":"Pengajuan Kredit Motor Baru Dari User Fakhrurrazi","user":{"id":2,"name":"Fakhrurrazi","email":"fakhrurrazi.andi@gmail.com","email_verified_at":null,"no_handphone_1":"082361399969","no_handphone_2":null,"jenis_identitas":"KTP","no_identitas":"111222333444555","alamat":"Jl. Al Hikmah No 12, Komplek Grand Minimalis, Aceh Besar","tempat_lahir":"Banda Aceh","tanggal_lahir":"1990-08-04","wilayah_id":1,"spv_pinjaman_dana_wilayah_id":null,"cs_pinjaman_dana_wilayah_id":null,"spv_kredit_motor_wilayah_id":null,"cs_kredit_motor_wilayah_id":null,"created_at":"2019-04-15 02:52:28","updated_at":"2019-04-15 02:52:28"}}',
                'read_at' => NULL,
                'created_at' => '2019-04-17 15:22:28',
                'updated_at' => '2019-04-17 15:22:28',
            ),
        ));
        
        
    }
}