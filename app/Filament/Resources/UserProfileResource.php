<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserProfileResource\Pages;
use App\Models\UserProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserProfileResource extends Resource
{
    protected static ?string $model = UserProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'User Profiles';

    protected static ?string $modelLabel = 'User Profile';

    protected static ?string $pluralModelLabel = 'User Profiles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('Email Addresses')
                    ->schema([
                        Forms\Components\Repeater::make('payload.emails')
                            ->label('')
                            ->addActionLabel('Add Email')
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('Start Date'),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('End Date'),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->collapsible(),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('Phone Numbers')
                    ->schema([
                        Forms\Components\Repeater::make('payload.phone_numbers')
                            ->label('')
                            ->addActionLabel('Add Phone Number')
                            ->schema([
                                Forms\Components\TextInput::make('number')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('extension')
                                    ->maxLength(20),
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('Start Date'),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('End Date'),
                            ])
                            ->columns(4)
                            ->defaultItems(0)
                            ->collapsible(),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('Addresses')
                    ->schema([
                        Forms\Components\Repeater::make('payload.addresses')
                            ->label('')
                            ->addActionLabel('Add Address')
                            ->schema([
                                Forms\Components\Textarea::make('address')
                                    ->required()
                                    ->maxLength(500)
                                    ->rows(2),
                                Forms\Components\TextInput::make('location')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('Start Date'),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('End Date'),
                            ])
                            ->columns(4)
                            ->defaultItems(0)
                            ->collapsible(),
                    ])
                    ->columnSpanFull(),

                Forms\Components\Section::make('VSN / Other IDs')
                    ->schema([
                        Forms\Components\Repeater::make('payload.vsn_numbers')
                            ->label('')
                            ->addActionLabel('Add VSN Number')
                            ->schema([
                                Forms\Components\TextInput::make('vsn')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('Start Date'),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('End Date'),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->collapsible(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('primary_email')
                    ->label('Primary Email')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereRaw(
                            "JSON_SEARCH(LOWER(payload), 'one', LOWER(?), NULL, '$.emails[*].email') IS NOT NULL",
                            [$search]
                        );
                    }),

                Tables\Columns\TextColumn::make('primary_phone')
                    ->label('Primary Phone'),

                Tables\Columns\TextColumn::make('all_locations')
                    ->label('Locations')
                    ->badge()
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', array_slice($state, 0, 2)) : $state)
                    ->tooltip(fn ($record) => implode(', ', $record->all_locations)),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Created From'),
                        Forms\Components\DatePicker::make('created_to')
                            ->label('Created To'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),

                Tables\Filters\Filter::make('updated_at')
                    ->form([
                        Forms\Components\DatePicker::make('updated_from')
                            ->label('Updated From'),
                        Forms\Components\DatePicker::make('updated_to')
                            ->label('Updated To'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['updated_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('updated_at', '>=', $date),
                            )
                            ->when(
                                $data['updated_to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('updated_at', '<=', $date),
                            );
                    }),

                Tables\Filters\SelectFilter::make('location')
                    ->options(function () {
                        return UserProfile::all()
                            ->flatMap(fn ($profile) => $profile->all_locations)
                            ->unique()
                            ->filter()
                            ->mapWithKeys(fn ($location) => [$location => $location])
                            ->toArray();
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['value'])) {
                            return $query;
                        }
                        return $query->whereRaw(
                            "JSON_SEARCH(LOWER(payload), 'one', LOWER(?), NULL, '$.addresses[*].location') IS NOT NULL",
                            [$data['value']]
                        );
                    })
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserProfiles::route('/'),
            'create' => Pages\CreateUserProfile::route('/create'),
            'view' => Pages\ViewUserProfile::route('/{record}'),
            'edit' => Pages\EditUserProfile::route('/{record}/edit'),
        ];
    }
}
