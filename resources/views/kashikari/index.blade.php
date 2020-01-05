@extends('layouts.app')

@section('content')
<div class="contaner">
    <h2>{{__('Lent List')}}</h2>
    <div class="row">
        @foreach($kashikaris as $kashikari)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('kashikari.show',$kashikari->id ) }}">
                        <h3 class="card-title">{{$kashikari->title}}</h3>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
