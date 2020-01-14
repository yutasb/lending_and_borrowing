<!-- プライベートチャット -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{__('Message')}}
                    <div class='card-body text-left'>
                        @foreach($chats as $chat)
                        <p>
                            <a href="{{route('kashikari.otherprofile',$chat->user_id)}}"><img src="{{asset('storage/post_images/'.$chat->getUserIcon())}}" width=30px>{{$chat->getUserName()}}</a>
                            　　{{$chat->msg}}</p>
                        @endforeach
                    </div>

                </div>
                <div class='card-body text-center'>


                    <!-- コメント表示 -->
                    <form method='post'>
                        @csrf
                        <label for='msg'>{{__('Comment')}}</label>
                        <input id='msg' type='text' name='msg' autofocus>
                        <input type='submit' value='送信'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
