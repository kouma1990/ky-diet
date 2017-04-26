
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.ja.min.js"></script>

<script>
    var tmp_data = [ 
    @foreach($users as $user)
        [@foreach($dates as $date)  {{ count($user->diet_datas->where("date", $date))===0 ? '' : $user->diet_datas->where("date", $date)->first()->weight }}, @endforeach],
    @endforeach
    ];
    var tmp_labels = [ @foreach($dates as $date) '{{$date}}', @endforeach ];
    var f = function(x, i, a) {
        a[i] = x.slice(-30);
    }
    
    var app = new Vue({
        el: '#app',
        data: {
            show_period: 0,
            days: [30, 90, 180, 365],
            data: tmp_data,
            labels: tmp_labels,
        },
        watch: {
            show_period: function(val) {
                for(var i=0; i<this.data.length; i++) {
                    myChart.data.datasets[i].data = this.data[i].slice(-this.days[val])
                }
                myChart.data.labels = this.labels.slice(-this.days[val])
                myChart.update()
            }
        }
    })
    
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [],
        datasets: [
        @foreach($users as $user)
        {
          label: '{{ $user->name }}',
          data: [],
          backgroundColor: "rgba({{ $user->user_setting->color }},0.4)",
          borderColor: "rgba({{ $user->user_setting->color }},0.7)",
          fill:false,
          lineTension:0,
          spanGaps: true
        },
        @endforeach
        @if(Auth::user()->user_setting->target_weight != null)
        {
          label: '目標体重',
          data: [ @foreach($dates as $date) {{ Auth::user()->user_setting->target_weight }}, @endforeach],
          backgroundColor: "rgba(255,255,0,0.4)",
          borderColor: "rgba(255,200,0,0.4)",
          fill:false,
          lineTension:0,
          spanGaps: true
        },
        @endif
        ]
      }
    });
    
    // label, dataに値を入力
    for(var i=0; i<app.data.length; i++) {
      myChart.data.datasets[i].data = app.data[i].slice(-app.days[0])
    }
    myChart.data.labels = app.labels.slice(-app.days[0])
    myChart.update();
</script>

<script>
    $('#date').datepicker({
        language: 'ja',
        endDate: "{{Carbon\Carbon::today()}}",
    });
</script>