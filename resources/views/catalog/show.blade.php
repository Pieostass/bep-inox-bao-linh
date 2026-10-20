@extends('layouts.app')

@section('title', $product->name . ' - Bếp Inox Bảo Linh')
@section('meta_description', Str::limit(strip_tags($product->short_description ?: $product->description), 160))

@section('content')

<div class="bg-white">
    <!-- Breadcrumb (Newsun Style) -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            @if($product->category)
                <a href="{{ route('catalog.index', ['category' => $product->category->slug]) }}" class="hover:text-[#e11b22]">
                    {{ $product->category->name }}
                </a>
                <span>/</span>
            @endif
            <span class="text-slate-800 font-semibold truncate">{{ $product->name }}</span>
        </div>
    </div>

    <!-- Product Main Detail -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Column 1: Product Gallery (Left 5 Cols) -->
            <div class="lg:col-span-5 space-y-4">
                @php
                    $allImages = [];
                    if (!empty($product->thumbnail)) {
                        $allImages[] = $product->thumbnail;
                    }
                    if (is_array($product->images)) {
                        foreach ($product->images as $img) {
                            if (!in_array($img, $allImages) && !empty($img)) {
                                $allImages[] = $img;
                            }
                        }
                    }
                    if (empty($allImages)) {
                        $allImages[] = 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80';
                    }
                @endphp

                <!-- Big Image -->
                <div class="aspect-square rounded-xl border border-slate-200 overflow-hidden bg-slate-50 p-2 flex items-center justify-center">
                    <img id="mainProductImage" src="{{ $allImages[0] }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain">
                </div>

                <!-- Thumbnails -->
                @if(count($allImages) > 1)
                    <div class="flex items-center space-x-2 overflow-x-auto pb-1">
                        @foreach($allImages as $idx => $img)
                            <button type="button" 
                                    onclick="switchMainImage('{{ $img }}', this)" 
                                    class="thumb-btn shrink-0 w-16 h-16 rounded-lg border {{ $idx === 0 ? 'border-[#e11b22]' : 'border-slate-200 hover:border-slate-400' }} p-1 bg-white">
                                <img src="{{ $img }}" alt="Ảnh {{ $idx + 1 }}" class="w-full h-full object-contain">
                            </button>
                        @endforeach
                    </div>
                @endif

                <!-- Quality Note -->
                <div class="p-3 bg-red-50 rounded-lg border border-red-100 text-xs text-slate-700 space-y-1">
                    <p class="font-bold text-[#e11b22] uppercase">Cam kết từ Bếp Inox Bảo Linh:</p>
                    <p>• 100% Inox 304 dày dặn không gỉ sét, độ bền cao</p>
                    <p>• Bảo hành 12 tháng tận nơi, bảo trì trọn đời</p>
                    <p>• Có sẵn linh kiện thay thế chính hãng tại xưởng Hà Nội</p>
                </div>
            </div>

            <!-- Column 2: Product Info & Quick Consultation (Right 7 Cols) -->
            <div class="lg:col-span-7 space-y-4">
                
                <!-- Title & SKU -->
                <div>
                    <h1 class="text-xl sm:text-2xl font-black text-slate-900 leading-snug">
                        {{ $product->name }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1.5">
                        <span>Mã SKU: <strong class="font-mono text-slate-800">{{ $product->sku ?: 'BL-INOX' }}</strong></span>
                        <span>•</span>
                        <span>Tình trạng: <strong class="text-emerald-600 font-bold">Còn hàng (Sẵn sàng giao)</strong></span>
                        <span>•</span>
                        <span class="text-amber-500 font-bold">★ 5/5 (Đã bàn giao {{ rand(120, 450) }} máy)</span>
                    </div>
                </div>

                <!-- Price Box -->
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 flex items-baseline space-x-3">
                    <span class="text-xs font-semibold text-slate-500">Giá bán:</span>
                    <span class="text-2xl sm:text-3xl font-black text-[#e11b22]">
                        {{ $product->display_price }}
                    </span>
                    @if($product->display_original_price)
                        <span class="text-sm text-slate-400 line-through">
                            {{ $product->display_original_price }}
                        </span>
                    @endif
                </div>

                <!-- Promotions & Gifts Box (Red dashed border) -->
                <div class="rounded-xl border border-dashed border-red-300 bg-red-50/50 p-4 space-y-2 text-xs sm:text-sm">
                    <span class="font-extrabold text-[#e11b22] uppercase tracking-wide block">
                        🎁 ƯU ĐÃI & QUÀ TẶNG KÈM THEO
                    </span>
                    <ul class="space-y-1.5 text-slate-700">
                        <li>✓ <strong>Bảo hành chính hãng 12 tháng:</strong> Đội ngũ kỹ thuật hỗ trợ tận nơi nhanh chóng.</li>
                        <li>✓ <strong>Miễn phí vận chuyển & lắp đặt:</strong> Khu vực nội thành Hà Nội; hỗ trợ gửi xe toàn quốc.</li>
                        <li>✓ <strong>Tặng phiếu mua hàng:</strong> Giảm ngay 500.000đ khi đặt mua thiết bị inox hoặc linh kiện tiếp theo.</li>
                        <li>✓ <strong>Tư vấn công thức & kỹ thuật vận hành:</strong> Bàn giao quy trình vận hành máy móc an toàn.</li>
                    </ul>
                </div>

                <!-- Official MB Bank Account Box -->
                <div class="p-3 bg-slate-100 rounded-xl border border-slate-200 text-xs space-y-1">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-slate-800">Tài khoản doanh nghiệp:</span>
                        <span class="font-mono font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded border border-blue-200">MB BANK</span>
                    </div>
                    <div class="flex items-center justify-between bg-white px-3 py-1.5 rounded border border-slate-200">
                        <span class="font-mono font-black text-sm text-[#e11b22]">STK: 7338666888</span>
                        <button type="button" onclick="copyToClipboard('7338666888', this)" class="text-[11px] text-slate-600 hover:text-[#e11b22] font-semibold">
                            Sao chép
                        </button>
                    </div>
                    <p class="text-[11px] text-slate-600">Chủ TK: <strong>CÔNG TY TNHH BẾP INOX BẢO LINH</strong></p>
                </div>

                <!-- Call to actions: Hotline & Zalo & Quote (KHÔNG CÓ GIỎ HÀNG) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <a href="tel:0988666888" 
                       class="py-3 px-4 rounded-xl bg-[#e11b22] hover:bg-[#c6151c] text-white font-black text-sm text-center uppercase tracking-wide shadow transition-colors flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>GỌI HOTLINE: 0988.666.888</span>
                    </a>

                    <a href="https://zalo.me/0988666888" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="py-3 px-4 rounded-xl bg-[#0068ff] hover:bg-blue-700 text-white font-black text-sm text-center uppercase tracking-wide shadow transition-colors flex items-center justify-center space-x-2">
                        <span>CHAT TƯ VẤN QUA ZALO</span>
                    </a>
                </div>

                <div>
                    <button type="button" 
                            onclick="openQuoteModal('{{ $product->id }}', '{{ addslashes($product->name) }}')" 
                            class="w-full py-2.5 rounded-xl border-2 border-[#e11b22] text-[#e11b22] hover:bg-[#e11b22] hover:text-white font-bold text-xs uppercase tracking-wider transition-colors inline-flex items-center justify-center">
                        YÊU CẦU BÁO GIÁ DỰ ÁN / ĐẠI LÝ
                    </button>
                </div>

            </div>

        </div>

        <!-- Specifications Table & Description Sections -->
        <div class="mt-12 grid grid-cols-1 lg:grid-cols-12 gap-8 border-t border-slate-200 pt-8">
            
            <!-- Left: Detailed Description (7 cols) -->
            <div class="lg:col-span-7 space-y-4">
                <h2 class="text-lg font-black text-slate-900 uppercase border-b-2 border-[#e11b22] pb-2 inline-block">
                    ĐẶC ĐIỂM NỔI BẬT & MÔ TẢ CHI TIẾT
                </h2>

                <div class="prose prose-slate max-w-none text-xs sm:text-sm leading-relaxed text-slate-700">
                    @if($product->description)
                        {!! $product->description !!}
                    @else
                        <p>Sản phẩm <strong>{{ $product->name }}</strong> do Công ty TNHH Bếp Inox Bảo Linh cung cấp và lắp đặt trực tiếp, được chế tạo từ Inox 304 tiêu chuẩn, bảo hành 12 tháng tận nơi.</p>
                    @endif
                </div>
            </div>

            <!-- Right: Specifications Table (5 cols) -->
            <div class="lg:col-span-5 space-y-4">
                <h2 class="text-lg font-black text-slate-900 uppercase border-b-2 border-slate-800 pb-2 inline-block">
                    THÔNG SỐ KỸ THUẬT
                </h2>

                @if(!empty($product->specifications) && is_array($product->specifications))
                    <div class="border border-slate-200 rounded-xl overflow-hidden text-xs">
                        <table class="w-full text-left">
                            <tbody>
                                @foreach($product->specifications as $key => $val)
                                    <tr class="{{ $loop->even ? 'bg-slate-50' : 'bg-white' }} border-b border-slate-100 last:border-0">
                                        <td class="py-2.5 px-3 font-semibold text-slate-600 w-2/5 border-r border-slate-100">
                                            {{ $key }}
                                        </td>
                                        <td class="py-2.5 px-3 font-bold text-slate-900 w-3/5">
                                            {{ $val }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-xs text-slate-500 italic">Vui lòng liên hệ hotline 0988.666.888 để nhận thông số kỹ thuật chi tiết.</p>
                @endif
            </div>

        </div>

        <!-- Related Products (5 Columns) -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="mt-12 border-t border-slate-200 pt-8">
                <h2 class="text-lg font-black text-slate-900 uppercase mb-4">
                    SẢN PHẨM TƯƠNG TỰ
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($relatedProducts as $rel)
                        <div class="bg-white rounded-lg border border-slate-200 p-3 flex flex-col justify-between hover:shadow-md transition-shadow">
                            <div>
                                <a href="{{ route('catalog.show', $rel->slug) }}" class="block aspect-square overflow-hidden mb-2 bg-slate-50">
                                    <img src="{{ $rel->thumbnail }}" alt="{{ $rel->name }}" class="w-full h-full object-contain hover:scale-105 transition-transform">
                                </a>
                                <h3 class="text-xs font-semibold text-slate-800 hover:text-[#e11b22] line-clamp-2 leading-snug">
                                    <a href="{{ route('catalog.show', $rel->slug) }}">{{ $rel->name }}</a>
                                </h3>
                            </div>

                            <div class="mt-3 pt-2">
                                <div class="text-[#e11b22] font-black text-sm">
                                    {{ $rel->display_price }}
                                </div>
                                <div class="text-[10px] text-slate-500 mt-1 mb-2">
                                    ★ 5/5 | Đã bán {{ rand(50, 190) }}
                                </div>
                                <a href="{{ route('catalog.show', $rel->slug) }}" class="block w-full py-1.5 text-center rounded-lg bg-slate-200 hover:bg-[#e11b22] text-slate-700 hover:text-white font-bold text-xs transition-colors">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
    function switchMainImage(imgUrl, btn) {
        const main = document.getElementById('mainProductImage');
        if (main) main.src = imgUrl;

        document.querySelectorAll('.thumb-btn').forEach(b => {
            b.classList.remove('border-[#e11b22]');
            b.classList.add('border-slate-200');
        });
        if (btn) {
            btn.classList.add('border-[#e11b22]');
            btn.classList.remove('border-slate-200');
        }
    }
</script>
@endpush

@endsection
