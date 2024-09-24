<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [

            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',            'images' => 'assets/images/activities/1.png',
 'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
            ['title_ar' => 'المركز الرئيسي في الرياض',             'images' => 'assets/images/activities/1.png',
            'title_en' => 'The main center in Riyadh', 'description_ar' => 'نيو كلينيك خبراء الرعاية الصحية المنزلية، نوفر لك مناخ ملائم للرعاية الصحية الأمنة', 'description_en' => 'New Clinic, home health care experts, provide you with an environment conducive to safe health care'],
        ];

        foreach($activities as $activity_data){
            $activity =Activity::create($activity_data);
            // $activity->images()->

        }
    }
}
