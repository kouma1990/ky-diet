<form method="POST" action="{{url('diet-data')}}" accept-charset="UTF-8" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-sm-2 control-label" for="date">Date : </label>
        <div class="col-sm-2">
            <input class="form-control" name="date" tyep="text" id="date" value="{{old("date") ?? Carbon\Carbon::today()->format("Y/m/d")}}">
        </div>
        
        <label class="col-sm-1 control-label" for="weight">W : </label>
        <div class="col-sm-2">
            <input class="form-control" name="weight" type="number" id="weight" step="0.1">
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-2">
			<button type="submit" class="btn btn-default">記録</button>
		</div>
    </div>
</form>
<hr>
<div class="col-sm-10"></div>
<div class="col-sm-2">
    <select class="form-control" name="default_chart" v-model="show_period">
        <option value="0">1ヶ月</option>
        <option value="1">3ヶ月</option>
        <option value="2">6ヶ月</option>
        <option value="3">1年</option>
    </select>
</div>
<br><br>

<canvas id="myChart"></canvas>
