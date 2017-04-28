@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4> {{ config('app.name', 'KY') }} ：ダイエット共有アプリ</h4></div>

                <div class="panel-body">
                    <b>体重の記録の仕方</b><br>
                    ホーム画面または部屋の画面で、DateとWを記入し記録ボタンを押すことで記録できます。
                    <br><br>
                    
                    <b>部屋の作り方</b><br>
                    画面上部のルームリストに移動し、Newボタンを押すと新規ルーム作成のポップアップがでるので、
                    部屋の名前を入力して作成ボタンを押す。
                    <br><br>
                    
                    <b>友達の招待方法</b><br>
                    ルームリストから招待したい部屋を選択する。
                    グラフの下に招待の入力フォームがあるので、
                    友達のユーザ名を入力し招待ボタンを押すことで招待ができる。
                    <br><br>
                    
                    <b>招待された部屋へ参加する方法</b><br>
                    招待されたユーザは右上の☆ボタンを押すと
                    招待されているリストが表示されるので、
                    参加したい部屋を選択し、承認することで参加できる。
                    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
