<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use SoftDeletes;

class Follow extends Model
{
    /** @use HasFactory<\Database\Factories\FollowFactory> */
    /**
     * @property int $id
     * @property string $quantity
     * @property int $follower_id
     * @property \Illuminate\Support\Carbon $created_at
     * @property \Illuminate\Support\Carbon $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     */
    protected $fillable = [
        'quantity',
        'follower_id',
    ];


    /**
     * Get the user who is following.
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /**
     * Create a new follow.
     */
    public static function createFollow(array $attributes)
    {
        return static::create($attributes);
    }

    /**
     * Find a follow by ID.
     */
    public static function findFollow($id)
    {
        return static::find($id);
    }

    /**
     * Update a follow.
     */
    public function updateFollow(array $attributes)
    {
        return $this->update($attributes);
    }

    /**
     * Delete a follow.
     */
    public function deleteFollow()
    {
        return $this->delete();
    }

    /**
     * Get all follows.
     */
    public static function getAllFollows()
    {
        return static::all();
    }

    /**
     * Get follows with pagination.
     */
    public static function getPaginatedFollows($perPage = 15)
    {
        return static::paginate($perPage);
    }

    /**
     * Get follows for a specific user.
     */
    public static function getFollowsByUser($userId)
    {
        return static::where('follower_id', $userId)->get();
    }

    /**
     * Restore a soft deleted follow.
     */
    public function restoreFollow()
    {
        return $this->restore();
    }
}
