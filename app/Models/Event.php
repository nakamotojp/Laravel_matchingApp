<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function reserveJudge($id)
    {
        $judge = Reserve::where('user_id',Auth::user()->id)->where('event_id',$id)->exists();

        if($judge){
            $step = Reserve::where('user_id',Auth::user()->id)->where('event_id',$id)->value('step');

            return $step;

        }else{

            $step = '0';
            return $step;
        }
    }

}
