<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InviteResource\Pages;
use App\Filament\Resources\InviteResource\RelationManagers;
use App\Models\Invite;
use App\Traits\HandlesLocalization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\App;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class InviteResource extends Resource
{
    use HandlesLocalization;

    protected static ?string $model = Invite::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->relationship('event', 'title')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug (Short URL)')
                    ->required()
                    ->maxLength(400)
                    ->rules([
                        'regex:/^[a-z0-9-]+$/',
                    ])
                    ->unique(ignorable: fn ($record) => $record)
                    ->rules('regex:/^[a-z0-9-]+$/'),
                Forms\Components\TextInput::make('title')
                    ->label('Custom Title')
                    ->required()
                    ->maxLength(400)
                    ->columnSpan('full'),
                Forms\Components\Textarea::make('custom_message')
                    ->rows(10)
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('tags'),
                Forms\Components\Select::make('language')
                    ->options([
                        'en' => 'English',
                        'fa' => 'Persian',
                    ])
                    ->required(),
                Forms\Components\DateTimePicker::make('sent_at'),
                Forms\Components\DateTimePicker::make('replied_at')->disabled(),
                Forms\Components\DateTimePicker::make('last_replied_at')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                Tables\Columns\TextColumn::make('language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sent_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('replied_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_replied_at')
                    ->dateTime()
                    ->sortable(),
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
            RelationManagers\GuestsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvites::route('/'),
            'create' => Pages\CreateInvite::route('/create'),
            'edit' => Pages\EditInvite::route('/{record}/edit'),
        ];
    }
}
