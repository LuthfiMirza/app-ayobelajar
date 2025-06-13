<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'school',
        'level',
        'region',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the download histories for the user.
     */
    public function downloadHistories()
    {
        return $this->hasMany(DownloadHistory::class);
    }

    /**
     * Get the chat histories for the user.
     */
    public function chatHistories()
    {
        return $this->hasMany(ChatHistory::class);
    }

    /**
     * Get recent downloads
     */
    public function recentDownloads($limit = 10)
    {
        return $this->downloadHistories()
                    ->orderBy('downloaded_at', 'desc')
                    ->limit($limit)
                    ->get();
    }

    /**
     * Get chat sessions
     */
    public function chatSessions()
    {
        return $this->chatHistories()
                    ->select('session_id', \DB::raw('MIN(created_at) as created_at'))
                    ->groupBy('session_id')
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Determine if the user can access the given Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Only allow admin users to access the admin panel
        if ($panel->getId() === 'admin') {
            return $this->role === 'admin';
        }

        return true;
    }
}
