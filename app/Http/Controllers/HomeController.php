<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $fullApiUrl = "https://api.mobireach.com.bd/SendTextMessage";
    protected $apiPath = [];
    protected $apiResponse;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendsms($phone,$msg)
    {
        $queries = ['To' => "88$phone", 'Message' => $msg, "From" => "ICTDivision", "Password" => "Ictd#2015", 'Username' => 'ictdivision'];
        $response = Http::withHeaders(['CONTENT-TYPE' => "application/x-www-form-urlencoded"])
            ->get($this->fullApiUrl, $queries);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return "ada";
//        return view('home');
//        $this->sendsms('01731893442','test sms');
        return view('dashboard');
    }
}
