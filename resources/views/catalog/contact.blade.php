@extends('layouts.app')

@section('title', 'Liên Hệ - Công Ty TNHH Bếp Inox Bảo Linh')
@section('meta_description', 'Thông tin liên hệ, hotline, email và địa chỉ nhà xưởng Bếp Inox Bảo Linh tại Số 15, Ngõ 419 Đường Lĩnh Nam, Phường Vĩnh Hưng, Hà Nội.')

@section('content')

<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Liên hệ & Hỗ trợ</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- Header -->
        <div class="border-b-2 border-[#e11b22] pb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-[#e11b22]">Hỗ Trợ 24/7</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase mt-1">
                LIÊN HỆ BẾP INOX BẢO LINH
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left 6 Cols: Thông tin liên hệ -->
            <div class="lg:col-span-6 space-y-4">
                <div class="p-6 bg-slate-50 rounded-xl border border-slate-200 space-y-3 text-xs sm:text-sm text-slate-700 leading-relaxed">
                    <h2 class="text-base font-bold text-slate-900 uppercase">
                        CÔNG TY TNHH BẾP INOX BẢO LINH
                    </h2>

                    <p>• <strong>Địa chỉ xưởng & Showroom:</strong> Số 15, Ngõ 419 Đường Lĩnh Nam, Phường Vĩnh Hưng, Hà Nội, Việt Nam.</p>
                    <p>• <strong>Mã số thuế:</strong> <span class="font-mono font-bold text-slate-900">0111524104</span></p>
                    <p>• <strong>Đại diện pháp luật:</strong> Ông Phạm Anh Ngọc (Giám đốc)</p>
                    <p>• <strong>Hotline tư vấn báo giá:</strong> <a href="tel:0988666888" class="text-[#e11b22] font-black text-base">0988.666.888</a></p>
                    <p>• <strong>Kỹ thuật & bảo hành:</strong> <a href="tel:0988666888" class="text-[#e11b22] font-bold">0988.666.888</a></p>
                    <p>• <strong>Email liên hệ:</strong> <a href="mailto:bepbaolinh38@gmail.com" class="text-slate-900 font-semibold hover:underline">bepbaolinh38@gmail.com</a></p>
                    <p>• <strong>Giờ làm việc:</strong> 7:30 - 20:30 (Thứ 2 - Chủ Nhật, phục vụ kể cả ngày lễ)</p>
                    
                    <div class="pt-2 border-t border-slate-200">
                        <span class="font-bold text-slate-800 block mb-1">Tài khoản thanh toán doanh nghiệp:</span>
                        <p class="font-mono text-slate-900">Ngân hàng Quân Đội (MB Bank) - STK: <strong class="text-[#e11b22]">7338666888</strong></p>
                        <p class="text-[11px] text-slate-500">Chủ tài khoản: CÔNG TY TNHH BẾP INOX BẢO LINH</p>
                    </div>
                </div>

                <!-- Google Maps Direction note -->
                <div class="p-4 bg-red-50 rounded-xl border border-red-200 text-xs text-slate-700 space-y-1">
                    <strong class="text-[#e11b22] uppercase block">Chỉ đường đến xưởng:</strong>
                    <p>Đi từ cầu Mai Động hoặc Vành đai 3 vào đường Lĩnh Nam, rẽ vào ngõ 419 (ngõ rộng ô tô tải vào tận xưởng), đi thẳng 50m đến số nhà 15.</p>
                </div>
            </div>

            <!-- Right 6 Cols: Kênh liên hệ trực tiếp qua Hotline & Zalo -->
            <div class="lg:col-span-6 space-y-4">
                
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-5">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-[#e11b22]">Tư Vấn Nhanh 24/7</span>
                        <h2 class="text-lg font-black text-slate-900 uppercase mt-0.5">
                            KẾT NỐI TRỰC TIẾP VỚI CHUYÊN VIÊN
                        </h2>
                        <p class="text-xs text-slate-600 mt-1">
                            Để nhận báo giá xưởng ưu đãi nhất, tư vấn công suất máy chuẩn xác và hỗ trợ khảo sát mặt bằng, quý khách vui lòng liên hệ trực tiếp qua Hotline hoặc Zalo:
                        </p>
                    </div>

                    <!-- Hotline Card -->
                    <div class="p-5 rounded-xl border-2 border-red-200 bg-red-50/60 flex flex-col justify-between space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-11 h-11 rounded-full bg-[#e11b22] text-white flex items-center justify-center shrink-0 shadow">
                                <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-slate-600 block">Hotline Kỹ Thuật & Báo Giá:</span>
                                <span class="text-xl sm:text-2xl font-black text-[#e11b22]">0988.666.888</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-600">
                            Hỗ trợ giải đáp thông số kỹ thuật, hướng dẫn điện 3 pha / 1 pha và tư vấn chọn model phù hợp ngân sách.
                        </p>
                        <a href="tel:0988666888" 
                           class="w-full py-3 px-4 bg-[#e11b22] hover:bg-[#c6151c] text-white font-bold text-xs sm:text-sm uppercase rounded-lg transition-colors shadow text-center flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>BẤM ĐỂ GỌI HOTLINE NGAY</span>
                        </a>
                    </div>

                    <!-- Zalo Card -->
                    <div class="p-5 rounded-xl border-2 border-blue-200 bg-blue-50/60 flex flex-col justify-between space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-11 h-11 rounded-full bg-[#0068ff] text-white flex items-center justify-center shrink-0 shadow">
                                <svg class="w-7 h-7" viewBox="0 0 48 48" fill="none">
                                    <path d="M24 4C12.954 4 4 12.06 4 22c0 5.485 2.76 10.377 7.152 13.784L9.2 43.1a1 1 0 001.448 1.118l8.36-4.524C20.62 40.16 22.28 40.4 24 40.4c11.046 0 20-8.06 20-18.4S35.046 4 24 4z" fill="#0068FF"/>
                                    <path d="M16 18h16v3l-10 10h10v3H16v-3l10-10H16v-3z" fill="#fff"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-slate-600 block">Chat Tư Vấn Qua Zalo:</span>
                                <span class="text-xl sm:text-2xl font-black text-[#0068ff]">0988.666.888</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-600">
                            Gửi hình ảnh mặt bằng, nhận video vận hành thực tế và trao đổi bảng báo giá chi tiết trực tiếp qua Zalo.
                        </p>
                        <a href="https://zalo.me/0988666888" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full py-3 px-4 bg-[#0068ff] hover:bg-blue-700 text-white font-bold text-xs sm:text-sm uppercase rounded-lg transition-colors shadow text-center flex items-center justify-center space-x-2">
                            <span>NHẮN TIN QUA ZALO NGAY</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                    <!-- Commitment Banner -->
                    <div class="p-3.5 bg-slate-100 rounded-lg text-slate-600 text-xs flex items-center space-x-2.5">
                        <span class="text-emerald-600 font-bold text-base">✓</span>
                        <span>Đội ngũ kỹ thuật Bảo Linh cam kết phản hồi và hỗ trợ quý khách trong vòng 5 - 10 phút.</span>
                    </div>

                    <!-- Quote Modal Trigger Option -->
                    <div class="pt-2 border-t border-slate-200 text-center">
                        <span class="text-xs text-slate-500 block mb-2">Quý khách cần gửi yêu cầu báo giá hoặc tư vấn khảo sát mặt bằng?</span>
                        <button type="button" 
                                onclick="openQuoteModal('', 'Yêu cầu từ trang Liên hệ')"
                                class="w-full py-2.5 px-4 rounded-xl border-2 border-slate-800 text-slate-800 hover:bg-slate-900 hover:text-white font-bold text-xs uppercase tracking-wider transition-colors inline-flex items-center justify-center space-x-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>ĐIỀN FORM YÊU CẦU BÁO GIÁ NHANH</span>
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
