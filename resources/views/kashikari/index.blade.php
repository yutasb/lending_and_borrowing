@extends('layouts.app')

@section('content')

<div class='container'>
    <div class="row">
        <div class="col-sm-3">

            <form method='get' action="{{ route('kashikari.wordsearch','title') }}">
                <input type='text' name='title'><input type='submit' value='検索'>
            </form><br><br>

            <a href="/lent"> <input type=button class='btn btn-outline-primary w-75' value='すべて'></a><br><br>
            @foreach(config('category') as $category=>$name )
            <a href="{{route('kashikari.search',$category)}}"><input value="{{ $name }}" type='button' class='btn btn-outline-primary w-75'> </a> <br><br>
            @endforeach

        </div>



        <div class="col-sm-9">
            <h2>{{__('Lent List')}}</h2><br>
            <div class="row">

                @foreach($kashikaris as $kashikari)
                <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                    <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px class='ml-3'> 　
                    <h5 class="card-title text-center">
                        {{$kashikari->title}}　
                    </h5>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
