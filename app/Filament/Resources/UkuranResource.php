<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UkuranResource\Pages;
use App\Filament\Resources\UkuranResource\RelationManagers;
use App\Models\Ukuran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UkuranResource extends Resource
{
    protected static ?string $model = Ukuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('length')
                    ->required()
                    ->label('Panjang (m)')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('width')
                    ->required()
                    ->label('Lebar (cm)')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('height')
                    ->required()
                    ->label('Tebal (mm)')
                    ->numeric()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('length')
                    ->searchable(),
                Tables\Columns\TextColumn::make('width')
                    ->searchable(),
                Tables\Columns\TextColumn::make('height')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListUkurans::route('/'),
            'create' => Pages\CreateUkuran::route('/create'),
            'edit' => Pages\EditUkuran::route('/{record}/edit'),
        ];
    }
}
