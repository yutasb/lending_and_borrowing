@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{asset('storage/post_images/'.$users->getIcon())}}" width=150px>
    <!-- アイコン -->
    <h3>{{$users->name}}</h3>
    <!-- 名前 -->
    <p>{{$users->myself}}</p>
    <!-- 自己紹介 -->


    <br><br><br>
    <h2>{{__('My Lent List')}}</h2>
    <div class='row'>
        @foreach($kashikaris as $kashikari)
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
        @endforeach
    </div>
</div>
@endsection
