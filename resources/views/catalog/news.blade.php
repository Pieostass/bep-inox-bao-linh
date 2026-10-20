@extends('layouts.app')

@section('title', 'Tin Tức Nổi Bật & Cẩm Nang Thiết Bị - Bếp Inox Bảo Linh')
@section('meta_description', 'Tổng hợp tin tức ngành ẩm thực, hướng dẫn kỹ thuật sử dụng lò nướng, tủ nấu cơm, nồi phở điện từ chuyên gia Bếp Inox Bảo Linh.')

@section('content')

<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">Tin tức nổi bật</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        
        <!-- Header -->
        <div class="border-b-2 border-[#e11b22] pb-4">
            <span class="text-xs font-bold uppercase tracking-wider text-[#e11b22]">Kiến Thức & Kinh Nghiệm</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase mt-1">
                TIN TỨC & CẨM NANG THIẾT BỊ BẾP BẢO LINH
            </h1>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($articles as $art)
                <div class="bg-white border border-slate-200 rounded-xl overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <a href="{{ route('catalog.news.detail', $art->slug) }}" class="block aspect-video overflow-hidden bg-slate-100">
                            <img src="{{ $art->image_url }}" alt="{{ $art->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </a>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center justify-between text-xs text-slate-500">
                                <span class="bg-red-50 text-[#e11b22] px-2 py-0.5 rounded font-bold uppercase">{{ $art->category }}</span>
                                <span>{{ $art->published_at ? $art->published_at->format('d-m-Y') : date('d-m-Y') }}</span>
                            </div>
                            <h2 class="text-sm sm:text-base font-bold text-slate-900 hover:text-[#e11b22] leading-snug">
                                <a href="{{ route('catalog.news.detail', $art->slug) }}">{{ $art->title }}</a>
                            </h2>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                                {{ $art->summary }}
                            </p>
                        </div>
                    </div>

                    <div class="p-4 pt-0">
                        <a href="{{ route('catalog.news.detail', $art->slug) }}" class="inline-block text-xs font-bold text-[#e11b22] hover:underline">
                            Đọc bài viết chi tiết →
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                    Hiện chưa có bài viết nào trong chuyên mục.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="pt-6 border-t border-slate-200">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
</div>

@endsection
