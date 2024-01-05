<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Filament\Widgets\GuestStatusChart;
use App\Models\Event;
use App\Traits\HandlesLocalization;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\App;

class EventResource extends Resource
{
    use HandlesLocalization;

    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('title')
                    ->required()
                    ->maxLength(400),
                Forms\Components\RichEditor::make('description')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('location')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('location_title')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('address')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('google_maps_hyperlink')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('google_maps_embed_one')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('google_maps_embed_two')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('time')
                    ->columnSpan('full'),
                Forms\Components\DatePicker::make('date'),
                Forms\Components\TextInput::make('google_calendar_link')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('category')
                    ->maxLength(400),
                Forms\Components\TextInput::make('tags'),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(400),
                Forms\Components\DateTimePicker::make('default_response_deadline'),
                Forms\Components\DateTimePicker::make('published'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('default_response_deadline')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
