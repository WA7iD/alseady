<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parent = Position::create(['name_ar' => 'الوظائف الطبية', 'name_en' => 'Medical jobs']);
        $children =
            [
                ['name_ar' => 'أطباء', 'name_en' => 'Doctors', 'parent_id' => $parent->id],
                ['name_ar' => 'أطباء أسنان', 'name_en' => 'Dentists', 'parent_id' => $parent->id],
                ['name_ar' => 'صيادلة', 'name_en' => 'Pharmacists', 'parent_id' => $parent->id],
                ['name_ar' => 'ممرضين وممرضات', 'name_en' => 'Nurses', 'parent_id' => $parent->id],
                ['name_ar' => 'أخصائيي تخدير', 'name_en' => 'Anesthesiologists', 'parent_id' => $parent->id],
                ['name_ar' => 'أخصائيي أشعة', 'name_en' => 'Radiologists', 'parent_id' => $parent->id],
                ['name_ar' => 'أخصائيي مختبرات طبية', 'name_en' => 'Medical Laboratory Specialists', 'parent_id' => $parent->id],
                ['name_ar' => 'أخصائيي علاج طبيعي', 'name_en' => 'Physiotherapists', 'parent_id' => $parent->id],
                ['name_ar' => 'أخصائيي تغذية', 'name_en' => 'Nutritionists', 'parent_id' => $parent->id],
            ];

        foreach ($children as $child) {
            Position::create($child);
        }

        $parent = Position::create(['name_ar' => 'الوظائف الإدارية', 'name_en' => 'Administrative jobs']);
        $children =
            [
                ['name_ar' => 'موظفي استقبال', 'name_en' => 'Receptionists', 'parent_id' => $parent->id],
                ['name_ar' => 'موظفي الموارد البشرية', 'name_en' => 'Human Resources Staff', 'parent_id' => $parent->id],
                ['name_ar' => 'موظفي المالية والمحاسبة', 'name_en' => 'Finance and Accounting Staff', 'parent_id' => $parent->id],
                ['name_ar' => 'موظفي تكنولوجيا المعلومات', 'name_en' => 'IT Staff', 'parent_id' => $parent->id],
                ['name_ar' => 'منسقي الخدمات الصحية', 'name_en' => 'Health Services Coordinators', 'parent_id' => $parent->id],
                ['name_ar' => 'إدارة الجودة', 'name_en' => 'Quality Management', 'parent_id' => $parent->id],
                ['name_ar' => 'التسويق والعلاقات العامة', 'name_en' => 'Marketing and Public Relations', 'parent_id' => $parent->id],
                ['name_ar' => 'خدمات العملاء', 'name_en' => 'Customer Service', 'parent_id' => $parent->id],
            ];

        foreach ($children as $child) {
            Position::create($child);
        }

        $parent = Position::create(['name_ar' => 'الوظائف المساندة', 'name_en' => 'Support jobs']);
        $children =
            [
                ['name_ar' => 'تقنيين صيانة وتجهيزات طبية', 'name_en' => 'Medical Equipment Technicians', 'parent_id' => $parent->id],
                ['name_ar' => 'موظفي الأمن والسلامة', 'name_en' => 'Security and Safety Staff', 'parent_id' => $parent->id],
                ['name_ar' => 'موظفي الخدمات اللوجستية والنقل', 'name_en' => 'Logistics and Transport Staff', 'parent_id' => $parent->id],
            ];

        foreach ($children as $child) {
            Position::create($child);
        }
    }
}
