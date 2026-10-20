<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Quản lý Showroom';
    protected static ?string $navigationLabel = 'Sản phẩm Bếp';
    protected static ?string $modelLabel = 'Sản phẩm';
    protected static ?string $pluralModelLabel = 'Danh sách sản phẩm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->label('Đường dẫn SEO (Slug)')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('category_id')
                            ->label('Danh mục')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\TextInput::make('sku')
                            ->label('Mã SKU / Model')
                            ->placeholder('VD: BL-LN5K-SS'),

                        Forms\Components\TextInput::make('price')
                            ->label('Giá bán (VNĐ)')
                            ->numeric()
                            ->suffix('đ'),

                        Forms\Components\TextInput::make('price_label')
                            ->label('Nhãn hiển thị giá')
                            ->default('Liên hệ')
                            ->placeholder('VD: 12.500.000 đ hoặc Liên hệ'),

                        Forms\Components\TextInput::make('original_price')
                            ->label('Giá gốc niêm yết (nếu có giảm)')
                            ->numeric()
                            ->suffix('đ'),

                        Forms\Components\TextInput::make('discount_percent')
                            ->label('Phần trăm giảm (%)')
                            ->numeric()
                            ->suffix('%'),

                        Forms\Components\TextInput::make('badge')
                            ->label('Huy hiệu / Tag nổi bật')
                            ->placeholder('VD: Bán chạy, Ưu đãi 15%, Mới 2026'),

                        Forms\Components\TextInput::make('warranty_months')
                            ->label('Bảo hành (tháng)')
                            ->numeric()
                            ->default(12),
                    ]),

                Forms\Components\Section::make('Hình ảnh sản phẩm')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('thumbnail')
                            ->label('Ảnh đại diện (URL)')
                            ->placeholder('https://...'),

                        Forms\Components\TagsInput::make('images')
                            ->label('Danh sách ảnh Gallery (URLs)')
                            ->placeholder('Thêm URL ảnh rồi Enter'),
                    ]),

                Forms\Components\Section::make('Thông số kỹ thuật (Bảng Specifications)')
                    ->schema([
                        Forms\Components\KeyValue::make('specifications')
                            ->label('Bảng thông số kỹ thuật (Tên thông số -> Giá trị)')
                            ->keyLabel('Tên thông số (VD: Công suất, Điện áp, Kích thước)')
                            ->valueLabel('Giá trị (VD: 7.5 kW, 380V/50Hz, 900x1250x950 mm)')
                            ->reorderable(),
                    ]),

                Forms\Components\Section::make('Mô tả & Giới thiệu chi tiết')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->label('Tóm tắt ngắn (1-2 câu)')
                            ->rows(3),

                        Forms\Components\RichEditor::make('description')
                            ->label('Nội dung chi tiết (Rich Text)'),
                    ]),

                Forms\Components\Section::make('Trạng thái hiển thị')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Sản phẩm nổi bật / Khuyên dùng')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Hiển thị trên website')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Ảnh'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên thiết bị')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('Mã SKU')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->sortable(),
                Tables\Columns\TextColumn::make('display_price')
                    ->label('Giá hiển thị')
                    ->color('danger')
                    ->weight('bold'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Nổi bật')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Kích hoạt')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Danh mục')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
