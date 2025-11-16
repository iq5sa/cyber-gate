<?php

namespace Database\Seeders;

use App\Models\SecurityTip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SecurityTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            [
                'title' => 'استخدم كلمات مرور قوية',
                'excerpt' => 'كلمات المرور الضعيفة هي أول ثغرة في أمنك.',
                'content' => 'استخدم كلمات مرور تحتوي على حروف كبيرة وصغيرة، أرقام ورموز، ولا تُكرر نفس كلمة المرور في أكثر من حساب.',
                'image' => 'security-tips/passwords.jpg',
                'category_id' => 1,
            ],
            [
                'title' => 'تفعيل التحقق بخطوتين',
                'excerpt' => 'أضف طبقة حماية إضافية لحساباتك.',
                'content' => 'التحقق بخطوتين يمنع الوصول غير المصرح به حتى لو تم اختراق كلمة المرور.',
                'image' => 'security-tips/2fa.png',
                'category_id' => 1,
            ],
            [
                'title' => 'لا تفتح الروابط المشبوهة',
                'excerpt' => 'روابط التصيّد الاحتيالي قد تسرق معلوماتك.',
                'content' => 'تأكد من مصدر الروابط قبل النقر، وتجنّب فتح الروابط التي تصلك من جهات غير معروفة.',
                'image' => 'security-tips/phishing.jpg',
                'category_id' => 2,
            ],
            [
                'title' => 'استخدم VPN في الشبكات العامة',
                'excerpt' => 'الواي فاي المفتوح قد يكون فخًا.',
                'content' => 'استخدم VPN لتشفير اتصالك عند استخدام شبكات الإنترنت العامة، خصوصًا في المقاهي أو الأماكن العامة.',
                'image' => 'security-tips/public-wifi.png',
                'category_id' => 2,
            ],
            [
                'title' => 'حدث نظامك بانتظام',
                'excerpt' => 'الثغرات الأمنية تُغلق بالتحديثات.',
                'content' => 'قم بتحديث نظام التشغيل والبرامج بشكل دوري لتفادي استغلال الثغرات الأمنية.',
                'image' => 'security-tips/updates.jpg',
                'category_id' => 3,
            ],
        ];

        foreach ($tips as $tip) {
            SecurityTip::create([
                'title' => $tip['title'],
                'slug' => Str::slug($tip['title']),
                'excerpt' => $tip['excerpt'],
                'content' => $tip['content'],
                'image' => $tip['image'],
                'category_id' => $tip['category_id'],
                'is_published' => true,
                'published_at' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
