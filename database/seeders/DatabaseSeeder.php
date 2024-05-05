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
            'lat' => 0.47811508286292503, 
            'long' => 101.37857895905262,
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
            'lat' => 0.4792731038810087, 
            'long' => 101.37888053756353,
            'password' => bcrypt('wulan'),
        ]);

        DB::table('users')->insert([
            'name' => 'sammi',
            'nik' => 'sammi',
            'no_hp' => 'wulasammi',
            'alamat' => 'Jl. Raya Cibadak No. 123',
            'role' => 'Warga',
            'is_confirmed' => true,
            'id_desa' => 1,
            'lat' => 0.47887544458153386, 
            'long' => 101.38130237564509,
            'password' => bcrypt('wulan'),
        ]);
    }
}
