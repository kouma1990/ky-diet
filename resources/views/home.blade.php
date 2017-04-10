@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" action="{{url('diet-data')}}" accept-charset="UTF-8" class="form-horizontal">
                         {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="weight">Today : </label>
                            <div class="col-sm-2">
                                <input class="form-control" name="weight" tyep="number" id="weight">
                            </div>
                            <div class="col-sm-2">
                    			<button type="submit" class="btn btn-default">送信</button>
                    		</div>
                        </div>
                    	<div class="form-group">

                    	</div>
                    </form>
                </div>
                
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
@endsection