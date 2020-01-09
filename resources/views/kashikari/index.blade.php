@extends('layouts.app')

@section('content')
<div class="contaner">
    <h2>{{__('Lent List')}}</h2>
    <div class="row">
        @foreach($kashikaris as $kashikari)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <img src="{{$kashikari->pic1}}" alt='イメージ画像'>
                        <h5 class="card-title">{{$kashikari->title}}</h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
