<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactoResource\Pages;
use App\Filament\Resources\ContactoResource\RelationManagers;
use App\Models\Contacto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactoResource extends Resource
{
    protected static ?string $model = Contacto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->required(),
                Forms\Components\Select::make('telefono')
                    ->label('Teléfono')
                    ->required(),
                Forms\Components\Select::make('email')
                    ->label('Email')
                    ->required(),
                Forms\Components\Textarea::make('mensaje')
                    ->label('Mensaje')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
              ->columns([
                TextColumn::make('nombre')
                    ->label('Nombre del Usuario')
                    ->searchable(),
                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable(),
                TextColumn::make('Email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('Mensaje')
                    ->label('Mensaje'), 
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
            'index' => Pages\ListContactos::route('/'),
            'create' => Pages\CreateContacto::route('/create'),
            'edit' => Pages\EditContacto::route('/{record}/edit'),
        ];
    }
}
