@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $room->room_name }}</div>

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
                    	<div class="form-group">
                    	</div>
                    </form>
                    <canvas id="myChart"></canvas>
                    
                    <hr>
                    
                    <form method="POST" action="{{url('room-invitation')}}" accept-charset="UTF-8" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="InputColor">ユーザ名：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name">
                            </div>
                            <input type="hidden" name="room_id" value="{{$room->id}}">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default">招待</button>
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
     @include("chart.room_chart")
@endsection