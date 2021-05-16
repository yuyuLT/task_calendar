<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use App\Models\LearningForm;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ym)
    {
        //指定日の曜日を取得する
        $date = date('w', strtotime($ym.'-01')) + 1;
        $count_day = date('t', strtotime($ym.'-01'));
        
        //関数化できそう
        $weeks = array();
        for ($i = $date; $i < $date + $count_day; $i++) {
            if($i % 7 === 1){
                array_push($weeks,'日');
            };

            if($i % 7 === 2){
                array_push($weeks,'月');
            };

            if($i % 7 === 3){
                array_push($weeks,'火');
            };

            if($i % 7 === 4){
                array_push($weeks,'水');
            };

            if($i % 7 === 5){
                array_push($weeks,'木');
            };

            if($i % 7 === 6){
                array_push($weeks,'金');
            };

            if($i % 7 === 0){
                array_push($weeks,'土');
            };
        }

        $query = 
        'SELECT *
         FROM learning_data
         WHERE user_id = ?
         AND ym = ?
         ORDER BY display_order asc';
         
        $datas = DB::select($query,[Auth::user()->id,$ym]);
        
        return view('calendar',compact('ym','weeks','count_day','datas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //変数を格納
        $ym = $request->input('select_month');

        //指定日の曜日を取得する
        $date = date('w', strtotime($ym.'-01')) + 1;
        $count_day = date('t', strtotime($ym.'-01'));

        //関数化できそう
        $weeks = array();
        for ($i = $date; $i < $date + $count_day; $i++) {
            if($i % 7 === 1){
                array_push($weeks,'日');
            };

            if($i % 7 === 2){
                array_push($weeks,'月');
            };

            if($i % 7 === 3){
                array_push($weeks,'火');
            };

            if($i % 7 === 4){
                array_push($weeks,'水');
            };

            if($i % 7 === 5){
                array_push($weeks,'木');
            };

            if($i % 7 === 6){
                array_push($weeks,'金');
            };

            if($i % 7 === 0){
                array_push($weeks,'土');
            };
        }

        $query = 
        'SELECT *
         FROM learning_data
         WHERE user_id = ?
         AND ym = ?
         ORDER BY display_order asc';
         
        $datas = DB::select($query,[Auth::user()->id,$ym]);
        
        return view('calendar',compact('ym','weeks','count_day','datas'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ym)
    {   
        //データ削除処理
        $query = 
        'DELETE 
         FROM learning_data
         WHERE user_id = ?
         AND ym = ?';

        DB::delete($query,[Auth::user()->id,$ym]);

        //データ登録処理
        for($i = 1; $i <= 10; $i++){
            if(null != $request->input('item_name'.$i)){
                $insert_data = new LearningForm;
                $insert_data->user_id = Auth::user()->id;
                $insert_data->display_order = $i;
                $insert_data->ym = $ym;
                $insert_data->item_name = $request->input('item_name'.$i);

                for($j = 1; $j <= 31; $j++){
                    $counta = 'count_'.$j;

                    if(null != $request->input($i.'_count_'.$j)){
                        $insert_data->$counta = $request->input($i.'_count_'.$j);
                    }else{
                        $insert_data->$counta = null;
                    }
                }
                $insert_data->save();       
            }
        }
        //初期画面表示
        return redirect(route('current', [
            'ym' => $ym
        ]));
        

    }

}
