<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin account
        User::firstOrCreate(
            ['email' => 'hieusur222@gmail.com'],
            [
                'name' => 'Hieu',
                'password' => Hash::make('admin123456'),
            ]
        );

        // 2. Categories & Products
        $this->call(CatalogSeeder::class);

        // 3. Initial Posts
        if (Post::count() === 0) {
            $posts = [
                [
                    'title' => 'Top 5+ lò nướng bánh, máy trộn bột được các tiệm bánh ưa chuộng nhất 2026',
                    'slug' => 'top-5-lo-nuong-banh-may-tron-bot-ua-chuong-nhat-2026',
                    'category' => 'Kinh nghiệm chọn mua',
                    'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=800&auto=format&fit=crop&q=80',
                    'summary' => 'Tổng hợp các mẫu lò nướng Southstar, lò nướng đối lưu và máy trộn bột 7L - 20L công nghệ biến tần tiết kiệm điện bán chạy nhất.',
                    'content' => '<p>Khởi nghiệp mở tiệm bánh ngọt hay lò bánh mì đòi hỏi sự đầu tư chuẩn xác vào hệ thống thiết bị...</p><p>Thiết bị Bếp Inox Bảo Linh với bảo hành 12 tháng tận nơi và đội ngũ kỹ thuật giàu kinh nghiệm sẵn sàng đồng hành cùng quý khách.</p>',
                    'is_published' => true,
                    'published_at' => now()->subDays(1),
                ],
                [
                    'title' => 'Hướng dẫn sử dụng tủ nấu cơm công nghiệp tiết kiệm điện và bền bỉ',
                    'slug' => 'huong-dan-su-dung-tu-nau-com-cong-nghiep-tiet-kiem-dien-va-ben-bi',
                    'category' => 'Hướng dẫn kỹ thuật',
                    'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800&auto=format&fit=crop&q=80',
                    'summary' => 'Kinh nghiệm vận hành tủ cơm 8 khay - 24 khay: cách cấp nước an toàn, xả áp suất đúng quy trình và bảo dưỡng thanh nhiệt định kỳ.',
                    'content' => '<p>Tủ nấu cơm công nghiệp Bảo Linh sử dụng inox 304 cao cấp, gioăng cao su chịu nhiệt kép và phao cấp nước tự động...</p>',
                    'is_published' => true,
                    'published_at' => now()->subDays(2),
                ],
                [
                    'title' => 'Bí quyết ninh xương nấu nước dùng phở trong veo, ngọt thanh bằng nồi điện',
                    'slug' => 'bi-quyet-ninh-xuong-nau-nuoc-dung-pho-trong-veo-ngot-thanh-bang-noi-dien',
                    'category' => 'Cẩm nang ẩm thực',
                    'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&auto=format&fit=crop&q=80',
                    'summary' => 'Quy trình ninh hầm xương ống bò và heo với bộ 3 nồi phở điện Bảo Linh, kiểm soát nhiệt độ chính xác không bị đục nước dùng.',
                    'content' => '<p>Nồi nấu phở điện Bảo Linh trang bị cảm biến nhiệt độ tự động ngắt khi đạt độ sôi, duy trì nhiệt độ liu riu cả ngày...</p>',
                    'is_published' => true,
                    'published_at' => now()->subDays(3),
                ],
                [
                    'title' => 'Đầu tư máy thái thịt cho quán phở: Tính toán bài toán tiết kiệm nhân công',
                    'slug' => 'dau-tu-may-thai-thit-cho-quan-pho-tinh-toan-bai-toan-tiet-kiem-nhan-cong',
                    'category' => 'Tư vấn đầu tư',
                    'image' => 'https://images.unsplash.com/photo-1590794056226-79ef3a8147e1?w=800&auto=format&fit=crop&q=80',
                    'summary' => 'So sánh chi phí thuê nhân công thái tay so với đầu tư máy thái thịt tươi QX-250: thu hồi vốn chỉ sau 2 tháng sử dụng.',
                    'content' => '<p>Máy thái thịt tươi sống đa năng QX-250 của Bảo Linh cho năng suất lên đến 150kg/h, lát cắt đều tăm tắp...</p>',
                    'is_published' => true,
                    'published_at' => now()->subDays(4),
                ],
            ];

            foreach ($posts as $post) {
                Post::create($post);
            }
        }
    }
}
