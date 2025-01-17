<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'option1' => 'meeting_room',
                        'option2' => 'private_office',
                        'option3' =>'desk'
                    ])
                    ->required()
                    ->label('Type (select'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('name')
                    ->placeholder('Enter Name'),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->label('capacity')
                    ->placeholder('Enter Capacity'),
                Forms\Components\Toggle::make('available')
                    ->label('Available')
                    ->default(true)
                    ->required()



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->label('Type'),
                Tables\Columns\TextColumn::make('name')->label('name'),
                Tables\Columns\TextColumn::make('capacity')->label('capacity'),
                Tables\Columns\TextColumn::make('available')->label('available'),

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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
