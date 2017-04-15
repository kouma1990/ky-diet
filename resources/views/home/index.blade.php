@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <form method="POST" action="{{url('diet-data')}}" accept-charset="UTF-8" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="date">Date : </label>
                            <div class="col-sm-2">
                                <input class="form-control" name="date" tyep="text" id="date" value="{{old("date") ?? Carbon\Carbon::today()->format("Y/m/d")}}">
                            </div>
                            
                            <label class="col-sm-2 control-label" for="weight">W : </label>
                            <div class="col-sm-2">
                                <input class="form-control" name="weight" tyep="number" id="weight">
                            </div>
                            <div class="col-sm-2">
                    			<button type="submit" class="btn btn-default">記録</button>
                    		</div>
                        </div>
                    </form>
                    <canvas id="myChart"></canvas>
                    
                    <hr>
                    
                    <form method="POST" action="{{url('home/setting')}}" accept-charset="UTF-8" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="InputColor">デフォルトグラフ：</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="default_chart">
                                    <option value="0" {{\Auth::user()->user_setting->default_chart==0?"selected":""}}>Home</option>
                                    @foreach(Auth::user()->rooms as $room)
                                        <option value="{{$room->id}}" {{\Auth::user()->user_setting->default_chart==$room->id?"selected":""}}>{{$room->room_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-1 control-label" for="InputColor">Color：</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" id="InputColor" name="color" placeholder="色" value="{{Auth::user()->user_setting->getColorCode()}}">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default">設定</button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js_script')
    @if(\Auth::user()->user_setting->default_chart==0)
        @include("chart.home_chart")
    @else
        @include("chart.room_chart", ['room'=>\Auth::user()->rooms->where("id", \Auth::user()->user_setting->default_chart)->first()])
    @endif
@endsection