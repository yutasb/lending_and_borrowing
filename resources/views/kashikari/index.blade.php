@extends('layouts.app')

@section('content')

<div class='container'>
    <div class="row">
        <div class="col-sm-3">


            <form method='get' action="{{ route('kashikari.wordsearch','title') }}">
                <input type='search' name='title' placeholder='何かお探しですか？'>
                <input type='submit' value='検索'>
            </form><br><br>

            <a href="/lent"> <input type=button class='btn btn-outline-primary w-75' value='すべて'></a><br><br>

            <h5>お渡し方法で絞り込み</h5>
            @foreach(config('method') as $method=>$name)
            <a href="{{route('kashikari.methodsearch',$method)}}"><input value="{{$name}}" type='button' class='btn btn-outline-success w-75' name='method_id'></a><br><br>
            @endforeach
            <br>

            <h5>カテゴリで絞り込み</h5>
            @foreach(config('category') as $category=>$name )
            <a href="{{route('kashikari.categorysearch',$category)}}"><input value="{{ $name }}" type='button' class='btn btn-outline-info w-75' name='category_id'> </a> <br><br>
            @endforeach

        </div>



        <div class="col-sm-9">

            <h2>{{__('Lent List')}}</h2><br>



            <div class="row">

                @foreach($kashikaris as $kashikari)

                @if($kashikari->kashikari_using == 1)

                <div class="card ml-3 mb-3">
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px>
                        <h5 class="card-title text-center text-black-50 bggray ">
                            {{$kashikari->title}}　
                        </h5>

                        <div class="card-img-overlay">　
                            <input class='card-text btn btn-danger w-50' value="{{__('Using')}}">
                        </div>
                    </a>
                </div>

                @else
                <div class="card ml-3 mb-3">
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px> 　
                        <h5 class="card-title text-center text-black-50 bggray">
                            {{$kashikari->title}}　

                        </h5>
                    </a>
                </div>
                @endif

                @endforeach
            </div>
            <!-- </div> -->
        </div>
    </div>
</div> @endsection
