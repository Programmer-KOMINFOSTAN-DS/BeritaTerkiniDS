<?php



use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KomentarSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('nama_table')->insert([
                'news_id' => $faker->numberBetween(1, 20), // Ganti 20 dengan jumlah berita yang Anda miliki
                'user_id' => $faker->numberBetween(1, 10), // Ganti 10 dengan jumlah user yang Anda miliki
                'nama' => $faker->name,
                'komentar' => $faker->paragraph,
                'klasifikasi' => $faker->randomElement(['Positif', 'Negatif', 'Netral']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
