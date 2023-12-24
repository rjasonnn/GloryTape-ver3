<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Bahan;
use App\Models\Product;
use App\Models\Ukuran;
use App\Models\Warna;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //get data to array for select option (from table bahan)
    public static function getBahan(): array
    {
        $bahan = Bahan::all();
        $bahanArray = [];
        foreach ($bahan as $b) {
            $bahanArray[$b->id] = $b->name;
        }
        return $bahanArray;
    }

    //get data to array for select option (from table warna)
    public static function getWarna(): array
    {
        $warna = Warna::all();
        $warnaArray = [];
        foreach ($warna as $w) {
            $warnaArray[$w->id] = $w->name;
        }
        return $warnaArray;
    }

    //get data to array for select option (from table ukuran)
    public static function getUkuran(): array
    {
        $ukuran = Ukuran::all();
        $ukuranArray = [];
        foreach ($ukuran as $u) {
            $ukuranArray[$u->id] = $u->length . ' x ' . $u->width . ' x ' . $u->height;
        }
        return $ukuranArray;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bahan_id')
                    ->required()
                    ->options([
                        self::getBahan()
                    ])
                    ->label('Bahan')
                    ->placeholder('Pilih Bahan'),
                Forms\Components\Select::make('warna_id')
                    ->required()
                    ->options([
                        self::getWarna()
                    ])
                    ->label('Warna')
                ->placeholder('Pilih Warna'),
                Forms\Components\Select::make('ukuran_id')
                    ->required()
                    ->options([
                        self::getUkuran()
                    ])
                    ->label('Ukuran')
                    ->placeholder('Pilih Ukuran'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bahan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('warna_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ukuran_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
