<?php

namespace App\Http\Controllers;
use App\Models\StudyHour;
use App\Models\Language;
use App\Models\Content;
use App\Models\RecordLanguage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    public function index(){
      $now=Carbon::now();
      $date=$now->format('Y-m-d');
      $totalHour=StudyHour::all()->sum('hours');
      $todayHour=StudyHour::whereDate('date',$date)->sum('hours');
      $monthHour=StudyHour::whereYear('date',$now->format('Y'))->whereMonth('date',$now->format('m'))->sum('hours');
      

      return view('main',compact('monthHour','todayHour','totalHour'));
    }


    public function post(Request $request){
        $date=$request->day;
      
        $studyhour=new StudyHour;
        $studyhour->date=$date;
        $studyhour->hours=$request->time;
        $studyhour->save();
        return $date;
    }

    public function show(){
        //円グラフ用
      
      #'record_language.hours'の''を無くした
      $languages=DB::table('record_languages')->join('languages','record_languages.language_id','languages.id')->select('languages.color_code','languages.language',DB::raw("sum(record_languages.hours) as sum") )->groupBy('languages.id')->get();
      
      return $languages;

    }
}
