<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
        'hold_user_id',
        'name',
        'title',
        'address',
        'datetime',
        'hour',
        'number',
        'type',
        'img_url',
        'introduce',
    ];

    public function toUser()
    {
        return $this->belongsTo('\App\Models\User', 'to_user_id', 'id');

    }

}
