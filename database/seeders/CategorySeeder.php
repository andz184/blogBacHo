<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Thời niên thiếu',
                'slug' => 'thoi-nien-thieu',
                'description' => 'Giai đoạn từ khi sinh ra đến năm 1911',
                'is_active' => true
            ],
            [
                'name' => 'Hành trình tìm đường cứu nước',
                'slug' => 'hanh-trinh-tim-duong-cuu-nuoc',
                'description' => 'Giai đoạn từ 1911 đến 1920',
                'is_active' => true
            ],
            [
                'name' => 'Hoạt động cách mạng',
                'slug' => 'hoat-dong-cach-mang',
                'description' => 'Các hoạt động cách mạng từ 1920 đến 1945',
                'is_active' => true
            ],
            [
                'name' => 'Kháng chiến chống Pháp',
                'slug' => 'khang-chien-chong-phap',
                'description' => 'Giai đoạn từ 1945 đến 1954',
                'is_active' => true
            ],
            [
                'name' => 'Xây dựng CNXH ở miền Bắc',
                'slug' => 'xay-dung-cnxh-o-mien-bac',
                'description' => 'Giai đoạn từ 1954 đến 1969',
                'is_active' => true
            ],
            [
                'name' => 'Tư tưởng Hồ Chí Minh',
                'slug' => 'tu-tuong-ho-chi-minh',
                'description' => 'Những tư tưởng, đạo đức và phong cách của Bác',
                'is_active' => true
            ],
            [
                'name' => 'Di chúc và Di sản',
                'slug' => 'di-chuc-va-di-san',
                'description' => 'Di chúc và những di sản Người để lại',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
