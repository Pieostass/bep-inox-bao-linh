@extends('layouts.app')

@section('title', 'Chính Sách Bảo Hành & Dịch Vụ - Bếp Inox Bảo Linh')
@section('meta_description', 'Chi tiết chính sách bảo hành 12 tháng tận nơi, đổi trả 7 ngày, vận chuyển lắp đặt và thanh toán của Công ty TNHH Bếp Inox Bảo Linh.')

@section('content')

<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Chính sách & Quy định</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- Header -->
        <div class="border-b-2 border-[#e11b22] pb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-[#e11b22]">Quyền Lợi Khách Hàng</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase mt-1">
                CHÍNH SÁCH BẢO HÀNH, VẬN CHUYỂN & THANH TOÁN
            </h1>
        </div>

        <!-- 1. Chính sách bảo hành -->
        <div class="space-y-3">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                1. Chính Sách Bảo Hành 12 Tháng Chính Hãng
            </h2>
            <div class="text-xs sm:text-sm text-slate-700 space-y-2 leading-relaxed">
                <p>• <strong>Thời hạn bảo hành:</strong> Toàn bộ sản phẩm do Bảo Linh sản xuất và phân phối (Lò nướng bánh, tủ nấu cơm, nồi nấu phở điện, máy thái thịt, máy cưa xương, bếp Á - Âu...) được bảo hành chính hãng 12 tháng tính từ ngày bàn giao.</p>
                <p>• <strong>Phạm vi bảo hành:</strong> Miễn phí thay thế và sửa chữa đối với các lỗi kỹ thuật phần điện, hệ thống thanh nhiệt, động cơ motor, bảng điều khiển nhiệt độ và mối hàn cơ khí.</p>
                <p>• <strong>Thời gian xử lý:</strong> Đội ngũ kỹ thuật viên có mặt tại địa điểm khách hàng trong vòng 2 - 24 giờ tại Hà Nội và các tỉnh lân cận; đối với các tỉnh xa, chúng tôi gửi chuyển phát nhanh linh kiện thay thế kèm hướng dẫn video trực tiếp.</p>
                <p>• <strong>Bảo trì trọn đời:</strong> Sau khi hết thời hạn 12 tháng, Bảo Linh cam kết hỗ trợ bảo dưỡng, sửa chữa và cung cấp linh kiện chính hãng với giá gốc xuất xưởng cho khách hàng.</p>
            </div>
        </div>

        <!-- 2. Chính sách đổi trả -->
        <div class="space-y-3">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                2. Chính Sách Đổi Trả Hàng Trong 7 Ngày
            </h2>
            <div class="text-xs sm:text-sm text-slate-700 space-y-2 leading-relaxed">
                <p>• Áp dụng chính sách <strong>1 đổi 1 trong vòng 7 ngày đầu</strong> nếu máy phát sinh sự cố kỹ thuật nghiêm trọng do lỗi chế tạo hoặc lắp ráp mà bộ phận kỹ thuật không thể khắc phục được.</p>
                <p>• Yêu cầu sản phẩm đổi trả còn nguyên vẹn tem mác, đầy đủ phụ kiện bàn giao kèm theo và không bị biến dạng ngoại lực do va đập hoặc ngập nước ngoài ý muốn.</p>
            </div>
        </div>

        <!-- 3. Chính sách vận chuyển & Lắp đặt -->
        <div class="space-y-3">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                3. Chính Sách Vận Chuyển & Lắp Đặt Tận Nơi
            </h2>
            <div class="text-xs sm:text-sm text-slate-700 space-y-2 leading-relaxed">
                <p>• <strong>Khu vực Hà Nội:</strong> Miễn phí vận chuyển và cử kỹ thuật viên trực tiếp đến khảo sát, đấu nối nguồn điện, thử tải thực tế và hướng dẫn bàn giao chi tiết cho người sử dụng.</p>
                <p>• <strong>Các tỉnh thành toàn quốc:</strong> Bảo Linh hỗ trợ đóng kiện gỗ an toàn chống xước, vận chuyển máy ra bến xe, nhà xe hoặc chành xe tải uy tín theo địa chỉ nhận hàng của khách.</p>
            </div>
        </div>

        <!-- 4. Chính sách thanh toán -->
        <div class="space-y-3">
            <h2 class="text-lg font-bold text-slate-900 uppercase border-l-4 border-[#e11b22] pl-3">
                4. Hình Thức Thanh Toán Hợp Pháp
            </h2>
            <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-3 text-xs sm:text-sm text-slate-700">
                <p>Khách hàng có thể lựa chọn 2 hình thức thanh toán thuận tiện nhất:</p>
                <p>• <strong>Hình thức 1: Thanh toán tiền mặt</strong> khi nhận hàng, kiểm tra chạy thử máy đạt yêu cầu (áp dụng cho khu vực nội thành).</p>
                <p>• <strong>Hình thức 2: Chuyển khoản ngân hàng</strong> vào tài khoản doanh nghiệp chính thức của công ty:</p>
                
                <div class="bg-white p-4 rounded-lg border border-slate-300 space-y-1.5 font-mono">
                    <p><span class="text-slate-500 font-sans">Ngân hàng:</span> <strong>Ngân hàng Quân Đội (MB Bank)</strong></p>
                    <p><span class="text-slate-500 font-sans">Số tài khoản:</span> <strong class="text-[#e11b22] text-base">7338666888</strong></p>
                    <p><span class="text-slate-500 font-sans">Chủ tài khoản:</span> <strong>CÔNG TY TNHH BẾP INOX BẢO LINH</strong></p>
                    <p><span class="text-slate-500 font-sans">Cú pháp chuyển khoản:</span> [Tên khách hàng/Tên cơ sở] + [Số điện thoại]</p>
                </div>

                <p class="text-[11px] text-slate-500 italic">
                    * Lưu ý: Mọi giao dịch đặt cọc hoặc thanh toán tiền máy chỉ hợp lệ khi chuyển vào đúng số tài khoản doanh nghiệp của Công ty TNHH Bếp Inox Bảo Linh nêu trên.
                </p>
            </div>
        </div>

        <!-- Hotlines -->
        <div class="p-4 bg-red-50 rounded-xl border border-red-200 text-xs sm:text-sm text-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3">
            <span>Mọi thắc mắc về bảo hành hoặc sự cố kỹ thuật, vui lòng gọi đường dây nóng 24/7:</span>
            <a href="tel:0988666888" class="text-[#e11b22] font-black text-base hover:underline shrink-0">
                0988.666.888
            </a>
        </div>

    </div>
</div>

@endsection
