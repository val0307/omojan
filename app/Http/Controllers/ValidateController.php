<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
//use Illuminate\Support\Facades\Validator;

class ValidateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('validate');
    }

    protected function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'col1' => 'required',
                    'col2' => 'string',
                    'col3' => 'alpha',
                    'col4' => 'alpha_dash',
                    'col5' => 'alpha_num',
                    'col6' => 'email',
                    'col7' => 'url',
                    'col8' => 'active_url',
                    'col9' => 'date',
                    'col10' => 'date_format:"Y-m-d":',
                    'col11' => 'before:col9',
                    'col12' => 'after:col9',
                    'col13' => 'integer',
                    'col14' => 'numeric',
                    'col15' => 'digits:2',
                    'col16' => 'digits_between:1,5',
                    'col17' => 'string|max:10',
                    'col18' => 'string|min:2|max:5',
                    'col19' => 'string|between:2,5',
                ]);

        if ($validator->fails()) {
            return redirect('validate')
                        ->withErrors($validator)
                        ->withInput();
        }        
    }
}
