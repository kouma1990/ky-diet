@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ホーム</div>

                <div class="panel-body">
                    @include("layouts.main")
                    
                    <hr>
                    
                    <form method="POST" action="{{url('home/setting')}}" accept-charset="UTF-8" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="default_chart">ホームグラフ：</label>
                            <div class="col-sm-2">
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
                            <label class="col-sm-2 control-label" for="target_weight">目標体重：</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="target_weight" name="target_weight" value="{{Auth::user()->user_setting->target_weight}}" step="0.1">
                            </div>
                            <div class="col-sm-1">
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
        @include("layouts.chart", ['users'=>[\Auth::user()]])
    @else
        @include("layouts.chart", ['users'=>\Auth::user()->rooms->where("id", \Auth::user()->user_setting->default_chart)->first()->users])
    @endif
@endsection