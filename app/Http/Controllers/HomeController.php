<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        return view('home');
    }

    public function myTestMail()
    {
    	$myEmail = 'aatmaninfotech@gmail.com';
    	Mail::to($myEmail)->send(new MyTestMail());


    	dd("Mail Send Successfully");
    }

    public function googleLineChart()
      {
          $visitor = DB::table('visitor')
                      ->select(
                          DB::raw("year(created_at) as year"),
                          DB::raw("SUM(click) as total_click"),
                          DB::raw("SUM(viewer) as total_viewer"))
                      //->orderBy("created_at")
                      ->groupBy(DB::raw("year(created_at)"))
                      ->get();

          $result[] = ['Year','Click','Viewer'];
          foreach ($visitor as $key => $value) {
              $result[++$key] = [$value->year, (int)$value->total_click, (int)$value->total_viewer];
          }

          return view('google-line-chart')
                  ->with('visitor',json_encode($result));
      }

}
