<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionRoleTableSeeder::class);
        // $this->call(RoleUserTableSeeder::class);
        $this->call(PabrikanMotorTableSeeder::class);
        $this->call(TempoAngsuranMotorTableSeeder::class);
        $this->call(WilayahTableSeeder::class);
        $this->call(TypeMotorTableSeeder::class);
        $this->call(WarnaMotorTableSeeder::class);
        $this->call(KapasitasMesinTableSeeder::class);
        $this->call(JenisTransmisiTableSeeder::class);
        $this->call(MotorTableSeeder::class);
        $this->call(MotorWarnaMotorTableSeeder::class);
        $this->call(PhotoMotorTableSeeder::class);
        $this->call(AngsuranMotorTableSeeder::class);
        $this->call(AngsuranMotorDetailTableSeeder::class);
        
        $this->call(AdminsTableSeeder::class);
        $this->call(SpvKreditMotorTableSeeder::class);
        $this->call(CsKreditMotorTableSeeder::class);
        $this->call(WilayahKreditMotorTableSeeder::class);
        $this->call(CsKreditMotorWilayahKreditMotorTableSeeder::class);
        $this->call(SpvPembiayaanDanaTableSeeder::class);
        $this->call(WilayahPembiayaanDanaTableSeeder::class);
        $this->call(CsPembiayaanDanaTableSeeder::class);
        $this->call(CsPembiayaanDanaWilayahPembiayaanDanaTableSeeder::class);
        $this->call(IndonesiaProvincesTableSeeder::class);
        $this->call(IndonesiaCitiesTableSeeder::class);
        $this->call(IndonesiaDistrictsTableSeeder::class);
        $this->call(IndonesiaVillagesTableSeeder::class);
        $this->call(TempoAngsuranPembiayaanDanaTableSeeder::class);
        $this->call(TypeKonsumenPembiayaanDanaTableSeeder::class);
        $this->call(MotorPembiayaanDanaTableSeeder::class);
        $this->call(StatusStnkTableSeeder::class);
        $this->call(StatusBpkbTableSeeder::class);
        $this->call(StatusRumahTableSeeder::class);
        $this->call(ManagerPembiayaanDanaTableSeeder::class);
        $this->call(TestimoniMotorTableSeeder::class);
        $this->call(ContactMessageTableSeeder::class);
        $this->call(TestimoniGalleryTableSeeder::class);
        $this->call(ContentVariableTableSeeder::class);
    }
}
