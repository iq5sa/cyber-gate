<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecurityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'حماية الحسابات', 'slug' => 'account-protection'],
            ['name' => 'الأمن على الإنترنت', 'slug' => 'online-security'],
            ['name' => 'تحديث الأنظمة والبرامج', 'slug' => 'system-updates'],
            ['name' => 'الشبكات العامة والواي فاي', 'slug' => 'public-networks'],
            ['name' => 'الأمن المادي للأجهزة', 'slug' => 'device-security'],
            ['name' => 'النسخ الاحتياطي واستعادة البيانات', 'slug' => 'backup-recovery'],
            ['name' => 'الخصوصية والإعدادات الشخصية', 'slug' => 'privacy-settings'],
            ['name' => 'الحماية من البرمجيات الخبيثة', 'slug' => 'malware-antivirus'],
        ];

        foreach ($categories as $category) {
            DB::table('tip_categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
