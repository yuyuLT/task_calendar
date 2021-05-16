@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" >
                <div clsss="border border-primary">
                    <thead>
                        <form method="GET" action="{{route('select')}}">
                            <input type="month" name="select_month" value="{{$ym}}">
                            <button type="submit" class="btn btn-primary display-button">表示</button>
                        </form>
                        <form method = "POST" action="{{route('update',['ym'=>$ym])}}">
                        @csrf

                            <tr valign="middle">
                                <th scope="col"></th>
                                @for ($i = 0; $i < $count_day; $i++)
                                    <th scope="col" class="date_information">{{ $i + 1}}</th>
                                @endfor
                            </tr>

                            <tr valign="middle">
                                <th scope="col"></th>
                                @for ($i = 0; $i < $count_day; $i++)
                                    <th scope="col" class="date_information">{{$weeks[$i]}}</a></th>
                                @endfor    
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 10; $i++)
                                <tr valign="middle">
                                    <th scope="col"><input type="text" class="title_width" name="item_name{{$i}}" value="@if(isset($datas[$i-1]->item_name)){{$datas[$i-1]->item_name}}@endif"></th>
                                        @for ($j = 1; $j <= $count_day; $j++)
                                            @php
                                                $var_count = "count_".$j;
                                                $count_name = $i."_".$var_count
                                            @endphp
                                            <th scope="col"><input type="text" class="number_width date_information" name="{{$count_name}}" value="@if(isset($datas[$i-1]->$var_count)){{$datas[$i-1]->$var_count}}@endif"></th>
                                        @endfor  
                                </tr>
                            @endfor 
                            <!-- <tr valign="middle">
                                <th scope="col"></th>
                                    @for ($j = 0; $j < $count_day; $j++)
                                        <th scope="col">予定</th>
                                    @endfor  
                            </tr> -->
                    </tbody>    
                </div>
            </table>
                <button type="submit" class="btn btn-success">保存</button>
            </form>
        </div>
    </div>
</div>

<style>
.container, .container-fluid, .container-xl, .container-lg, .container-md, .container-sm {
    width: 100%;
    padding-right: 0;
    padding-left: 0px;
    margin-right: 100;
    margin-left: 50px;
    font-family: "メイリオ" ;
}

.display-button{
    margin-left: 10px;
    margin-bottom: 5px;
}


</style>

@endsection

