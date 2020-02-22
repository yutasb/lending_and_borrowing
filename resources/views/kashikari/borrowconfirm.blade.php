@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8 mt-10">
            <h2>{{__('Borrow ok!')}}</h2>
            <h3>{{__('Move to Chat , OK?')}}</h3><br>
            <form method='post'>
                <a href="{{route('chat.index',$kashikari->id)}}"><input name='using' type='btn' class='btn btn-success w-25' value="{{__('OK!')}}"></a>
                @csrf
            </form><br>
            <a href="{{route('kashikari.show',$kashikari->id)}}"><input type='btn' class='btn btn-teal w-25' value="{{__('Back')}}"></a>
        </div>
    </div>
</div>
@endsection
