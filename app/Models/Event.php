<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

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

    public function User()
    {
        return $this->belongsTo('\App\Models\User');

    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserved');
    }

}
