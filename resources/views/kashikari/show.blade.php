@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form method='post'>
                        <h3><a href="{{route('kashikari.otherprofile',$kashikari->user_id)}}"><img src="{{asset('storage/post_images/'.$kashikari->getIcon())}}" width=50px></a>
                            {{$kashikari->title}}
                            <span class='badge-info'>{{$kashikari->getCategoryName()}}</span>

                            <a href="{{route('chat.confirm',$kashikari->id)}}"><input name='using' type='btn' class='btn btn-primary w-12' value="{{__('Borrow!')}}"></a>
                        </h3>
                    </form>
                </div>

                <div class='card-body text-center'>
                    @if($kashikari->pic1 == null)
                    <img src="/storage/post_images/noimage.png" width=150px>
                    @else
                    <img src="{{asset('storage/post_images/'.$kashikari->pic1)}}" alt='イメージ画像1' width=150px>
                    @endif

                    @if($kashikari->pic2 == null)
                    <img src="/storage/post_images/noimage.png" width=150px>
                    @else
                    <img src="{{asset('storage/post_images/'.$kashikari->pic2)}}" alt='イメージ画像2' width=150px>
                    @endif

                    @if($kashikari->pic3 == null)
                    <img src="/storage/post_images/noimage.png" width=150px>
                    @else
                    <img src="{{asset('storage/post_images/'.$kashikari->pic3)}}" alt='イメージ画像3' width=150px>
                    @endif

                    <p>{{$kashikari->place}}</p>
                    <p>{{$kashikari->price}}円　/ 1泊</p>
                    <p>{{$kashikari->comment}}</p>

                </div>

                <!-- 公開掲示板 -->
                <div class='card-header text-left'>
                    <h5>{{__('Board')}}</h5>
                </div>
                <div class='card-body text-left'>
                    @foreach($messages as $message)
                    <p>
                        <a href="{{route('kashikari.otherprofile',$message->user_id)}}"><img src="{{asset('storage/post_images/'.$message->getUserIcon())}}" width=30px>{{$message->getUserName()}}</a>
                        　　{{$message->msg}}</p>
                    @endforeach
                </div>

                <!-- 投稿コメント表示 -->
                <div class='card-body text-center'>
                    <form method='post'>
                        @csrf
                        <label for='msg'>{{__('Comment')}}</label>
                        <input id='msg' type='text' name='msg' autofocus>
                        <input type='submit' value="{{__('send')}}">
                    </form>
                </div>



            </div>
        </div>
    </div>
    @endsection
