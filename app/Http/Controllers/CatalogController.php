<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Show catalog homepage / product listing
     */
    public function index(Request $request)
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->withCount(['products' => function ($query) {
                $query->where('is_active', true);
            }])
            ->get();

        $selectedCategory = null;
        if ($request->filled('category')) {
            $selectedCategory = Category::where('slug', $request->query('category'))->first();
        }

        $query = Product::query()
            ->with('category')
            ->where('is_active', true);

        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory->id);
        }

        if ($request->filled('q')) {
            $keyword = trim($request->query('q'));
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('sku', 'like', "%{$keyword}%")
                  ->orWhere('short_description', 'like', "%{$keyword}%");
            });
        }

        // Sorting
        $sort = $request->query('sort', 'latest');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc' => $query->orderBy('name', 'asc'),
            default => $query->orderBy('is_featured', 'desc')->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        // Featured products for spotlight / highlights
        $featuredProducts = Product::query()
            ->where('is_active', true)
            ->where('is_featured', true)
            ->take(6)
            ->get();

        // Latest articles from database
        $latestPosts = Post::query()
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('catalog.index', compact('categories', 'selectedCategory', 'products', 'featuredProducts', 'latestPosts'));
    }

    /**
     * Show single product details
     */
    public function show($slug)
    {
        $product = Product::query()
            ->where('is_active', true)
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)->orWhere('id', $slug);
            })
            ->with('category')
            ->firstOrFail();

        $product->increment('views_count');

        // Related products in same category
        $relatedProducts = Product::query()
            ->where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(5)
            ->get();

        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('catalog.show', compact('product', 'relatedProducts', 'categories'));
    }

    /**
     * Giới thiệu về công ty
     */
    public function about()
    {
        return view('catalog.about');
    }

    /**
     * Xưởng sản xuất / Showroom
     */
    public function factory()
    {
        return view('catalog.factory');
    }

    /**
     * Chính sách bảo hành, vận chuyển, đổi trả, thanh toán
     */
    public function policy()
    {
        return view('catalog.policy');
    }

    /**
     * Trang liên hệ & bản đồ
     */
    public function contact()
    {
        return view('catalog.contact');
    }

    /**
     * Tin tức nổi bật & cẩm nang kỹ thuật
     */
    public function news()
    {
        $articles = Post::query()
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(8);

        return view('catalog.news', compact('articles'));
    }

    /**
     * Chi tiết bài viết tin tức
     */
    public function newsDetail($slug)
    {
        $article = Post::query()
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArticles = Post::query()
            ->where('is_published', true)
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('catalog.news-detail', compact('article', 'relatedArticles'));
    }

    /**
     * Handle quick quote request submission
     */
    public function quote(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'product_id' => 'nullable|exists:products,id',
            'company_or_address' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        QuoteRequest::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn Quý khách! Bếp Inox Bảo Linh sẽ liên hệ báo giá trong ít phút.',
            ]);
        }

        return back()->with('success', 'Yêu cầu báo giá của bạn đã được gửi thành công! Chuyên viên Bếp Inox Bảo Linh sẽ liên hệ ngay.');
    }
}
