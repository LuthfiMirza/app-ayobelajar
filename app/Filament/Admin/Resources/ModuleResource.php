<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ModuleResource\Pages;
use App\Filament\Admin\Resources\ModuleResource\RelationManagers;
use App\Models\Module;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use App\Rules\MaxFileSize;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Modul Pembelajaran';

    protected static ?string $modelLabel = 'Modul';

    protected static ?string $pluralModelLabel = 'Modul';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Modul')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Modul')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(3),
                        
                        Select::make('level')
                            ->label('Level Pendidikan')
                            ->options([
                                'SD' => 'SD',
                                'SMP' => 'SMP',
                                'SMA' => 'SMA',
                            ])
                            ->required(),
                        
                        Select::make('subject')
                            ->label('Mata Pelajaran')
                            ->options([
                                'Matematika' => 'Matematika',
                                'IPA' => 'IPA',
                                'B. Indonesia' => 'B. Indonesia',
                                'IPS' => 'IPS',
                                'B. Inggris' => 'B. Inggris',
                                'Fisika' => 'Fisika',
                                'Kimia' => 'Kimia',
                                'Biologi' => 'Biologi',
                            ])
                            ->required(),
                        
                        Select::make('icon')
                            ->label('Icon')
                            ->options([
                                'fas fa-calculator' => '🧮 Calculator (Matematika)',
                                'fas fa-flask' => '🧪 Flask (IPA/Kimia)',
                                'fas fa-atom' => '⚛️ Atom (Fisika)',
                                'fas fa-book-open-reader' => '📖 Book Reader (B. Indonesia)',
                                'fas fa-language' => '🌐 Language (B. Inggris)',
                                'fas fa-square-root-variable' => '√ Square Root (Matematika)',
                                'fas fa-globe' => '🌍 Globe (IPS)',
                                'fas fa-dna' => '🧬 DNA (Biologi)',
                                'fas fa-book' => '📚 Book (Umum)',
                            ])
                            ->required(),
                        
                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('File Modul')
                    ->schema([
                        FileUpload::make('file_path')
                            ->label('Upload File')
                            ->disk(config('app.env') === 'production' ? 'azure' : 'public')
                            ->directory('modules')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'])
                            ->maxFiles(1)
                            ->maxSize(100 * 1024) // 100MB in KB
                            ->helperText('Format yang didukung: PDF, DOC, DOCX, PPT, PPTX. Maksimal ukuran file: 100MB')
                            ->downloadable()
                            ->previewable(false)
                            ->uploadingMessage('Mengupload file...')
                            ->uploadProgressIndicatorPosition('left')
                            ->rules(['nullable', new MaxFileSize(100)])
                            ->extraAttributes(['accept' => '.pdf,.doc,.docx,.ppt,.pptx'])
                            ->storeFileNamesIn('original_uploaded_filename')
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if ($state) {
                                    if (is_string($state)) {
                                        // File sudah ada, ambil info dari storage
                                        $fileName = basename($state);
                                        $originalName = $get('file_name') ?: $fileName;
                                        
                                        $set('original_file_name', $originalName);
                                        
                                        // Only update file_name if it's empty
                                        if (empty($get('file_name'))) {
                                            $set('file_name', $originalName);
                                        }
                                        
                                        $set('file_size', Storage::disk('public')->size($state));
                                        
                                        \Log::info('Existing file info updated:', [
                                            'file_path' => $state,
                                            'original_name' => $originalName,
                                            'file_name' => $get('file_name')
                                        ]);
                                    } elseif (is_object($state) && method_exists($state, 'getClientOriginalName')) {
                                        // File baru diupload - simpan nama asli
                                        $originalName = $state->getClientOriginalName();
                                        $set('original_file_name', $originalName);
                                        $set('file_name', $originalName);
                                        $set('file_size', $state->getSize());
                                        
                                        \Log::info('New file uploaded:', [
                                            'original_name' => $originalName,
                                            'size' => $state->getSize(),
                                            'mime_type' => $state->getMimeType()
                                        ]);
                                    }
                                }
                            })
                            ->validationMessages([
                                'max' => 'File terlalu besar. Maksimal ukuran file adalah 100MB.',
                                'mimes' => 'Format file tidak didukung. Gunakan PDF, DOC, DOCX, PPT, atau PPTX.',
                            ]),
                        
                        TextInput::make('file_name')
                            ->label('Nama File untuk Tampilan')
                            ->helperText('Nama file yang akan ditampilkan kepada pengguna. Bisa diubah sesuai kebutuhan.')
                            ->dehydrated(true),
                        
                        TextInput::make('original_file_name')
                            ->label('Nama File Asli')
                            ->disabled()
                            ->dehydrated(false),
                        
                        TextInput::make('file_size')
                            ->label('Ukuran File')
                            ->disabled()
                            ->dehydrated(false)
                            ->formatStateUsing(function ($state) {
                                if (!$state) return null;
                                $bytes = floatval($state);
                                $units = ['B', 'KB', 'MB', 'GB'];
                                for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
                                    $bytes /= 1024;
                                }
                                return round($bytes, 1) . $units[$i];
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('level')
                    ->label('Level')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'SD' => 'success',
                        'SMP' => 'warning',
                        'SMA' => 'danger',
                    })
                    ->sortable(),
                
                TextColumn::make('subject')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),
                
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('danger'),
                
                TextColumn::make('file_name')
                    ->label('File')
                    ->limit(30)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 30) {
                            return null;
                        }
                        return $state;
                    }),
                
                TextColumn::make('file_size_formatted')
                    ->label('Ukuran')
                    ->getStateUsing(function (Module $record): ?string {
                        if (!$record->file_size) return null;
                        $bytes = floatval($record->file_size);
                        $units = ['B', 'KB', 'MB', 'GB'];
                        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
                            $bytes /= 1024;
                        }
                        return round($bytes, 1) . $units[$i];
                    }),
                
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('level')
                    ->label('Level')
                    ->options([
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                    ]),
                
                SelectFilter::make('subject')
                    ->label('Mata Pelajaran')
                    ->options([
                        'Matematika' => 'Matematika',
                        'IPA' => 'IPA',
                        'B. Indonesia' => 'B. Indonesia',
                        'IPS' => 'IPS',
                        'B. Inggris' => 'B. Inggris',
                        'Fisika' => 'Fisika',
                        'Kimia' => 'Kimia',
                        'Biologi' => 'Biologi',
                    ]),
                
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif',
                    ]),
            ])
            ->actions([
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function (Module $record) {
                        $disk = config('app.env') === 'production' ? 'azure' : 'public';
                        
                        if (!$record->file_path || !Storage::disk($disk)->exists($record->file_path)) {
                            \Filament\Notifications\Notification::make()
                                ->title('File tidak ditemukan!')
                                ->danger()
                                ->send();
                            return;
                        }
                        
                        // Redirect to download route
                        return redirect()->to(route('modul.download', $record));
                    })
                    ->visible(fn (Module $record): bool => $record->file_path !== null),
                
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('upload_large')
                    ->label('Upload File Besar (100MB)')
                    ->icon('heroicon-o-cloud-arrow-up')
                    ->color('warning')
                    ->url(route('admin.upload-large'))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListModules::route('/'),
            'create' => Pages\CreateModule::route('/create'),
            'view' => Pages\ViewModule::route('/{record}'),
            'edit' => Pages\EditModule::route('/{record}/edit'),
        ];
    }
}
