<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Event;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
    ];

         //Like.phpに下記を追記
     //いいねしているユーザー
     public function user()
    {
        return $this->belongsTo(User::class);
    }

     //いいねしている投稿
    public function post()
    {
        return $this->belongsTo(Event::class);
    }

    //いいねが既にされているかを確認
    public function like_exist($id, $event_id)
    {
//Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $count = Like::where('user_id', '=', $id)->where('post_id', '=', $event_id)->count();

        // レコード（$exist）が存在するなら
        return $count;
    }
}
