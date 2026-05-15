<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataDeletionRequestResource\Pages;
use App\Models\DataDeletionRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class DataDeletionRequestResource extends Resource
{
    protected static ?string $model = DataDeletionRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';

    protected static ?string $navigationLabel = 'Data Deletion Requests';

    protected static ?string $modelLabel = 'Deletion Request';

    protected static ?string $pluralModelLabel = 'Deletion Requests';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Request Information')
                    ->schema([
                        Forms\Components\TextInput::make('userProfile.name')
                            ->label('Profile Name')
                            ->disabled(),
                        Forms\Components\TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->disabled(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'completed' => 'Completed',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                        Forms\Components\DateTimePicker::make('created_at')
                            ->label('Submitted')
                            ->disabled(),
                        Forms\Components\DateTimePicker::make('processed_at')
                            ->label('Processed At')
                            ->disabled(),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Admin Notes')
                    ->schema([
                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Notes')
                            ->rows(3)
                            ->placeholder('Add notes about this request...'),
                        Forms\Components\Textarea::make('rejection_reason')
                            ->label('Rejection Reason')
                            ->rows(3)
                            ->placeholder('Reason for rejection (visible to user)...')
                            ->visible(fn ($record) => $record?->status === 'rejected'),
                    ]),

                Forms\Components\Section::make('Verification Documents')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\ViewField::make('id_front_url')
                                    ->label('ID Front')
                                    ->view('filament.components.document-viewer'),
                                Forms\Components\ViewField::make('id_back_url')
                                    ->label('ID Back')
                                    ->view('filament.components.document-viewer'),
                                Forms\Components\ViewField::make('selfie_url')
                                    ->label('Selfie with ID')
                                    ->view('filament.components.document-viewer'),
                                Forms\Components\ViewField::make('ssn_card_url')
                                    ->label('SSN/Tax ID Card')
                                    ->view('filament.components.document-viewer'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('userProfile.name')
                    ->label('Profile')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->label('Contact Email')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('M d, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('processed_at')
                    ->label('Processed')
                    ->dateTime('M d, Y')
                    ->placeholder('Not processed')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('viewDocuments')
                    ->label('View Documents')
                    ->icon('heroicon-o-eye')
                    ->color('success')
                    ->modalHeading(fn ($record) => "Documents - {$record->userProfile->name}")
                    ->modalContent(fn ($record) => view('filament.components.document-modal', [
                        'record' => $record,
                    ]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close'),
                Action::make('markProcessing')
                    ->label('Mark Processing')
                    ->icon('heroicon-o-arrow-path')
                    ->color('info')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record) {
                        $record->markAsProcessing();
                        Notification::make()
                            ->title('Status updated to Processing')
                            ->success()
                            ->send();
                    }),
                Action::make('markCompleted')
                    ->label('Mark Completed')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => in_array($record->status, ['pending', 'processing']))
                    ->form([
                        Forms\Components\Textarea::make('notes')
                            ->label('Completion Notes (Optional)')
                            ->placeholder('Add any notes about the completion...'),
                    ])
                    ->action(function ($record, array $data) {
                        $record->markAsCompleted($data['notes'] ?? null);
                        Notification::make()
                            ->title('Request marked as Completed')
                            ->success()
                            ->send();
                    }),
                Action::make('markRejected')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => in_array($record->status, ['pending', 'processing']))
                    ->form([
                        Forms\Components\Textarea::make('reason')
                            ->label('Rejection Reason')
                            ->required()
                            ->placeholder('Why is this request being rejected?'),
                    ])
                    ->action(function ($record, array $data) {
                        $record->markAsRejected($data['reason']);
                        Notification::make()
                            ->title('Request rejected')
                            ->danger()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataDeletionRequests::route('/'),
            'create' => Pages\CreateDataDeletionRequest::route('/create'),
            'view' => Pages\ViewDataDeletionRequest::route('/{record}'),
            'edit' => Pages\EditDataDeletionRequest::route('/{record}/edit'),
        ];
    }
}
