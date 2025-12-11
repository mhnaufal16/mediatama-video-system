<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Video;

class AccessRequest extends Model
{
    protected $fillable = ['user_id', 'video_id', 'status', 'access_start_time', 'access_end_time'];

    protected $casts = [
        'access_start_time' => 'datetime',
        'access_end_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
