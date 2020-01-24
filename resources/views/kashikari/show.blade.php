@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">


                    <h3>
                        <form method='post' action="{{route('like.off',$kashikari->id)}}">
                            @csrf
                            <span class='badge-teal p-md-1'>{{$kashikari->getCategoryName()}}</span>　
                            {{$kashikari->title}}　　　　　　　　　　　　
                            <input type='submit' name='like' class='btn btn-success' value="{{__('Like')}}">
                        </form>
                    </h3>
                </div>

                <div class='card-body text-left'>

                    @if($kashikari->pic1 == null)
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/noimage.png" class='maxwidth'>
                    @else
                    <img src="{{$kashikari->pic1}}" alt='イメージ画像1' class='maxwidth'>
                    @endif


                    @if($kashikari->pic2 == null)
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/noimage.png" class='maxwidth'>
                    @else
                    <img src="{{$kashikari->pic2}}" alt='イメージ画像2' class='maxwidth'>
                    @endif

                    @if($kashikari->pic3 == null)
                    <img src="https://lending-and-borrowing.s3-ap-northeast-1.amazonaws.com/myprefix/noimage.png" class='maxwidth'>
                    @else
                    <img src="{{$kashikari->pic3}}" alt='イメージ画像3' class='maxwidth'>
                    @endif

                    <div class="text-center mt-5 tablewidth">
                        <table class='table'>
                            <tr>
                                <th>出品者</th>
                                <td><a href="{{route('kashikari.otherprofile',$kashikari->user_id)}}"><img src="{{asset('storage/post_images/'.$kashikari->getIcon())}}" width=80px class='mb-3'>
                                        　　<span class='fs10'>　{{$kashikari->user->name}}</span></a></td>
                            </tr>
                            <tr>
                                <th>場所</th>
                                <td>
                                    {{$kashikari->place}}
                                </td>
                            </tr>
                            <tr>
                                <th>お渡し方法</th>
                                <td><span class='badge-info'>{{$kashikari->method->name}}</span></td>
                            </tr>
                            <tr>
                                <th>価格
                                <td>
                                    {{$kashikari->price}}円　/ 1泊
                                </td>
                                </th>
                            </tr>
                            <tr>
                                <th>ひとこと
                                <td>
                                    {!! nl2br(e($kashikari->comment))!!}
                                </td>
                                </th>
                            </tr>


                        </table>
                    </div>


                    <div class="text-center mt-5">
                        <form method='post'>
                            @csrf
                            @if($kashikari->kashikari_using == 1)
                            <input name='using' type='btn' class='btn btn-danger w-12' value="{{__('Using')}}">
                            @else
                            <a href="{{route('chat.confirm',$kashikari->id)}}"><input name='using' type='btn' class='btn btn-teal w-12' value="{{__('Borrow!')}}"></a>
                            @endif
                        </form>
                    </div>

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
                        <input id='msg' type='text' placeholder="{{__('Enter your message')}}" name='msg' class='w-50'>
                        <input type='submit' value="{{__('send')}}">
                    </form>
                </div>




            </div>
        </div>
    </div>
    @endsection
