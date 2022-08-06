<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JenisDataLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('jenis');

$push = [ 
            [
                'nama_jenis' => 'Laundry Kiloan Komplit (cuci, kering, setrika) Express',
                'satuan' => 'kg',
                'harga' => '8000'
            ],
            
            [
                'nama_jenis' => 'Cuci Manual',
                'satuan' => 'kg',
                'harga' => '8000'
            ],

            [
                'nama_jenis' => 'Laundry Kiloan Komplit (cuci, kering, setrika) Regular',
                'satuan' => 'kg',
                'harga' => '6000'
            ],

            [
                'nama_jenis' => 'Setrika aja',
                'satuan' => 'kg',
                'harga' => '4000'
            ],

            [
                'nama_jenis' => 'Cuci + Kering',
                'satuan' => 'kg',
                'harga' => '4000'
            ],

            [
                'nama_jenis' => 'Selimut Tipis',
                'satuan' => 'pcs',
                'harga' => '10000'
            ],

            [
                'nama_jenis' => 'Selimut Tebal',
                'satuan' => 'pcs',
                'harga' => '15000'
            ],

            [
                'nama_jenis' => 'Bed Cover Uk 120x10',
                'satuan' => 'pcs',
                'harga' => '15000'
            ],

            [
                'nama_jenis' => 'Bed Cover Uk 200x180',
                'satuan' => 'pcs',
                'harga' => '20000'
            ],

            [
                'nama_jenis' => 'Bed Cover Uk 200x200',
                'satuan' => 'pcs',
                'harga' => '25000'
            ],

            [
                'nama_jenis' => 'Sprei Tipis',
                'satuan' => 'pcs',
                'harga' => '5000'
            ],

            [
                'nama_jenis' => 'Sprei Tebal',
                'satuan' => 'pcs',
                'harga' => '10000'
            ],

            [
                'nama_jenis' => 'Handuk',
                'satuan' => 'pcs',
                'harga' => '10000'
            ],

            [
                'nama_jenis' => 'Gorden',
                'satuan' => 'pcs',
                'harga' => '15000'
            ],

            [
                'nama_jenis' => 'Tas Kecil',
                'satuan' => 'pcs',
                'harga' => '10000'
            ],

            [
                'nama_jenis' => 'Tas Sedang',
                'satuan' => 'pcs',
                'harga' => '15000'
            ],
            
            [
                'nama_jenis' => 'Tas Besar',
                'satuan' => 'pcs',
                'harga' => '18000'
            ],

            [
                'nama_jenis' => 'Sepatu/Sandal',
                'satuan' => 'pasang',
                'harga' => '10000'
            ],

            [
                'nama_jenis' => 'Kasur Lantai',
                'satuan' => 'pcs',
                'harga' => '25000'
            ],

            [
                'nama_jenis' => 'Karpet Permadani',
                'satuan' => 'meter',
                'harga' => '30000'
            ],

            [
                'nama_jenis' => 'Bantal Boneka Kecil',
                'satuan' => 'pcs',
                'harga' => '4000'
            ],

            [
                'nama_jenis' => 'Bantal Boneka Sedang',
                'satuan' => 'pcs',
                'harga' => '8000'
            ],

            [
                'nama_jenis' => 'Bantal Boneka Besar',
                'satuan' => 'pcs',
                'harga' => '15000'
            ],

            [
                'nama_jenis' => 'Bantal Boneka Super Big',
                'satuan' => 'pcs',
                'harga' => '25000'
            ],
        ];
        
    DB::table('jenis')->insert($push);

    }
}
