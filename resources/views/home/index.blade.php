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
                                    <option value="0">Home</option>
                                    @foreach(Auth::user()->rooms as $room)
                                        <option value="{{$room->id}}">{{$room->room_name}}</option>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [ @foreach($dates as $date) '{{$date}}', @endforeach ],
            datasets: [{
              label: '{{ Auth::user()->name }}',
              data: [ @foreach($dates as $date) {{ $diet_data->where("date", $date)->where("user_id",1)->first()->weight }}, @endforeach],
              backgroundColor: "rgba({{ Auth::user()->user_setting->color }},0.4)",
              borderColor: "rgba({{ Auth::user()->user_setting->color }},0.4)",
              fill:false,
              spanGaps: true
            }]
          }
        });
    </script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.ja.min.js"></script>
    
    <script>
        $('#date').datepicker({
            language: 'ja',
            endDate: "{{Carbon\Carbon::today()}}",
        });
    </script>
@endsection