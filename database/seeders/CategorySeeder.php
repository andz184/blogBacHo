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
                'description' => 'Giai đoạn thời niên thiếu của Chủ tịch Hồ Chí Minh',
                'is_active' => true,
            ],
            [
                'name' => 'Hoạt động cách mạng',
                'description' => 'Giai đoạn hoạt động cách mạng của Người',
                'is_active' => true,
            ],
            [
                'name' => 'Kháng chiến chống Pháp',
                'description' => 'Thời kỳ kháng chiến chống thực dân Pháp',
                'is_active' => true,
            ],
            [
                'name' => 'Xây dựng CNXH ở miền Bắc',
                'description' => 'Giai đoạn xây dựng chủ nghĩa xã hội ở miền Bắc',
                'is_active' => true,
            ],
            [
                'name' => 'Kháng chiến chống Mỹ',
                'description' => 'Thời kỳ kháng chiến chống đế quốc Mỹ',
                'is_active' => true,
            ],
            [
                'name' => 'Di chúc và Di sản',
                'description' => 'Di chúc và Di sản của Chủ tịch Hồ Chí Minh',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'is_active' => $category['is_active'],
            ]);
        }
    }
}
