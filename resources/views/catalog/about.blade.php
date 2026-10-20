@extends('layouts.app')

@section('title', 'Giới Thiệu - Công Ty TNHH Bếp Inox Bảo Linh')
@section('meta_description', 'Giới thiệu về Công ty TNHH Bếp Inox Bảo Linh - Đơn vị hàng đầu chuyên thiết kế, sản xuất và phân phối thiết bị bếp công nghiệp, máy chế biến thực phẩm tại Hà Nội.')

@section('content')

<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Giới thiệu công ty</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- Header -->
        <div class="border-b-2 border-[#e11b22] pb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-[#e11b22]">Hồ Sơ Doanh Nghiệp</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase mt-1">
                GIỚI THIỆU CÔNG TY TNHH BẾP INOX BẢO LINH
            </h1>
        </div>

        <!-- Section 1: Tổng quan -->
        <div class="space-y-4 text-sm text-slate-700 leading-relaxed">
            <p>
                <strong>Công ty TNHH Bếp Inox Bảo Linh</strong> là đơn vị chuyên sâu trong lĩnh vực tư vấn thiết kế, sản xuất gia công cơ khí chính xác và phân phối trực tiếp các dòng thiết bị bếp công nghiệp, lò nướng bánh, tủ nấu cơm, nồi nấu phở bằng điện và máy chế biến thực phẩm tại Việt Nam.
            </p>
            <p>
                Với hệ thống nhà xưởng sản xuất đặt tại Lĩnh Nam - Hoàng Mai / Vĩnh Hưng, Hà Nội, Bảo Linh tự hào là đối tác tin cậy cung cấp giải pháp thiết bị toàn diện cho hơn 5.000+ nhà hàng, khách sạn, trường học, bệnh viện, bếp ăn tập thể và chuỗi cơ sở ẩm thực trên toàn quốc.
            </p>
        </div>

        <!-- Section 2: Pháp lý doanh nghiệp -->
        <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 space-y-3">
            <h2 class="text-base font-bold text-slate-900 uppercase">
                Thông Tin Pháp Lý Doanh Nghiệp
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm">
                <div>
                    <span class="text-slate-500 block">Tên doanh nghiệp:</span>
                    <strong class="text-slate-900 uppercase">CÔNG TY TNHH BẾP INOX BẢO LINH</strong>
                </div>
                <div>
                    <span class="text-slate-500 block">Mã số thuế:</span>
                    <strong class="font-mono text-slate-900">0111524104</strong> (Sở KH&ĐT TP. Hà Nội cấp)
                </div>
                <div>
                    <span class="text-slate-500 block">Đại diện pháp luật:</span>
                    <strong class="text-slate-900">Ông Phạm Anh Ngọc</strong> (Chức vụ: Giám đốc)
                </div>
                <div>
                    <span class="text-slate-500 block">Địa chỉ trụ sở:</span>
                    <span class="text-slate-800">Số 15, Ngõ 419 Đường Lĩnh Nam, Phường Vĩnh Hưng, Hà Nội, Việt Nam</span>
                </div>
                <div>
                    <span class="text-slate-500 block">Tài khoản ngân hàng chính thức:</span>
                    <strong class="text-slate-900 font-mono text-[#e11b22]">STK: 7338666888</strong> tại Ngân hàng Quân Đội (MB Bank)
                </div>
                <div>
                    <span class="text-slate-500 block">Hotline kỹ thuật & tư vấn:</span>
                    <a href="tel:0988666888" class="text-[#e11b22] font-black">0988.666.888</a>
                </div>
            </div>
        </div>

        <!-- Section 3: Ngành nghề và sản phẩm kinh doanh -->
        <div class="space-y-4">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                Lĩnh Vực Hoạt Động & Ngành Hàng Chủ Lực
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm text-slate-700">
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">1. Lò Nướng Bánh & Máy Làm Bánh</strong>
                    Phân phối lò nướng bánh mì đối lưu 5 khay - 10 khay, lò nướng bánh tầng Southstar, lò nướng pizza mặt đá nhiệt độ 400°C, máy trộn bột và tủ ủ kích nở bột.
                </div>
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">2. Tủ Nấu Cơm & Tủ Hấp Công Nghiệp</strong>
                    Gia công tủ nấu cơm 4 khay, 6 khay, 8 khay, 12 khay đến 24 khay dùng điện hoặc gas, năng suất nấu 20kg - 100kg gạo/mẻ, giữ nhiệt 3 lớp Foam Polyurethane.
                </div>
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">3. Nồi Nấu Phở Bằng Điện Inox 304</strong>
                    Bộ 3 nồi phở liền bệ di động, nồi hầm xương 80L - 150L, nồi nước dùng 50L, nồi nhúng bánh 20L sử dụng mâm nhiệt hoặc thanh nhiệt chiết áp tiết kiệm 40% điện.
                </div>
                <div class="p-4 border border-slate-200 rounded-lg bg-white">
                    <strong class="text-slate-900 block text-sm mb-1">4. Máy Chế Biến Thực Phẩm & Inox Bếp</strong>
                    Máy thái thịt tươi sống mini, máy cắt thịt chín/đông lạnh, máy cưa xương bò, máy xay giò chả, bếp Á quạt thổi kiềng gang, chậu rửa công nghiệp 3 hố, bàn sơ chế và tum hút mùi.
                </div>
            </div>
        </div>

        <!-- Section 4: Cam kết chất lượng -->
        <div class="space-y-3">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                Cam Kết Của Bếp Inox Bảo Linh
            </h2>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
                <li>• <strong>Chất lượng inox chuẩn 100%:</strong> Toàn bộ khung vỏ gia công từ Inox 304 Posco nhập khẩu, không hoen gỉ, không phai màu, đạt tiêu chuẩn vệ sinh an toàn thực phẩm.</li>
                <li>• <strong>Giá bán tận xưởng sản xuất:</strong> Cắt giảm hoàn toàn các khâu trung gian thương mại, giúp chủ nhà hàng và bếp ăn tiết kiệm từ 20% đến 30% ngân sách đầu tư ban đầu.</li>
                <li>• <strong>Bảo hành chính hãng 12 tháng:</strong> Kỹ thuật viên Bảo Linh sẵn sàng có mặt tại cơ sở khách hàng để khắc phục sự cố, cung cấp linh kiện thay thế chính hãng trọn đời.</li>
                <li>• <strong>Khảo sát và tư vấn bản vẽ miễn phí:</strong> Cử kỹ sư khảo sát thực địa mặt bằng, tư vấn công suất điện 3 pha / 1 pha và lên sơ đồ bố trí bếp một chiều khoa học.</li>
            </ul>
        </div>

        <!-- Bottom Contact Callout -->
        <div class="p-6 bg-slate-100 rounded-xl border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <strong class="text-slate-900 text-sm block">Quý khách cần tư vấn lắp đặt thiết bị bếp hoặc mở quán mới?</strong>
                <span class="text-xs text-slate-600">Liên hệ trực tiếp với Giám đốc và đội ngũ kỹ thuật Bếp Inox Bảo Linh</span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="tel:0988666888" class="px-5 py-2.5 bg-[#e11b22] text-white font-bold text-xs uppercase rounded-lg hover:bg-[#c6151c] transition-colors">
                    Hotline: 0988.666.888
                </a>
                <button type="button" 
                        onclick="openQuoteModal('', 'Tư vấn lắp đặt bếp / mở quán mới')" 
                        class="px-5 py-2.5 bg-slate-900 text-white font-bold text-xs uppercase rounded-lg hover:bg-slate-800 transition-colors shadow">
                    Nhận Báo Giá Xuất Xưởng
                </button>
            </div>
        </div>

    </div>
</div>

@endsection
