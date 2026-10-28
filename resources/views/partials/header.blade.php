@php
    $navCategories = \Illuminate\Support\Facades\Cache::remember('nav_categories', 600, fn () =>
        \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get(['id', 'name', 'slug'])
    );
@endphp

<header class="bg-white border-b border-slate-200 sticky top-0 z-40">
    <!-- Main Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-x-3 gap-y-2.5 md:gap-6">
            
            <!-- Logo Bếp Inox Bảo Linh (Phong cách Newsun) -->
            <a href="{{ route('catalog.index') }}" class="flex flex-col shrink-0 min-w-0" aria-label="Bếp Inox Bảo Linh - Trang chủ">
                <span class="text-2xl sm:text-3xl font-black text-[#e11b22] tracking-tighter leading-none italic uppercase">
                    BẢO LINH
                </span>
                <span class="text-[8px] min-[380px]:text-[9px] sm:text-[10px] font-bold text-slate-600 tracking-wider uppercase mt-0.5 whitespace-nowrap">
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

            <!-- Search Bar (full-width second row on mobile) -->
            <div class="order-last w-full md:order-none md:w-auto md:flex-1 max-w-xl min-w-0">
                <form action="{{ route('catalog.index') }}" method="GET" class="relative" role="search">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="search" 
                           id="headerSearchInput"
                           name="q" 
                           value="{{ request('q') }}" 
                           placeholder="Máy thái thịt, nồi phở, tủ cơm, lò nướng..." 
                           aria-label="Tìm kiếm sản phẩm"
                           class="w-full min-w-0 pl-4 pr-12 py-2 text-sm bg-white border border-slate-300 rounded-full focus:outline-none focus:border-[#e11b22] shadow-sm">
                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#e11b22] font-bold text-xs">
                        Tìm
                    </button>
                </form>
            </div>

            <!-- "Tư vấn chọn mua" Pill Button + Mobile menu toggle -->
            <div class="flex items-center gap-2 shrink-0">
                <button type="button" 
                        id="headerConsultBtn"
                        onclick="openQuoteModal('', 'Tư vấn chọn mua thiết bị')"
                        class="px-3 sm:px-4 py-2 bg-[#e11b22] hover:bg-[#c6151c] text-white text-xs sm:text-sm font-bold rounded-full transition-colors whitespace-nowrap shadow-sm">
                    <span class="hidden min-[400px]:inline">Tư vấn chọn mua</span>
                    <span class="min-[400px]:hidden">Tư vấn</span>
                </button>
                <button type="button"
                        id="mobileMenuToggle"
                        aria-label="Mở menu"
                        aria-expanded="false"
                        aria-controls="mobileMenu"
                        onclick="toggleMobileMenu()"
                        class="md:hidden flex items-center justify-center w-9 h-9 rounded-lg border border-slate-300 text-slate-700 hover:text-[#e11b22] hover:border-[#e11b22] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <nav id="mobileMenu" class="md:hidden hidden border-t border-slate-100 bg-white max-h-[70vh] overflow-y-auto" aria-label="Menu di động">
        <div class="px-4 py-3 grid grid-cols-2 gap-1 text-sm font-medium text-slate-700">
            <a href="{{ route('catalog.index') }}" class="px-3 py-2 rounded-lg hover:bg-red-50 hover:text-[#e11b22]">Trang chủ</a>
            <a href="{{ route('catalog.about') }}" class="px-3 py-2 rounded-lg hover:bg-red-50 hover:text-[#e11b22]">Giới thiệu</a>
            <a href="{{ route('catalog.factory') }}" class="px-3 py-2 rounded-lg hover:bg-red-50 hover:text-[#e11b22]">Xưởng / Showroom</a>
            <a href="{{ route('catalog.policy') }}" class="px-3 py-2 rounded-lg hover:bg-red-50 hover:text-[#e11b22]">Chính sách</a>
            <a href="{{ route('catalog.contact') }}" class="px-3 py-2 rounded-lg hover:bg-red-50 hover:text-[#e11b22]">Liên hệ</a>
            <a href="{{ route('catalog.news') }}" class="px-3 py-2 rounded-lg hover:bg-red-50 hover:text-[#e11b22]">Tin tức</a>
        </div>
        @if($navCategories->isNotEmpty())
            <div class="px-4 pb-3">
                <p class="px-3 pb-1 text-[11px] font-bold uppercase tracking-wider text-slate-400">Danh mục sản phẩm</p>
                <div class="grid grid-cols-1 gap-0.5 text-sm">
                    @foreach($navCategories as $cat)
                        <a href="{{ route('catalog.index', ['category' => $cat->slug]) }}" class="px-3 py-2 rounded-lg text-slate-700 hover:bg-red-50 hover:text-[#e11b22]">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="px-4 py-3 border-t border-slate-100 text-xs text-slate-600">
            Hotline: <a href="tel:0985202432" class="text-[#e11b22] font-black">0985.202.432</a>
        </div>
    </nav>
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const btn = document.getElementById('mobileMenuToggle');
            if (!menu || !btn) return;
            const open = menu.classList.toggle('hidden') === false;
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
    </script>

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
                <span>Tổng đài: <a href="tel:0985202432" class="text-[#e11b22] font-black hover:underline">0985.202.432</a></span>
                <span>Tư vấn: <a href="tel:0985202432" class="text-[#e11b22] font-black hover:underline">0985.202.432</a></span>
            </div>

        </div>
    </div>
</header>
