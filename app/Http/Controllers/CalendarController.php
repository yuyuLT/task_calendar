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
        
        //TODO:関数化
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

        //TODO:関数化
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
        //共通処理
        for($i = 1; $i <= 10; $i++){
            $user_id = Auth::user()->id;
            $display_order = $i;
            $array_datas = array();

            //存在チェッククエリ実行
            $check_query =
            'SELECT *
                FROM learning_data
                WHERE user_id = ?
                AND display_order = ?
                AND ym = ?'
            ;
            $check_data = DB::select($check_query,[$user_id,$display_order,$ym]);
            
            //存在チェック分岐
            if(empty($check_data)){
                //データ登録処理INSERT
                if(null != $request->input('item_name'.$i)){
                    $insert_data = new LearningForm;
                    $insert_data->user_id = $user_id;
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
            }else{
                //データ登録処理UPDATE
                if(null != $request->input('item_name'.$i)){
                    $item_name = $request->input('item_name'.$i);

                    for($j = 1; $j <= 31; $j++){
                        if(null != $request->input($i.'_count_'.$j)){
                            $count = $request->input($i.'_count_'.$j);
                        }else{
                            $count = null;
                        }
                        array_push($array_datas,$count);
                    }
                }else{
                    $item_name = null;
                }
                    $query = '
                    UPDATE 
                        learning_data
                    SET 
                        item_name = ?
                        ,count_1 = ?
                        ,count_2 = ?
                        ,count_3 = ?
                        ,count_4 = ?
                        ,count_5 = ?
                        ,count_6 = ?
                        ,count_7 = ?
                        ,count_8 = ?
                        ,count_9 = ?
                        ,count_10 = ?
                        ,count_11 = ?
                        ,count_12 = ?
                        ,count_13 = ?
                        ,count_14 = ?
                        ,count_15 = ?
                        ,count_16 = ?
                        ,count_17 = ?
                        ,count_18 = ?
                        ,count_19 = ?
                        ,count_20 = ?
                        ,count_21 = ?
                        ,count_22 = ?
                        ,count_23 = ?
                        ,count_24 = ?
                        ,count_25 = ?
                        ,count_26 = ?
                        ,count_27 = ?
                        ,count_28 = ?
                        ,count_29 = ?
                        ,count_30 = ?
                        ,count_31 = ?
                    WHERE
                        user_id = ?
                        AND display_order = ?
                        AND ym = ?';

                    $affected = DB::update($query, 
                    [$item_name
                    ,$array_datas[0]
                    ,$array_datas[1]
                    ,$array_datas[2]
                    ,$array_datas[3]
                    ,$array_datas[4]
                    ,$array_datas[5]
                    ,$array_datas[6]
                    ,$array_datas[7]
                    ,$array_datas[8]
                    ,$array_datas[9]
                    ,$array_datas[10]
                    ,$array_datas[11]
                    ,$array_datas[12]
                    ,$array_datas[13]
                    ,$array_datas[14]
                    ,$array_datas[15]
                    ,$array_datas[16]
                    ,$array_datas[17]
                    ,$array_datas[18]
                    ,$array_datas[19]
                    ,$array_datas[20]
                    ,$array_datas[21]
                    ,$array_datas[22]
                    ,$array_datas[23]
                    ,$array_datas[24]
                    ,$array_datas[25]
                    ,$array_datas[26]
                    ,$array_datas[27]
                    ,$array_datas[28]
                    ,$array_datas[29]
                    ,$array_datas[30]
                    ,$user_id
                    ,$display_order
                    ,$ym]);
                   
                    
            }

                
        }

        //初期画面表示
        return redirect(route('current', [
            'ym' => $ym
        ]));
        

    }

}
