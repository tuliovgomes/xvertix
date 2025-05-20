<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Follow extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'follow_id',
    ];


    /**
     * Get the user who is following.
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /**
     * Find a follow by ID.
     */
    public static function findFollow($id)
    {
        return static::find($id);
    }

}
