<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(0,10) as $i){
            DB::table('news')->insert([
                'judul' => $faker->name,
                'gambar' => $faker->email,
                'tanggal' => $faker->dateTimeThisCentury()->format('Y-m-d'),
                'deskripsi' => $faker->name,
                'sumber' => $faker->name,
                'timestamps' => $faker->dateTimeThisCentury()->format('Y-m-d')
        ]);
    }
}
}
        
    
    
