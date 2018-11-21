<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huda extends Model
{
    // テーブル名を指定
    // ★LaravelはModelのClass名に対して複数系の名前でDBにTableを探しに行くので、
    // これを設定しないと、 taikyokus でテーブル探しに行くから、エラーになる
    protected $table       = 'huda';

    // $fillableはこのモデルで使うリクエストパラメータを指定しておきます。
    protected $fillable = [
        'huda_name',
    ];
    
    
}
