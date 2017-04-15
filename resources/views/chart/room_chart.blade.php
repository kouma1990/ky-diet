<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [ @foreach($dates as $date) '{{$date}}', @endforeach ],
        datasets: [
        @foreach($room->users as $user)
        {
          label: '{{ $user->name }}',
          data: [ @foreach($dates as $date) {{count($user->diet_datas->where("date", $date))===0 ? '' : $user->diet_datas->where("date", $date)->first()->weight }}, @endforeach],
          backgroundColor: "rgba({{ $user->user_setting->color }},0.4)",
          borderColor: "rgba({{ $user->user_setting->color }},0.7)",
          fill:false,
          spanGaps: true
        },
        @endforeach
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