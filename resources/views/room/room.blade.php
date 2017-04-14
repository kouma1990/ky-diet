@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

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
                </div>
                <hr>
                
                <canvas id="myChart"></canvas>

               
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
              label: 'K',
              data: [ @foreach($dates as $date) {{count($diet_data->where("date", $date)->where("user_id",1))===0 ? '' : $diet_data->where("date", $date)->where("user_id",1)->first()->weight }}, @endforeach],
              backgroundColor: "rgba(153,255,51,0.4)",
              borderColor: "rgba(153,255,51,0.4)",
              fill:false,
              spanGaps: true
            }, {
              label: 'Y',
              data: [ @foreach($dates as $date) {{count($diet_data->where("date", $date)->where("user_id",2))===0 ? '' : $diet_data->where("date", $date)->where("user_id",2)->first()->weight }}, @endforeach],
              backgroundColor: "rgba(255,153,0,0.4)",
              borderColor: "rgba(255,153,0,0.4)",
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