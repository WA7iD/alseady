<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 1,                'is_active' => 1,


            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 2,                'is_active' => 1,

            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 3,                'is_active' => 1,

            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 4,                'is_active' => 1,

            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 5,                'is_active' => 1,

            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 6,                'is_active' => 1,

            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 7,                'is_active' => 1,

            ],
            [
                'name' => 'د. نواف عبدالإله بن سليم',
                'description' => 'Lorem Ipsumد. نواف بن سليم، استشاري طوارئ أطفال بالمستشفى السعودي الألماني، الرياض.',
                'image' => 'assets/images/doctors/1.png',
                'category_id' => 8,                'is_active' => 1,

            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
