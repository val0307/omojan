<?php

namespace App\Http\Controllers\Omo;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Taikyoku; // Modelを利用するために、追加（利用時にフルパス指定したくないから
use Illuminate\Support\Facades\Auth; // 認証を利用するために、追加


class TaikyokuController extends Controller
{
    public function store()
    {
        $taikyk = new Taikyoku();
        $user = Auth::user();   #ログインユーザ情報を取得

/* ■リクエストを一括設定する場合＝fill()
        fill()を使うと、Eloquentは、$fillable をチェックして、このプロパティを設定できるかチェックする
        $fillableを無視したい場合はforceFill()を使う
        例＞　$taikyk->fill($request->all())->save();

    ■1項目ずつ設定する場合        
        $user->name     = $request->name;
        $user->save();
*/

        // ログインユーザ情報から、ユーザ名を取得して設定
        $taikyk->name = $user->name;
//        $taikyk->name = 'test';

/*        $rules = []
*/

        // taikyokuテーブルの登録
        $taikyk->save();

        // 遷移先のルートを指定
        return redirect()->route('taikyoku.index');

        // 遷移先のViewを指定（これでも可能だが、store内なので、一応、indexに飛ばす
        //return view('prepare')->with('taikyk', $taikyk);

    }
    
    public function index()
    {
        // 対局テーブルからデータ取得
        $taikyk = Taikyoku::orderBy('updated_at', 'desc')->get();

        // View：prepare.blade.phpを表示
        return view('prepare')->with('taikyk', $taikyk);
    }
    
    // Route::resource の destroyは、テーブルキー項目に「id」が存在する前提
    // 呼び元でidが判明して、それを取得して、該当のデータを削除する仕組み
    // idがない or ログインユーザ情報を削除とかになると、使えない
    public function destroy($id)
    {
        $taikyk = new Taikyoku();
//        $user = Auth::user();   #ログインユーザ情報を取得

//        $taikyk->destroy($user->name);
        $taikyk->destroy($id);

        // 遷移先のルートを指定
        return redirect()->route('home');
        
    }
    
}
