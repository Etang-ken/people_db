<?php

namespace App\Filament\Resources\UserProfileResource\Pages;

use App\Filament\Resources\UserProfileResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewUserProfile extends ViewRecord
{
    protected static string $resource = UserProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Name'),
                    ])
                    ->columnSpanFull(),

                Section::make('Email Addresses')
                    ->schema([
                        RepeatableEntry::make('payload.emails')
                            ->label('')
                            ->hidden(fn ($record) => empty($record->payload['emails']))
                            ->schema([
                                TextEntry::make('email')
                                    ->label('Email'),
                                TextEntry::make('start_date')
                                    ->label('From'),
                                TextEntry::make('end_date')
                                    ->label('To'),
                            ])
                            ->columns(3),
                        TextEntry::make('email_placeholder')
                            ->label('')
                            ->default('No email addresses')
                            ->hidden(fn ($record) => !empty($record->payload['emails'])),
                    ])
                    ->columnSpanFull(),

                Section::make('Phone Numbers')
                    ->schema([
                        RepeatableEntry::make('payload.phone_numbers')
                            ->label('')
                            ->hidden(fn ($record) => empty($record->payload['phone_numbers']))
                            ->schema([
                                TextEntry::make('number')
                                    ->label('Number'),
                                TextEntry::make('extension')
                                    ->label('Extension'),
                                TextEntry::make('start_date')
                                    ->label('From'),
                                TextEntry::make('end_date')
                                    ->label('To'),
                            ])
                            ->columns(4),
                        TextEntry::make('phone_placeholder')
                            ->label('')
                            ->default('No phone numbers')
                            ->hidden(fn ($record) => !empty($record->payload['phone_numbers'])),
                    ])
                    ->columnSpanFull(),

                Section::make('Addresses')
                    ->schema([
                        RepeatableEntry::make('payload.addresses')
                            ->label('')
                            ->hidden(fn ($record) => empty($record->payload['addresses']))
                            ->schema([
                                TextEntry::make('address')
                                    ->label('Address'),
                                TextEntry::make('location')
                                    ->label('Location'),
                                TextEntry::make('start_date')
                                    ->label('From'),
                                TextEntry::make('end_date')
                                    ->label('To'),
                            ])
                            ->columns(4),
                        TextEntry::make('address_placeholder')
                            ->label('')
                            ->default('No addresses')
                            ->hidden(fn ($record) => !empty($record->payload['addresses'])),
                    ])
                    ->columnSpanFull(),

                Section::make('VSN / Other IDs')
                    ->schema([
                        RepeatableEntry::make('payload.vsn_numbers')
                            ->label('')
                            ->hidden(fn ($record) => empty($record->payload['vsn_numbers']))
                            ->schema([
                                TextEntry::make('vsn')
                                    ->label('VSN Number'),
                                TextEntry::make('start_date')
                                    ->label('From'),
                                TextEntry::make('end_date')
                                    ->label('To'),
                            ])
                            ->columns(3),
                        TextEntry::make('vsn_placeholder')
                            ->label('')
                            ->default('No VSN numbers')
                            ->hidden(fn ($record) => !empty($record->payload['vsn_numbers'])),
                    ])
                    ->columnSpanFull(),

                Section::make('Metadata')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Updated At')
                            ->dateTime(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
