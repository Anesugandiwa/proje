<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('day')
                    ->label('Day')
                    ->required()
                    ->placeholder('Enter Day'),
                
                Forms\Components\DatePicker::make('start')
                    ->label('Start Date')
                    ->required()
                    ->placeholder('Enter Start date')
                    ->native(false) // Use Filament's custom picker instead of the browser's
                    ->seconds(false),

                Forms\Components\DatePicker::make('end')
                    ->label('End Date')
                    ->required()
                    ->placeholder('Enter end Date')
                    ->native(false)
                    ->seconds(false),

                Forms\Components\TimePicker::make('start_time')
                    ->label('Enter Start time')
                    ->required()
                    ->placeholder('Enter start time'),

                Forms\Components\TimePicker::make('end_time')
                    ->label('Enter end time')
                    ->required()
                    ->placeholder('Enter end time'),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->label('day')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('start')
                    ->label('start')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('end')
                    ->label('End Date')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('start_time')
                    ->label('Enter Start time')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('end_time')
                    ->label('Enter end time')
                    ->sortable()
                    ->searchable(),

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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
