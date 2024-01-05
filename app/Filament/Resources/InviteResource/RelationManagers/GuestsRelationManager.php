<?php

namespace App\Filament\Resources\InviteResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuestsRelationManager extends RelationManager
{
    protected static string $relationship = 'guests';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('guest_status_id')
                    ->relationship('guestStatus', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->maxLength(400),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(400),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(400),
                Forms\Components\TextInput::make('custom_reply')
                    ->maxLength(400),
                Forms\Components\Toggle::make('is_plus_one')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
