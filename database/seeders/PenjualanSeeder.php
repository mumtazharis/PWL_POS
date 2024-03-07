<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Muhammad Adi',
                'penjualan_kode' => 'Penjualan 1',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Muhammad Budi',
                'penjualan_kode' => 'Penjualan 2',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Cici',
                'penjualan_kode' => 'Penjualan 3',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Didi',
                'penjualan_kode' => 'Penjualan 4',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Edi',
                'penjualan_kode' => 'Penjualan 5',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Ferdi',
                'penjualan_kode' => 'Penjualan 6',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Gendu',
                'penjualan_kode' => 'Penjualan 7',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Heru',
                'penjualan_kode' => 'Penjualan 8',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Ipin',
                'penjualan_kode' => 'Penjualan 9',
                'penjualan_tanggal' => now()
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Jordi',
                'penjualan_kode' => 'Penjualan 10',
                'penjualan_tanggal' => now()
            ],
         
                
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
