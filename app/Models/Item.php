<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'user_id',
        'name',
        'preference',
        'progress',
        'good',
        'bad',
        'memo',
        'site_name',
        'url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
