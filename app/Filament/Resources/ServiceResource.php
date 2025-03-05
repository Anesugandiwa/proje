<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\select::make('title')
                    ->options([
                        'meeting_room' => 'Meeting Room',
                        'private_office' => 'Private Office',
                        'dedicated_desk' =>'Dedicated Desk',
                        'hot_desk' =>'Hot Desk',
                        'event_space' =>'Event Space',
                        'board_room' =>'Board Room'
                    ])
                    ->required()
                    ->label('select Room Type'),

                Forms\Components\TextInput::make('description')
                    ->label('Enter description')
                    ->required(),

                Forms\Components\FileUpload::make('preview_image')
                    ->image()
                    ->disk('public') // Stores in storage/app/public
                    ->directory('services')
                    ->imagePreviewHeight(100) // Small preview
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->label('title')->searchable(),
                Tables\Columns\TextColumn::make('description')->label('description')->limit(50),
                Tables\Columns\ImageColumn::make('preview_image')->disk('public')->label('preview_image')->square(),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
