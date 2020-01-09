@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    コメント
                </div>
                <div class='card-body text-center'>
                    <form method='post'>
                        @csrf
                        @foreach ($messages as $message)
                        <p>{{$message->msg}}</p>
                        @endforeach
                        <input type='text' name='msg'>
                        <input type='submit' value='送信'>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
