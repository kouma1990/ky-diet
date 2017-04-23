@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ルームリスト
                </div>

                <div class="panel-body">
                    <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#newRoomModal">
                        ＋ New
                    </button>
                    <br><br>
                    <ul class="list-group">
                        @foreach($rooms as $room)
                    	    <a class="list-group-item"  href="{{ url('/room/'.$room->id) }}">{{$room->room_name}}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- モーダル・ダイアログ -->
<div class="modal fade" id="newRoomModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				<h4 class="modal-title">新規ルーム作成</h4>
			</div>
			<form method="POST" action="{{url('/room')}}">
			    {{ csrf_field() }}
    			<div class="modal-body">
    				<input class="form-control" name="room_name" type="text">
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    				<button type="submit" class="btn btn-primary">作成</button>
    			</div>
			</form>
		</div>
	</div>
</div>

@endsection