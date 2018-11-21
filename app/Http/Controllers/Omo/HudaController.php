<?php

namespace App\Http\Controllers\Omo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Huda;
use Excel;

class HudaController extends Controller
{
    protected $huda = null;

    public function __construct(Huda $huda)
    {
        $this->huda = $huda;
    }

    public function index()
    {
        $data = [];
        $data['huda'] = $this->huda->all();
        return view('huda', $data);
    }


    /**
     * CSVインポート
     *
     * @param  Request
     * @return \Illuminate\Http\Response
     */
     public function import(Request $request)
     {

         $file = $request->file('csv_file');
         $reader = Excel::load($file->getRealPath());

         $rows = $reader->toArray();

         foreach ($rows as $row){
             // isset(x) x = nullの場合、False x = null以外の場合、True
             if (!isset($row['huda_name'])) {
                 return redirect()->back();
             }

             // 指定したオブジェクトが存在する場合、first()で取得(最初のれこーdお取得
             // 存在しなければインスタンス化する
             $record = $this->huda->firstOrNew(['huda_name'  => $row['huda_name'],'created_at' => $row['created_at']]);
//           $record = $this->huda->firstOrNew(['huda_name' => $row['huda_name']]);
//           $record = new huda();
             
             // 読み込んだCSVのレコードの各列の値を、オブジェクトに設定
             $record->huda_name = $row['huda_name'];
//             $record->created_at = date('Y/m/d H:i',strtotime($row['created_at']));
           $record->created_at = $row['created_at'];
             // DBにinsert
             $record->save();
         }

        // ★ 以下の2パターンとも、web.phpに、getメソッドを用意する必要あり（解決策はないか・・・）
        //        return redirect()->route('huda');
         return redirect()->action('Omo\HudaController@index');
     } 
}
