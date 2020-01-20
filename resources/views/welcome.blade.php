<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lending and Borrowing</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles -->

</head>

<body>
    <div class=" full-height headimg">

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/lent') }}">Home</a>
            @else
            <p class='toplink'> <a href="{{url('/lent')}}"><input class='btn btn-info' value='のぞいてみる'></a>
                <a href="{{ route('login') }}"><input class='btn btn-info' value="{{__('Login')}}"> </a>
                @if (Route::has('register')) <a href="{{ route('register') }}"><input class='btn btn-info' value="{{__('Register')}}"></a></p>
            @endif
            @endauth
        </div>
        @endif




        <img src="/storage/post_images/top-page1.png" class='img'>
        <div class="title">
            <p class='topmessage'>Lending<br>　and<br>Borrowing</p>
        </div>

        <br><br>

    </div>
    <div class=" full-height ">
        <div class="container">
            <h4 class='mt-5'>Lending and Borrowing で貸し借りを体験しよう。</h4>
            <div class="row">
                <div class='mt-5 ml-5 bginfo'>
                    <img src="/storage/post_images/noimage.png" width=250px>
                    <h1 class='mt-5'>借りる</h1>
                    <p>買うほどではないけど、使いたい！</p>
                    <p>買う前に一度試してみたい！</p>
                </div>
                <br>
                <div class='mt-5 ml-5 bginfo'>
                    <img src="/storage/post_images/noimage.png" width=250px>
                    <h1 class='mt-5'>貸す</h1>
                    <p>使いたい人がいるかも！</p>
                    <p>使う機会が少ない！</p>
                </div><br>
                <div class='mt-5 ml-5 bginfo'>
                    <img src="/storage/post_images/noimage.png" width=250px>
                    <h1 class='mt-5'>また貸す</h1>
                    <p>貸していたものが返ってきたらまた貸せる！</p>
                    <p>お小遣い稼ぎにも！</p>
                </div>
            </div>
        </div>
    </div>


    <div class="full-height bginfo">
        <div class="container">
            <div class="row">
                <h1>郵送でも手渡しでも！</h1>
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

</body>

</html>
