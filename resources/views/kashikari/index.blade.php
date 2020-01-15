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
            <!-- <div class="col-sm-9"> -->
            <div class="row">

                @foreach($kashikaris as $kashikari)

                @if($kashikari->kashikari_using == 1)
                <div class="card text-danger ml-3 mb-3">
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px>
                        <h5 class="card-title text-center">
                            {{$kashikari->title}}　
                        </h5>

                        <div class="card-img-overlay">　
                            <h2 class='card-text'>{{__('Using')}}</h2>
                        </div>
                    </a>
                </div>

                @else
                <div class="card ml-3 mb-3">
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=180px> 　
                        <h5 class="card-title text-center">
                            {{$kashikari->title}}　
                        </h5>
                    </a>
                </div>
                @endif @endforeach </div>
            <!-- </div> -->
        </div>
    </div>
</div> @endsection
