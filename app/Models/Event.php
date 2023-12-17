<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'time',
        'date',
        'category',
        'tags',
        'status',
        'default_response_deadline',
        'published',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'datetime',
        'tags' => 'array',
        'default_response_deadline' => 'datetime',
        'published' => 'datetime',
    ];

    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class);
    }
}
