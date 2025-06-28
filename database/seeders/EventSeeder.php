<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = "https://placehold.co/300";
        $kenny_id = 3;
        $putri_id = 4;
        $numberOfEvent = 20;
        $faker = Factory::create();

        for($i = 0; $i < $numberOfEvent; $i++) {
            $daysOffset = $faker->numberBetween(-90, 90); 
            $pivotDate = Carbon::now()->addDays($daysOffset);

            // Generate start_date relative to the pivot date (e.g., up to 15 days before)
            $startDate = $pivotDate->copy()->subDays($faker->numberBetween(0, 15))->startOfDay();

            // Generate end_date relative to start_date (event duration: 1 to 30 days)
            $endDate = $startDate->copy()->addDays($faker->numberBetween(1, 30))->endOfDay();

            Event::create([
                'nama_event' => $faker->sentence(2),
                'deskripsi' => $faker->paragraph(1),
                'lokasi' => $faker->sentence(3),
                'banner1' => $image,
                'harga_tiket' => $faker->numberBetween(25000,200000),
                'penyelenggara' => $faker->numberBetween($kenny_id, $putri_id),
                'jadwal_mulai' => $startDate,
                'jadwal_selesai' => $endDate
            ]);
        }
    }
}
