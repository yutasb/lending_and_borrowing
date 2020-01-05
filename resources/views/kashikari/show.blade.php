@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{__('Lent'.'「'.$kashikari->title.'」')}}
                </div>
                <div class='card-body text-center'>
                    <p>{{$kashikari->category_id}}</p>
                    <p>{{$kashikari->place}}</p>
                    <p>{{$kashikari->price}}円</p>
                    <p>{{$kashikari->comment}}</p>
                    <p>{{$kashikari->pic1}}</p>
                    <p>{{$kashikari->pic2}}</p>
                    <p>{{$kashikari->pic3}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
