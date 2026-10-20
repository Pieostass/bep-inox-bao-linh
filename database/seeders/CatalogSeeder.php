<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Lò Nướng Bánh & Pizza',
                'slug' => 'lo-nuong-banh',
                'icon' => 'flame',
                'description' => 'Các dòng lò nướng đối lưu, lò tầng công nghiệp, lò pizza chuyên dụng cho tiệm bánh và nhà hàng.',
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=600&auto=format&fit=crop&q=80',
                'sort_order' => 1,
            ],
            [
                'name' => 'Tủ Nấu Cơm Công Nghiệp',
                'slug' => 'tu-nau-com-cong-nghiep',
                'icon' => 'cooker',
                'description' => 'Tủ nấu cơm điện, gas, từ 4 khay đến 24 khay chất liệu Inox 304 cách nhiệt 3 lớp.',
                'image' => 'https://images.unsplash.com/photo-1584269600464-37b1b58a9fe7?w=600&auto=format&fit=crop&q=80',
                'sort_order' => 2,
            ],
            [
                'name' => 'Nồi Nấu Phở Inox Điện',
                'slug' => 'noi-nau-pho-inox-dien',
                'icon' => 'pot',
                'description' => 'Nồi ninh hầm xương, nồi nấu nước dùng phở, nồi nhúng bánh dung tích 20L - 150L siêu tiết kiệm điện.',
                'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop&q=80',
                'sort_order' => 3,
            ],
            [
                'name' => 'Máy Chế Biến Thực Phẩm',
                'slug' => 'may-che-bien-thuc-pham',
                'icon' => 'cog',
                'description' => 'Máy thái thịt tươi/đông lạnh, máy xay giò chả, máy cưa xương, máy đùn xúc xích công suất lớn.',
                'image' => 'https://images.unsplash.com/photo-1590794056226-79ef3a8147e1?w=600&auto=format&fit=crop&q=80',
                'sort_order' => 4,
            ],
            [
                'name' => 'Bếp Á & Bếp Âu Nhà Hàng',
                'slug' => 'bep-a-bep-au',
                'icon' => 'kitchen',
                'description' => 'Bếp xào kiềng gang quạt thổi, bếp hầm thấp, bếp chiên nhúng, bếp âu 4 họng - 6 họng lửa tiêu chuẩn.',
                'image' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=600&auto=format&fit=crop&q=80',
                'sort_order' => 5,
            ],
            [
                'name' => 'Thiết Bị Inox Nhà Bếp Khác',
                'slug' => 'thiet-bi-inox-khac',
                'icon' => 'cube',
                'description' => 'Chậu rửa inox công nghiệp, bàn sơ chế, giá kệ 4 tầng, tum hút mùi, bẫy mỡ gia công theo kích thước.',
                'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&auto=format&fit=crop&q=80',
                'sort_order' => 6,
            ],
        ];

        $catMap = [];
        foreach ($categories as $catData) {
            $cat = Category::updateOrCreate(['slug' => $catData['slug']], $catData);
            $catMap[$cat->slug] = $cat->id;
        }

        $products = [
            [
                'category_id' => $catMap['lo-nuong-banh'],
                'name' => 'Lò Nướng Bánh Đối Lưu 5 Khay Southstar Có Phun Sương Tự Động',
                'slug' => 'lo-nuong-doi-luu-5-khay-southstar',
                'sku' => 'BL-LN5K-SS',
                'price' => 38500000,
                'price_label' => '38.500.000 đ',
                'original_price' => 44000000,
                'discount_percent' => 12,
                'badge' => 'Ưu Đãi 12%',
                'thumbnail' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1584269600464-37b1b58a9fe7?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Lò nướng đối lưu 5 khay chuyên nướng bánh mì baguette, bánh ngọt, bánh trung thu chuẩn màu vàng ruộm. Hệ thống quạt gió đối lưu tuần hoàn cùng vòi phun sương tự động giữ ẩm tối ưu.',
                'description' => '<p><strong>Lò nướng bánh đối lưu 5 khay Southstar</strong> do Công ty TNHH Bếp Inox Bảo Linh nhập khẩu và phân phối trực tiếp là sự lựa chọn hàng đầu cho các cơ sở sản xuất bánh mì, bánh ngọt chuyên nghiệp.</p>
<h3>Đặc điểm nổi bật:</h3>
<ul>
<li><strong>Công nghệ nhiệt đối lưu 3D:</strong> Quạt gió công suất cao thổi luồng khí nóng tuần hoàn 360 độ giúp nhiệt độ phân bổ đều mọi góc cạnh trong khoang lò, bánh nở đều, vỏ giòn xốp và màu sắc bắt mắt.</li>
<li><strong>Hệ thống phun sương tự động:</strong> Giữ độ ẩm thích hợp cho bột bánh, tránh tình trạng nứt mặt hoặc cháy cạnh khi nướng ở nhiệt độ cao.</li>
<li><strong>Vỏ Inox 304 dày dặn:</strong> Chống oxy hóa tuyệt đối, dễ dàng vệ sinh, cách nhiệt bông gốm Ceramic dày 80mm chống nóng vỏ ngoài.</li>
<li><strong>Cửa kính cường lực 2 lớp:</strong> Dễ quan sát toàn bộ quá trình bánh chín kèm đèn chiếu sáng khoang lò chịu nhiệt.</li>
</ul>',
                'specifications' => [
                    'Thương hiệu' => 'Southstar (Bảo Linh phân phối & bảo hành)',
                    'Model / Mã sản phẩm' => 'BL-LN5K-SS',
                    'Nguồn điện' => '380V / 50Hz (3 pha) hoặc 220V',
                    'Công suất điện' => '7.5 kW',
                    'Số lượng khay' => '5 khay (Kích thước 400 x 600 mm)',
                    'Dải nhiệt độ' => '35°C - 300°C',
                    'Chức năng phun ẩm' => 'Tự động hẹn giờ kỹ thuật số',
                    'Chất liệu' => 'Inox 304 xước mờ cao cấp',
                    'Trọng lượng máy' => '165 kg',
                    'Kích thước máy' => '900 x 1250 x 950 mm',
                    'Bảo hành' => '12 tháng chính hãng tại nơi lắp đặt',
                ],
                'warranty_months' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['tu-nau-com-cong-nghiep'],
                'name' => 'Tủ Nấu Cơm Công Nghiệp 12 Khay Điện Liền Nồi Hơi Inox 304',
                'slug' => 'tu-nau-com-cong-nghiep-12-khay-dien',
                'sku' => 'BL-TC12K-E',
                'price' => 12500000,
                'price_label' => '12.500.000 đ',
                'original_price' => 14500000,
                'discount_percent' => 14,
                'badge' => 'Bán Chạy Nhất',
                'thumbnail' => 'https://images.unsplash.com/photo-1584269600464-37b1b58a9fe7?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1584269600464-37b1b58a9fe7?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Tủ nấu cơm 12 khay công suất nấu 35 - 45 kg gạo/mẻ chỉ trong 45 - 55 phút. Toàn bộ thân vỏ gia công từ Inox 304 dày 1.2mm, foam bảo ôn giữ nhiệt đa lớp.',
                'description' => '<p><strong>Tủ nấu cơm công nghiệp 12 khay dùng điện</strong> là thiết bị không thể thiếu trong các bếp ăn công ty, trường học, bệnh viện, doanh trại quân đội và nhà hàng tiệc cưới.</p>
<h3>Ưu điểm vượt trội:</h3>
<ul>
<li><strong>Nấu cơm chín dẻo không khê cháy:</strong> Cơ chế làm chín gạo bằng hơi nước áp suất giúp hạt cơm nở đều, tơi xốp, giữ trọn vẹn dinh dưỡng và không hao hụt đáy nồi.</li>
<li><strong>Đa năng:</strong> Ngoài nấu cơm, tủ còn dùng để hấp giò chả (50 - 60kg/mẻ), hấp gà vịt, hải sản, bánh bao, xúc xích, caramen...</li>
<li><strong>Phao cấp nước tự động:</strong> Kiểm soát mực nước liên tục, tự động bơm nước khi vơi và ngắt chống tràn, chống cháy thanh nhiệt khi cạn nước.</li>
<li><strong>Van xả áp an toàn:</strong> Tự động cân bằng áp suất khoang tủ khi hơi nước tăng cao, đảm bảo an toàn tuyệt đối cho người vận hành.</li>
</ul>',
                'specifications' => [
                    'Thương hiệu' => 'Bếp Inox Bảo Linh',
                    'Mã sản phẩm' => 'BL-TC12K-E',
                    'Năng suất' => '35 - 45 kg gạo / mẻ (khoảng 200 - 300 suất ăn)',
                    'Thời gian nấu chín' => '45 - 55 phút',
                    'Số lượng khay' => '12 khay phẳng hoặc khay đục lỗ Inox 304',
                    'Điện áp sử dụng' => '220V/50Hz hoặc 380V/50Hz',
                    'Công suất điện' => '12 kW (3 thanh nhiệt 4kW độc lập)',
                    'Chất liệu thân vỏ' => 'Inox 304 Posco chuẩn 100% dày 1.2mm',
                    'Lớp cách nhiệt' => 'Foam Polyurethane mật độ cao dày 35mm',
                    'Kích thước ngoài' => '710 x 660 x 1600 mm',
                    'Trọng lượng' => '85 kg',
                ],
                'warranty_months' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['noi-nau-pho-inox-dien'],
                'name' => 'Bộ 3 Nồi Nấu Phở Điện Liền Bệ Inox 304 Cao Cấp (20L - 50L - 80L)',
                'slug' => 'bo-3-noi-nau-pho-dien-lien-be-inox-304',
                'sku' => 'BL-NP-SET3',
                'price' => 16800000,
                'price_label' => '16.800.000 đ',
                'original_price' => 19500000,
                'discount_percent' => 15,
                'badge' => 'Combo Tiết Kiệm',
                'thumbnail' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Bộ 3 nồi nấu phở điện gồm nồi nhúng bánh 20L, nồi nấu nước dùng 50L và nồi hầm xương 80L liền bệ bánh xe di chuyển tiện lợi. Inox 304 dập liền khối dày 1.2mm.',
                'description' => '<p><strong>Bộ 3 nồi nấu phở điện Bảo Linh</strong> là giải pháp trọn gói hoàn hảo cho mọi quán bún, phở, hủ tiếu từ nhỏ đến lớn. Thay thế hoàn toàn bếp than tổ ong độc hại, đảm bảo vệ sinh an toàn thực phẩm.</p>
<h3>Cấu hình bộ nồi:</h3>
<ul>
<li><strong>Nồi nhúng bánh phở 20L (3 kW):</strong> Dùng để trần bánh phở, bún, nhúng thịt bò tái, rau sống nhanh chóng.</li>
<li><strong>Nồi nấu nước dùng 50L (4 kW):</strong> Giữ nước dùng luôn sôi liu riu ở 90 - 95°C thơm ngon, trong vắt.</li>
<li><strong>Nồi hầm xương 80L (6 kW):</strong> Đi kèm sọt xương inox lỗ nhỏ, ninh nhừ xương lấy nước ngọt đậm đà mà không lo vụn xương.</li>
<li><strong>Bệ đỡ inox có bánh xe:</strong> Khung hộp inox chịu tải trọng trên 400kg, bánh xe có khóa chốt cố định linh hoạt.</li>
</ul>',
                'specifications' => [
                    'Sản xuất bởi' => 'Công ty TNHH Bếp Inox Bảo Linh',
                    'Mã combo' => 'BL-NP-SET3',
                    'Bộ gồm' => 'Nồi nhúng 20L + Nồi nước dùng 50L + Nồi hầm xương 80L',
                    'Vật liệu' => 'Inox 304 cao cấp 2 lớp cách nhiệt',
                    'Thanh nhiệt' => 'Thanh nhiệt inox chữ U hoặc mâm nhiệt siêu bền',
                    'Điều khiển nhiệt độ' => 'Rơ-le chiết áp điều chỉnh nhiệt từ 30°C - 110°C riêng biệt',
                    'An toàn điện' => 'Trang bị Aptomat chống rò rỉ điện tự ngắt 100%',
                    'Van xả đáy' => 'Van đồng tay gạt xả kiệt cặn vệ sinh dễ dàng',
                    'Phụ kiện tặng kèm' => 'Giỏ chứa xương 80L, nắp bán nguyệt gập tiện lợi',
                ],
                'warranty_months' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['may-che-bien-thuc-pham'],
                'name' => 'Máy Thái Thịt Tươi Sống Đa Năng QX-250 (Thay Được Bộ Dao)',
                'slug' => 'may-thai-thit-tuoi-song-qx-250',
                'sku' => 'BL-QX250',
                'price' => 8900000,
                'price_label' => '8.900.000 đ',
                'original_price' => 9800000,
                'discount_percent' => 9,
                'badge' => 'Mới 2026',
                'thumbnail' => 'https://images.unsplash.com/photo-1590794056226-79ef3a8147e1?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1590794056226-79ef3a8147e1?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Máy thái thịt bò, thịt heo tươi sống chuyên dụng cho quán lẩu nướng, quán phở. Bộ dao tháo rời vệ sinh siêu nhanh trong 2 phút, thái lát mỏng đều tăm tắp.',
                'description' => '<p><strong>Máy thái thịt tươi sống QX-250</strong> là dòng máy thái thịt cải tiến thế hệ mới nhất, khắc phục nhược điểm khó vệ sinh của các dòng máy dao cố định truyền thống.</p>
<h3>Đặc điểm nổi bật:</h3>
<ul>
<li>Tháo lắp bộ lưỡi dao chỉ với 1 chốt khóa xoay, rửa sạch dưới vòi nước cực kỳ tiện lợi.</li>
<li>Động cơ dây đồng 100% công suất 750W hoạt động êm ái, thái liên tục hàng trăm kg thịt mỗi ngày.</li>
<li>Nhiều cỡ dao tùy chọn: 2.0mm (thịt bò nhúng phở), 2.5mm (xào), 3.5mm (lẩu nướng), 5.0mm (kho, nướng tảng).</li>
</ul>',
                'specifications' => [
                    'Model' => 'BL-QX250',
                    'Động cơ' => '750W (Mô tơ dây đồng 100%)',
                    'Điện áp' => '220V / 50Hz',
                    'Năng suất cắt' => '150 - 200 kg thịt / giờ',
                    'Độ dày lát cắt' => 'Tùy chọn bộ dao 2.0mm / 2.5mm / 3.5mm / 5.0mm',
                    'Kích thước' => '520 x 380 x 510 mm',
                    'Trọng lượng' => '33 kg',
                    'Chất liệu' => 'Inox 304 và hợp kim nhôm đúc',
                ],
                'warranty_months' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['bep-a-bep-au'],
                'name' => 'Bếp Á 2 Họng Kiềng Gang Quạt Thổi Có Bầu Nước Inox 304',
                'slug' => 'bep-a-2-hong-kieng-gang-quat-thoi',
                'sku' => 'BL-BA2H-QT',
                'price' => 15200000,
                'price_label' => '15.200.000 đ',
                'original_price' => 17000000,
                'discount_percent' => 11,
                'badge' => 'Chuẩn Nhà Hàng',
                'thumbnail' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Bếp xào nhà hàng công suất ngọn lửa xanh cực mạnh nhờ quạt thổi khí nén. Tích hợp vòi cấp nước gạt xoay trên mặt bếp và rãnh xả cặn mỡ tiện lợi.',
                'description' => '<p>Bếp Á 2 họng quạt thổi do <strong>Bảo Linh</strong> sản xuất theo tiêu chuẩn nhà hàng khách sạn cao cấp, giúp các đầu bếp thực hiện các món xào chảo gang rực lửa thơm lừng mùi khói đặc trưng (Wok Hei).</p>',
                'specifications' => [
                    'Kích thước' => '1500 x 800 x 800/1150 mm (Có thành chắn sau)',
                    'Số họng đốt' => '2 họng xào kiềng gang đúc chịu nhiệt',
                    'Quạt thổi công nghiệp' => '2 quạt 120W độc lập thổi ngọn lửa xanh bốc cao',
                    'Hệ thống nước' => '1 vòi nước lạnh xoay 360 độ + rãnh thoát nước mặt bàn',
                    'Nhiên liệu' => 'Gas công nghiệp áp thấp (Van gas công nghiệp)',
                    'Chất liệu' => 'Inox 304 dày 1.2mm dập chấn CNC sắc nét',
                ],
                'warranty_months' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['thiet-bi-inox-khac'],
                'name' => 'Chậu Rửa Inox 304 Công Nghiệp 3 Hố Có Bàn Chờ Kích Thước 1m8',
                'slug' => 'chau-rua-inox-304-cong-nghiep-3-ho-1m8',
                'sku' => 'BL-CR3H-180',
                'price' => 7200000,
                'price_label' => '7.200.000 đ',
                'original_price' => 8000000,
                'discount_percent' => 10,
                'badge' => 'Gia Công Xưởng',
                'thumbnail' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Chậu rửa inox 3 hố sâu 300mm chống bắn nước, tích hợp bàn chờ để ráo nước bát đĩa thực phẩm. Chân tăng chỉnh độ cao, xi phông xả chống mùi hôi.',
                'description' => '<p>Chậu rửa inox công nghiệp gia công trực tiếp tại xưởng Bảo Linh bằng Inox Posco 304 cao cấp, mối hàn khí Argon sáng bóng chống oxy hóa tuyệt đối.</p>',
                'specifications' => [
                    'Kích thước tổng thể' => '1800 x 750 x 800/950 mm',
                    'Kích thước mỗi hố' => '500 x 500 x 300 mm',
                    'Chất liệu' => 'Inox 304 Posco chuẩn dày 1.2mm',
                    'Chân hộp' => 'Hộp 40x40mm có giằng chân và tăng đơ cân bằng',
                    'Phụ kiện' => '3 bộ vòi rửa inox + 3 xi phông rọ rác chống tắc',
                ],
                'warranty_months' => 12,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['lo-nuong-banh'],
                'name' => 'Lò Nướng Pizza Chuyên Dụng 2 Tầng 4 Khay Mặt Đá Giữ Nhiệt',
                'slug' => 'lo-nuong-pizza-2-tang-4-khay-mat-da',
                'sku' => 'BL-PZ2T4K',
                'price' => 29500000,
                'price_label' => '29.500.000 đ',
                'original_price' => 33000000,
                'discount_percent' => 11,
                'badge' => 'Chuyên Pizza & Bánh Mì',
                'thumbnail' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Lò nướng pizza chuyên nghiệp với mặt sàn đá giữ nhiệt nướng bánh phồng xốp, giòn tan đế chỉ trong 3 - 5 phút. Điều khiển nhiệt độ trên dưới độc lập lên tới 400°C.',
                'description' => '<p>Dòng lò nướng cao cấp chuyên phục vụ chuỗi nhà hàng Pizza Ý, bánh mì thủ công với khả năng gia nhiệt cực nhanh và giữ nhiệt bền bỉ nhờ phiến đá nướng nguyên khối.</p>',
                'specifications' => [
                    'Kích thước lò' => '1220 x 860 x 1230 mm',
                    'Nhiệt độ tối đa' => '400°C',
                    'Điện áp' => '380V / 3 pha / 13.6 kW',
                    'Quy cách khay' => '2 tầng nướng được 4 khay 40x60cm hoặc 8 bánh pizza phi 30cm',
                    'Chất liệu sàn nướng' => 'Đá giữ nhiệt Cordierite chịu nhiệt độ sốc',
                ],
                'warranty_months' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'category_id' => $catMap['may-che-bien-thuc-pham'],
                'name' => 'Máy Cưa Xương Bò, Cắt Thịt Đông Lạnh Inox W210',
                'slug' => 'may-cua-xuong-bo-cat-thit-dong-lanh-w210',
                'sku' => 'BL-CX210',
                'price' => null,
                'price_label' => 'Liên hệ báo giá',
                'original_price' => null,
                'discount_percent' => null,
                'badge' => 'Hàng Dự Án',
                'thumbnail' => 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=800&auto=format&fit=crop&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1574484284002-952d92456975?w=800&auto=format&fit=crop&q=80',
                ],
                'short_description' => 'Máy cưa xương giò heo, sườn bò, cá hồi đông lạnh công nghiệp. Lưỡi cưa Thụy Điển siêu mỏng hạn chế vụn nát, bàn đẩy có thước cữ canh chỉnh độ dày chính xác.',
                'description' => '<p>Thiết bị trợ lực đắc lực cho các lò mổ, siêu thị thực phẩm tươi sống và bếp ăn công nghiệp. Cưa đứt ngọt các khúc xương ống bò cứng chỉ trong 1 giây.</p>',
                'specifications' => [
                    'Động cơ' => '1100W (1.1 kW)',
                    'Điện áp' => '220V / 50Hz',
                    'Chiều dài lưỡi cưa' => '1650 mm (Thép tôi Thụy Điển)',
                    'Độ dày lát cắt' => '4 - 180 mm',
                    'Kích thước bàn cưa' => '500 x 380 mm',
                    'Trọng lượng' => '45 kg',
                ],
                'warranty_months' => 12,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($products as $pData) {
            Product::updateOrCreate(['slug' => $pData['slug']], $pData);
        }
    }
}
