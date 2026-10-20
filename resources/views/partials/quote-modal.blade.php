<!-- Quote Request Modal (Sạch đẹp, rõ ràng, không icon rườm rà) -->
<div id="quoteModal" 
     class="fixed inset-0 z-50 bg-slate-900/70 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-4">
    
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden animate-in fade-in zoom-in-95 duration-150">
        
        <!-- Modal Header: Đỏ đậm chuẩn nhận diện, chữ trắng rõ ràng 100% -->
        <div style="background-color: #e11b22;" class="px-6 py-4 text-white flex items-center justify-between">
            <div>
                <h3 class="font-black text-lg sm:text-xl uppercase tracking-wide text-white leading-tight">
                    YÊU CẦU BÁO GIÁ NHANH
                </h3>
                <p class="text-xs text-white/90 mt-0.5">
                    Bảo Linh cam kết phản hồi trong vòng 10 phút
                </p>
            </div>

            <button type="button" 
                    onclick="closeQuoteModal()" 
                    class="text-white hover:text-white/80 text-3xl font-light leading-none p-1 transition-colors"
                    title="Đóng cửa sổ">
                &times;
            </button>
        </div>

        <!-- Form Body Container -->
        <div id="quoteModalContent" class="p-6">
            
            <!-- Success Message State (hiện sau khi gửi) -->
            <div id="quoteSuccessState" class="hidden py-8 text-center space-y-4">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 mx-auto flex items-center justify-center text-3xl font-black">
                    ✓
                </div>
                <div class="space-y-1">
                    <h4 class="text-xl font-black text-slate-900 uppercase">Gửi Yêu Cầu Thành Công!</h4>
                    <p class="text-sm text-slate-600 max-w-sm mx-auto">
                        Cảm ơn bạn! Chuyên viên kỹ thuật Bếp Inox Bảo Linh đã tiếp nhận thông tin và sẽ gọi lại báo giá cho bạn trong vòng 10 phút.
                    </p>
                </div>
                <div class="pt-3 flex justify-center space-x-3">
                    <button type="button" 
                            onclick="closeQuoteModal()" 
                            class="px-6 py-2.5 bg-slate-800 text-white rounded-lg text-xs font-bold hover:bg-slate-900 transition-colors uppercase">
                        Đóng cửa sổ
                    </button>
                    <a href="https://zalo.me/0988666888" target="_blank" rel="noopener noreferrer" 
                       style="background-color: #0068ff;"
                       class="px-6 py-2.5 text-white rounded-lg text-xs font-bold hover:brightness-105 transition-colors uppercase">
                        Nhắn Zalo Ngay
                    </a>
                </div>
            </div>

            <!-- Form chính -->
            <form id="quoteForm" action="{{ route('catalog.quote') }}" method="POST" onsubmit="handleQuoteSubmit(event)" class="space-y-4">
                @csrf
                
                <input type="hidden" name="product_id" id="modalProductId" value="">
                <input type="hidden" name="product_name" id="modalProductName" value="">

                <!-- Khung hiển thị sản phẩm quan tâm (nếu có) -->
                <div id="modalProductDisplay" class="hidden p-3 bg-amber-50 border border-amber-300 rounded-lg text-xs text-slate-900 flex items-center justify-between">
                    <div>
                        <span class="font-bold text-slate-700">Sản phẩm quan tâm:</span> 
                        <strong id="modalProductDisplayText" class="text-[#e11b22] font-black"></strong>
                    </div>
                    <button type="button" onclick="clearModalProduct()" class="text-slate-500 hover:text-slate-800 text-base font-bold ml-2 leading-none">&times;</button>
                </div>

                <!-- 2 cột: Họ tên & Số điện thoại (KHÔNG icon bên trong) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">
                            Họ và tên của bạn <span class="text-[#e11b22] font-black">*</span>
                        </label>
                        <input type="text" 
                               name="customer_name" 
                               id="quoteCustomerName"
                               required 
                               placeholder="VD: Anh Nam, Chị Hương..." 
                               class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-lg focus:border-[#e11b22] focus:outline-none focus:ring-1 focus:ring-[#e11b22] text-slate-800 transition-colors">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">
                            Số điện thoại / Zalo <span class="text-[#e11b22] font-black">*</span>
                        </label>
                        <input type="tel" 
                               name="phone" 
                               id="quotePhone"
                               required 
                               placeholder="VD: 0988.xxx.xxx" 
                               class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-lg focus:border-[#e11b22] focus:outline-none focus:ring-1 focus:ring-[#e11b22] text-slate-800 font-medium transition-colors">
                    </div>
                </div>

                <!-- Tên cơ sở / địa chỉ -->
                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">
                        Tên cơ sở / Địa chỉ công trình (nếu có)
                    </label>
                    <input type="text" 
                           name="company_or_address" 
                           id="quoteCompanyOrAddress"
                           placeholder="VD: Nhà hàng Sen Tây Hồ, Bếp ăn trường mầm non..." 
                           class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-lg focus:border-[#e11b22] focus:outline-none focus:ring-1 focus:ring-[#e11b22] text-slate-800 transition-colors">
                </div>

                <!-- Nhu cầu cụ thể -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-bold text-slate-800">
                            Nhu cầu cụ thể hoặc ghi chú kỹ thuật
                        </label>
                        <span class="text-[11px] text-slate-500 font-medium">Gợi ý chọn nhanh:</span>
                    </div>

                    <!-- Gợi ý chọn nhanh (Chữ thuần túy, KHÔNG icon) -->
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <button type="button" 
                                onclick="appendModalNote('Báo giá xuất xưởng')"
                                class="px-2.5 py-1 bg-slate-100 hover:bg-red-50 hover:text-[#e11b22] border border-slate-200 rounded text-xs text-slate-700 transition-colors">
                            Báo giá xuất xưởng
                        </button>
                        <button type="button" 
                                onclick="appendModalNote('Khảo sát mặt bằng')"
                                class="px-2.5 py-1 bg-slate-100 hover:bg-red-50 hover:text-[#e11b22] border border-slate-200 rounded text-xs text-slate-700 transition-colors">
                            Khảo sát mặt bằng
                        </button>
                        <button type="button" 
                                onclick="appendModalNote('Gia công theo bản vẽ')"
                                class="px-2.5 py-1 bg-slate-100 hover:bg-red-50 hover:text-[#e11b22] border border-slate-200 rounded text-xs text-slate-700 transition-colors">
                            Gia công theo bản vẽ
                        </button>
                        <button type="button" 
                                onclick="appendModalNote('Tư vấn điện 3 pha')"
                                class="px-2.5 py-1 bg-slate-100 hover:bg-red-50 hover:text-[#e11b22] border border-slate-200 rounded text-xs text-slate-700 transition-colors">
                            Tư vấn điện 3 pha
                        </button>
                    </div>

                    <textarea name="notes" 
                              id="quoteNotes"
                              rows="3" 
                              placeholder="VD: Báo giá 2 lò nướng 5 khay chuyển về Hải Phòng, cần hỗ trợ lắp đặt điện 3 pha..." 
                              class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-lg focus:border-[#e11b22] focus:outline-none focus:ring-1 focus:ring-[#e11b22] text-slate-800 transition-colors"></textarea>
                </div>

                <!-- 2 Nút hành động: Hủy bỏ & Gửi yêu cầu -->
                <div class="pt-2 flex items-center justify-between gap-3">
                    <button type="button" 
                            onclick="closeQuoteModal()" 
                            class="w-1/3 py-3 px-4 rounded-lg border border-slate-300 text-slate-700 font-bold text-xs uppercase hover:bg-slate-100 transition-colors">
                        Hủy bỏ
                    </button>
                    <button type="submit" 
                            id="quoteSubmitBtn"
                            style="background-color: #e11b22;"
                            class="w-2/3 py-3 px-4 rounded-lg text-white font-black text-sm uppercase shadow-md hover:brightness-105 active:scale-[0.99] transition-all text-center">
                        <span id="quoteSubmitText">Gửi Yêu Cầu Báo Giá</span>
                    </button>
                </div>

                <!-- Hotline hỗ trợ trực tiếp -->
                <div class="text-xs text-center text-slate-500 pt-2 border-t border-slate-100">
                    Hoặc liên hệ Hotline kỹ thuật trực tiếp: <a href="tel:0988666888" class="text-[#e11b22] font-black hover:underline">0988.666.888</a>
                </div>
            </form>

        </div>

    </div>
</div>
