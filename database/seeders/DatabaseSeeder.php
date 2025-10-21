<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lokasi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Jalankan seeder lain terlebih dahulu
        $this->call([
            RolePermissionSeeder::class,
            KategoriSeeder::class,
            LokasiSeeder::class,
            BarangSeeder::class,
        ]);

        // =====================================================
        // ADMIN
        // =====================================================
        $admin = User::factory()->create([
            'name' => 'Admin PPLG',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // =====================================================
        // PETUGAS BERDASARKAN LOKASI
        // =====================================================
        $lokasiUks = Lokasi::where('nama_lokasi', 'Ruang UKS')->first();
        $lokasiPPLG1   = Lokasi::where('nama_lokasi', 'LAB PPLG-1')->first();
        $lokasiPPLG2 = Lokasi::where('nama_lokasi', 'LAB PPLG-2')->first();
        $lokasiPPLG3  = Lokasi::where('nama_lokasi', 'LAB PPLG-3')->first();

        // Daftar petugas sesuai lokasi
        $petugasList = [
            [
                'name'  => 'Yeni Rahmawati',
                'email' => 'petugas1@email.com',
                'lokasi' => $lokasiUks,
            ],
            [
                'name'  => 'Ade Roni',
                'email' => 'petugas2@email.com',
                'lokasi' => $lokasiPPLG1,
            ],
            [
                'name'  => 'Patah Yasin',
                'email' => 'petugas3@email.com',
                'lokasi' => $lokasiPPLG2,
            ],
            [
                'name'  => 'Iip Abdur Rohim',
                'email' => 'petugas4@email.com',
                'lokasi' => $lokasiPPLG3,
            ],
        ];

        // Buat user petugas berdasarkan daftar di atas
        foreach ($petugasList as $data) {
            if ($data['lokasi']) {
                $user = User::factory()->create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt('password'),
                    'lokasi_id' => $data['lokasi']->id,
                ]);
                $user->assignRole('petugas');
            }
        }
    }
}
