@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{__($kashikari->title.''.$kashikari->category_id)}}
                    <a href="{{route('kashikari.showmsg',$kashikari->id)}}" class='btn btn-warning'>{{__('Borrow!')}} </a>

                </div>
                <div class='card-body text-center'>
                    <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像1' width=150px>
                    <img src="{{asset('storage/post_images/'.$kashikari->pic2)}}" alt='イメージ画像2' width=150px>
                    <img src="{{asset('storage/post_images/'.$kashikari->pic3)}}" alt='イメージ画像3' width=150px>



                    <p>{{$kashikari->place}}</p>
                    <p>{{$kashikari->price}}円　/ 1泊</p>
                    <p>{{$kashikari->comment}}</p>

                </div>
                <div class='card-header text-left'>
                    <h6>掲示板</h6>
                    <form method='post'>
                        @csrf

                        <input type='submit' value='送信'>
                    </form>

                </div>
            </div>



        </div>
    </div>
</div>
@endsection
