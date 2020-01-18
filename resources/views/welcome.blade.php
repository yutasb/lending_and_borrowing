<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lending and Borrowing</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn {
            -webkit-transition: none;
            transition: none;
        }


        .btn:hover {
            color: #212529;
            text-decoration: none;
        }

        .btn:focus,
        .btn.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
        }


        .btn-primary {
            color: #fff;
            background-color: #3490dc;
            border-color: #3490dc;
        }


        .btn-primary:hover {
            color: #fff;
            background-color: #227dc7;
            border-color: #2176bd;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            color: #fff;
            background-color: #227dc7;
            border-color: #2176bd;
            box-shadow: 0 0 0 0.2rem rgba(82, 161, 225, 0.5);
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #3490dc;
            border-color: #3490dc;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/lent') }}">Home</a>
            @else
            <a href="{{ route('login') }}">{{__('Login')}}</a>|

            @if (Route::has('register'))
            <a href="{{ route('register') }}">{{__('Register')}}</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Lending 　and 　Borrowing
            </div>
            <div class="container">

                <div class='mt-10'>
                    <p>Lending and Borrowing は、ユーザー同士のモノの貸し借りサービスです。</p>
                </div>
                <div class="row">
                    <div class='mt-10 ml-5'>
                        <h1>借りる</h1>
                        <p>買うほどではないけど、使いたい！</p>
                        <p>買う前に一度試してみたい！</p>
                    </div>
                    <br>
                    <div class='mt-10 ml-5'>
                        <h1>貸す</h1>
                        <p>ずっと使ってないけど、使いたい人がいるかも！</p>
                        <p>売りたくはないけど、使う機会が少ない！</p>
                    </div><br>
                    <div class='mt-10 ml-5'>
                        <h1>また貸す</h1>
                        <p>貸していたものが返ってきたらまた貸せる！</p>
                        <p>お小遣い稼ぎにも！</p>
                    </div>
                </div>
            </div>




            <!--
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
        </div>
    </div>
</body>

</html>
