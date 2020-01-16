@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <h2>Reurn , OK?</h2>
            <form method='post'>
                <a href="{{route('return.return')}}"><input name='return' type='btn' class='btn btn-primary w-25' value="{{__('OK!')}}"></a>
            </form>
        </div>
    </div>
</div>
@endsection
