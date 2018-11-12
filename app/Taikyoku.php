<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taikyoku extends Model
{
    // テーブル名を指定
    // ★LaravelはModelのClass名に対して複数系の名前でDBにTableを探しに行くので、
    // これを設定しないと、 taikyokus でテーブル探しに行くから、エラーになる
    protected $table       = 'taikyoku';

    // $fillableはこのモデルで使うリクエストパラメータを指定しておきます。
    protected $fillable = [
        'name',
    ];
}
