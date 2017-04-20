<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [ @foreach($dates as $date) '{{$date}}', @endforeach ],
        datasets: [{
          label: '{{ Auth::user()->name }}',
          data: [ @foreach($dates as $date) {{ $diet_data->where("date", $date)->where("user_id",\Auth::user()->id)->first()->weight }}, @endforeach],
          backgroundColor: "rgba({{ Auth::user()->user_setting->color }},0.4)",
          borderColor: "rgba({{ Auth::user()->user_setting->color }},0.4)",
          fill:false,
          spanGaps: true
        },
        @if(Auth::user()->user_setting->target_weight != null)
        {
          label: '目標体重',
          data: [ @foreach($dates as $date) {{ Auth::user()->user_setting->target_weight }}, @endforeach],
          backgroundColor: "rgba(255,255,0,0.4)",
          borderColor: "rgba(255,200,0,0.4)",
          fill:false,
          spanGaps: true
        },
        @endif
        ]
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