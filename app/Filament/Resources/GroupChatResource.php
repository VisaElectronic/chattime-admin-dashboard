<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupChatResource\Pages;
use App\Filament\Resources\GroupChatResource\RelationManagers;
use App\Models\GroupChat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupChatResource extends Resource
{
    protected static ?string $model = GroupChat::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Statistic';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('members_count')
                    ->label('Members')
                    ->getStateUsing(fn($record) => $record->channels()->count())
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListGroupChats::route('/'),
            // 'create' => Pages\CreateGroupChat::route('/create'),
            // 'edit' => Pages\EditGroupChat::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('is_group', 1)
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
