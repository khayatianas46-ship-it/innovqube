<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Réservations';

    protected static ?string $modelLabel = 'Réservation';

    protected static ?string $pluralModelLabel = 'Réservations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Utilisateur')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('property_id')
                    ->label('Propriété')
                    ->relationship('property', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\DatePicker::make('start_date')
                    ->label('Date d’arrivée')
                    ->required()
                    ->native(false),

                Forms\Components\DatePicker::make('end_date')
                    ->label('Date de départ')
                    ->required()
                    ->native(false)
                    ->after('start_date'),

                Forms\Components\Select::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'cancelled' => 'Annulée',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('total_price')
                    ->label('Prix total')
                    ->numeric()
                    ->minValue(0)
                    ->prefix('DT')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('property.name')
                    ->label('Propriété')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Arrivée')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Départ')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('Prix total')
                    ->money('TND')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créée le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'cancelled' => 'Annulée',
                    ]),

                Tables\Filters\SelectFilter::make('property_id')
                    ->label('Propriété')
                    ->relationship('property', 'name'),
            ])
            ->actions([
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