@extends('layouts.app')

@section('title', 'Xưởng Sản Xuất & Showroom Trưng Bày - Bếp Inox Bảo Linh')
@section('meta_description', 'Khám phá quy trình gia công xưởng inox và showroom trưng bày thiết bị bếp công nghiệp tại Số 15, Ngõ 419 Đường Lĩnh Nam, Phường Vĩnh Hưng, Hà Nội.')

@section('content')

<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Xưởng sản xuất & Showroom</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- Header -->
        <div class="border-b-2 border-[#e11b22] pb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-[#e11b22]">Năng Lực Cơ Khí & Gia Công</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase mt-1">
                HỆ THỐNG XƯỞNG SẢN XUẤT & SHOWROOM TRƯNG BÀY
            </h1>
        </div>

        <!-- Address & Welcome -->
        <div class="p-6 bg-slate-50 rounded-xl border border-slate-200 space-y-3">
            <h2 class="text-base font-bold text-slate-900 uppercase">
                Địa Chỉ Showroom & Nhà Xưởng Trực Tiếp
            </h2>
            <div class="text-xs sm:text-sm text-slate-700 space-y-1.5 leading-relaxed">
                <p>• <strong>Địa chỉ xưởng:</strong> Số 15, Ngõ 419 Đường Lĩnh Nam, Phường Vĩnh Hưng, Hà Nội, Việt Nam.</p>
                <p>• <strong>Thời gian mở cửa:</strong> 7:30 - 20:30 (Thứ 2 đến Chủ Nhật, phục vụ kể cả ngày lễ).</p>
                <p>• <strong>Hotline đặt lịch xem máy:</strong> <a href="tel:0988666888" class="text-[#e11b22] font-black">0988.666.888</a></p>
                <p>• <strong>Chính sách chạy thử:</strong> Quý khách hàng có thể mang trực tiếp nguyên liệu thực phẩm (thịt, bột bánh, gạo...) đến xưởng để chạy thử máy thực tế trước khi quyết định mua hàng.</p>
            </div>
        </div>

        <!-- Machinery & Technology -->
        <div class="space-y-4">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                Trang Thiết Bị Máy Móc Hiện Đại Tại Xưởng
            </h2>
            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                Nhà xưởng Bảo Linh được trang bị đồng bộ các thiết bị gia công cơ khí chính xác thế hệ mới nhất, đáp ứng các tiêu chuẩn khắt khe về độ thẩm mỹ và độ bền cơ lý tính:
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm text-slate-700">
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">Máy cắt Laser sợi quang Fiber CNC</strong>
                    Cắt phôi inox chuẩn xác theo bản vẽ thiết kế 2D/3D, không để lại ba-vớ, mép cắt nhẵn mịn không xước rách.
                </div>
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">Máy chấn gấp thủy lực CNC 150 tấn</strong>
                    Chấn góc cạnh tủ cơm, nồi phở, chậu rửa vuông vắn, hạn chế tối đa các đường ghép nối kim loại, tạo độ cứng vững gấp 2 lần.
                </div>
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">Hệ thống máy hàn khí Argon (TIG)</strong>
                    Công nghệ hàn bảo vệ bằng khí trơ Argon giúp mối hàn ngấu sâu, sáng bóng, không oxy hóa và không rỉ sét dưới tác động của nhiệt độ và muối mặn.
                </div>
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">Máy đánh bóng & xử lý xước Hairline</strong>
                    Bề mặt tấm inox được đánh xước mờ cao cấp, chống bám dính vân tay, dễ lau chùi dầu mỡ và chống trầy xước trong quá trình nấu nướng.
                </div>
            </div>
        </div>

        <!-- 4-Step Quality Control Process -->
        <div class="space-y-4">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                Quy Trình Kiểm Tra Chất Lượng (QC) Trước Khi Bàn Giao
            </h2>
            <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg">
                    <strong class="text-slate-900 block mb-0.5">Bước 1: Kiểm định phôi thép Inox Posco 304</strong>
                    Kiểm tra độ dày thực tế và thử quang phổ kim loại đảm bảo thành phần Niken trên 8%, tuyệt đối không sử dụng inox 201 hoặc inox pha tạp.
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg">
                    <strong class="text-slate-900 block mb-0.5">Bước 2: Lắp ráp cơ khí và cách nhiệt</strong>
                    Đổ foam bảo ôn cách nhiệt mật độ cao Polyurethane cho tủ nấu cơm và bông gốm Ceramic cho lò nướng, đảm bảo giữ nhiệt tối đa.
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg">
                    <strong class="text-slate-900 block mb-0.5">Bước 3: Đấu nối điện & an toàn chống giật</strong>
                    Lắp ráp hệ thống cảm biến nhiệt, đồng hồ điện tử và aptomat chống giật tự động ngắt điện 100% khi có sự cố chập rò rỉ.
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg">
                    <strong class="text-slate-900 block mb-0.5">Bước 4: Chạy thử không tải và có tải liên tục 24h</strong>
                    Kiểm tra độ êm của động cơ, độ ổn định nhiệt độ khoang nướng và kiểm tra áp suất hơi trước khi dán tem niêm phong xuất xưởng.
                </div>
            </div>
        </div>

        <!-- Bottom Action -->
        <div class="p-6 bg-slate-100 rounded-xl border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <strong class="text-slate-900 text-sm block">Bạn muốn đến xem trực tiếp xưởng sản xuất tại Hà Nội?</strong>
                <span class="text-xs text-slate-600">Địa chỉ: Số 15, Ngõ 419 Lĩnh Nam, Phường Vĩnh Hưng, Hà Nội</span>
            </div>
            <a href="tel:0988666888" class="px-5 py-2.5 bg-[#e11b22] text-white font-bold text-xs uppercase rounded-lg hover:bg-[#c6151c] transition-colors shrink-0">
                Gọi Đặt Hẹn Xem Xưởng: 0988.666.888
            </a>
        </div>

    </div>
</div>

@endsection
