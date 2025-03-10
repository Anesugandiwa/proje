<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BookingResource\Pages;
use App\Filament\User\Resources\BookingResource\RelationManagers;
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
                Forms\Components\DatePicker::make('date')
                ->label('DATE')
                ->required()
                ->placeholder('Enter date'),
            
            Forms\Components\TimePicker::make('start_time')
                ->label('Time')
                ->required()
                ->placeholder('From')
                ->native(false) // Use Filament's custom picker instead of the browser's
                ->seconds(false),

            Forms\Components\TimePicker::make('end_time')
                ->label('Time')
                ->required()
                ->placeholder('To')
                ->native(false)
                ->seconds(false),

            Forms\Components\Select::make('spaces')
                ->options([
                    'meeting_room_east'         => 'Meeting Room East',
                    'meeting_room_west'         => 'Meeting Room West',
                    'boardroom'                 =>'Board Room',
                    'event_space'               => 'Event Space',
                ])
                ->label('Spaces')
                ->required()
                ->placeholder('No  space selected'),

            Forms\Components\TextInput::make('title')
                ->label('Booking Tittle')
                ->required()
                ->placeholder('Add title'),
            
            Forms\Components\TextInput::make('company_name')
            ->label('Enter Company/Individual Name')
            ->placeholder('e.g. Omni Learning')
            ->required(),

            forms\Components\TextInput::make('phone_number')
            ->label('Phone')
            ->placeholder('Phone')
            ->required(),


               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                ->label('Date')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('start_time')
                ->label('Start Time')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('end_time')
                ->label('End Time')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('spaces')
                ->label('Spaces')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('title')
                ->label('Booking Title')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('company_name')
                ->label('Company/Individual Name')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('phone_number')
                ->label('Phone Number')
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
