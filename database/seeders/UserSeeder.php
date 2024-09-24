<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $manager = User::query()->firstOrCreate(
        //     [
        //         'email' => 'admin@admin.com',
        //     ],
        //     [
        //         'name' => 'Super Admin',
        //         'phone' => fake()->phoneNumber(),
        //         'password' => '123123123',
        //         'is_active' => true,
        //     ]
        // );

        // $manager->addRole('super-admin');
    }
}
