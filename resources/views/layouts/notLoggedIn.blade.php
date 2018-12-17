@extends('layouts.app')

@section('notLoggedIn')


<div id="app" class="notLoggedInContainer">
    <div class="navbar navbar-expand-md navbar-light navbar-laravel" id="notLoggedIn1">
    </div>

    <main id="notLoggedIn2">
        {{--@yield('content')--}}
    </main>
    <a class="title" id="notLoggedIn3" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <div id="notLoggedIn4">
        <button id="hideForNow" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest

                    @if(Request::url() === 'http://review-tool.test')
                        <li {{--class="nav-item"--}}class="btn blue">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    {{--
                                            @if (Route::has('login'))
                    --}}
                    @if(Request::url() === 'http://review-tool.test')
                        <li class="btn red">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    {{--@endif--}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>


</div>
@endsection
