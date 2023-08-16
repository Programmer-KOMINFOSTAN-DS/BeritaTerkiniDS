<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ewil_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tanggapans')->insert([
            'positive'=>'10',
            'negative'=>'20'

        ]);
        DB::table('news')->insert([
            'judul' => 'Pemerintah Berkompeten',
            'gambar' => 'assets/img/portfolio/6.jpg',
            'tanggal' => now(),
            'deskripsi' => 'Deskripsi berita 1...',
            'sumber' => 'Sumber Berita 1',
        ]);
        
    }
}
