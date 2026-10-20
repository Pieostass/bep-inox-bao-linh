<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteRequestResource\Pages;
use App\Models\QuoteRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuoteRequestResource extends Resource
{
    protected static ?string $model = QuoteRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Quản lý Showroom';
    protected static ?string $navigationLabel = 'Yêu cầu Báo Giá';
    protected static ?string $modelLabel = 'Yêu cầu báo giá';
    protected static ?string $pluralModelLabel = 'Danh sách yêu cầu báo giá';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin khách hàng & Yêu cầu')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->label('Sản phẩm quan tâm')
                            ->relationship('product', 'name')
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('status')
                            ->label('Trạng thái xử lý')
                            ->options([
                                'pending' => 'Chờ xử lý (Mới nhận)',
                                'contacted' => 'Đã gọi tư vấn',
                                'quoted' => 'Đã gửi file báo giá',
                                'closed' => 'Hoàn tất / Chốt hợp đồng',
                                'cancelled' => 'Hủy yêu cầu',
                            ])
                            ->default('pending')
                            ->required(),

                        Forms\Components\TextInput::make('customer_name')
                            ->label('Họ và tên khách')
                            ->required(),

                        Forms\Components\TextInput::make('phone')
                            ->label('Số điện thoại / Zalo')
                            ->tel()
                            ->required(),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email(),

                        Forms\Components\TextInput::make('company_or_address')
                            ->label('Công ty / Địa chỉ công trình'),

                        Forms\Components\Textarea::make('notes')
                            ->label('Ghi chú nhu cầu kỹ thuật')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Thời gian gửi')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Điện thoại / Zalo')
                    ->searchable()
                    ->copyable()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('product.name')
                    ->label('Thiết bị quan tâm')
                    ->wrap()
                    ->placeholder('Tư vấn tổng thể'),

                Tables\Columns\TextColumn::make('company_or_address')
                    ->label('Cơ sở / Địa chỉ')
                    ->limit(25),

                Tables\Columns\TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Chờ xử lý',
                        'contacted' => 'Đã gọi',
                        'quoted' => 'Đã báo giá',
                        'closed' => 'Thành công',
                        'cancelled' => 'Đã hủy',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'contacted' => 'info',
                        'quoted' => 'primary',
                        'closed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'contacted' => 'Đã gọi tư vấn',
                        'quoted' => 'Đã gửi báo giá',
                        'closed' => 'Thành công',
                    ]),
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
            'index' => Pages\ListQuoteRequests::route('/'),
            'create' => Pages\CreateQuoteRequest::route('/create'),
            'edit' => Pages\EditQuoteRequest::route('/{record}/edit'),
        ];
    }
}
