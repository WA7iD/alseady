<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LaratrustSeeder::class,
            AdminSeeder::class,
            SiteInfoSeeder::class,
            CategorySeeder::class,
            DoctorSeeder::class,
            OfferSeeder::class,
            PositionSeeder::class,
            BlogSeeder::class,
            ActivitySeeder::class,
        ]);
    }
}
