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

        <!-- Khung CSS Tự Chứa - Đảm bảo chạy 100% không phụ thuộc build Tailwind -->
        <style>
            #heroBannerCarousel {
                position: relative;
                overflow: hidden;
                border-radius: 1rem;
                min-height: 420px;
                background-color: #0f172a;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.25);
                user-select: none;
                display: flex;
                align-items: center;
            }
            @media (min-width: 640px) { #heroBannerCarousel { min-height: 460px; } }
            @media (min-width: 1024px) { #heroBannerCarousel { min-height: 500px; } }

            /* Danh sách ảnh slide chạy liên tục */
            .hero-slide-item {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                opacity: 0 !important;
                visibility: hidden !important;
                transition: opacity 0.7s ease-in-out, visibility 0.7s ease-in-out;
                z-index: 1;
                pointer-events: none;
            }
            .hero-slide-item.is-active {
                opacity: 1 !important;
                visibility: visible !important;
                z-index: 2;
                pointer-events: auto;
            }
            .hero-slide-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center 35%;
                filter: brightness(1.04) contrast(1.05);
                display: block;
            }

            /* Lớp phủ Gradient sáng, trong trẻo: chỉ phủ mờ nhẹ bên trái dưới chữ để đọc chữ rõ, nửa bên phải để trong suốt 100% cho ảnh sáng rõ */
            .hero-gradient-overlay {
                position: absolute;
                inset: 0;
                pointer-events: none;
                z-index: 10;
                background: linear-gradient(90deg, rgba(10, 15, 29, 0.94) 0%, rgba(10, 15, 29, 0.8) 35%, rgba(10, 15, 29, 0.25) 55%, rgba(10, 15, 29, 0) 70%);
            }
            @media (max-width: 640px) {
                .hero-gradient-overlay {
                    background: linear-gradient(180deg, rgba(10, 15, 29, 0.92) 0%, rgba(10, 15, 29, 0.75) 60%, rgba(10, 15, 29, 0.35) 100%);
                }
            }

            /* Lớp phủ mờ đáy nhẹ cho chấm viên thuốc */
            .hero-bottom-shade {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 48px;
                pointer-events: none;
                z-index: 10;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.4) 0%, transparent 100%);
            }

            /* Nút mũi tên chuyển ảnh Next / Prev */
            .hero-nav-arrow {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 30;
                width: 44px;
                height: 44px;
                border-radius: 9999px;
                background-color: rgba(15, 23, 42, 0.7);
                color: #ffffff;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                border: 1px solid rgba(255, 255, 255, 0.35);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                transition: all 0.2s ease;
                outline: none;
            }
            .hero-nav-arrow:hover {
                background-color: #e11b22;
                border-color: #e11b22;
                transform: translateY(-50%) scale(1.1);
            }
            .hero-nav-arrow:active {
                transform: translateY(-50%) scale(0.95);
            }
            .hero-nav-prev { left: 16px; }
            .hero-nav-next { right: 16px; }

            /* Chấm indicator dạng viên thuốc chuẩn theo mẫu của bạn */
            .hero-dots-wrap {
                position: absolute;
                bottom: 16px;
                inset-x: 0;
                z-index: 30;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                pointer-events: auto;
            }
            .hero-dot-pill {
                height: 8px;
                width: 12px;
                border-radius: 9999px;
                border: none;
                padding: 0;
                cursor: pointer;
                background-color: rgba(255, 255, 255, 0.5);
                transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 1px 3px rgba(0,0,0,0.3);
                outline: none;
            }
            .hero-dot-pill:hover {
                background-color: rgba(255, 255, 255, 0.9);
            }
            .hero-dot-pill.is-active {
                width: 32px;
                background-color: #2563eb !important;
                box-shadow: 0 2px 8px rgba(37, 99, 235, 0.75);
            }
        </style>

        <div id="heroBannerCarousel" class="group relative shadow-xl">
            
            <!-- 7 Background Slide Images -->
            <div class="absolute inset-0 w-full h-full overflow-hidden">
                @foreach($bannerSlides as $idx => $slide)
                    <div class="hero-slide-item {{ $idx === 0 ? 'is-active' : '' }}" data-slide="{{ $idx }}">
                        <img src="{{ $slide['img'] }}" 
                             alt="{{ $slide['alt'] }}"
                             width="1200" height="700"
                             {{ $idx === 0 ? 'fetchpriority=high' : 'loading=lazy' }}>
                    </div>
                @endforeach
            </div>

            <!-- Soft Gradient Overlay on Left to make text pop -->
            <div class="hero-gradient-overlay"></div>
            
            <!-- Bottom Subtle Dark Gradient for Dots Indicator -->
            <div class="hero-bottom-shade"></div>

            <!-- Content on Top of Background -->
            <div class="relative z-20 max-w-xl py-8 sm:py-12 px-6 sm:px-10 text-white space-y-4">
                <!-- Badge -->
                <div class="inline-flex items-center space-x-1.5 px-3 py-1 bg-[#e11b22]/90 backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-wider text-white shadow-sm border border-red-400/30">
                    <span id="heroSlideBadge">{{ $bannerSlides[0]['badge'] }}</span>
                </div>
                
                <!-- Title & Highlight -->
                <h1 class="text-2xl sm:text-4xl lg:text-[44px] font-black uppercase tracking-tight leading-tight text-white drop-shadow-lg min-h-[2.5em] flex flex-col justify-center">
                    <span id="heroSlideTitle">{{ $bannerSlides[0]['title'] }}</span>
                    <span id="heroSlideHighlight" class="text-amber-400">{{ $bannerSlides[0]['highlight'] }}</span>
                </h1>
                
                <!-- Description -->
                <p id="heroSlideDesc" class="text-xs sm:text-sm text-slate-200 line-clamp-2 max-w-md min-h-[2.8em]">
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
                    class="hero-nav-arrow hero-nav-prev">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" 
                    id="heroNextBtn"
                    aria-label="Ảnh kế tiếp" 
                    class="hero-nav-arrow hero-nav-next">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Pill Dots Pagination (Chuẩn theo mẫu của bạn) -->
            <div class="hero-dots-wrap">
                @foreach($bannerSlides as $idx => $slide)
                    <button type="button" 
                            class="hero-dot-pill {{ $idx === 0 ? 'is-active' : '' }}"
                            data-dot="{{ $idx }}"
                            aria-label="Chuyển tới ảnh {{ $idx + 1 }}">
                    </button>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Script điều khiển Slider 7 ảnh -->
    <script>
        (function () {
            function initHeroBannerSlider() {
                var slidesData = @json($bannerSlides);
                var slides = document.querySelectorAll('.hero-slide-item');
                var dots = document.querySelectorAll('.hero-dot-pill');
                var badgeEl = document.getElementById('heroSlideBadge');
                var titleEl = document.getElementById('heroSlideTitle');
                var highlightEl = document.getElementById('heroSlideHighlight');
                var descEl = document.getElementById('heroSlideDesc');
                var prevBtn = document.getElementById('heroPrevBtn');
                var nextBtn = document.getElementById('heroNextBtn');
                var carousel = document.getElementById('heroBannerCarousel');

                if (!slides.length) return;

                var currentSlide = 0;
                var totalSlides = slidesData.length;
                var autoTimer = null;
                var SLIDE_DURATION = 7000; // ĐÚNG 7 GIÂY theo yêu cầu của bạn

                function goToSlide(index) {
                    if (index < 0) index = totalSlides - 1;
                    if (index >= totalSlides) index = 0;
                    currentSlide = index;

                    // Chuyển ảnh mượt mà
                    for (var i = 0; i < slides.length; i++) {
                        if (i === currentSlide) {
                            slides[i].classList.add('is-active');
                        } else {
                            slides[i].classList.remove('is-active');
                        }
                    }

                    // Cập nhật chấm chỉ số (active là viên thuốc xanh dài 32px, còn lại ngắn 12px)
                    for (var j = 0; j < dots.length; j++) {
                        if (j === currentSlide) {
                            dots[j].classList.add('is-active');
                        } else {
                            dots[j].classList.remove('is-active');
                        }
                    }

                    // Cập nhật nội dung tiêu đề & mô tả theo slide
                    var d = slidesData[currentSlide];
                    if (badgeEl) badgeEl.textContent = d.badge;
                    if (titleEl) titleEl.textContent = d.title;
                    if (highlightEl) highlightEl.textContent = d.highlight;
                    if (descEl) descEl.textContent = d.desc;
                }

                function startAutoPlay() {
                    stopAutoPlay();
                    autoTimer = setInterval(function () {
                        goToSlide(currentSlide + 1);
                    }, SLIDE_DURATION);
                }

                function stopAutoPlay() {
                    if (autoTimer) {
                        clearInterval(autoTimer);
                        autoTimer = null;
                    }
                }

                function resetTimer() {
                    startAutoPlay();
                }

                // Gán sự kiện click cho các chấm viên thuốc
                dots.forEach(function (dot) {
                    dot.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var target = parseInt(this.getAttribute('data-dot'), 10);
                        goToSlide(target);
                        resetTimer();
                    });
                });

                // Nút chuyển ảnh Trước / Sau
                if (prevBtn) {
                    prevBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        goToSlide(currentSlide - 1);
                        resetTimer();
                    });
                }
                if (nextBtn) {
                    nextBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        goToSlide(currentSlide + 1);
                        resetTimer();
                    });
                }

                // Vuốt ngón tay trên điện thoại / tablet
                if (carousel) {
                    var touchStartX = 0;
                    var touchEndX = 0;
                    carousel.addEventListener('touchstart', function (e) {
                        touchStartX = e.changedTouches[0].screenX;
                    }, { passive: true });

                    carousel.addEventListener('touchend', function (e) {
                        touchEndX = e.changedTouches[0].screenX;
                        if (touchStartX - touchEndX > 50) {
                            goToSlide(currentSlide + 1);
                            resetTimer();
                        } else if (touchEndX - touchStartX > 50) {
                            goToSlide(currentSlide - 1);
                            resetTimer();
                        }
                    }, { passive: true });
                }

                // Khởi động chạy tự động ngay lập tức
                startAutoPlay();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initHeroBannerSlider);
            } else {
                initHeroBannerSlider();
            }
        })();
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
