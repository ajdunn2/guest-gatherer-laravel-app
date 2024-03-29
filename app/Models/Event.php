<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $location
 * @property string $time
 * @property \Carbon\Carbon $date
 * @property string $category
 * @property string $tags
 * @property string $status
 * @property \Carbon\Carbon $default_response_deadline
 * @property \Carbon\Carbon $published
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->user_id = Auth::id();
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'location_title',
        'time',
        'date',
        'category',
        'tags',
        'status',
        'default_response_deadline',
        'published',
        'address',
        'google_calendar_link',
        'google_maps_embed_one',
        'google_maps_embed_two',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'tags' => 'array',
        'default_response_deadline' => 'datetime',
        'published' => 'datetime',
    ];

    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function user(): HasMany
    {
        return $this->belongsTo(User::class);
    }
}
