@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4> {{ config('app.name', 'KY') }} ：ダイエット共有アプリ</h4></div>

                <div class="panel-body">
                    <b>Share Diet</b>は体重の記録を友達と共有して、みんなでダイエットするアプリです。<br>
                    部屋を作って、友達を誘って一緒に痩せましょう！
                    （※部屋の参加者間のみ体重記録は共有されます。）
                    <hr>
                    <img src="images/ShareDiet_room.png" width="90%" alt="" border="5" class="img-responsive center-block">

                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
