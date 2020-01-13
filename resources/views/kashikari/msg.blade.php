<!-- プライベートチャット -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{__('Message')}}

                </div>
                <div class='card-body text-center'>
                    @foreach($messages as $message)
                    <p>{{$message->msg}}</p>
                    @endforeach

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
