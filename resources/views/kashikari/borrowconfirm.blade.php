@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <h2>Borrow ok!</h2>
            <h3>Move to Chat , OK?</h3>
            <form method='post'>
                <a href="{{route('chat.index',$kashikari->id)}}"><input name='using' type='btn' class='btn btn-primary w-25' value="{{__('OK!')}}"></a>
            </form>
        </div>
    </div>
</div>
@endsection
