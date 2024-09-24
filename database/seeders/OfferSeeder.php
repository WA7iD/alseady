<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //First Offer
        Offer::create(
            [
                'title_ar' => 'بنغلاديش',
                'title_en' => 'Bangladesh',
                'description_ar' => 'لوريم إيبسوم هو ببساطة نص وهمي مطبوع ويوفر أفضل تأشيرة على الإطلاق',
                'description_en' => 'Lorem Ipsum is simply dummy text the printing and provide best visa ever',
                'price' => 20,
                'price_after_discount' => 10,
                'is_active' => 1,
            ],
        );

        Offer::create(
            [
                'title_ar' => 'بنغلاديش',
                'title_en' => 'Bangladesh',
                'description_ar' => 'لوريم إيبسوم هو ببساطة نص وهمي مطبوع ويوفر أفضل تأشيرة على الإطلاق',
                'description_en' => 'Lorem Ipsum is simply dummy text the printing and provide best visa ever',
                'price' => 20,
                'price_after_discount' => 10,
                'is_active' => 1,
            ]
        );

        Offer::create(
            [
                'title_ar' => 'بنغلاديش',
                'title_en' => 'Bangladesh',
                'description_ar' => 'لوريم إيبسوم هو ببساطة نص وهمي مطبوع ويوفر أفضل تأشيرة على الإطلاق',
                'description_en' => 'Lorem Ipsum is simply dummy text the printing and provide best visa ever',
                'price' => 20,
                'price_after_discount' => 10,
                'is_active' => 1,
            ],
        );

        Offer::create(
            [
                'title_ar' => 'بنغلاديش',
                'title_en' => 'Bangladesh',
                'description_ar' => 'لوريم إيبسوم هو ببساطة نص وهمي مطبوع ويوفر أفضل تأشيرة على الإطلاق',
                'description_en' => 'Lorem Ipsum is simply dummy text the printing and provide best visa ever',
                'price' => 20,
                'price_after_discount' => 10,
                'is_active' => 1,
            ]
        );
    }
}
