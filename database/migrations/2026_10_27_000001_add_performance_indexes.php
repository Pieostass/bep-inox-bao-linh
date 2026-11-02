<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add indexes for the columns used by public catalog queries
     * (filter by active/category, featured sort, published posts).
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->index(['is_active', 'category_id'], 'products_active_category_idx');
            $table->index(['is_active', 'is_featured', 'created_at'], 'products_active_featured_idx');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'categories_active_sort_idx');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->index(['is_published', 'published_at'], 'posts_published_idx');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_active_category_idx');
            $table->dropIndex('products_active_featured_idx');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_active_sort_idx');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_published_idx');
        });
    }
};
