<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'is_like',

    ];

    // 外部キーが複数あるから引数で指定している
    public function toUser()
    {
        return $this->belongsTo('\App\Models\User', 'to_user_id', 'id');

    }
}
