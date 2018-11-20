<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
//        $message = ['a' => 1, 'b' => 2, 'c' => 3];
        $message = ['test'];

        //storage/logs/laravel.log に出力
        // DEBUG
        logger($message);
        logger()->debug($message);
        // INFO
        info($message);
        logger()->info($message);
        // NOTICE
        logger()->notice($message);
        // WARNING
        logger()->warning($message);
        // ERROR
        logger()->error($message);
        // CRITICAL
        logger()->critical($message);
        // ALERT
        logger()->alert($message);
        // EMERGENCY
        logger()->emergency($message);

        
        return view('home');
    }
}
