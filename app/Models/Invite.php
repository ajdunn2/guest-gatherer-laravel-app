<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $event_id
 * @property string $slug
 * @property string $title
 * @property string $custom_message
 * @property string $tags
 * @property \Carbon\Carbon $sent_at
 * @property \Carbon\Carbon $replied_at
 * @property \Carbon\Carbon $last_replied_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Invite extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'slug',
        'title',
        'custom_message',
        'tags',
        'sent_at',
        'replied_at',
        'last_replied_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'event_id' => 'integer',
        'tags' => 'array',
        'sent_at' => 'datetime',
        'replied_at' => 'datetime',
        'last_replied_at' => 'datetime',
    ];

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
