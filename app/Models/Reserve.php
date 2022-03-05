<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'step',
        'event_id',
    ];

    public function toEvent()
    {
        return $this->belongsTo(Event::class);
    }
}


