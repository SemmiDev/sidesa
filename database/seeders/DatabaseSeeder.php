<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('desa')->insert([
            'nama' => 'Desa Cibadak',
            'kode_pos' => '43211',
            'alamat' => 'Jl. Raya Cibadak No. 123',
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'nik' => 'admin',
            'no_hp' => 'admin',
            'alamat' => 'Jl. Raya Cibadak No. 123',
            'role' => 'Admin',
            'is_confirmed' => true,
            'id_desa' => 1,
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'wulan',
            'nik' => 'wulan',
            'no_hp' => 'wulan',
            'alamat' => 'Jl. Raya Cibadak No. 123',
            'role' => 'Warga',
            'is_confirmed' => true,
            'id_desa' => 1,
            'password' => bcrypt('wulan'),
        ]);
    }
}
