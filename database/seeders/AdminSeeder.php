<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = Admin::query()->firstOrCreate(
            [
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'Super Admin',
                'phone' => fake()->phoneNumber(),
                'password' => '123456789',
                'is_active' => true,
            ]
        );

        $manager->addRole('super-admin');
    }
}
