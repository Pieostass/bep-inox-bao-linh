@extends('layouts.app')

@section('title', $article->title . ' - Bếp Inox Bảo Linh')
@section('meta_description', Str::limit(strip_tags($article->summary), 160))

@section('content')

<div class="bg-white">
    <!-- Breadcrumb -->
    <div class="border-b border-slate-200 py-2.5 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center space-x-2">
            <a href="{{ route('catalog.index') }}" class="hover:text-[#e11b22]">Trang chủ</a>
            <span>/</span>
            <a href="{{ route('catalog.news') }}" class="hover:text-[#e11b22]">Tin tức</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate">{{ $article->title }}</span>
        </div>
    </div>

    <!-- Main Content -->
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
        
        <!-- Meta -->
        <div class="space-y-2 border-b border-slate-200 pb-4">
            <div class="flex items-center space-x-3 text-xs text-slate-500">
                <span class="bg-red-50 text-[#e11b22] px-2.5 py-0.5 rounded font-bold uppercase">{{ $article->category }}</span>
                <span>Ngày đăng: {{ $article->published_at ? $article->published_at->format('d-m-Y') : date('d-m-Y') }}</span>
                <span>Tác giả: {{ $article->author ?: 'Bếp Inox Bảo Linh' }}</span>
            </div>
            <h1 class="text-xl sm:text-3xl font-black text-slate-900 leading-snug">
                {{ $article->title }}
            </h1>
        </div>

        <!-- Featured Image -->
        <div class="rounded-xl overflow-hidden bg-slate-100 aspect-video max-h-96 shadow-sm">
            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
        </div>

        @if($article->summary)
            <!-- Summary Lead -->
            <p class="text-sm font-semibold text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-200 leading-relaxed italic">
                {{ $article->summary }}
            </p>
        @endif

        <!-- Body text -->
        <div class="prose max-w-none text-sm text-slate-700 leading-relaxed space-y-4">
            {!! $article->content !!}

            <h2 class="text-base font-bold text-slate-900 uppercase pt-4 border-t border-slate-100">
                Lời khuyên từ chuyên viên kỹ thuật Bếp Inox Bảo Linh
            </h2>
            <p>
                Để đảm bảo độ bền tối ưu cho thiết bị inox và hệ thống nhiệt điện, người dùng nên thực hiện bảo dưỡng vệ sinh hàng ngày sau mỗi ca làm việc. Không sử dụng các búi sắt thô ráp chà xát mạnh vào mặt kính điều khiển hoặc các cảm biến nhiệt độ. Thường xuyên kiểm tra nguồn điện cấp và đường xả nước đáy nồi, van phao tự động.
            </p>
            <p>
                Nếu có bất kỳ dấu hiệu bất thường nào về nhiệt độ hoặc hiện tượng rò rỉ điện, hãy ngắt ngay nguồn điện cấp và liên hệ với đội ngũ kỹ thuật của Công ty TNHH Bếp Inox Bảo Linh theo số hotline <strong class="text-[#e11b22]">0988.666.888</strong> để được hướng dẫn xử lý an toàn.
            </p>
        </div>

        <!-- Consultation Callout -->
        <div class="p-6 bg-red-50 rounded-xl border border-red-200 flex flex-col sm:flex-row items-center justify-between gap-4 mt-8 shadow-sm">
            <div>
                <strong class="text-slate-900 text-sm block">Cần tư vấn chọn mua thiết bị hoặc báo giá xuất xưởng?</strong>
                <span class="text-xs text-slate-600">Bảo Linh cam kết tư vấn đúng công suất, tiết kiệm chi phí</span>
            </div>
            <div class="flex items-center space-x-3 shrink-0">
                <a href="tel:0988666888" class="px-5 py-2.5 bg-[#e11b22] text-white font-bold text-xs uppercase rounded-lg hover:bg-[#c6151c] transition-colors shadow">
                    Hotline: 0988.666.888
                </a>
                <button type="button" 
                        onclick="openQuoteModal('', '{{ addslashes($article->title) }}')"
                        class="px-5 py-2.5 bg-slate-900 text-white font-bold text-xs uppercase rounded-lg hover:bg-slate-800 transition-colors shadow">
                    Nhận Báo Giá
                </button>
            </div>
        </div>

        <!-- Related Articles -->
        @if(isset($relatedArticles) && $relatedArticles->count() > 0)
            <div class="pt-10 border-t border-slate-200">
                <h3 class="text-base font-bold text-slate-900 uppercase mb-4">
                    Bài Viết Cùng Chuyên Mục
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($relatedArticles as $rel)
                        <a href="{{ route('catalog.news.detail', $rel->slug) }}" class="group block space-y-2">
                            <div class="aspect-video rounded-lg overflow-hidden bg-slate-100">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <h4 class="text-xs font-bold text-slate-800 group-hover:text-[#e11b22] line-clamp-2 leading-snug">
                                {{ $rel->title }}
                            </h4>
                            <span class="text-[10px] text-slate-400 block">
                                {{ $rel->published_at ? $rel->published_at->format('d-m-Y') : date('d-m-Y') }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </article>
</div>

@endsection
