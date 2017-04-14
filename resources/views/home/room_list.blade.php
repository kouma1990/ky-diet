@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Room List 
                </div>

                <div class="panel-body">
                    <button type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>new</button>
                    <br><br>
                    <ul class="list-group">
                        @foreach($rooms as $room)
                    	    <a class="list-group-item"  href="{{ url("/room/".$room->id) }}">{{$room->room_name}}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection