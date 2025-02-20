<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(' Name')
                    ->required()
                    ->placeholder('Enter Name'),

                Forms\Components\TextInput::make('email')
                    ->label('email')
                    ->required()
                    ->placeholder('Enter Email'),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->placeholder('Enter Phone')
                    ->required(),
                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->placeholder('Enter Message')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('email')
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Enter phone Number'),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message'),




            ])
                    ->filters([

                        // ...
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
