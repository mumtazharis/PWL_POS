<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'MNM-1',
                'barang_nama' => 'Aqua',
                'harga_beli' => 2500,
                'harga_jual' => 3000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'MNM-2',
                'barang_nama' => 'Floridina',
                'harga_beli' => 3000,
                'harga_jual' => 3500,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'MKM-1',
                'barang_nama' => 'Nabati',
                'harga_beli' => 1500,
                'harga_jual' => 2000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'MKM-2',
                'barang_nama' => 'Oreo',
                'harga_beli' => 6500,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'PKN-1',
                'barang_nama' => 'Kaos Polos',
                'harga_beli' => 20000,
                'harga_jual' => 30000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'PKN-2',
                'barang_nama' => 'Celana Pendek',
                'harga_beli' => 30000,
                'harga_jual' => 45000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'ELK-1',
                'barang_nama' => 'Lampu 5W',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'ELK-2',
                'barang_nama' => 'Kabel',
                'harga_beli' => 3000,
                'harga_jual' => 4500,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'OBT-1',
                'barang_nama' => 'Paramex',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'OBT-2',
                'barang_nama' => 'Paracetamol',
                'harga_beli' => 3000,
                'harga_jual' => 4000,
            ],
                
        ];
        DB::table('m_barang')->insert($data);
    }
}
