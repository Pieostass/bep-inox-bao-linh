<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý Showroom';
    protected static ?string $navigationLabel = 'Bài viết & Cẩm nang';
    protected static ?string $modelLabel = 'Bài viết';
    protected static ?string $pluralModelLabel = 'Danh sách bài viết';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Nội dung bài viết')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Tiêu đề bài viết')
                            ->required()
                            ->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->label('Đường dẫn SEO (Slug)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpan(1),

                        Forms\Components\Select::make('category')
                            ->label('Chuyên mục bài viết')
                            ->options([
                                'Kinh nghiệm chọn mua' => 'Kinh nghiệm chọn mua',
                                'Hướng dẫn kỹ thuật' => 'Hướng dẫn kỹ thuật',
                                'Cẩm nang ẩm thực' => 'Cẩm nang ẩm thực',
                                'Tư vấn đầu tư' => 'Tư vấn đầu tư',
                                'Tin tức nổi bật' => 'Tin tức nổi bật',
                            ])
                            ->default('Kinh nghiệm chọn mua')
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\FileUpload::make('image')
                            ->label('Ảnh đại diện bài viết')
                            ->image()
                            ->directory('posts')
                            ->columnSpan(1),

                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('author')
                                ->label('Tác giả bài viết')
                                ->default('Bếp Inox Bảo Linh')
                                ->required(),

                            Forms\Components\DatePicker::make('published_at')
                                ->label('Ngày xuất bản')
                                ->default(now())
                                ->required(),

                            Forms\Components\Toggle::make('is_published')
                                ->label('Hiển thị trên website')
                                ->default(true)
                                ->inline(false),
                        ])->columnSpan(1),

                        Forms\Components\Textarea::make('summary')
                            ->label('Tóm tắt ngắn (Lead)')
                            ->placeholder('Mô tả ngắn gọn nội dung bài viết hiển thị ở danh sách tin...')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->label('Nội dung chi tiết bài viết')
                            ->placeholder('Nhập nội dung bài viết, chèn hình ảnh, định dạng văn bản...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Ảnh')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề bài viết')
                    ->searchable()
                    ->sortable()
                    ->limit(45)
                    ->tooltip(fn ($record) => $record->title),

                Tables\Columns\TextColumn::make('category')
                    ->label('Chuyên mục')
                    ->badge()
                    ->color('danger')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Hiển thị')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Ngày đăng')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('author')
                    ->label('Tác giả')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Lọc chuyên mục')
                    ->options([
                        'Kinh nghiệm chọn mua' => 'Kinh nghiệm chọn mua',
                        'Hướng dẫn kỹ thuật' => 'Hướng dẫn kỹ thuật',
                        'Cẩm nang ẩm thực' => 'Cẩm nang ẩm thực',
                        'Tư vấn đầu tư' => 'Tư vấn đầu tư',
                        'Tin tức nổi bật' => 'Tin tức nổi bật',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Trạng thái hiển thị'),
            ])
            ->actions([
                Tables\Actions\Action::make('view_web')
                    ->label('Xem bài')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn (Post $record): string => route('catalog.news.detail', $record->slug))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
