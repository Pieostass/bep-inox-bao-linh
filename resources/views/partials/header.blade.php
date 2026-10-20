@php
    $navCategories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
@endphp

<header class="bg-white border-b border-slate-200 sticky top-0 z-40">
    <!-- Main Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center justify-between gap-3 md:gap-6">
            
            <!-- Logo Bếp Inox Bảo Linh (Phong cách Newsun) -->
            <a href="{{ route('catalog.index') }}" class="flex flex-col shrink-0">
                <span class="text-2xl sm:text-3xl font-black text-[#e11b22] tracking-tighter leading-none italic uppercase">
                    BẢO LINH
                </span>
                <span class="text-[9px] sm:text-[10px] font-bold text-slate-600 tracking-wider uppercase mt-0.5">
                    CHUYÊN GIA THIẾT BỊ BẾP CÔNG NGHIỆP
                </span>
            </a>

            <!-- Red "Danh mục" Button -->
            <div class="relative group hidden sm:block shrink-0">
                <button type="button" class="flex items-center space-x-2 px-4 py-2 bg-[#e11b22] hover:bg-[#c6151c] text-white text-xs sm:text-sm font-bold rounded-lg transition-colors">
                    <span class="space-y-0.5">
                        <span class="block w-4 h-0.5 bg-white"></span>
                        <span class="block w-4 h-0.5 bg-white"></span>
                        <span class="block w-4 h-0.5 bg-white"></span>
                    </span>
                    <span>Danh mục</span>
                </button>

                <!-- Dropdown on Hover -->
                <div class="absolute left-0 top-full pt-1 w-64 hidden group-hover:block z-50">
                    <div class="bg-white rounded-lg shadow-xl border border-slate-200 py-1 text-slate-800 text-xs sm:text-sm">
                        @foreach($navCategories as $cat)
                            <a href="{{ route('catalog.index', ['category' => $cat->slug]) }}" 
                               class="block px-4 py-2.5 hover:bg-red-50 hover:text-[#e11b22] font-medium border-b border-slate-100 last:border-0 transition-colors">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="flex-1 max-w-xl">
                <form action="{{ route('catalog.index') }}" method="GET" class="relative">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}" 
                           placeholder="Máy thái thịt, nồi phở, tủ cơm, lò nướng..." 
                           class="w-full pl-4 pr-10 py-2 text-xs sm:text-sm bg-white border border-slate-300 rounded-full focus:outline-none focus:border-[#e11b22] shadow-sm">
                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#e11b22] font-bold text-xs">
                        Tìm
                    </button>
                </form>
            </div>

            <!-- "Tư vấn chọn mua" Pill Button (Mở Modal Báo Giá / Tư Vấn) -->
            <div class="flex items-center space-x-2">
                <button type="button" 
                        onclick="openQuoteModal('', 'Tư vấn chọn mua thiết bị')"
                        class="px-4 py-2 bg-[#e11b22] hover:bg-[#c6151c] text-white text-xs sm:text-sm font-bold rounded-full transition-colors whitespace-nowrap shadow-sm">
                    Tư vấn chọn mua
                </button>
            </div>

        </div>
    </div>

    <!-- Sub-navigation links & Hotline (Newsun Style) -->
    <div class="bg-white border-t border-slate-100 hidden md:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex items-center justify-between text-xs sm:text-sm">
            
            <div class="flex items-center space-x-6 text-slate-700 font-medium">
                <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22] transition-colors {{ request()->routeIs('catalog.index') && !request('category') ? 'text-[#e11b22] font-bold' : '' }}">
                    Trang chủ
                </a>
                <a href="{{ route('catalog.about') }}" class="hover:text-[#e11b22] transition-colors {{ request()->routeIs('catalog.about') ? 'text-[#e11b22] font-bold' : '' }}">
                    Giới thiệu
                </a>
                <a href="{{ route('catalog.factory') }}" class="hover:text-[#e11b22] transition-colors {{ request()->routeIs('catalog.factory') ? 'text-[#e11b22] font-bold' : '' }}">
                    Xưởng sản xuất / Showroom
                </a>
                <a href="{{ route('catalog.policy') }}" class="hover:text-[#e11b22] transition-colors {{ request()->routeIs('catalog.policy') ? 'text-[#e11b22] font-bold' : '' }}">
                    Chính sách
                </a>
                <a href="{{ route('catalog.contact') }}" class="hover:text-[#e11b22] transition-colors {{ request()->routeIs('catalog.contact') ? 'text-[#e11b22] font-bold' : '' }}">
                    Liên hệ
                </a>
                <a href="{{ route('catalog.news') }}" class="hover:text-[#e11b22] transition-colors {{ request()->routeIs('catalog.news*') ? 'text-[#e11b22] font-bold' : '' }}">
                    Tin tức nổi bật
                </a>
            </div>

            <!-- Hotline Right (Newsun Style: Tổng đài & Tư vấn số đỏ) -->
            <div class="flex items-center space-x-4 text-xs">
                <span>Tổng đài: <a href="tel:0988666888" class="text-[#e11b22] font-black hover:underline">0988.666.888</a></span>
                <span>Tư vấn: <a href="tel:0988666888" class="text-[#e11b22] font-black hover:underline">0988.666.888</a></span>
            </div>

        </div>
    </div>
</header>
