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

             $record = $this->huda->firstOrNew(['huda_name' => $row['huda_name']]);
             $record->huda_name = $row['huda_name'];
             $record->save();
         }

        // ★ 以下の2パターンとも、web.phpに、getメソッドを用意する必要あり（解決策はないか・・・）
        //        return redirect()->route('huda');
         return redirect()->action('Omo\HudaController@index');
     } 
    
    
    
}
