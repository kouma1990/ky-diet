<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KY') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    @yield('head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'KY') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        @if (Auth::guest())
                        
                        @else
                            <li><a href="{{ url('/home') }}">ホーム</a></li>
                            <li><a href="{{ url('/home/room_list') }}">ルームリスト</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">ログイン</a></li>
                            <li><a href="{{ route('register') }}">登録</a></li>
                        @else
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    ☆ <span class="badge">{{count(Auth::user()->invited_room_invitations)}}</span></a>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @if( count(Auth::user()->invited_room_invitations) === 0 )
                                        <li><p class="navbar-text">招待はありません</p></li>
                                    @else
                                        @foreach(Auth::user()->invited_room_invitations as $invitation)
                                            <li><a href="#" data-toggle="modal" data-target="#invitationModal{{$invitation->id}}">{{$invitation->room->room_name}}への招待</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
        
        @if(!Auth::guest())
            @foreach(Auth::user()->invited_room_invitations as $invitation)
                <!-- モーダル・ダイアログ -->
                <div class="modal fade" id="invitationModal{{$invitation->id}}" tabindex="-1">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header">
                				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                				<h4 class="modal-title">招待</h4>
                			</div>
    
                			<div class="modal-body">
                			    {{$invitation->inviting_user->name}}から{{$invitation->room->room_name}}への招待がありました。
                			</div>
                			
                			<div class="modal-footer">
                			    <form method="POST" action="{{url('/room-invitation/'.$invitation->id)}}">
                			        {{ method_field('PATCH') }}
			                        {{ csrf_field() }}
                				    <button type="submit" class="btn btn-default" name="action" value="decline">断る</button>
                				    <button type="submit" class="btn btn-primary" name="action" value="join">参加する</button>
                				</form>
                			</div>
            	    	</div>
                	</div>
                </div>
            @endforeach
        @endif

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js_script')
</body>
</html>
