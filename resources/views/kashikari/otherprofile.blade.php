@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <img src="{{asset('storage/post_images/'.$users->getIcon())}}" width=150px>
        <!-- アイコン -->
        <h3>{{$users->name}}</h3>
        <!-- 名前 --><br>
        <p>{!! nl2br(e($users->myself)) !!}</p>

        <!-- 自己紹介 -->
    </div>

    <br><br><br>
    <h2>{{__('My Lent List')}}</h2>
    <div class='row'>
        @foreach($kashikaris as $kashikari)
        @if($kashikari->kashikari_using == 0)
        <div class="col-sm-4">
            <div class="card">
                <div class='card-body  text-center'>
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像' width=150px>
                        <h3 class="card-title">{{$kashikari->title}}</h3>
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <br><br><br>


    <h2>{{__('Using')}}</h2>
    <div class='row'>
        @foreach($kashikaris as $kashikari)
        @if($kashikari->kashikari_using == 1)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
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
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
