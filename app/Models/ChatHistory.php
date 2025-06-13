<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatHistory extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'message_type',
        'message_content',
        'message_metadata',
        'sent_at',
    ];

    protected $casts = [
        'message_metadata' => 'array',
        'sent_at' => 'datetime',
    ];

    /**
     * Get the user that owns the chat history.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope for user messages
     */
    public function scopeUserMessages($query)
    {
        return $query->where('message_type', 'user');
    }

    /**
     * Scope for assistant messages
     */
    public function scopeAssistantMessages($query)
    {
        return $query->where('message_type', 'assistant');
    }

    /**
     * Scope for specific session
     */
    public function scopeForSession($query, $sessionId)
    {
        return $query->where('session_id', $sessionId);
    }

    /**
     * Get formatted message content
     */
    public function getFormattedContentAttribute()
    {
        $content = $this->message_content;
        
        // Truncate long messages for display
        if (strlen($content) > 100) {
            return substr($content, 0, 100) . '...';
        }
        
        return $content;
    }
}
