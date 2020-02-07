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
            <p class='toplink'><a href="{{ url('/lent') }}"><input class='btn btn-info' value="{{__('toMyPage')}}"></a></p>
            @else
            <p class='toplink'>
                <a href="{{ route('login') }}"><input class='btn btn-info' value="{{__('Login')}}"> </a>
                @if (Route::has('register')) <a href="{{ route('register') }}"><input class='btn btn-info' value="{{__('Register')}}"></a></p>
            @endif
            @endauth
        </div>
        @endif




        <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/top-page1.png" class='img'>
        <div class="title">
            <p class='topmessage'>Lending<br>　and<br>Borrowing</p>
        </div>

        <br><br>

    </div>
    <div class="">
        <div class="container">
            <h2 class='mt-10'>Lending and Borrowing で「貸し借り」を体験しよう。</h2>
            <div class="row">
                <div class='mt-5 ml-5 bginfo'>
                    <button class='btn btn-info h-50 w-75 center'>借りる！</button>
                    <div class='mt-8'>
                        <p>買うほどではないけど、使いたい！</p>
                        <p>買う前に一度試してみたい！</p>
                    </div>
                </div>
                <br>
                <div class='mt-5 ml-5 bginfo'>
                    <button class='btn btn-info h-50 w-75 center'>貸す！</button>
                    <div class='mt-8'>
                        <p>使う機会が少ない！</p>
                        <p>売るのはもったいない・・・</p>
                    </div>
                </div><br>
                <div class='mt-5 ml-5 bginfo'>
                    <button class='btn btn-info h-50 w-75 center　fs30'>また貸す！</button>
                    <div class='mt-8'>
                        <p>返ってきたらまた貸せる！</p>
                        <p>何度でも貸せる！</p>
                    </div>
                </div>
            </div>
            <p class='mt-3 right'><a href="{{url('/lent')}}">借りられる商品を見る></a></p>
        </div>
    </div>


    <div class='mt-30'>
        <div class="container">

            <h2>郵送でも手渡しでも、受け取り可能！</h2>
            <div class="row arround mt-5">
                <div class=''>
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/manga.png" width=200px;>　
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/cloth.png" width=200px;>
                </div>
                <p class='mt-5 ml-5 fs20'><span class='under'>本や洋服など、<br>急ぎではないものは<span class='fs30'>郵送</span>で受け取り！</span></p>

            </div>
            <div class="row mt-8 arround">
                <div class="">
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/ukkari.png" width=200px;>　　
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/soccerboy.png" width=200px;>　　
                </div>
                <p class='mt-5 ml-5 fs20'><span class='under'>外出先で忘れ物をして必要なものや、<br>すぐ使いたいものは<span class='fs30'>手渡し</span>で受け取り！</span></p>
            </div>
            <p class='mt-5 right'><a href="{{url('/lent')}}">借りられる商品を見る></a></p>
        </div>
    </div>

    <div class="container">
        <h3 class='mt-10 text-center'>Lending and Borrowing　で「貸し借りライフ」をはじめよう。</h3>
        <p class='toplink'>

            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <p class='toplink text-center mt-8'>
                    <a href="{{ url('/lent') }}"><input class='btn btn-info' value="{{__('toMyPage')}}"></a></p>
                @else
                <p class='toplink text-center mt-8'>
                    @if (Route::has('register')) <a href="{{ route('register') }}"><input class='btn btn-info' value="{{__('Register')}}"></a></p>
                @endif
                @endauth
            </div>
            @endif
    </div>

    </div>

    <footer>
        &copy;2020 yutasb　All Right reserved.
    </footer>

</body>

</html>
