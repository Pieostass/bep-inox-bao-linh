@extends('layouts.app')

@section('title', 'Bếp Inox Bảo Linh - Nồi Nấu Phở, Tủ Nấu Cơm, Lò Nướng Bánh, Máy Thực Phẩm')

@section('content')

<div class="bg-white">
    <!-- 1. Hero Promotional Banner Carousel (7 Ảnh thực tế xưởng & sản phẩm Bảo Linh) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-6">
        @php
            $bannerSlides = [
                [
                    'img' => asset('images/banners/banner-slide-1.jpg'),
                    'alt' => 'Nồi điện nấu phở Inox 304 tiêu chuẩn Bảo Linh',
                    'badge' => 'Ưu đãi đặc quyền 2026',
                    'title' => 'NỒI ĐIỆN NẤU PHỞ',
                    'highlight' => 'GIÁ GỐC TẬN XƯỞNG',
                    'desc' => 'Đồng hành cùng hàng ngàn gian bếp gia đình và quán ăn với thiết bị Inox 304 tiêu chuẩn chất lượng cao, bền bỉ và tiết kiệm điện.',
                ],
                [
                    'img' => asset('images/banners/banner-slide-2.jpg'),
                    'alt' => 'Dãy bếp Á công nghiệp lửa mạnh inox 304',
                    'badge' => 'Chuyên gia bếp Á',
                    'title' => 'BẾP Á CÔNG NGHIỆP',
                    'highlight' => 'LỬA MẠNH - BỀN BỈ',
                    'desc' => 'Bếp xào cao áp, bếp hầm inox 304 công suất lớn dành cho nhà hàng, khách sạn và bếp ăn công nghiệp.',
                ],
                [
                    'img' => asset('images/banners/banner-slide-3.jpg'),
                    'alt' => 'Gia công thiết bị bếp inox công nghiệp theo bản vẽ',
                    'badge' => 'Gia công theo yêu cầu',
                    'title' => 'GIA CÔNG THEO BẢN VẼ',
                    'highlight' => 'CHUẨN THIẾT KẾ 100%',
                    'desc' => 'Khảo sát tận nơi, thiết kế 2D/3D và sản xuất đồng bộ hệ thống bếp công nghiệp trọn gói, bảo hành 12 tháng.',
                ],
                [
                    'img' => asset('images/banners/banner-slide-4.jpg'),
                    'alt' => 'Hệ thống nồi hầm xương và chụp hút mùi công nghiệp',
                    'badge' => 'Hệ thống hầm công suất lớn',
                    'title' => 'HỆ THỐNG NỒI HẦM',
                    'highlight' => 'DUNG TÍCH 50L - 500L',
                    'desc' => 'Bảo ôn 3 lớp chống bỏng, hệ thống điều khiển nhiệt độ thông minh, tiết kiệm hơn 30% điện năng.',
                ],
                [
                    'img' => asset('images/banners/banner-slide-5.jpg'),
                    'alt' => 'Showroom tủ đông, bàn mát inox công nghiệp',
                    'badge' => 'Thiết bị lạnh công nghiệp',
                    'title' => 'TỦ ĐÔNG & BÀN MÁT',
                    'highlight' => 'LÀM LẠNH NHANH CHÂU ÂU',
                    'desc' => 'Tủ bảo quản thực phẩm tiêu chuẩn cao cho nhà hàng, lốc làm lạnh cao cấp, bảo hành bảo trì uy tín.',
                ],
                [
                    'img' => asset('images/banners/banner-slide-6.jpg'),
                    'alt' => 'Khu bếp xưởng sạch inox Bảo Linh',
                    'badge' => 'Hàng sẵn giao ngay',
                    'title' => 'XƯỞNG SẢN XUẤT LĨNH NAM',
                    'highlight' => 'TRỰC TIẾP TẠI HÀ NỘI',
                    'desc' => 'Hàng trăm thiết bị sẵn có tại xưởng số 15 Ngõ 419 Lĩnh Nam, Hà Nội. Kính mời quý khách tới tham quan trực tiếp.',
                ],
                [
                    'img' => asset('images/banners/banner-slide-7.jpg'),
                    'alt' => 'Dãy chảo xào công nghiệp inox công suất lớn',
                    'badge' => 'Công nghệ chế biến mới',
                    'title' => 'CHẢO XÀO TỰ ĐỘNG',
                    'highlight' => 'NĂNG SUẤT VƯỢT TRỘI',
                    'desc' => 'Giải pháp nấu xào tự động cho suất ăn công nghiệp, bệnh viện, trường học và nhà máy chế biến thực phẩm.',
                ],
            ];
        @endphp

        <div id="heroBannerCarousel" 
             class="group relative overflow-hidden rounded-2xl shadow-xl min-h-[400px] sm:min-h-[440px] lg:min-h-[480px] flex items-center bg-slate-900 select-none">
            
            <!-- 7 Background Slide Images -->
            <div class="absolute inset-0 w-full h-full">
                @foreach($bannerSlides as $idx => $slide)
                    <div class="hero-slide-bg absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out {{ $idx === 0 ? 'opacity-100 z-0' : 'opacity-0 -z-10' }}"
                         data-slide="{{ $idx }}">
                        <img src="{{ $slide['img'] }}" 
                             alt="{{ $slide['alt'] }}"
                             width="1200" height="700"
                             class="w-full h-full object-cover object-center sm:object-right"
                             {{ $idx === 0 ? 'fetchpriority=high' : 'loading=lazy' }}>
                    </div>
                @endforeach
            </div>

            <!-- Soft Gradient Overlay on Left to make text pop -->
            <div class="absolute inset-0 pointer-events-none z-10" 
                 style="background: linear-gradient(to right, rgba(10, 15, 29, 0.95) 0%, rgba(10, 15, 29, 0.85) 45%, rgba(10, 15, 29, 0.35) 75%, rgba(10, 15, 29, 0.15) 100%);"></div>
            
            <!-- Bottom Subtle Dark Gradient for Dots Indicator -->
            <div class="absolute inset-x-0 bottom-0 h-20 pointer-events-none z-10 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

            <!-- Content on Top of Background -->
            <div class="relative z-20 max-w-xl py-8 sm:py-12 px-6 sm:px-10 text-white space-y-4">
                <!-- Badge -->
                <div class="inline-flex items-center space-x-1.5 px-3 py-1 bg-[#e11b22]/90 backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-wider text-white shadow-sm border border-red-400/30">
                    <span id="heroSlideBadge">{{ $bannerSlides[0]['badge'] }}</span>
                </div>
                
                <!-- Title & Highlight -->
                <h1 class="text-2xl sm:text-4xl lg:text-[44px] font-black uppercase tracking-tight leading-tight text-white drop-shadow-lg min-h-[2.5em] flex flex-col justify-center">
                    <span id="heroSlideTitle" class="transition-all duration-300">{{ $bannerSlides[0]['title'] }}</span>
                    <span id="heroSlideHighlight" class="text-amber-400 transition-all duration-300">{{ $bannerSlides[0]['highlight'] }}</span>
                </h1>
                
                <!-- Description -->
                <p id="heroSlideDesc" class="text-xs sm:text-sm text-slate-200 line-clamp-2 max-w-md transition-all duration-300 min-h-[2.8em]">
                    {{ $bannerSlides[0]['desc'] }}
                </p>

                <!-- Value Badges -->
                <div class="flex flex-wrap items-center gap-2.5 pt-1">
                    <div class="bg-amber-400 text-slate-900 font-black px-3.5 py-1.5 rounded-xl text-center shadow">
                        <span class="text-[9px] block uppercase font-bold text-slate-800">TẶNG THÊM</span>
                        <span class="text-xs sm:text-sm">THANH NHIỆT 500K</span>
                    </div>
                    <div class="bg-red-600 text-white font-black px-3.5 py-1.5 rounded-xl text-center shadow border border-red-400/40">
                        <span class="text-[9px] block uppercase font-bold text-red-100">GIẢM GIÁ</span>
                        <span class="text-xs sm:text-sm">30%++</span>
                    </div>
                    <div class="bg-slate-800/80 backdrop-blur-md text-white font-black px-3.5 py-1.5 rounded-xl text-center shadow border border-white/20">
                        <span class="text-[9px] block uppercase font-bold text-slate-300">BẢO HÀNH</span>
                        <span class="text-xs sm:text-sm">12 THÁNG</span>
                    </div>
                </div>

                <!-- Call to Action Button -->
                <div class="pt-2">
                    <button type="button" 
                            onclick="openQuoteModal('', 'Nhận ưu đãi giảm giá 30%')" 
                            class="inline-block px-7 py-3 bg-[#e11b22] hover:bg-[#c6151c] text-white font-black text-xs sm:text-sm uppercase rounded-full shadow-xl transition-all hover:scale-105">
                        Nhận Báo Giá Khuyến Mãi Ngay
                    </button>
                </div>
            </div>

            <!-- Previous / Next Arrow Controls -->
            <button type="button" 
                    id="heroPrevBtn"
                    aria-label="Ảnh trước" 
                    class="absolute left-3 top-1/2 -translate-y-1/2 z-30 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-black/40 hover:bg-[#e11b22] text-white flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 backdrop-blur-sm border border-white/20 hover:scale-110">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" 
                    id="heroNextBtn"
                    aria-label="Ảnh kế tiếp" 
                    class="absolute right-3 top-1/2 -translate-y-1/2 z-30 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-black/40 hover:bg-[#e11b22] text-white flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 backdrop-blur-sm border border-white/20 hover:scale-110">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Pill Dots Pagination (Chuẩn theo mẫu của bạn) -->
            <div class="absolute bottom-4 inset-x-0 z-30 flex items-center justify-center gap-1.5 sm:gap-2">
                @foreach($bannerSlides as $idx => $slide)
                    <button type="button" 
                            class="hero-dot-btn transition-all duration-300 {{ $idx === 0 ? 'w-7 sm:w-8 h-2 bg-[#2563eb] rounded-full shadow-md' : 'w-2.5 sm:w-3 h-2 bg-white/50 hover:bg-white/80 rounded-full cursor-pointer' }}"
                            data-dot="{{ $idx }}"
                            aria-label="Chuyển tới slide {{ $idx + 1 }}">
                    </button>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Script điều khiển Slider 7 ảnh -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slidesData = @json($bannerSlides);
            const slideBgs = document.querySelectorAll('.hero-slide-bg');
            const dotBtns = document.querySelectorAll('.hero-dot-btn');
            const badgeEl = document.getElementById('heroSlideBadge');
            const titleEl = document.getElementById('heroSlideTitle');
            const highlightEl = document.getElementById('heroSlideHighlight');
            const descEl = document.getElementById('heroSlideDesc');
            const container = document.getElementById('heroBannerCarousel');
            const prevBtn = document.getElementById('heroPrevBtn');
            const nextBtn = document.getElementById('heroNextBtn');

            let currentSlide = 0;
            const totalSlides = slidesData.length;
            let autoTimer = null;

            function goToSlide(index) {
                if (index < 0) index = totalSlides - 1;
                if (index >= totalSlides) index = 0;
                currentSlide = index;

                // Update Background Images (smooth crossfade)
                slideBgs.forEach((bg, idx) => {
                    if (idx === currentSlide) {
                        bg.classList.remove('opacity-0', '-z-10');
                        bg.classList.add('opacity-100', 'z-0');
                    } else {
                        bg.classList.remove('opacity-100', 'z-0');
                        bg.classList.add('opacity-0', '-z-10');
                    }
                });

                // Update Pill Dots (active elongated blue pill, inactive compact gray pill)
                dotBtns.forEach((dot, idx) => {
                    if (idx === currentSlide) {
                        dot.className = 'hero-dot-btn transition-all duration-300 w-7 sm:w-8 h-2 bg-[#2563eb] rounded-full shadow-md';
                    } else {
                        dot.className = 'hero-dot-btn transition-all duration-300 w-2.5 sm:w-3 h-2 bg-white/50 hover:bg-white/80 rounded-full cursor-pointer';
                    }
                });

                // Smooth Text Transition
                const d = slidesData[currentSlide];
                if (badgeEl) badgeEl.textContent = d.badge;
                if (titleEl) {
                    titleEl.style.opacity = '0';
                    setTimeout(() => {
                        titleEl.textContent = d.title;
                        titleEl.style.opacity = '1';
                    }, 150);
                }
                if (highlightEl) {
                    highlightEl.style.opacity = '0';
                    setTimeout(() => {
                        highlightEl.textContent = d.highlight;
                        highlightEl.style.opacity = '1';
                    }, 150);
                }
                if (descEl) {
                    descEl.style.opacity = '0';
                    setTimeout(() => {
                        descEl.textContent = d.desc;
                        descEl.style.opacity = '1';
                    }, 150);
                }
            }

            function startAutoPlay() {
                stopAutoPlay();
                autoTimer = setInterval(() => {
                    goToSlide(currentSlide + 1);
                }, 4000);
            }

            function stopAutoPlay() {
                if (autoTimer) {
                    clearInterval(autoTimer);
                    autoTimer = null;
                }
            }

            // Dot Clicks
            dotBtns.forEach((dot) => {
                dot.addEventListener('click', function () {
                    const target = parseInt(this.getAttribute('data-dot'), 10);
                    goToSlide(target);
                    startAutoPlay();
                });
            });

            // Prev / Next Clicks
            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    goToSlide(currentSlide - 1);
                    startAutoPlay();
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    goToSlide(currentSlide + 1);
                    startAutoPlay();
                });
            }

            // Pause on hover (desktop)
            if (container) {
                container.addEventListener('mouseenter', stopAutoPlay);
                container.addEventListener('mouseleave', startAutoPlay);

                // Touch swipe on mobile
                let touchStartX = 0;
                let touchEndX = 0;
                container.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoPlay();
                }, { passive: true });

                container.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    if (touchStartX - touchEndX > 50) {
                        goToSlide(currentSlide + 1);
                    } else if (touchEndX - touchStartX > 50) {
                        goToSlide(currentSlide - 1);
                    }
                    startAutoPlay();
                }, { passive: true });
            }

            startAutoPlay();
        });
    </script>

    <!-- 2. Category Grid (Khung danh mục viền đỏ 2 hàng chuẩn Newsun) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
        <div class="bg-white rounded-2xl border border-red-300 p-4 sm:p-6 shadow-sm">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 text-center">
                
                @php
                    $quickCategories = [
                        ['name' => 'Nồi nấu phở', 'slug' => 'noi-nau-pho-inox-dien', 'img' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Tủ nấu cơm', 'slug' => 'tu-nau-com-cong-nghiep', 'img' => 'https://images.unsplash.com/photo-1584269600464-37b1b58a9fe7?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Máy thái thịt', 'slug' => 'may-che-bien-thuc-pham', 'img' => 'https://images.unsplash.com/photo-1590794056226-79ef3a8147e1?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Máy xay giò chả', 'slug' => 'may-che-bien-thuc-pham', 'img' => 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Lò nướng bánh', 'slug' => 'lo-nuong-banh', 'img' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Bếp Á & Bếp Âu', 'slug' => 'bep-a-bep-au', 'img' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Thiết bị inox khác', 'slug' => 'thiet-bi-inox-khac', 'img' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Chậu rửa inox', 'slug' => 'thiet-bi-inox-khac', 'img' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Lò nướng pizza', 'slug' => 'lo-nuong-banh', 'img' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Máy cưa xương', 'slug' => 'may-che-bien-thuc-pham', 'img' => 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=200&auto=format&fit=crop&q=80'],
                        ['name' => 'Thiết bị sấy', 'slug' => 'may-che-bien-thuc-pham', 'img' => 'https://images.unsplash.com/photo-1584269600464-37b1b58a9fe7?w=200&auto=format&fit=crop&q=80'],
                    ];
                @endphp

                @foreach($quickCategories as $item)
                    <a href="{{ route('catalog.index', ['category' => $item['slug']]) }}" class="group flex flex-col items-center p-2 rounded-xl hover:bg-red-50 transition-colors">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center overflow-hidden mb-2">
                            <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" class="max-h-full max-w-full object-contain group-hover:scale-110 transition-transform">
                        </div>
                        <span class="text-xs font-semibold text-slate-800 group-hover:text-[#e11b22] line-clamp-1">
                            {{ $item['name'] }}
                        </span>
                    </a>
                @endforeach

                <!-- Tất cả danh mục -->
                <a href="{{ route('catalog.index') }}" class="group flex flex-col items-center justify-center p-2 rounded-xl hover:bg-red-50 transition-colors">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 flex flex-col items-center justify-center space-y-1 mb-2">
                        <span class="block w-6 h-1 bg-[#e11b22] rounded-full"></span>
                        <span class="block w-6 h-1 bg-[#e11b22] rounded-full"></span>
                        <span class="block w-6 h-1 bg-[#e11b22] rounded-full"></span>
                    </div>
                    <span class="text-xs font-bold text-[#e11b22]">
                        Tất cả danh mục
                    </span>
                </a>

            </div>
        </div>
    </div>

    <!-- 3. FLASH SALE Section (Newsun Red Header Bar & Countdown) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        
        <!-- Flash Sale Header -->
        <div class="flex items-center space-x-2 text-slate-800 font-bold text-sm mb-2">
            <span>⚡ Khuyến mãi</span>
        </div>

        <div class="bg-[#e11b22] rounded-t-xl px-4 sm:px-6 py-2.5 flex items-center justify-between text-white">
            <h2 class="text-xl sm:text-2xl font-black italic tracking-wider uppercase text-amber-300">
                FLASH SALE
            </h2>
            
            <!-- Countdown Timer Boxes -->
            <div class="flex items-center space-x-1.5 text-xs font-bold">
                <span class="hidden sm:inline text-white/90 mr-1 text-xs uppercase font-medium">Kết thúc sau:</span>
                <span class="bg-white text-slate-900 px-2 py-1 rounded font-mono font-bold">03</span>
                <span>:</span>
                <span class="bg-white text-slate-900 px-2 py-1 rounded font-mono font-bold">33</span>
                <span>:</span>
                <span class="bg-white text-slate-900 px-2 py-1 rounded font-mono font-bold">34</span>
            </div>
        </div>

        <!-- Flash Sale Product Grid (5 columns on desktop, clean cards with gray 'Xem chi tiết' button) -->
        <div class="bg-slate-50 border border-slate-200 border-t-0 rounded-b-xl p-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($products->take(5) as $p)
                    <div class="bg-white rounded-lg border border-slate-200 p-3 flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div>
                            <!-- Thumbnail -->
                            <a href="{{ route('catalog.show', $p->slug) }}" class="block aspect-square overflow-hidden mb-2 bg-slate-50">
                                <img src="{{ $p->thumbnail_url }}" alt="{{ $p->name }}" class="w-full h-full object-contain hover:scale-105 transition-transform">
                            </a>

                            <!-- Title -->
                            <h3 class="text-xs font-semibold text-slate-800 hover:text-[#e11b22] line-clamp-2 leading-snug">
                                <a href="{{ route('catalog.show', $p->slug) }}">{{ $p->name }}</a>
                            </h3>
                        </div>

                        <div class="mt-3 pt-2">
                            <!-- Price -->
                            <div class="text-[#e11b22] font-black text-sm sm:text-base">
                                {{ $p->display_price }}
                            </div>
                            @if($p->display_original_price)
                                <div class="text-[11px] text-slate-400 line-through">
                                    {{ $p->display_original_price }}
                                </div>
                            @endif

                            <!-- Rating & Sales count (Newsun Style) -->
                            <div class="flex items-center space-x-2 text-[10px] text-slate-500 mt-1 mb-3">
                                <span class="text-amber-500 font-bold">★ 5/5</span>
                                <span>|</span>
                                <span>Đã bán {{ rand(80, 290) }}</span>
                            </div>

                            <!-- Clean Gray "Xem chi tiết" Button (NO Cart!) -->
                            <a href="{{ route('catalog.show', $p->slug) }}" 
                               class="block w-full py-2 text-center rounded-lg bg-slate-200 hover:bg-[#e11b22] text-slate-700 hover:text-white font-bold text-xs transition-colors">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- 4. Category Showcase 1: Nồi Nấu Phở (Image 3 Style) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        
        <!-- Header with Sub-categories & "Xem tất cả" -->
        <div class="flex flex-wrap items-center justify-between border-b-2 border-slate-200 pb-2 mb-4 gap-2">
            <div class="flex items-center space-x-3">
                <h2 class="text-xl sm:text-2xl font-black text-slate-900 uppercase">
                    Nồi Nấu Phở
                </h2>
                <div class="hidden md:flex items-center space-x-3 text-xs text-slate-600 font-medium pl-4 border-l border-slate-300">
                    <a href="{{ route('catalog.index', ['category' => 'noi-nau-pho-inox-dien']) }}" class="hover:text-[#e11b22]">Bộ nồi nấu phở bằng điện</a>
                    <span>|</span>
                    <a href="{{ route('catalog.index', ['category' => 'noi-nau-pho-inox-dien']) }}" class="hover:text-[#e11b22]">Nồi phở điện liền bệ</a>
                    <span>|</span>
                    <a href="{{ route('catalog.index', ['category' => 'noi-nau-pho-inox-dien']) }}" class="hover:text-[#e11b22]">Phụ kiện nồi nấu phở</a>
                </div>
            </div>

            <a href="{{ route('catalog.index', ['category' => 'noi-nau-pho-inox-dien']) }}" class="text-xs font-bold text-slate-600 hover:text-[#e11b22] flex items-center space-x-1">
                <span>Xem tất cả</span>
                <span>→</span>
            </a>
        </div>

        <!-- Product Row (5 items) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach($products as $p)
                <div class="bg-white rounded-lg border border-slate-200 p-3 flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <a href="{{ route('catalog.show', $p->slug) }}" class="block aspect-square overflow-hidden mb-2 bg-slate-50">
                            <img src="{{ $p->thumbnail_url }}" alt="{{ $p->name }}" class="w-full h-full object-contain hover:scale-105 transition-transform">
                        </a>
                        <h3 class="text-xs font-semibold text-slate-800 hover:text-[#e11b22] line-clamp-2 leading-snug">
                            <a href="{{ route('catalog.show', $p->slug) }}">{{ $p->name }}</a>
                        </h3>
                    </div>

                    <div class="mt-3 pt-2">
                        <div class="text-[#e11b22] font-black text-sm sm:text-base">
                            {{ $p->display_price }}
                        </div>
                        <div class="flex items-center space-x-2 text-[10px] text-slate-500 mt-1 mb-3">
                            <span class="text-amber-500 font-bold">★ 5/5</span>
                            <span>|</span>
                            <span>Đã bán {{ rand(90, 310) }}</span>
                        </div>
                        <a href="{{ route('catalog.show', $p->slug) }}" class="block w-full py-2 text-center rounded-lg bg-slate-200 hover:bg-[#e11b22] text-slate-700 hover:text-white font-bold text-xs transition-colors">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!-- 5. Strip Promotion Banner (Image 3 Bottom Banner Style) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="bg-gradient-to-r from-red-600 via-orange-500 to-amber-500 rounded-xl p-4 sm:p-6 text-white flex flex-col sm:flex-row items-center justify-between gap-4 shadow-sm">
            <div class="text-center sm:text-left">
                <span class="text-xs font-bold uppercase tracking-wider bg-white/20 px-2.5 py-0.5 rounded text-white">Voucher Lên Tới 1 Triệu Đồng</span>
                <h3 class="text-xl sm:text-2xl font-black uppercase mt-1">GIA CÔNG THIẾT BỊ BẾP THEO KÍCH THƯỚC BẢN VẼ</h3>
                <p class="text-xs text-white/90">Miễn phí khảo sát trực tiếp tại Hà Nội và các tỉnh lân cận</p>
            </div>
            <button type="button" 
                    onclick="openQuoteModal('', 'Gia công theo bản vẽ / Khảo sát bếp')" 
                    class="inline-block px-6 py-2.5 bg-white text-[#e11b22] hover:bg-slate-100 font-black text-xs sm:text-sm uppercase rounded-full hover:bg-slate-100 transition-colors shrink-0 shadow">
                Liên Hệ Khảo Sát Bếp
            </button>
        </div>
    </div>

    <!-- 6. Bài Viết Tư Vấn (Image 4 Style - Có thể click xem chi tiết) -->
    <div id="newsSection" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="flex items-center justify-between border-b-2 border-slate-200 pb-2 mb-6">
            <h2 class="text-xl sm:text-2xl font-black text-slate-900 uppercase">
                Bài Viết Tư Vấn Kinh Nghiệm
            </h2>
            <a href="{{ route('catalog.news') }}" class="text-xs font-bold text-[#e11b22] hover:underline">Xem tất cả →</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($latestPosts as $art)
                <a href="{{ route('catalog.news.detail', $art->slug) }}" class="space-y-2 group block">
                    <div class="aspect-video overflow-hidden rounded-lg bg-slate-100 shadow-sm border border-slate-100">
                        <img src="{{ $art->image_url }}" 
                             alt="{{ $art->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-[#e11b22] line-clamp-2 leading-snug transition-colors">
                        {{ $art->title }}
                    </h4>
                    <p class="text-[11px] text-slate-500">
                        {{ $art->published_at ? $art->published_at->format('d-m-Y') : date('d-m-Y') }} • <span class="font-medium text-slate-700">{{ $art->category }}</span>
                    </p>
                </a>
            @empty
                <div class="col-span-full py-8 text-center text-xs text-slate-500">
                    Chưa có bài viết nào được đăng tải.
                </div>
            @endforelse
        </div>
    </div>

    <!-- 7. Khách Hàng Tiêu Biểu (Image 4 Bottom Style) -->
    <div id="aboutCompany" class="bg-slate-50 border-t border-slate-200 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-sm font-extrabold uppercase tracking-widest text-slate-500 mb-6">
                ĐỐI TÁC & HƠN 5.000+ KHÁCH HÀNG TIN DÙNG THIẾT BỊ BẢO LINH
            </h3>

            <!-- Partner Brands -->
            <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 opacity-75 grayscale hover:grayscale-0 transition-all">
                <span class="text-lg sm:text-xl font-black tracking-tight text-slate-800">KFC</span>
                <span class="text-lg sm:text-xl font-black tracking-widest text-red-700">MANWAH</span>
                <span class="text-lg sm:text-xl font-black tracking-wide text-amber-600">VINPEARL</span>
                <span class="text-lg sm:text-xl font-black tracking-tight text-red-600">WinMart</span>
                <span class="text-lg sm:text-xl font-black tracking-wider text-red-600">CGV</span>
                <span class="text-lg sm:text-xl font-black tracking-tight text-slate-800">SEN TÂY HỒ</span>
            </div>
        </div>
    </div>
</div>

@endsection
