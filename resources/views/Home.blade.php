<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Review tool</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->

    @if (Auth::check())
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
{{--@yield('contentBody')--}}
<body>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif


                                   <!DOCTYPE html>
                                   <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
                                   <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
                                   <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
                                   <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
                                   <head>
                                       <meta charset="utf-8">
                                       <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                       <title>Review tool</title>
                                       <meta name="description" content="">
                                       <meta name="viewport" content="width=device-width, initial-scale=1">
                                       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
                                       <link rel="stylesheet" href="css/app.css">
                                   </head>
                                   <body>
                                   <!--[if lt IE 7]>
                                   <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
                                   <![endif]-->
                                   <div id="app"></div>

                                   {{--<script src="../js/app.js" async defer></script>--}}

                                   </body>
                                   </html>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>






{{--@yield('notLoggedIn')--}}



{{--<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>--}}
{{--<div id="app"></div>--}}

{{--<script src="../js/app.js" async defer></script>--}}


{{--@yield('content')--}}

{{--@yield('contentLogIn')--}}
