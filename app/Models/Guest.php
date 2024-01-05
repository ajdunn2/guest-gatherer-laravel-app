<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $invite_id
 * @property int $guest_status_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $custom_reply
 * @property bool $is_plus_one
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Guest extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invite_id',
        'guest_status_id',
        'name',
        'email',
        'phone',
        'custom_reply',
        'is_plus_one',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'invite_id' => 'integer',
        'guest_status_id' => 'integer',
        'is_plus_one' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::updated(function ($guest) {
            $invite = $guest->invite;
            if(empty($invite->replied_at)) {
                $invite->replied_at = now();
            }
            $invite->last_replied_at = now();
            $invite->save();
        });
    }

    public function invite(): BelongsTo
    {
        return $this->belongsTo(Invite::class);
    }

    public function guestStatus(): BelongsTo
    {
        return $this->belongsTo(GuestStatus::class);
    }
}
